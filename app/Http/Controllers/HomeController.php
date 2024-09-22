<?php

namespace App\Http\Controllers;

use App\Models\Assembly;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Product;
use App\Models\Style;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\DownloadableGuide;
use App\Models\Order;
use App\Models\Printing;
use App\Models\VideoGuide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function dashboard()
    {
        return view('pages.dashboard');
    }


    // Frontend
    public function shop()
    {
        $styles = Style::all();
        $categories = Category::whereNull('parent_category_id')->get();

        return view('frontend.shop.index', compact('styles', 'categories'));
    }

    public function orderkitchen()
    {
        // Get all unique styles and assemblies
        $uniqueStyles = Style::distinct()->get();
        // $uniqueAssemblies = Assembly::whereIn('name', ['Flat-Packed', 'Rigid'])->get();
        $uniqueAssemblies = Assembly::whereIn('name', ['Flat Pack', 'Rigid'])->get();

        $data = [];
        $assemblyData = [];

        foreach ($uniqueStyles as $style) {
            $styleData['data'] = $style;
            $styleData['assemblies'] = [];

            foreach ($uniqueAssemblies as $assembly) {
                $products = Product::where('style_id', $style->id)->where('assembly_id', $assembly->id)->get();

                // Extract color records from products
                $assemblyData['data'] = $assembly;
                $assemblyData['colours'] = Colour::whereIn('id', $products->pluck('colour_id')->unique())->whereNotNull('finishing')->get();

                $styleData['assemblies'][$assembly->name] = $assemblyData;
            }

            $data[$style->name] = $styleData;
        }

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        return view('frontend.shop.orderkitchen.index', compact('data'));
    }


    public function orderkitchenbyname(Request $request, $slug)
    {
        try {
            $style = Style::where('slug', $slug)->firstOrFail();

            $uniqueAssemblies = Assembly::whereIn('name', ['Flat Pack', 'Rigid'])->get();

            $styleData['data'] = $style;
            $styleData['assemblies'] = [];

            foreach ($uniqueAssemblies as $assembly) {
                $products = Product::where('style_id', $style->id)->where('assembly_id', $assembly->id)->get();

                $assemblyData['data'] = $assembly;
                // Extract color records from products
                $assemblyData['colours'] = Colour::whereIn('id', $products->pluck('colour_id')->unique())->whereNotNull('finishing')->get();
                $styleData['assemblies'][$assembly->name] = $assemblyData;
            }

            // echo '<pre>';
            // print_r($styleData);
            // echo '</pre>';
            // exit;

            return view('frontend.shop.orderkitchen.orderkitchenbyname', compact('styleData'));
        } catch (\Exception $e) {
            return redirect()->route('orderkitchen');
        }
    }

    public function orderkitchenbycolour(Request $request, $style, $assembly, $colour)
    {
        $style = Style::where('slug', $style)->firstOrFail();
        $assembly = Assembly::where('slug', $assembly)->firstOrFail();
        $colour = Colour::where('slug', $colour)->firstOrFail();

        // echo '<pre>';
        // print_r($assembly);
        // print_r($colour);
        // echo '</pre>';
        // exit;

        $baseCabinets = Product::where('parent_category_id', 2)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $wallCabinets = Product::where('parent_category_id', 3)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $tallCabinets = Product::where('parent_category_id', 4)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $panels = Product::where('parent_category_id', 5)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $handles = Product::where('parent_category_id', 6)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $golaHandlelessRails = Product::where('parent_category_id', 7)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $accessories = Product::where('parent_category_id', 8)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $appliances = Product::where('parent_category_id', 9)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $worktops = Product::where('parent_category_id', 10)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $worktopsAndUpStands = Product::where('parent_category_id', 11)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $breakfastBars = Product::where('parent_category_id', 12)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $edgings = Product::where('parent_category_id', 13)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $taps = Product::where('parent_category_id', 14)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $sinks = Product::where('parent_category_id', 15)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        $swatchesAndSamples = Product::where('parent_category_id', 16)
            ->where('style_id', $style->id)
            ->where('assembly_id', $assembly->id)
            ->where('colour_id', $colour->id)
            ->get();

        // echo '<pre>';
        // print_r($baseCabinets);
        // echo '</pre>';
        // exit;

        return view('frontend.shop.orderkitchen.orderkitchenbycolour', compact('style', 'assembly', 'colour', 'baseCabinets', 'wallCabinets', 'tallCabinets', 'panels', 'handles', 'golaHandlelessRails', 'accessories', 'appliances', 'worktops', 'worktopsAndUpStands', 'breakfastBars', 'edgings', 'taps', 'sinks', 'swatchesAndSamples'));
    }

    public function ordercomponent(Request $request)
    {
        $components = Category::whereNull('parent_category_id')->get();

        // echo '<pre>';
        // print_r($components);
        // echo '</pre>';
        // exit;
        return view('frontend.shop.ordercomponent.index', compact('components'));
    }

    public function ordercomponentbyname(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $children = Category::where('parent_category_id', $category->id)->pluck('id')->toArray();

        $types = Category::whereIn('id', $children)->get();
        $assemblies = Assembly::all();
        $styles = Style::all();

        $colours = Colour::whereIn('id', Product::whereIn('category_id', $children)->pluck('colour_id')->unique())->whereNotNull('finishing')->get();

        // Include the current category in the list of children
        $children[] = $category->id;

        $count = Product::whereIn('category_id', $children)->count();
        $currentPage = 1;
        $limit = 50;
        $offset = ($currentPage - 1) * $limit;
        $pages = ceil($count / $limit);

        if ($currentPage > $pages) {
            $currentPage = $pages;
        }

        if ($currentPage < 1) {
            $currentPage = 1;
        }

        $products = Product::whereIn('category_id', $children)->offset($offset)->limit($limit)->get();

        // $products = Product::whereIn('category_id', $children)->paginate($limit);

        return view('frontend.shop.ordercomponent.ordercomponentbyname', compact('category', 'products', 'types', 'assemblies', 'styles', 'colours', 'currentPage', 'pages', 'count'));
    }

    public function order_component_by_filter(Request $request, $slug)
    {
        $t = $request->types ? $request->types : [];
        $a = $request->assemblies ? $request->assemblies : [];
        $s = $request->styles ? $request->styles : [];
        $c = $request->colors ? $request->colors : [];
        $filterChanged = $request->filterChanged;
        $currentPage = 1;

        if ($filterChanged) {
            $currentPage = 1;
        } else {
            $currentPage = $request->page ? $request->page : 1;
        }

        $parent_category = Category::where('slug', $slug)->firstOrFail();

        $productsQuery = Product::query();

        if (!empty($t)) {
            $productsQuery->whereIn('category_id', $t);
        }

        if (!empty($a)) {
            $productsQuery->whereIn('assembly_id', $a);
        }

        if (!empty($s)) {
            $productsQuery->whereIn('style_id', $s);
        }

        if (!empty($c)) {
            $productsQuery->whereIn('colour_id', $c);
        }

        ///////////////////////////////
        $count = $productsQuery->where('parent_category_id', $parent_category->id)->count();
        // $currentPage = 1;
        $limit = 50;
        $offset = ($currentPage - 1) * $limit;
        $pages = ceil($count / $limit);

        if ($currentPage > $pages) {
            $currentPage = $pages;
        }

        if ($currentPage < 1) {
            $currentPage = 1;
        }
        //////////////////////////////

        $products = $productsQuery->where('parent_category_id', $parent_category->id)
            ->with('ParentCategory', 'category', 'colour', 'style', 'assembly')
            ->offset($offset)->limit($limit)->get();

        $children = Category::where('parent_category_id', $parent_category->id)->pluck('id')->toArray();
        // Include the current category in the list of children
        $children[] = $parent_category->id;

        $types = Category::whereIn('id', $children)->get();
        $assemblies = Assembly::all();
        $styles = Style::all();
        $colours = Colour::whereIn('id', Product::whereIn('category_id', $children)->pluck('colour_id')->unique())->whereNotNull('finishing')->get();

        return response()->json([
            'category' => $parent_category,
            'products' => $products,
            'types' => $types,
            'assemblies' => $assemblies,
            'styles' => $styles,
            'colours' => $colours,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'count' => $count
        ]);
    }


    public function orderbyproduct(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $products = Product::where('style_id', $product->style_id)->where('assembly_id', $product->assembly_id)->get();

        $colours = Colour::whereIn('id', $products->pluck('colour_id')->unique())
            ->whereNotNull('finishing')
            ->where('id', '!=', $product->colour_id)
            ->get();

        $relatedProducts = Product::where('style_id', $product->style_id)
            ->where('assembly_id', $product->assembly_id)
            ->where('colour_id', $product->colour_id)
            ->where('id', '!=', $product->id)
            ->get();

        // echo '<pre>';
        // print_r($product);
        // echo '</pre>';
        // exit;

        return view('frontend.shop.orderkitchen.orderbyproduct', compact('product', 'colours', 'relatedProducts'));
    }

    public function faq()
    {
        $generalFaqs = Faq::where('type', 'general')->get();
        $deliveryFaqs = Faq::where('type', 'delivery')->get();
        return view('frontend.support.faq', compact('generalFaqs', 'deliveryFaqs'));
    }

    public function cart()
    {
        return view('frontend.shop.orderkitchen.cart');
    }

    public function checkout()
    {
        return view('frontend.shop.orderkitchen.checkout');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function fittingguide()
    {
        $downloadguide = DownloadableGuide::where('type', 'guide')->get();
        $videoguide = VideoGuide::where('type', 'guide')->get();

        return view('frontend.fittingguide', compact('downloadguide', 'videoguide'));
    }

    public function terminology()
    {
        return view('frontend.terminology');
    }
    public function needhelp()
    {
        return view('frontend.measure');
    }

    public function kitchenarrive()
    {
        return view('frontend.kitchenarrive');
    }

    public function deliveries()
    {
        $deliveryFaqs = Faq::where('type', 'delivery')->get();
        return view('frontend.support.deliveries', compact('deliveryFaqs'));
    }

    public function downloadable()
    {
        $downloadable = DownloadableGuide::where('type', 'resource')->get();
        return view('frontend.support.downloadable', compact('downloadable'));
    }

    public function installationvideos()
    {
        $installationvideo = VideoGuide::where('type', 'installation')->get();
        return view('frontend.support.installationvideos', compact('installationvideo'));
    }

    public function printresources()
    {

        return view('frontend.support.printresources');
    }


    public function cookies()
    {
        return view('frontend.legal.cookies');
    }
    public function termandcondition()
    {
        return view('frontend.legal.termandcondition');
    }

    public function privacy()
    {
        return view('frontend.legal.privacy');
    }

    public function pricepromise()
    {
        return view('frontend.legal.pricepromise');
    }

    public function pricebeat()
    {
        return view('frontend.legal.pricebeat');
    }

    public function promotion()
    {
        return view('frontend.legal.promotion');
    }

    public function virtualdesignterm()
    {
        return view('frontend.legal.virtualdesignterm');
    }

    public function blog()
    {
        $blogs = Blog::all();
        return view('frontend.support.blog', compact('blogs'));
    }

    public function showBlog($slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->first();

            if (!$blog) {
                return redirect()->route('blog');
            }

            return view('frontend.support.singleblog', compact('blog'));
        } catch (\Exception $e) {
            return redirect()->route('blog');
        }
    }

    public function designservice()
    {
        return view('frontend.designservice');
    }

    public function order_history()
    {
        if (!auth()->user()) {
            return redirect()->route('login');
        }
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('frontend.orderhistory', compact('orders'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if (!$search) {
            return redirect()->route('shop');
        }

        $products = Product::where('full_title', 'like', '%' . $search . '%')->paginate(100);

        return view('frontend.search', compact('products', 'search'));
    }

    public function compare_product(Request $request)
    {
        try {
            $id = $request->productId;

            $product = Product::where('id', $id)->with('style', 'assembly', 'colour')->first();

            $styles = Style::where('id', '!=', $product->style_id)->pluck('id');

            // echo '<pre>';
            // print_r($product);
            // echo '</pre>';
            // exit;

            $products = Product::where('parent_category_id', $product->parent_category_id)
                ->where('category_id', $product->category_id)
                ->where('assembly_id', $product->assembly_id)
                ->where('colour_id', $product->colour_id)
                ->whereIn('style_id', $styles)->with('style', 'assembly', 'colour', 'ParentCategory')->get();

            return response()->json(['status' => 'success', 'products' => $products, 'product' => $product]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Product not found']);
        }
    }

    public function site_maps() {

        // Get all unique styles and assemblies
        $uniqueStyles = Style::distinct()->get();
        $uniqueAssemblies = Assembly::whereIn('name', ['Flat Pack', 'Rigid'])->get();

        // Order Kitchen
        $orderKitchen = [];
        $assemblyData = [];

        foreach ($uniqueStyles as $style) {
            $styleData['data'] = $style;
            $styleData['assemblies'] = [];

            foreach ($uniqueAssemblies as $assembly) {
                $products = Product::where('style_id', $style->id)->where('assembly_id', $assembly->id)->get(['colour_id']);

                // Extract color records from products
                $assemblyData['data'] = $assembly;
                $assemblyData['colours'] = Colour::whereIn('id', $products->pluck('colour_id')->unique())->whereNotNull('finishing')->get();

                $styleData['assemblies'][$assembly->name] = $assemblyData;
            }

            $orderKitchen[$style->name] = $styleData;
        }

        // Order Component
        $orderComponent = Category::whereNull('parent_category_id')->get(['name', 'slug']);

        // Downloadable Resources
        $downloadableResources = DownloadableGuide::where('type', 'resource')->get();

        // Blogs
        $blogs = Blog::all(['title', 'slug']);

        // echo '<pre>';
        // print_r($orderKitchen);
        // echo '</pre>';
        // exit;

        return view('frontend.legal.site-maps', compact('orderKitchen', 'orderComponent', 'downloadableResources', 'blogs'));
    }

    public function help_and_guides() {
        return view('frontend.help-and-guides-page');
    }

    public function support_page() {
        return view('frontend.support.index');
    }
}
