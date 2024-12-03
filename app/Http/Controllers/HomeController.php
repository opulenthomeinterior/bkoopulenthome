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
use Illuminate\Support\Facades\DB;

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

    public function orderwardrobe()
    {
        // Get all unique styles and assemblies
        $uniqueStyles = Style::distinct()->where('status', 1)->get();
        // $uniqueAssemblies = Assembly::whereIn('name', ['Flat-Packed', 'Rigid'])->get();
        $uniqueAssemblies = Assembly::whereIn('name', ['Flat Pack', 'Rigid'])->where('status', 1)->get();

        $data = [];
        $assemblyData = [];

        foreach ($uniqueStyles as $style) {
            $styleData['data'] = $style;
            $styleData['assemblies'] = [];

            foreach ($uniqueAssemblies as $assembly) {
                $products = Product::where('style_id', $style->id)->where('assembly_id', $assembly->id)->where('status', 'active')->get();

                // Extract color records from products
                $assemblyData['data'] = $assembly;
                $assemblyData['colours'] = Colour::whereIn('id', $products->pluck('colour_id')->unique())->whereNotNull('finishing')->where('status', 1)->get();

                $styleData['assemblies'][$assembly->name] = $assemblyData;
            }

            $data[$style->name] = $styleData;
        }

        return view('frontend.shop.orderwardrobe.index', compact('data'));
    }


    public function orderwardrobebyname(Request $request, $slug)
    {
        try {
            $style = Style::with('testimonials')->where('slug', $slug)->where('status', 1)->firstOrFail();

            // Fetch all products with the given style_id and status
            $styleProducts = Product::where('style_id', $style->id)->where('status', 'active')->get();

            // Collect all unique colour_ids from the products
            $colourIds = $styleProducts->pluck('colour_id')->unique();

            // Fetch only the colours related to those products
            $colours = Colour::whereIn('id', $colourIds)->whereNotNull('finishing')->get();

            $uniqueAssemblies = Assembly::whereIn('name', ['Flat Pack', 'Rigid'])->where('status', 1)->get();

            $styleData['data'] = $style;
            $styleData['assemblies'] = [];

            foreach ($uniqueAssemblies as $assembly) {
                $products = Product::where('style_id', $style->id)->where('assembly_id', $assembly->id)->where('status', 'active')->get();

                $assemblyData['data'] = $assembly;
                // Extract color records from products
                $assemblyData['colours'] = Colour::whereIn('id', $products->pluck('colour_id')->unique())->whereNotNull('finishing')->get();
                $styleData['assemblies'][$assembly->name] = $assemblyData;
            }

            // echo '<pre>';
            // print_r($styleData);
            // echo '</pre>';
            // exit;

            return view('frontend.shop.orderwardrobe.orderwardrobebyname', compact('styleData', 'colours'));
        } catch (\Exception $e) {
            return redirect()->route('orderwardrobe');
        }
    }

    public function orderwardrobebycolour(Request $request, $style = null, $assembly = null, $colour = null)
    {
        try {
            $style = Style::where('slug', $style)->where('status', 1)->firstOrFail();
            $assembly = Assembly::where('slug', $assembly)->where('status', 1)->firstOrFail();
            $colour = Colour::where('slug', $colour)->where('status', 1)->firstOrFail();

            $title = trim(($style->name ?? '') . ' ' . ($colour->trade_colour ?? '') . ' ' . ($assembly->name ?? ''));

            // echo '<pre>';
            // print_r($assembly);
            // print_r($colour);
            // echo '</pre>';
            // exit;
    
            $baseCabinets = Product::where('parent_category_id', 2)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $wallCabinets = Product::where('parent_category_id', 3)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $tallCabinets = Product::where('parent_category_id', 4)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $panels = Product::where('parent_category_id', 5)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $accessories = Product::where('parent_category_id', 8)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $handles = Product::where('parent_category_id', 6)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $golaHandlelessRails = Product::where('parent_category_id', 7)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $swatchesAndSamples = Product::where('parent_category_id', 16)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $worktops = Product::where('parent_category_id', 10)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();

            $worktopsAndUpStands = Product::where('parent_category_id', 11)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $breakfastBars = Product::where('parent_category_id', 12)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $edgings = Product::where('parent_category_id', 13)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $sinks = Product::where('parent_category_id', 15)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();

            $taps = Product::where('parent_category_id', 14)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $appliances = Product::where('parent_category_id', 9)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            $internals = Product::where('parent_category_id', 17)
                // ->where('style_id', $style->id)
                // ->where('assembly_id', $assembly->id)
                // ->where('colour_id', $colour->id)
                ->where('status', 'active')
                ->get();
    
            // echo '<pre>';
            // print_r($baseCabinets);
            // echo '</pre>';
            // exit;
    
            return view('frontend.shop.orderwardrobe.orderwardrobebycolour', compact('style', 'assembly', 'colour', 'baseCabinets', 'wallCabinets', 'tallCabinets', 'panels', 'handles', 'golaHandlelessRails', 'accessories', 'appliances', 'worktops', 'worktopsAndUpStands', 'breakfastBars', 'edgings', 'taps', 'sinks', 'swatchesAndSamples', 'title', 'internals'));
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function viewallorderwardrobebycolour(Request $request, $style = null, $assembly = null, $colour = null)
    {
        try {
            $style = Style::where('slug', $style)->where('status', 1)->firstOrFail();
            $assembly = Assembly::where('slug', $assembly)->where('status', 1)->firstOrFail();
            $colour = Colour::where('slug', $colour)->where('status', 1)->firstOrFail();

            $title = trim(($style->name ?? '') . ' ' . ($colour->trade_colour ?? '') . ' ' . ($assembly->name ?? ''));

            // echo '<pre>';
            // print_r($assembly);
            // print_r($colour);
            // echo '</pre>';
            // exit;
    
            $baseCabinets = Product::where('parent_category_id', 2)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $wallCabinets = Product::where('parent_category_id', 3)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $tallCabinets = Product::where('parent_category_id', 4)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $panels = Product::where('parent_category_id', 5)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $handles = Product::where('parent_category_id', 6)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $golaHandlelessRails = Product::where('parent_category_id', 7)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $accessories = Product::where('parent_category_id', 8)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $appliances = Product::where('parent_category_id', 9)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $worktops = Product::where('parent_category_id', 10)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $worktopsAndUpStands = Product::where('parent_category_id', 11)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $breakfastBars = Product::where('parent_category_id', 12)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $edgings = Product::where('parent_category_id', 13)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $taps = Product::where('parent_category_id', 14)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $sinks = Product::where('parent_category_id', 15)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            $swatchesAndSamples = Product::where('parent_category_id', 16)
                ->where('style_id', $style->id)
                ->where('assembly_id', $assembly->id)
                ->where('colour_id', $colour->id)->where('status', 'active')
                ->get();
    
            // echo '<pre>';
            // print_r($baseCabinets);
            // echo '</pre>';
            // exit;
    
            return view('frontend.shop.orderwardrobe.viewallorderwardrobebycolour', compact('style', 'assembly', 'colour', 'baseCabinets', 'wallCabinets', 'tallCabinets', 'panels', 'handles', 'golaHandlelessRails', 'accessories', 'appliances', 'worktops', 'worktopsAndUpStands', 'breakfastBars', 'edgings', 'taps', 'sinks', 'swatchesAndSamples', 'title'));
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function ordercomponent(Request $request)
    {
        $components = Category::whereNull('parent_category_id')->where('status', 1)->get();

        // echo '<pre>';
        // print_r($components);
        // echo '</pre>';
        // exit;
        return view('frontend.shop.ordercomponent.index', compact('components'));
    }

    public function ordercomponentbyname(Request $request, $slug)
    {
        $category = Category::with('testimonials', 'faqs')->where('slug', $slug)->firstOrFail();
        $children = Category::where('parent_category_id', $category->id)->pluck('id')->toArray();

        $types = Category::whereIn('id', $children)
        ->select('id', 'name')
        ->whereIn('id', function($query) use ($children) {
            $query->select(DB::raw('MIN(id)'))
                ->from('categories')
                ->whereIn('id', $children)
                ->groupBy('name');
        })
        ->orderBy('name', 'ASC')
        ->get();
        $assemblies = Assembly::where('slug', 'stock')->where('status', 1)->get();
        $styles = Style::where('slug', '!=', 'j-pull')->where('status', 1)->get();

        $colours = Colour::whereIn('id', Product::whereIn('category_id', $children)->pluck('colour_id')->unique())->whereNotNull('finishing')->where('status', 1)->get();

        // Include the current category in the list of children
        $children[] = $category->id;

        $count = Product::whereIn('category_id', $children)->where('status', 'active')->count();
        $currentPage = 1;
        $limit = 12;
        $offset = ($currentPage - 1) * $limit;
        $pages = ceil($count / $limit);

        if ($currentPage > $pages) {
            $currentPage = $pages;
        }

        if ($currentPage < 1) {
            $currentPage = 1;
        }

        $products = Product::whereIn('category_id', $children)->where('status', 'active')->offset($offset)->limit($limit)->get();

        $heights = Product::whereIn('category_id', $children)
                ->where('status', 'active')
                ->select('height', DB::raw('COUNT(*) as count'))
                ->groupBy('height')
                ->get();

        // $products = Product::whereIn('category_id', $children)->paginate($limit);

        return view('frontend.shop.ordercomponent.ordercomponentbyname', compact('category', 'products', 'types', 'assemblies', 'styles', 'colours', 'currentPage', 'pages', 'count', 'heights'));
    }

    public function order_component_by_filter(Request $request, $slug)
    {
        $t = $request->types ? $request->types : [];
        $a = $request->assemblies ? $request->assemblies : [];
        $s = $request->styles ? $request->styles : [];
        $c = $request->colors ? $request->colors : [];
        $h = $request->heights ? $request->heights : [];
        $w = $request->widths ? $request->widths : [];
        $filterChanged = $request->filterChanged;
        $currentPage = 1;

        if ($filterChanged) {
            $currentPage = 1;
        } else {
            $currentPage = $request->page ? $request->page : 1;
        }

        $parent_category = Category::where('slug', $slug)->firstOrFail();

        $productsQuery = Product::where('status', 'active');

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

        if (!empty($h)) {
            $productsQuery->whereIn('height', $h);
        }

        if (!empty($w)) {
            $productsQuery->whereIn('width', $w);
        }

        ///////////////////////////////
        $count = $productsQuery->where('parent_category_id', $parent_category->id)->count();
        // $currentPage = 1;
        $limit = 12;
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
        $assemblies = Assembly::where('status', 1)->get();
        $styles = Style::where('status', 1)->get();
        $colours = Colour::whereIn('id', Product::whereIn('category_id', $children)->where('status', 'active')->pluck('colour_id')->unique())->where('status', 1)->whereNotNull('finishing')->get();

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
        $product = Product::where('slug', $slug)->where('status', 'active')->firstOrFail();

        $products = Product::where('style_id', $product->style_id)->where('assembly_id', $product->assembly_id)->where('status', 'active')->get();

        $colours = Colour::whereIn('id', $products->pluck('colour_id')->unique())
            ->whereNotNull('finishing')->where('status', 1)
            ->where('id', '!=', $product->colour_id)
            ->get();

        $relatedProducts = Product::where('style_id', $product->style_id)
            ->where('assembly_id', $product->assembly_id)
            ->where('colour_id', $product->colour_id)
            ->where('id', '!=', $product->id)->where('status', 'active')
            ->get();

        // echo '<pre>';
        // print_r($product);
        // echo '</pre>';
        // exit;

        return view('frontend.shop.orderwardrobe.orderbyproduct', compact('product', 'colours', 'relatedProducts'));
    }

    public function faq()
    {
        $generalFaqs = Faq::where('type', 'general')->get();
        $deliveryFaqs = Faq::where('type', 'delivery')->get();
        return view('frontend.support.faq', compact('generalFaqs', 'deliveryFaqs'));
    }

    public function cart()
    {
        return view('frontend.shop.orderwardrobe.cart');
    }

    public function checkout()
    {
        return view('frontend.shop.orderwardrobe.checkout');
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

    public function wardrobearrive()
    {
        return view('frontend.wardrobearrive');
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

        $products = Product::where('full_title', 'like', '%' . $search . '%')->where('status', 'active')->paginate(100);

        return view('frontend.search', compact('products', 'search'));
    }

    public function compare_product(Request $request)
    {
        try {
            $id = $request->productId;

            $product = Product::where('id', $id)->with('style', 'assembly', 'colour')->where('status', 'active')->first();

            $styles = Style::where('id', '!=', $product->style_id)->where('status', 1)->pluck('id');

            // echo '<pre>';
            // print_r($product);
            // echo '</pre>';
            // exit;

            $products = Product::where('parent_category_id', $product->parent_category_id)
                ->where('category_id', $product->category_id)
                ->where('assembly_id', $product->assembly_id)
                ->where('colour_id', $product->colour_id)->where('status', 'active')
                ->whereIn('style_id', $styles)->with('style', 'assembly', 'colour', 'ParentCategory')->get();

            return response()->json(['status' => 'success', 'products' => $products, 'product' => $product]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Product not found']);
        }
    }

    public function site_maps() {

        // Get all unique styles and assemblies
        $uniqueStyles = Style::distinct()->where('status', 1)->get();
        $uniqueAssemblies = Assembly::whereIn('name', ['Flat Pack', 'Rigid'])->where('status', 1)->get();

        // Order Wardrobe
        $orderWardrobe = [];
        $assemblyData = [];

        foreach ($uniqueStyles as $style) {
            $styleData['data'] = $style;
            $styleData['assemblies'] = [];

            foreach ($uniqueAssemblies as $assembly) {
                $products = Product::where('style_id', $style->id)->where('assembly_id', $assembly->id)->where('status', 'active')->get(['colour_id']);

                // Extract color records from products
                $assemblyData['data'] = $assembly;
                $assemblyData['colours'] = Colour::whereIn('id', $products->pluck('colour_id')->unique())->whereNotNull('finishing')->where('status', 1)->get();

                $styleData['assemblies'][$assembly->name] = $assemblyData;
            }

            $orderWardrobe[$style->name] = $styleData;
        }

        // Order Component
        $orderComponent = Category::whereNull('parent_category_id')->get(['name', 'slug']);

        // Downloadable Resources
        $downloadableResources = DownloadableGuide::where('type', 'resource')->get();

        // Blogs
        $blogs = Blog::all(['title', 'slug']);

        // echo '<pre>';
        // print_r($orderWardrobe);
        // echo '</pre>';
        // exit;

        return view('frontend.legal.site-maps', compact('orderWardrobe', 'orderComponent', 'downloadableResources', 'blogs'));
    }

    public function help_and_guides() {
        return view('frontend.help-and-guides-page');
    }

    public function support_page() {
        return view('frontend.support.index');
    }

    public function styleColours(Request $request) {
        $styleId = $request->style_id;
        $colours = Product::where('style_id', $styleId)->where('status', 'active')->groupBy('colour_id')->pluck('colour_id');
        return response()->json(['success' => true, 'colours' => $colours]);
    }
}
