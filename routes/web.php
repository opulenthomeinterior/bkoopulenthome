<?php

use App\Http\Controllers\AssemblyController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColourController;
use App\Http\Controllers\DashboardConroller;
use App\Http\Controllers\DownloadableGuideController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoGuideController;
use App\Http\Controllers\PrintingController;
use App\Http\Controllers\DesignserviceController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrdersController;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->middleware(['auth', 'verified', 'role:super-admin'])->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardConroller::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);

    // attachments route add image, update image, remove image, showall images, single image
    Route::resource('attachments', AttachmentController::class);
    Route::post('attachments/bulk-delete', [AttachmentController::class, 'bulkDelete'])->name('attachments.bulkDelete');
    Route::get('attachments/get-images-data', [AttachmentController::class, 'getImagesData'])->name('attachments.getData');

    Route::prefix('users')->group(function () {
        // Users
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('create', [UserController::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        // Profile
        Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
        Route::post('profile/store', [UserController::class, 'profile_save'])->name('user.profile.save');
        Route::post('profile/update', [UserController::class, 'password_update'])->name('user.password.update');
    });

    // Groups
    // Route::get('/groups', [GroupController::class, 'index'])->name('groups');
    // Route::get('/groups/create', [GroupController::class, 'create'])->name('group.create');
    // Route::post('/groups/create', [GroupController::class, 'store'])->name('group.store');
    // Route::get('/groups/edit/{group}', [GroupController::class, 'edit'])->name('group.edit');
    // Route::put('/groups/update/{group}', [GroupController::class, 'update'])->name('group.update');
    // Route::delete('/groups/destroy/{group}', [GroupController::class, 'destroy'])->name('group.destroy');

    // Categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('create', [CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('update/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::post('remove-image/{category}', [CategoryController::class, 'remove_image'])->name('category.removeImage');
    });

    // Styles
    Route::prefix('styles')->group(function () {
        Route::get('/', [StyleController::class, 'index'])->name('styles');
        Route::get('create', [StyleController::class, 'create'])->name('style.create');
        Route::post('create', [StyleController::class, 'store'])->name('style.store');
        Route::get('edit/{style}', [StyleController::class, 'edit'])->name('style.edit');
        Route::put('update/{style}', [StyleController::class, 'update'])->name('style.update');
        Route::delete('destroy/{style}', [StyleController::class, 'destroy'])->name('style.destroy');
        Route::post('remove-image/{style}', [StyleController::class, 'remove_image'])->name('style.removeImage');
    });

    // Colours
    Route::prefix('colours')->group(function () {
        Route::get('/', [ColourController::class, 'index'])->name('colours');
        Route::get('create', [ColourController::class, 'create'])->name('colours.create');
        Route::post('create', [ColourController::class, 'store'])->name('colours.store');
        Route::get('edit/{colour}', [ColourController::class, 'edit'])->name('colours.edit');
        Route::put('update/{colour}', [ColourController::class, 'update'])->name('colours.update');
        Route::delete('destroy/{colour}', [ColourController::class, 'destroy'])->name('colours.destroy');
        Route::post('remove-image/{colour}', [ColourController::class, 'remove_image'])->name('colours.removeImage');
    });

    // Assemblies
    Route::prefix('assemblies')->group(function () {
        Route::get('/', [AssemblyController::class, 'index'])->name('assemblies');
        Route::get('create', [AssemblyController::class, 'create'])->name('assembly.create');
        Route::post('create', [AssemblyController::class, 'store'])->name('assembly.store');
        Route::get('edit/{assembly}', [AssemblyController::class, 'edit'])->name('assembly.edit');
        Route::put('update/{assembly}', [AssemblyController::class, 'update'])->name('assembly.update');
        Route::delete('destroy/{assembly}', [AssemblyController::class, 'destroy'])->name('assembly.destroy');
        Route::post('remove-image/{assembly}', [AssemblyController::class, 'remove_image'])->name('assembly.removeImage');
    });

    // Products
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('products/data', [ProductController::class, 'getProductsData'])->name('products.data');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('create', [ProductController::class, 'store'])->name('product.store');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('update/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::post('remove-image/{product}', [ProductController::class, 'remove_image'])->name('product.removeImage');
        Route::post('import-products', [ProductController::class, 'import_products'])->name('products.import');
    });


    // Blogs
    Route::prefix('blogs')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blogs');
        Route::get('create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('create', [BlogController::class, 'store'])->name('blog.store');
        Route::get('edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::put('update/{blog}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('destroy/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
        Route::post('remove-image/{blog}', [BlogController::class, 'remove_image'])->name('blog.removeImage');
    });

    //Faq
    Route::prefix('faqs')->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('faqs.index');
        Route::get('create', [FaqController::class, 'create'])->name('faqs.create');
        Route::post('create', [FaqController::class, 'store'])->name('faqs.store');
        Route::get('edit/{faqs}', [FaqController::class, 'edit'])->name('faqs.edit');
        Route::put('update/{faqs}', [FaqController::class, 'update'])->name('faqs.update');
        Route::delete('destroy/{faqs}', [FaqController::class, 'destroy'])->name('faqs.destroy');
    });

    // Video Guide
    Route::prefix('video-guides')->group(function () {
        Route::get('/', [VideoGuideController::class, 'index'])->name('videoguides');
        Route::get('create', [VideoGuideController::class, 'create'])->name('videoguides.create');
        Route::post('create', [VideoGuideController::class, 'store'])->name('videoguides.store');
        Route::get('edit/{video_guide}', [VideoGuideController::class, 'edit'])->name('videoguides.edit');
        Route::put('update/{video_guide}', [VideoGuideController::class, 'update'])->name('videoguides.update');
        Route::delete('destroy/{video_guide}', [VideoGuideController::class, 'destroy'])->name('videoguides.destroy');
    });

    // Downloadable Guide
    Route::prefix('downloadable-guides')->group(function () {
        Route::get('/', [DownloadableGuideController::class, 'index'])->name('downloadableguides');
        Route::get('create', [DownloadableGuideController::class, 'create'])->name('downloadableguides.create');
        Route::post('create', [DownloadableGuideController::class, 'store'])->name('downloadableguides.store');
        Route::get('edit/{downloadable_guide}', [DownloadableGuideController::class, 'edit'])->name('downloadableguides.edit');
        Route::put('update/{downloadable_guide}', [DownloadableGuideController::class, 'update'])->name('downloadableguides.update');
        Route::delete('destroy/{downloadable_guide}', [DownloadableGuideController::class, 'destroy'])->name('downloadableguides.destroy');
    });


    Route::prefix('forums')->group(function () {
        Route::get('/printing-forums', [PrintingController::class, 'index'])->name('printingforums');
        Route::put('/printing-forums/{printingservice}/update-status', [PrintingController::class, 'updateStatus']);

        Route::get('/design-service-forums', [Designservicecontroller::class, 'index'])->name('designserviceforums');
        Route::put('/design-service-forums/{designservice}/update-status', [DesignServiceController::class, 'updateStatus']);
    });

    Route::prefix('coupons')->group(function () {
        Route::get('/manage-coupons', [DiscountController::class, 'index'])->name('coupons');
        Route::get('/create-coupons', [DiscountController::class, 'create'])->name('coupons.create');
        Route::post('/store-coupons', [DiscountController::class, 'store'])->name('coupons.store');
        Route::get('edit/{coupons}', [DiscountController::class, 'edit'])->name('coupons.edit');
        Route::put('update/{id}', [DiscountController::class, 'update'])->name('coupons.update');
        Route::delete('/destroy/{coupons}', [DiscountController::class, 'destroy'])->name('coupons.destroy');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrdersController::class, 'index'])->name('orders.index');
        Route::put('/{id}', [OrdersController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::get('/{id}', [OrdersController::class, 'show'])->name('orders.show');
    });

    // Redirect route for /admin without any additional path
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Fallback route for any other route under /admin
    Route::fallback(function () {
        return redirect()->route('dashboard');
    });
});

// User Panel Routes
Route::prefix('my-account')->middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/order-history', [HomeController::class, 'order_history'])->name('order-history');
    Route::get('/profile', [UserAuthController::class, 'user_profile'])->name('user-profile');
    Route::get('/edit-profile', [UserAuthController::class, 'edit_profile'])->name('edit-profile');
    Route::post('/update-profile', [UserAuthController::class, 'update_profile'])->name('update-profile');
});

// Front End
Route::prefix('/')->middleware([])->group(function () {

    Route::get('/', function () {
        $generalFaqs = Faq::where('type', 'general')->get();
        $deliveryFaqs = Faq::where('type', 'delivery')->get();
        return view('frontend.home', compact('generalFaqs', 'deliveryFaqs'));
    })->name('home');

    // Shop Prefix
    Route::prefix('/shop')->group(function () {
        Route::get('/', [HomeController::class, 'shop'])->name('shop');

        // Order By Kitchen
        Route::get('/order-kitchen', [HomeController::class, 'orderkitchen'])->name('orderkitchen');
        Route::get('/order-kitchen/{style}', [HomeController::class, 'orderkitchenbyname'])->name('orderkitchenbyname');
        Route::get('/order-kitchen/{style}/{assembly}/{colour}', [HomeController::class, 'orderkitchenbycolour'])->name('orderkitchenbycolour');

        // Order By Component
        Route::get('/order-component', [HomeController::class, 'ordercomponent'])->name('ordercomponent');
        Route::get('/order-component/{slug}', [HomeController::class, 'ordercomponentbyname'])->name('ordercomponentbyname');
        Route::post('/order-component/{slug}/filter', [HomeController::class, 'order_component_by_filter'])->name('order_component_filter');

        Route::get('/by-product/{slug}', [HomeController::class, 'orderbyproduct'])->name('orderbyproduct');
        Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
        Route::post('/checkout/process', [CheckoutController::class, 'checkout'])->name('checkout.process');
        Route::get('/checkout/success', [CheckoutController::class, 'checkout_success'])->name('checkout.success');
        Route::get('/checkout/cancel', [CheckoutController::class, 'checkout_cancel'])->name('checkout.cancel');

        // promocode
        Route::post('/apply-promocode', [DiscountController::class, 'apply_promocode'])->name('apply.promocode');
    });

    Route::prefix('/support')->group(function () {
        Route::get('/', [HomeController::class, 'support_page'])->name('support');
        Route::get('/downloadble-resources', [HomeController::class, 'downloadable'])->name('downloadable');
        Route::get('/deliveries', [HomeController::class, 'deliveries'])->name('deliveries');
        Route::get('/videos', [HomeController::class, 'installationvideos'])->name('installationvideos');
        Route::get('/print-resources', [HomeController::class, 'printresources'])->name('printresources');
        Route::post('/submit-print-resources', [PrintingController::class, 'submit_print_resources'])->name('submit.printresources');

        Route::get('/terms-and-conditions', [HomeController::class, 'termandcondition'])->name('termandcondition');
        Route::get('/price-promise', [HomeController::class, 'pricepromise'])->name('pricepromise');
        Route::get('/cant-be-beaten-on-price', [HomeController::class, 'pricebeat'])->name('pricebeat');
        Route::get('/promotion-term-and-condition', [HomeController::class, 'promotion'])->name('promotion');
        Route::get('/virtual-design-term-and-condition', [HomeController::class, 'virtualdesignterm'])->name('virtualdesignterm');
    });

    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('/blog/{slug}', [HomeController::class, 'showBlog'])->name('blog.show');

    Route::prefix('/site-pages')->group(function () {
        Route::get('/cookies-policy', [HomeController::class, 'cookies'])->name('cookies');
        Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
        Route::get('/site-maps', [HomeController::class, 'site_maps'])->name('site_maps');
    });
    
    
    Route::prefix('/help-and-guides')->group(function () {
        Route::get('/', [HomeController::class, 'help_and_guides'])->name('help_and_guides');
        Route::get('/about', [HomeController::class, 'about'])->name('about');
        Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
        Route::get('/fitting-guide', [HomeController::class, 'fittingguide'])->name('fittingguide');
        Route::get('/kitchen-terminologies', [HomeController::class, 'terminology'])->name('terminology');
        Route::get('/need-help-measuring', [HomeController::class, 'needhelp'])->name('needhelp');
        Route::get('/how-will-my-kitchen-arrive', [HomeController::class, 'kitchenarrive'])->name('kitchenarrive');
        Route::get('/design-service', [HomeController::class, 'designservice'])->name('designservice');
        Route::post('/submit-design-service', [DesignserviceController::class, 'submit_design_service'])->name('submit.designservice');
    });
    

    Route::get('/open-account', [UserAuthController::class, 'open_account'])->name('open-account');
    Route::post('/register-user', [UserAuthController::class, 'register_user'])->name('register-user');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::post('/compare', [HomeController::class, 'compare_product'])->name('compare_product');

    
    
    // Fallback route for any other route under /admin
    Route::fallback(function () {
        return redirect()->route('home');
    });
});

Auth::routes([
    'verify' => true,
]);

require __DIR__ . '/auth.php';