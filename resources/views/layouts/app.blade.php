<!doctype html>
<html lang="en" data-layout="vertical" data-bs-theme="{{ config('theme.bs_theme') }}"
    data-topbar="{{ config('theme.topbar') }}" data-sidebar="{{ config('theme.sidebar') }}"
    data-layout-width="{{ config('theme.layout_width') }}"
    data-sidebar-size="{{ config('theme.layout_width') == 'boxed' ? 'sm-hover' : 'lg' }}" data-sidebar-image="none"
    data-preloader="disable">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="heEgug7ppokpYwZmy5grKM8rNbzkQgkfwbloUmFBkxw" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="icon" href="{{ asset('images/BKO_LOGO.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/BKO_LOGO.png') }}">
    <?php $current_uri = request()->segments(); ?>
    <?php $page_slug = ucwords(str_replace(['-', '_'], ' ', last($current_uri))); ?>

    <title>{{ config('app.name') }}</title>


    <!-- plugin css -->
    <link href="<?php echo asset('libs/jsvectormap/css/jsvectormap.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="<?php echo asset('js/layout.js'); ?>"></script>
    <!-- Bootstrap Css -->
    <link href="<?php echo asset('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo asset('css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo asset('css/app.min.css'); ?>" rel="stylesheet" type="text/css" />
    {{-- Custom CSS --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom styles for date and time picker -->
    <link href="<?php echo asset('css/bootstrap-datepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('css/bootstrap-timepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('css/select2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('css/calentim.min.css'); ?>" rel="stylesheet">

    {{-- DataTables  --}}
    <link rel="stylesheet" href="{{ asset('libs/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('libs/tagify/dist/tagify.css') }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="{{ route('home') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="60">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="100">
                                </span>
                            </a>

                            <a href="{{ route('home') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="60">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="100">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-primary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='las la-expand fs-24'></i>
                            </button>
                        </div>

                        <div class="dropdown header-item">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ auth()->user()->image_path ? asset('uploads/users/uploads/' . auth()->user()->image_path) : asset('images/users/avatar-4.jpg') }}"
                                        alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block fw-medium user-name-text fs-16">
                                            {{ auth()->user()->name ?? 'N/A' }}
                                            <i class="las la-angle-down fs-12 ms-1"></i></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                    <i class="bx bx-user fs-15 align-middle me-1"></i>
                                    <span key="t-profile">Profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                    <i class="bx bx-power-off fs-15 align-middle me-1 text-danger"></i>
                                    <span key="t-logout">Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="60">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="100">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="60">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="100">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            {{-- Sidebar --}}
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <!-- Dark Logo-->
                    <a href="{{ route('dashboard') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="60">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="100">
                        </span>
                    </a>
                    <!-- Light Logo-->
                    <a href="{{ route('dashboard') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="60">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="100">
                        </span>
                    </a>
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                        id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>

                <div id="scrollbar" data-simplebar="init" class="h-100 simplebar-scrollable-y">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <div class="container-fluid">

                                            <div id="two-column-menu"></div>

                                            {{-- Menu --}}
                                            <ul class="navbar-nav" id="navbar-nav" data-simplebar="init">
                                                <div class="simplebar-wrapper" style="margin: 0px;">
                                                    <div class="simplebar-height-auto-observer-wrapper">
                                                        <div class="simplebar-height-auto-observer"></div>
                                                    </div>
                                                    <div class="simplebar-mask">
                                                        <div class="simplebar-offset"
                                                            style="right: 0px; bottom: 0px;">
                                                            <div class="simplebar-content-wrapper" tabindex="0"
                                                                role="region" aria-label="scrollable content"
                                                                style="height: auto; overflow: hidden;">
                                                                <div class="simplebar-content" style="padding: 0px;">
                                                                    @role('super-admin')
                                                                        <li class="menu-title">
                                                                            <span data-key="t-menu">Menu</span>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link menu-link {{ request()->is('admin/') ? 'active' : '' }}"
                                                                                href="{{ route('dashboard') }}">
                                                                                <i class="las la-house-damage"></i> <span
                                                                                    data-key="t-dashboard">Dashboard</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link menu-link {{ request()->is('admin/users', 'admin/users/*') ? 'active' : '' }}"
                                                                                href="#sidebarUsermanagement"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarUsermanagement">
                                                                                <i class="las la-users"></i> <span
                                                                                    data-key="t-users">Users</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/users', 'admin/users/*') ? 'show' : '' }}"
                                                                                id="sidebarUsermanagement">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('user.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/users/create') ? 'active' : '' }}"
                                                                                            data-key="t-users"> Create User
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('users') }}"
                                                                                            class="nav-link {{ request()->is('admin/users', 'admin/users/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-users"> Manage
                                                                                            Users </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="menu-title">
                                                                            <span data-key="t-menu">Products</span>
                                                                        </li>
                                                                        {{-- <li class="nav-item">
                                                                            <a class="nav-link menu-link {{ request()->is('admin/groups', 'admin/groups/*') ? 'active' : '' }}"
                                                                                href="#sidebarGroup"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarGroup">
                                                                                <i class="bx bx-category"></i> 
                                                                                <span data-key="t-groups">Groups</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/groups', 'admin/groups/*') ? 'show' : '' }}"
                                                                                id="sidebarGroup">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('group.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/groups/create') ? 'active' : '' }}"
                                                                                            data-key="t-groups"> Create Group
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('groups') }}"
                                                                                            class="nav-link {{ request()->is('admin/groups', 'admin/groups/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-groups"> Manage Groups </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li> --}}

                                                                        {{-- Attachments --}}
                                                                        <li class="nav-item">
                                                                            <a class="nav-link menu-link {{ request()->is('admin/attachments', 'admin/attachments/*') ? 'active' : '' }}"
                                                                                href="{{ route('attachments.index') }}">
                                                                                <i class="las la-paperclip"></i>
                                                                                <span data-key="t-attachments">Attachments</span>
                                                                            </a>
                                                                        </li>

                                                                        {{-- Categories --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarCategories" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarCategories">
                                                                                <i class="bx bx-category-alt"></i>
                                                                                <span data-key="t-groups">Categories</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/categories', 'admin/categories/*') ? 'show' : '' }}"
                                                                                id="sidebarCategories">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('category.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/categories/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-category">
                                                                                            Create Category
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('categories') }}"
                                                                                            class="nav-link {{ request()->is('admin/categories', 'admin/categories/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-categories">
                                                                                            Manage Categories
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>

                                                                        {{-- Styles --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarStyles" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarStyles">
                                                                                <i class="las la-pen-nib"></i>
                                                                                <span data-key="t-styles">Styles</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/styles', 'admin/styles/*') ? 'show' : '' }}"
                                                                                id="sidebarStyles">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('style.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/styles/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-style">
                                                                                            Create Style
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('styles') }}"
                                                                                            class="nav-link {{ request()->is('admin/styles', 'admin/styles/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-styles">
                                                                                            Manage Styles
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>

                                                                        {{-- Colours --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarColours" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarColours">
                                                                                <i class="las la-paint-brush"></i>
                                                                                <span data-key="t-colours">Colours</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/colours', 'admin/colours/*') ? 'show' : '' }}"
                                                                                id="sidebarColours">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('colours.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/colours/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-colour">
                                                                                            Create Colour
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('colours') }}"
                                                                                            class="nav-link {{ request()->is('admin/colours', 'admin/colours/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-colours">
                                                                                            Manage Colours
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>

                                                                        {{-- Assemblies --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarAssemblies" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarAssemblies">
                                                                                <i class="las la-cogs"></i>
                                                                                <span
                                                                                    data-key="t-assemblies">Assemblies</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/assemblies', 'admin/assemblies/*') ? 'show' : '' }}"
                                                                                id="sidebarAssemblies">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('assembly.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/assemblies/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-assembly">
                                                                                            Create Assembly
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('assemblies') }}"
                                                                                            class="nav-link {{ request()->is('admin/assemblies', 'admin/assemblies/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-assemblies">
                                                                                            Manage Assemblies
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>

                                                                        {{-- Products --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarProducts" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarProducts">
                                                                                <i class="las la-box"></i>
                                                                                <span data-key="t-products">Products</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/products', 'admin/products/*') ? 'show' : '' }}"
                                                                                id="sidebarProducts">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('product.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/products/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-product">
                                                                                            Create Product
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('products') }}"
                                                                                            class="nav-link {{ request()->is('admin/products', 'admin/products/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-products">
                                                                                            Manage Products
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        {{-- Coupon --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarCoupon" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarCoupon">
                                                                                <i class="ri-coupon-line"></i>
                                                                                <span
                                                                                    data-key="t-coupon">Coupons</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/coupons', 'admin/coupons/*') ? 'show' : '' }}"
                                                                                id="sidebarCoupon">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('coupons.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/coupons/create-coupons') ? 'active' : '' }}"
                                                                                            data-key="t-create-coupons">
                                                                                            Create Coupon
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('coupons') }}"
                                                                                            class="nav-link {{ request()->is('admin/coupons') ? 'active' : '' }}"
                                                                                            data-key="t-manage-coupons">
                                                                                            Manage Coupons
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        {{-- Orders --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarOrders" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarOrders">
                                                                                <i class="las la-box"></i>
                                                                                <span data-key="t-orders">Orders</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/orders', 'admin/orders/*') ? 'show' : '' }}"
                                                                                id="sidebarOrders">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('orders.index') }}"
                                                                                            class="nav-link {{ request()->is('admin/orders') ? 'active' : '' }}"
                                                                                            data-key="t-orders">
                                                                                            Manage Orders
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>

                                                                        {{-- Blogs --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarBlogs" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarBlogs">
                                                                                <i class="ri-article-line"></i>
                                                                                <span data-key="t-blogs">Blogs</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/blogs', 'admin/blogs/*') ? 'show' : '' }}"
                                                                                id="sidebarBlogs">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('blog.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/blogs/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-blog">
                                                                                            Create Blog
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('blogs') }}"
                                                                                            class="nav-link {{ request()->is('admin/blogs', 'admin/blogs/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-blogs">
                                                                                            Manage Blogs
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>

                                                                        {{-- Faq --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarFaq" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarFaq">
                                                                                <i class="ri-question-answer-line"></i>
                                                                                <span data-key="t-faqs">Faqs</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/faqs', 'admin/faqs/*') ? 'show' : '' }}"
                                                                                id="sidebarFaq">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('faqs.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/faqs/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-blog">
                                                                                            Create Faq
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('faqs.index') }}"
                                                                                            class="nav-link {{ request()->is('admin/faqs', 'admin/faqs/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-blogs">
                                                                                            Manage Faqs
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>

                                                                        {{-- Video Guides --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarVideoGuides" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarVideoGuides">
                                                                                <i class="las la-video"></i>
                                                                                <span data-key="t-video-guides">Video
                                                                                    Guides</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/video-guides', 'admin/video-guides/*') ? 'show' : '' }}"
                                                                                id="sidebarVideoGuides">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('videoguides.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/video-guides/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-video-guide">
                                                                                            Create Video Guide
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('videoguides') }}"
                                                                                            class="nav-link {{ request()->is('admin/video-guides', 'admin/video-guides/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-video-guides">
                                                                                            Manage Video Guides
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>

                                                                        {{-- Downloadable Guides --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarDownloadableGuides"
                                                                                class="nav-link" data-bs-toggle="collapse"
                                                                                role="button" aria-expanded="false"
                                                                                aria-controls="sidebarDownloadableGuides">
                                                                                <i class="las la-file-pdf"></i>
                                                                                <span
                                                                                    data-key="t-downloadable-guides">Downloadable
                                                                                    Guides</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/downloadable-guides', 'admin/downloadable-guides/*') ? 'show' : '' }}"
                                                                                id="sidebarDownloadableGuides">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('downloadableguides.create') }}"
                                                                                            class="nav-link {{ request()->is('admin/downloadable-guides/create') ? 'active' : '' }}"
                                                                                            data-key="t-create-downloadable-guide">
                                                                                            Create Downloadable Guide
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('downloadableguides') }}"
                                                                                            class="nav-link {{ request()->is('admin/downloadable-guides', 'admin/downloadable-guides/edit/*') ? 'active' : '' }}"
                                                                                            data-key="t-manage-downloadable-guides">
                                                                                            Manage Downloadable Guides
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        {{-- Forums --}}
                                                                        <li class="nav-item">
                                                                            <a href="#sidebarforums" class="nav-link"
                                                                                data-bs-toggle="collapse" role="button"
                                                                                aria-expanded="false"
                                                                                aria-controls="sidebarforums">
                                                                                <i class="ri-file-list-line"></i>
                                                                                <span data-key="t-forums">Forums</span>
                                                                            </a>
                                                                            <div class="collapse menu-dropdown {{ request()->is('admin/forums', 'admin/forums/*') ? 'show' : '' }}"
                                                                                id="sidebarforums">
                                                                                <ul class="nav nav-sm flex-column">
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('printingforums') }}"
                                                                                            class="nav-link {{ request()->is('admin/forums/printingforums') ? 'active' : '' }}"
                                                                                            data-key="t-forums">
                                                                                            Print Resources
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a href="{{ route('designserviceforums') }}"
                                                                                            class="nav-link {{ request()->is('admin/forums/designserviceforums') ? 'active' : '' }}"
                                                                                            data-key="t-forums">
                                                                                            Design Service
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                    @endrole
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="simplebar-placeholder"
                                                        style="width: 260px; height: 932px;"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-horizontal"
                                                    style="visibility: hidden;">
                                                    <div class="simplebar-scrollbar"
                                                        style="width: 0px; display: none;"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-vertical"
                                                    style="visibility: hidden;">
                                                    <div class="simplebar-scrollbar"
                                                        style="height: 0px; display: none;"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-horizontal">
                                                    <div class="simplebar-scrollbar"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-vertical">
                                                    <div class="simplebar-scrollbar"></div>
                                                </div>
                                            </ul>

                                        </div>
                                        <!-- Sidebar -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 260px; height: 932px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 71px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div>

                <div class="sidebar-background"></div>
            </div>


            <div class="sidebar-background"></div>
        </div>

        <div class="main-content">

            {{ $slot }}

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        {{-- <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Invoika.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design &amp; Develop by Themesbrand
                            </div>
                        </div> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
    <!-- apexcharts -->
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Vector map-->
    <script src="{{ asset('libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('libs/jsvectormap/maps/world-merc.js') }}"></script>
    <!-- Dashboard init -->
    {{-- <script src="{{ asset('js/pages/dashboard.init.js') }}"></script> --}}
    <!-- App js -->

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('libs/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script src="{{ asset('libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('js/jquery.prettyPhoto.js') }}" type="text/javascript" charset="utf-8"></script> --}}
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/chartjs.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @stack('scripts')

    <script src="{{ asset('js/pages/password-addon.init.js') }}"></script>

    <script src="{{ asset('libs/tagify/dist/tagify.min.js') }}"></script>
    <script src="{{ asset('libs/tagify/dist/tagify.polyfills.min.js') }}"></script>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>


    <script>
        $('.select2').select2();
    </script>

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
            timer: 3000
        });
        var message = "{{ $message }}";
        var icon = "{{ $icon }}";
        if (message.length > 0) {
            Toast.fire({
                icon: icon,
                title: message
            });
        }
    </script>
    <script>
        // Delete Confirmation
        function confirm_form_delete(element) {
            var form = $(element).closest("form");

            Swal.fire({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                customClass: {
                    cancelButton: 'btn btn-danger'
                },
                showCancelButton: true,
                cancelButtonText: 'No',
                cancelButtonColor: '#ce4242',
                confirmButtonColor: '#004A99',
                confirmButtonText: `Yes`,
                closeOnConfirm: false
            }).then((result) => {

                if (!result.isConfirmed) return;

                jQuery(form).submit();

            });
        }

        function view_design_appointment(firstname, surname, email, phone, pdfPath) {
            var modal = $('#appointmentModal');
            modal.find('#firstName').text(firstname);
            modal.find('#surname').text(surname);
            modal.find('#email').text(email);
            modal.find('#phone').text(phone);
            modal.find('#pdfViewer').attr('src', pdfPath);

            // Show the modal
            modal.modal('show');
        }


        // Confirmation
        function confirm_invoice_status(element, status) {
            var form = $(element).closest("form");

            Swal.fire({
                title: `Are you sure you want to change the status to "${status}"?`,
                text: "Review the invoice before updating.",
                customClass: {
                    cancelButton: 'btn btn-danger'
                },
                showCancelButton: true,
                cancelButtonText: 'No',
                cancelButtonColor: '#ce4242',
                confirmButtonColor: '#004A99',
                confirmButtonText: `Yes`,
                closeOnConfirm: false
            }).then((result) => {

                if (!result.isConfirmed) return;

                jQuery(form).submit();

            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.order-toggle').change(function() {
                var orderId = $(this).data('order-id');
                var isChecked = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route('orders.updateStatus', ['id' => ':id']) }}'.replace(':id',
                        orderId),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: isChecked ? 'completed' : 'pending'
                    },
                    success: function(response) {
                        // Optionally, you can handle success response here
                    },
                    error: function(xhr) {
                        // Optionally, you can handle error response here
                    }
                });
            });
        });
    </script>

</body>

</html>
