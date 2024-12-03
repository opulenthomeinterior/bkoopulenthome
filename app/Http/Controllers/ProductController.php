<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Assembly;
use App\Models\Category;
use App\Models\Colour;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductFile;
use App\Models\Style;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.products.index');
    }

    public function getProductsData(Request $request)
    {
        $draw               =         $request->get('draw'); // Internal use
        $start              =         $request->get("start"); // where to start next records for pagination
        $rowPerPage         =         $request->get("length"); // How many recods needed per page for pagination

        $orderArray         =         $request->get('order');
        $columnNameArray    =         $request->get('columns'); // It will give us columns array

        $searchArray        =         $request->get('search');
        $columnIndex        =         $orderArray[0]['column'];  // This will let us know,
        // which column index should be sorted 
        // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName         =         $columnNameArray[$columnIndex]['data']; // Here we will get column name, 
        // Base on the index we get

        $columnSortOrder    =         $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue        =         $searchArray['value']; // This is search value 


        $products = DB::table('products');
        $total = $products->count();

        $totalFilter = DB::table('products');
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('product_code', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orWhere('short_title', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orWhere('full_title', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();


        // $arrData = DB::table('products');
        // $arrData = $arrData->skip($start)->take($rowPerPage);
        // $arrData = $arrData->orderBy($columnName, $columnSortOrder);
        $arrData = Product::with(['category', 'style', 'colour', 'assembly'])
            ->select(
                'products.id as product_id',
                'products.serial_number as product_serial_number',
                'products.product_code',
                'products.image_path',
                'products.short_title',
                'products.full_title',
                'products.price',
                'products.status',
                'categories.name as category_name',
                'parent_categories.name as parent_category_name',
                'styles.name as style_name',
                'colours.trade_colour as colour_name',
                'assemblies.name as assembly_name'
            )
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('categories as parent_categories', 'categories.parent_category_id', '=', 'parent_categories.id')
            ->leftJoin('styles', 'products.style_id', '=', 'styles.id')
            ->leftJoin('colours', 'products.colour_id', '=', 'colours.id')
            ->leftJoin('assemblies', 'products.assembly_id', '=', 'assemblies.id')
            ->skip($start)
            ->take($rowPerPage)
            ->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('product_code', 'like', '%' . $searchValue . '%')
                ->orWhere('short_title', 'like', '%' . $searchValue . '%')
                ->orWhere('full_title', 'like', '%' . $searchValue . '%');
        }

        $arrData = $arrData->get();

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $arrData,
        );

        return response()->json($response);
    }

    public function create()
    {
        // $categories = Category::all();
        $categories = Category::whereNotNull('parent_category_id')->get();
        $styles = Style::all();
        $colours = Colour::all();
        $assemblies = Assembly::all();

        return view('pages.products.create', compact('categories', 'styles', 'colours', 'assemblies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|string|unique:products,product_code|max:255',
            'short_title' => 'required|string|max:255',
            // 'full_title' => 'required|string|max:255',
            'full_title' => 'required|string|max:255|unique:products,full_title',
            'product_description' => 'nullable|string',
            'price' => 'required|numeric',
            'discounted_percentage' => 'nullable|numeric|min:0|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'style_id' => 'nullable|exists:styles,id',
            'colour_id' => 'nullable|exists:colours,id',
            'assembly_id' => 'nullable|exists:assemblies,id',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'depth' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'dimensions' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        try {
            $product = new Product();
            $product->product_code = $request->input('product_code');
            $product->short_title = $request->input('short_title');
            $product->full_title = $request->input('full_title');
            $product->slug = str_replace(' ', '-', strtolower($request->input('full_title')));
            $product->product_description = $request->input('product_description');
            $product->price = $request->input('price');
            $product->discounted_percentage = $request->input('discounted_percentage');
            // Discounted Price
            if (!empty($request->input('discounted_percentage'))) {
                $product->discounted_price = $request->input('price') - ($request->input('price') * ($request->input('discounted_percentage') / 100));
            } else {
                $product->discounted_price = $request->input('price');
            }

            $category = Category::find($request->input('category_id'));
            if ($category) {
                $product->category_id = $category->id;
                $product->parent_category_id = $category->parent_category_id;
            } else {
                return redirect()->route('product.create')->with('error', 'Error creating product: Category not found.');
            }
            $product->style_id = $request->input('style_id');
            $product->colour_id = $request->input('colour_id');
            // $product->colour_name = $request->input('colour_name');
            // $product->colour_finishing = $request->input('colour_finishing');
            // $product->colour_code = $request->input('colour_code');
            // trade colour automatically saved in Product model

            $product->assembly_id = $request->input('assembly_id');
            $product->height = $request->input('height');
            $product->width = $request->input('width');
            $product->depth = $request->input('depth');
            $product->length = $request->input('length');
            $product->weight = $request->input('weight');
            $product->dimensions = $request->input('dimensions');

            // Handle image upload (if a new image is provided)
            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                // store image in folder and return image path
                $product->image_path = mmadev_store_and_get_image_path('products', $file);
            }

            $product->status = !empty($request->status) ? 'active' : 'in_active';
            
            $product->save();

            return redirect()->route('products')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('product.create')->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::whereNotNull('parent_category_id')->get();
        $styles = Style::all();
        $colours = Colour::all();
        $assemblies = Assembly::all();

        return view('pages.products.edit', compact('product', 'categories', 'styles', 'colours', 'assemblies'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_code' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            // 'full_title' => 'required|string|max:255',
            'full_title' => 'required|string|max:255|unique:products,full_title,' . $product->id,
            'product_description' => 'nullable|string',
            'price' => 'required|numeric',
            'discounted_percentage' => 'nullable|numeric|min:0|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'style_id' => 'nullable|exists:styles,id',
            'colour_id' => 'nullable|exists:colours,id',
            'assembly_id' => 'nullable|exists:assemblies,id',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'depth' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'dimensions' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        try {
            $product->product_code = $request->input('product_code');
            $product->short_title = $request->input('short_title');
            $product->full_title = $request->input('full_title');
            $product->slug = str_replace(' ', '-', strtolower($request->input('full_title')));
            $product->product_description = $request->input('product_description');
            $product->price = $request->input('price');
            $product->discounted_percentage = $request->input('discounted_percentage');
            // Discounted Price
            if (!empty($request->input('discounted_percentage'))) {
                $product->discounted_price = $request->input('price') - ($request->input('price') * ($request->input('discounted_percentage') / 100));
            } else {
                $product->discounted_price = $request->input('price');
            }
            $category = Category::find($request->input('category_id'));
            if ($category) {
                $product->category_id = $category->id;
                $product->parent_category_id = $category->parent_category_id;
            } else {
                return redirect()->route('product.edit', $product->id)->with('error', 'Error updating product: Category not found.');
            }
            $product->style_id = $request->input('style_id');
            $product->colour_id = $request->input('colour_id');
            $product->assembly_id = $request->input('assembly_id');
            $product->height = $request->input('height');
            $product->width = $request->input('width');
            $product->depth = $request->input('depth');
            $product->length = $request->input('length');
            $product->weight = $request->input('weight');
            $product->dimensions = $request->input('dimensions');

            // Handle image upload (if a new image is provided)
            if ($request->hasFile('image_path')) {
                // Delete old image if it exists
                if (!empty($product->image_path)) {
                    mmadev_delete_attachment_from_directory($product->image_path, 'products');
                }

                $file = $request->file('image_path');
                // store image in folder and return image path
                $product->image_path = mmadev_store_and_get_image_path('products', $file);
            }

            $product->status = !empty($request->status) ? 'active' : 'in_active';

            $product->save();

            return redirect()->route('products')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('product.edit', $product->id)->with('error', 'Error updating product: ' . $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            // Delete image from directory if it exists
            if (!empty($product->image_path)) {
                mmadev_delete_attachment_from_directory($product->image_path, 'products');
            }
            $product->delete();
            return redirect()->route('products')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('products')->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }

    public function remove_image(Request $request, Product $product)
    {
        try {
            // Remove the image_path from the Product model and Delete image from directory if it exists
            if (!empty($product->image_path)) {
                mmadev_delete_attachment_from_directory($product->image_path, 'products');
                $product->image_path = null;
            }
            $product->save();

            // Return a success response
            return response()->json(['message' => 'Image removed successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Error removing image'], 500);
        }
    }

    public function import_products(Request $request)
    {
        $request->validate([
            // 'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // echo "<pre>";
        // print_r($request->file('file'));
        // echo "</pre>";
        // exit;
        
        try {
            // Get the file name
            $filename = $request->file('file')->getClientOriginalName();

            // Count the rows in the CSV
            $rowCount = count(file($request->file('file')->getRealPath()));

            $rowCount = $rowCount - 1;

            if (ProductFile::where('name', $filename)->where('records', $rowCount)->exists()) {
                $productFile = ProductFile::where('name', $filename)->where('records', $rowCount)->first();
                $productFile->name = $filename;
                $productFile->records = $rowCount;
                $productFile->updated_at = Carbon::now();
                $productFile->save();
            } else {
                $productFile = ProductFile::create([
                    'name' => $filename,
                    'records' => $rowCount,
                ]);
            }

            $originalTimeLimit = ini_get('max_execution_time');
            set_time_limit(7200);
            gc_disable();
            Excel::import(new ProductsImport($productFile->id), $request->file('file'));

            exit;
            gc_enable();
            set_time_limit($originalTimeLimit);

            return response()->json(['status' => 'success', 'message' => 'Products imported successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong. ' . $e->getMessage()], 200);
        }
    }

    public function getCategoryProducts(Request $request)
    {
        $products = [];
        $product = Product::where('id', $request->product_id)->first();
        if (isset($product)) {
            $category_id = $product->category_id;
            $products = Product::where('category_id', $category_id)->get();
        }
        $baseUrl = asset('');
        return response()->json(['status' => 'success', 'products' => $products, 'product_details' => $product, 'base_url' => $baseUrl]);
    }
}