<?php
use App\Models\Category;
use App\Models\Style;
?>
<!doctype html>
<html lang="en-GB" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="XprnAzefcxw_6ShJcZrtRn21FuOT8qEGzuZRyhMp05I" />
    <meta name="description" content="Customize your Dream Kitchen with our Bespoke Kitchen Units in London. Our Bespoke Designer Kitchens include Slab, Shaker, True handleless & J-pull Styles.">
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <?php $current_uri = request()->segments(); ?>
    <?php $page_slug = ucwords(str_replace(['-', '_'], ' ', last($current_uri))); ?>

    <title>Affordable Kitchen & Custom Kitchen Units in London | BK Online</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/BKO_LOGO.png') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    {{-- <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <!--Slick Slider  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}" />
    {{-- Custom CSS --}}
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <header class="header relative">
        <div id="sidebar" class="sidebar">
            <button id="closeSidebar">&times;</button>
            <div class="sidebar-content">
                @unless (Auth::check() && Auth::user()->hasRole('user'))
                    <h3 class="text-dark">Login</h3>
                    <form action="{{ route('login') }}" class="auth-input py-4" method="POST" id="loginform">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="email" class="form-label">Email
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter Email" value="{{ old('email') }}" autofocus autocomplete="username">
                        </div>

                        <div class="form-group mb-2">
                            <label for="userpassword" class="form-label">Password
                                <span class="text-danger">*</span>
                            </label>
                            <div class="position-relative auth-pass-inputgroup mb-3">
                                <input type="password" class="form-control pe-5 password-input" name="password"
                                    placeholder="Enter Password" id="userpassword" autocomplete="current-password">
                                <button
                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                    type="button" id="password-addon"><i
                                        class="las la-eye align-middle fs-18"></i></button>
                            </div>
                        </div>

                        <div class="form-check form-check-primary fs-16 py-2">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                            <label class="form-check-label fs-14" for="remember_me">
                                Remember me
                            </label>
                            {{-- <div class="float-end">
                            <a href="{{ route('password.request') }}"
                                class="text-muted text-decoration-underline fs-14">Forgot
                                your password?</a>
                        </div> --}}
                        </div>

                        <div class="mt-2">
                            <button class="btn btn-dark rounded-0 w-100" type="submit" id="loginbutton">Log
                                In</button>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="{{ route('open-account') }}"
                                    class="fw-medium text-dark text-decoration-underline">
                                    Signup now </a> </p>
                        </div>
                    </form>
                @endunless

                @role('user')
                    <div class="row py-3">
                        <div class="col-12 py-2 text-center">
                            <img src="{{ asset('images/users/user-dummy-img.jpg') }}" alt="user"
                                class="img-fluid rounded-circle border border-dark" width="100px" />
                        </div>
                        <div class="col-12 py-1">
                            <h5 class="text-dark text-center fw-bolder">
                                {{ Auth::user()->name }}
                            </h5>
                        </div>
                        <div class="col-12 py-1">
                            <h5 class="text-dark text-center fw-bolder">
                                {{ Auth::user()->email }}
                            </h5>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-12">
                            <a href="{{ route('user-profile') }}" class="btn btn-dark w-100 rounded-0">
                                <i class="ri-user-line"></i>
                                Profile
                            </a>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-12">
                            <a href="{{ route('order-history') }}" class="btn btn-dark w-100 rounded-0">
                                <i class="ri-shopping-bag-line"></i>
                                Order History
                            </a>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-12">
                            <a href="{{ route('logout') }}" class="btn btn-danger w-100 rounded-0">
                                <i class="ri-logout-box-r-line"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                @endrole

            </div>
        </div>

        <div class="cart-icon d-lg-block d-md-block d-none" id="cart-icon">
            <i class="ri-shopping-cart-line">
                <span id="calculateProductsQuantityBottom" class="position-absolute right-0"
                    style="top: -8px;"></span>
            </i>
        </div>

        <div id="cartSidebar" class="cart-sidebar">
            <div class="container-fluid py-3 px-4">
                <div class="row border-bottom border-dark">
                    <div class="col-6">
                        <h3 class="text-dark text-uppercase fw-bolder">Cart</h3>
                    </div>
                    <div class="col-6 text-end" style="cursor: pointer">
                        <i class="ri-close-circle-line fs-4" id="cart-close-icon"></i>
                    </div>
                </div>
                <div class="row py-4 h-100">
                    <div class="col-12" id="cartItemsList" style="overflow-y: scroll; height: 150px;">

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('cart') }}" class="btn btn-md btn-dark rounded-0 fw-bolder">View Cart</a>
                        <a href="{{ route('checkout') }}"
                            class="btn btn-md btn-dark rounded-0 fw-bolder">Checkout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="searchPopup px-3 py-3" id="searchPopup">
            <form action="{{ route('search') }}" method="GET" class="row justify-content-center flex-wrap">
                <div class="w-75">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                </div>
                <div class="" style="flex-basis: content">
                    <button type="submit" class="bg-transparent border-0">
                        <i class="ri-search-2-line"></i>
                    </button>
                </div>
                <div class="" style="flex-basis: content" id="close-search">
                    <a href="#">
                        <i class="ri-close-circle-line"></i>
                    </a>
                </div>
            </form>
        </div>


        {{-- <div class="wrap py-1" style="background-color: black;">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col d-flex justify-content-end">
                        <p class="mb-0 d-flex">
                            <a href="#"
                                class="d-flex align-items-center justify-content-center px-3 text-light">360
                                Visualizer</a>
                            <a href="#"
                                class="d-flex align-items-center justify-content-center px-3 text-light"><i
                                    class="ri-whatsapp-line"></i> +00
                                1234
                                567</a>
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}

        <nav class="nav container">
            <div class="nav__data">
                <a href="{{ route('home') }}" class="nav__logo text-start flex-grow-1">
                    <img src="{{ asset('images/BKO_LOGO.png') }}" width="100px" />
                </a>

                <a href="#" class="d-lg-none show-small d-flex" id="searchIcon"><i
                        class="ri-search-2-line"></i></a>
                <a href="{{ route('cart') }}"
                    class="d-lg-none show-small d-flex align-items-center justify-content-center px-3 text-dark">
                    <i class="position-relative ri-shopping-cart-line">
                        <span id="calculateProductsQuantity" class="position-absolute right-0"
                            style="top: -8px;"></span>
                    </i>
                </a>

                <a href="#" id="openSidebar"
                    class="align-items-center justify-content-center px-1 text-dark text-end d-lg-none show-small d-flex">
                    <i class="ri-user-line"></i>
                </a>
                <span class="nav__toggle" id="nav-toggle">

                    <i class="ri-menu-line nav__toggle-menu"></i>
                    <i class="ri-close-line nav__toggle-close"></i>
                </span>


            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list p-2">
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            <a href="{{ route('orderkitchen') }}">ORDER KITCHEN </a>
                            <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>
                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                @php
                                    $styles = Style::all();
                                @endphp
                                @if (!empty($styles))
                                @foreach ($styles as $index => $style)
                                    @if ($index % 2 == 0)
                                        <div class="dropdown__group">
                                            <ul class="dropdown__list">
                                    @endif
                                            <li>
                                                <a href="{{ route('orderkitchenbyname', $style->slug) }}" class="dropdown__link">
                                                    <i class="ri-arrow-right-s-fill"></i>{{ $style->name }} Kitchen</a>
                                            </li>
                                                @if (($index + 1) % 2 == 0 || $loop->last)
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                                @else
                                <div class="dropdown__group">
                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="{{ route('orderkitchenbyname', 'slab') }}"
                                                class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>
                                                SLAB KITCHENS
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('orderkitchenbyname', 'j-pull') }}"
                                                class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>
                                                j-PULL KITCHENS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown__group">
                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="{{ route('orderkitchenbyname', 'shaker') }}"
                                                class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>
                                                SHAKER KITCHENS
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('orderkitchenbyname', 'true-handleless') }}"
                                                class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>
                                                TRUE HANDLESS KITCHENS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            <a href="{{ route('ordercomponent') }}">ORDER COMPONENT </a>
                            <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>
                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                @php
                                    $categories = Category::where('parent_category_id', null)->get();
                                @endphp
                                @foreach ($categories as $index => $category)
                                    @if ($index % 4 == 0)
                                        <div class="dropdown__group">
                                            <ul class="dropdown__list">
                                    @endif
                                                <li>
                                                    <a href="{{ route('ordercomponentbyname', $category->slug) }}" class="dropdown__link">
                                                        <i class="ri-arrow-right-s-fill"></i>{{ $category->name }}</a>
                                                </li>
                                                @if (($index + 1) % 4 == 0 || $loop->last)
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            <a href="{{ route('help_and_guides') }}">
                                HELP & GUIDES
                            </a>
                            <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="{{ route('terminology') }}" class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>KITCHEN TERMINOLOGY</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('faq') }}" class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>BK Online FAQS</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('fittingguide') }}" class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>FITTING GUIDES</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="{{ route('needhelp') }}" class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>NEED HELP MEASURING?</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('kitchenarrive') }}" class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>HOW WILL MY KITCHEN ARRIVE?</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about') }}" class="dropdown__link">
                                                <i class="ri-arrow-right-s-fill"></i>ABOUT US</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            <a class="" href="{{ route('designservice') }}">
                                DESIGN SERVICE
                            </a>
                        </div>
                    </li>
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            <a class="" href="{{ route('blog') }}">
                                BLOG
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list p-2">
                    <li class="d-lg-flex d-none hide-small">
                        <a href="#" class="nav__link" id="searchIcon-desktop"><i class="ri-search-2-line"></i></a>
                    </li>
                    <li class="d-lg-flex d-none hide-small">
                        <a href="{{ route('cart') }}"
                            class="d-flex align-items-center justify-content-center px-3 text-dark">
                            <i class="position-relative ri-shopping-cart-line">
                                <span id="calculateProductsQuantity2" class="position-absolute right-0"
                                    style="top: -8px;"></span>
                            </i>
                        </a>
                    </li>
                    <li class="d-lg-flex d-none hide-small">
                        <a href="#" id="openSidebar-desktop"
                            class="d-flex align-items-center justify-content-center px-1 text-dark"><i
                                class="ri-user-line"></i></a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>
    <div class="account-pages">
        {{ $slot }}
    </div>

    <footer class="text-center border-top mt-4">
        <div class="container py-lg-5 py-4">
            <section class="">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-start">
                        <img src="{{ asset('images/BKO_LOGO.png') }}" width="100px" />
                        <h6 class="my-3">Customer Service Hours</h6>

                        <ul class="footer-ul list-unstyled mb-0">
                            <li>
                                <i class="ri-arrow-right-s-fill"></i>
                                Mon-Thu: 8am to 5pm
                            </li>
                            <li>
                                <i class="ri-arrow-right-s-fill"></i>
                                Fri: 8am to 2:30pm
                            </li>
                            <li class="mt-2">
                                <a data-mdb-ripple-init class="btn btn-outline btn-floating" href="#!"
                                    role="button"><i class="ri-facebook-fill pl-0"></i></a>
                                <a data-mdb-ripple-init class="btn btn-outline btn-floating" href="#!"
                                    role="button"><i class="ri-twitter-fill"></i></a>
                                <a data-mdb-ripple-init class="btn btn-outline btn-floating" href="#!"
                                    role="button"><i class="ri-youtube-fill"></i></a>
                                <a data-mdb-ripple-init class="btn btn-outline btn-floating" href="#!"
                                    role="button"><i class="ri-linkedin-fill"></i></a>
                            </li>

                            <li><i class="ri-mail-line mt-1"></i>customerservices@bkonline.co.uk</li>
                            <li><i class="ri-phone-line"></i>0800 043 0804</li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 ms-lg-3 ms-0 text-start">
                        <h5 class="fw-bolder">Support</h5>

                        <ul class="footer-ul list-unstyled mb-0">
                            {{-- <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links" href="{{ route('blog') }}"><i
                                        class="ri-arrow-right-s-fill"></i>Blog</a>
                            </li> --}}
                            <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('downloadable') }}"><i
                                        class="ri-arrow-right-s-fill"></i>Downloadable Resources</a>
                            </li>
                            <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('installationvideos') }}"><i
                                        class="ri-arrow-right-s-fill"></i>Installation Videos</a>
                            </li>
                            {{-- <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links" href="{{ route('faq') }}"><i
                                        class="ri-arrow-right-s-fill"></i>FAQs</a>
                            </li> --}}
                            <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('deliveries') }}"><i
                                        class="ri-arrow-right-s-fill"></i>Deliveries</a>
                            </li>
                            <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('printresources') }}"><i class="ri-arrow-right-s-fill"></i>Print
                                    Resources</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-start">
                        <h5 class="fw-bolder">Legal Pages</h5>

                        <ul class="footer-ul list-unstyled mb-0">
                            <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('cookies') }}"><i class="ri-arrow-right-s-fill"></i>Cookies
                                    Policy</a>
                            </li>
                            <!-- <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('privacy') }}"><i class="ri-arrow-right-s-fill"></i>Privacy
                                    Policy</a>
                            </li>
                            <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('termandcondition') }}"><i class="ri-arrow-right-s-fill"></i>Terms
                                    and Conditions</a>
                            </li> -->
                            <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('pricepromise') }}"><i class="ri-arrow-right-s-fill"></i>Price
                                    Promise Guarantee: Terms &
                                    Conditions</a>
                            </li>
                            <!-- <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('pricebeat') }}"><i class="ri-arrow-right-s-fill"></i>Terms and
                                    Conditions – We Can’t Be Beaten on
                                    Price</a>
                            </li> -->
                            {{-- <li class="my-1 footer-li">
                                <a class="text-body text-decoration-none footer-links"
                                    href="{{ route('site_maps') }}"><i class="ri-arrow-right-s-fill"></i>Sitemap</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <!-- <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
           © 2020 Copyright:
           <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div> -->
    </footer>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!--Slick Slider -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>

    <!-- password-addon init -->
    <script src="{{ asset('js/pages/password-addon.init.js') }}"></script>

    <script>
        var check_code_route = "{{ route('apply.promocode') }}";
        var compare_route = "{{ route('compare_product') }}";
        var APP_URL = "{{ config('app.url') }}";
        var ASSET_URL = "{{ asset('') }}";
        var product_BIU = "{{ asset('uploads/products/') }}";
    </script>
    @stack('scripts')
    <script src="{{ asset('js/frontend.js') }}"></script>

    <?php
    /**
     *  Alert
     */
    $message = '';
    $icon = '';
    
    if (!empty($errors->all())) {
        $icon = 'error';
        $message = $errors->first();
    } elseif (session()->has('success')) {
        $icon = 'success';
        $message = session()->get('success');
    } elseif (session()->has('error')) {
        $icon = 'error';
        $message = session()->get('error');
    } elseif (!empty($success)) {
        $icon = 'success';
        $message = $success;
    }
    
    ?>

    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 5000
        });
        var message = '<?php echo $message; ?>';
        var icon = '<?php echo $icon; ?>';
        if (message.length > 0) {
            Toast.fire({
                icon: icon,
                title: message
            });
        }
    </script>
</body>

</html>
