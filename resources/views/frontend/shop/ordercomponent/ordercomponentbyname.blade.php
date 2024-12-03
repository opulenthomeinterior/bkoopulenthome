<x-guest-layout>
    <style>
        .product-card {
            border: 1px solid transparent;
            transition: border-color 0.3s ease;
        }

        .product-card:hover {
            border-color: #2b969d;
            /* Outline warning color on hover */
        }

        .product-short-title-container {
            margin-bottom: 10px;
            /* Space between the title and other content */
        }

        .product-short-title {
            display: inline-block;
            padding: 5px 10px;
            color: #000;
            /* Default text color */
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .product-card:hover,
        .card-header {
            background-color: #2b969d;
            /* Warning color background on hover */
            color: #000;
            /* Text color on hover */
        }

        .product-image:hover {
            transform: scale(1.1);
            transition: 0.5s ease;
        }
    </style>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('orderwardrobe') }}" class="text-uppercase">
                        Order Wardrobe
                    </a>
                </li>
            </ol>
        </nav>

        <div class="row mb-lg-5 mb-4">
            <div class="col-12">
                <h1 class="fs-1 fw-bolder text-dark text-uppercase">{{ $category->name }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 bg-light p-0 pb-4">
                <div class="bg-warning border border-dark border-1 px-2 py-2 m-0">
                    <h4 class="text-dark text-decoration-underline" style="font-weight: 600; font-size: 1.3rem">Filters</h4>
                    <!-- <h3 style="font-weight: 600; font-size: 1.3rem" class="text-dark">CURRENT ITEMS:<span id="number-of-products">{{ $count }}</span></h3> -->
                </div>
                <!-- <div class="bg-light border border-dark border-1 px-2 py-2 mt-2">
                    <h3 style="font-weight: 600; font-size: 1.3rem" class="text-dark">CURRENT ITEMS:<span id="number-of-products">{{ $count }}</span></h3>
                </div> -->
                <form action="" class="mt-2">
                    <input type="hidden" name="slug" id="slug" value="{{ $category->slug }}">
                    
                    @if ($styles->count() > 0)
                    {{--<div class="accordion accordion-flush mt-3" id="accordionFlushExample3">
                        <div class="accordion-item bg-transparent border border-dark border-1 rounded-0 px-2">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button legend collapsed text-uppercase" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                    aria-expanded="true" aria-controls="flush-collapseThree">
                                    Style
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body px-0 py-0 pb-1">
                                    <div class="row g-1">
                                        @foreach ($styles as $index => $style)
                                        <div class="col-lg-12 col-md-12 col-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="styles[]"
                                                    id="style{{ $index }}"
                                                    value="{{ $style->id }}">
                                                <label class="form-check-label"
                                                    for="style{{ $index }}">{{ $style->name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    @endif

                    @if ($colours->count() > 0)
                    <div class="accordion accordion-flush mt-3" id="accordionFlushExample4">
                        <div class="accordion-item bg-transparent border border-dark border-1 rounded-0 px-2" style="max-height: 700px; overflow: auto">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button legend collapsed text-uppercase" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                    aria-expanded="true" aria-controls="flush-collapseFour">
                                    Colour
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample4">
                                <div class="accordion-body px-0 py-0 pb-1">
                                    <div class="row g-1">
                                        @foreach ($colours as $index => $colour)
                                        <div class="col-lg-12 col-md-12 col-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name="colours[]" id="colour{{ $index }}"
                                                    value="{{ $colour->id }}">
                                                    @if (!empty($colour->colour_code))
                                                    <label class="form-check-label d-flex gap-1" for="colour{{ $index }}">
                                                        <div class="d-inline border border-dark"
                                                            style="width: 20px;height:20px; background-color:{{ $colour->colour_code }};">
                                                        </div>
                                                        {{ $colour->trade_colour ? $colour->trade_colour : $colour->name }}
                                                    </label>
                                                    @else
                                                    <label class="form-check-label d-flex gap-1" for="colour{{ $index }}">
                                                        <div class="border border-dark" style="width: 20px;height:20px; background: linear-gradient(to right, red, yellow, green);">
                                                        </div>
                                                        {{ $colour->trade_colour ? $colour->trade_colour : $colour->name }}
                                                    </label>
                                                    @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($assemblies->count() > 0)
                    {{--<div class="accordion accordion-flush mt-3" id="accordionFlushExample2">
                        <div class="accordion-item bg-transparent border border-dark border-1 rounded-0 px-2">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button legend collapsed text-uppercase" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                    aria-expanded="true" aria-controls="flush-collapseTwo">
                                    ASSEMBLY
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body px-0 py-0 pb-1">
                                    <div class="row g-1">
                                        @foreach ($assemblies as $index => $assembly)
                                            @if ($assembly->slug == 'stock' && ($category->slug == 'doors' || $category->slug == 'accessories' || $category->slug == 'handles' || $category->slug == 'sinks' || $category->slug == 'internals'))
                                                <div class="col-lg-12 col-md-12 col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="assemblies[]" id="assembly{{ $index }}"
                                                            value="{{ $assembly->id }}">
                                                        <label class="form-check-label"
                                                            for="assembly{{ $index }}">{{ $assembly->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @else
                                                
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    @endif

                    @if ($types->count() > 0)
                    <div class="accordion accordion-flush mt-3" id="accordionFlushExample1">
                        <div class="accordion-item bg-transparent border border-dark border-1 rounded-0 px-2" style="max-height: 700px; overflow: auto">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button legend collapsed text-uppercase" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                    aria-expanded="true" aria-controls="flush-collapseOne">
                                    @if (strtolower($category->name) != 'handles' && strtolower($category->name) != 'taps') SIZES @else TYPES @endif
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body px-0 py-0 pb-1">
                                    <div class="ps-2">
                                        <div class="row g-1">
                                            @foreach ($types as $index => $type)
                                            <div class="col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="types[]" id="type{{ $index }}"
                                                        value="{{ $type->id }}">
                                                    <label class="form-check-label"
                                                        for="type{{ $index }}">{{ $type->name }}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($heights->count() > 0)
                    <div class="accordion accordion-flush mt-3" id="accordionFlushExample5">
                        <div class="accordion-item bg-transparent border border-dark border-1 rounded-0 px-2" style="max-height: 700px; overflow: auto">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button legend collapsed text-uppercase" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseFive"
                                    aria-expanded="true" aria-controls="flush-collapseFive">
                                    Heights
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample5">
                                <div class="accordion-body px-0 py-0 pb-1">
                                    <div class="ps-2">
                                        <div class="row g-1">
                                            @foreach ($heights as $index => $height)
                                            <div class="col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="heights[]" id="height{{ $index }}"
                                                        value="{{ $height->height }}">
                                                    <label class="form-check-label"
                                                        for="height{{ $index }}">
                                                        {{ $height->height }} ({{$height->count}})
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12 bg-light">
                <div class="row text-sm-center" id="products_container">
                    @if ($products->count() > 0)
                    @foreach ($products as $index => $product)
                    <div class="col-lg-4 col-6 mb-3">
                        <div class="card btn btn-outline-warning text-dark border-1 bg-light p-0" style="border-radius: 0;">
                            <div class="card-header px-0 py-0">
                                <div class="p-0 product-short-title-container w-100">
                                    <a href="{{ route('orderbyproduct', $product->slug) }}" class="product-short-title fw-bold text-decoration-underline fs-4">
                                        {{ $product->short_title }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="modal fade" id="productModal{{ $index }}" tabindex="-1"
                                    aria-labelledby="productModalLabel{{ $index }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                            <div class="modal-header border-bottom border-light">
                                                <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                    {{ $product->full_title }}
                                                </h1>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                            <img src="{{ !empty($product->image_path) ? asset('imgs/products/'.$product->image_path) : asset('images/no-image-available.jpg') }}"
                                                                class="img-fluid product-image" style="height: 300px;" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                            <div>
                                                                <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                <ul style="list-style: none; padding: 0">
                                                                    @if ($product->style)
                                                                    <li>
                                                                        <p class="mb-0">
                                                                            <small
                                                                                class="fw-bold text-uppercase text-dark">Style:</small>
                                                                            {{ $product->style->name }}
                                                                        </p>
                                                                    </li>
                                                                    @endif
                                                                    @if ($product->assembly)
                                                                    <li>
                                                                        <p class="mb-0">
                                                                            <small
                                                                                class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                            {{ $product->assembly->name }}
                                                                        </p>
                                                                    </li>
                                                                    @endif
                                                                    @if ($product->colour)
                                                                    <li>
                                                                        <p class="mb-0">
                                                                            <small
                                                                                class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                            {{ $product->colour->trade_colour ? $product->colour->trade_colour : $product->colour->name }}
                                                                        </p>
                                                                    </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-6 fw-bolder text-dark">Dimensions
                                                                </h6>
                                                                <ul style="list-style: none; padding: 0">
                                                                    <li>
                                                                        <p class="mb-0">
                                                                            <small
                                                                                class="fw-bold text-uppercase text-dark">HEIGHT:</small>
                                                                            {{ intval($product->height) }}mm
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <p class="mb-0">
                                                                            <small
                                                                                class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                            {{ intval($product->width) }}mm
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <p class="mb-0">
                                                                            <small
                                                                                class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                            {{ intval($product->depth) }}mm
                                                                        </p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-6 fw-bolder text-dark">
                                                                    Range Specification
                                                                </h6>
                                                                <p class="mb-0">
                                                                    <small>
                                                                        @if ($product->category?->description)
                                                                        {!! $product->category->description !!}
                                                                        @elseif ($product->category?->parentCategory?->description)
                                                                        {!! $product->category->parentCategory->description !!}
                                                                        @endif
                                                                    </small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <figure class="my-0" style="margin-bottom: 0px !important;">
                                                <img class="product-image px-0"
                                                    style="margin-bottom: 0px !important;min-height:175px;max-height:175px;object-fit:contain"
                                                    src="{{ !empty($product->image_path) ? asset('imgs/products/'.$product->image_path) : asset('images/no-image-available.jpg') }}"
                                                    alt="Card image cap" data-bs-toggle="modal"
                                                    data-bs-target="#productModal{{ $index }}">
                                            </figure>
                                            <p class="mt-2"><small class="fw-bold text-start text-dark">{{ $product->product_code }}</small></p>
                                            <p class="">
                                                <small
                                                    class="fw-bold text-start text-dark">{{ $product->dimensions }}</small>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <div class="container-fluid">
                                                <div class="row justify-content-center">
                                                    <div
                                                        class="col-6 d-flex justify-content-center product-counter">
                                                        <input id="minus{{ $product->id }}"
                                                            class="minus border bg-dark text-light p-0"
                                                            type="button" value="-"
                                                            onclick="decreaseQuantity('{{ $product->id }}', '{{ $product->product_code }}', '{{ $product->full_title }}', {{ $product->price }}, {{ $product->discounted_price }}, {{ $product->discounted_percentage ?? 0 }}, '{{ $product->ParentCategory->slug }}')" />
                                                        <input id="quantity{{ $product->id }}"
                                                            class="quantity border border-black text-center"
                                                            type="text" value="0" name="quantity"
                                                            disabled />
                                                        <input id="plus{{ $product->id }}"
                                                            class="plus border bg-dark text-light p-0"
                                                            type="button" value="+" type="number"
                                                            max="10"
                                                            {{$product->price == 0 ? 'disabled' : '' }} 
                                                            onclick="increaseQuantity('{{ $product->id }}', '{{ $product->product_code }}', '{{ $product->full_title }}', {{ $product->price }}, {{ $product->discounted_price }}, {{ $product->discounted_percentage ?? 0 }}, '{{ $product->ParentCategory->slug }}')" />
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="fs-5 fw-bold mt-lg-2 text-dark">
                                                            {{ $product->price == 0 ? 'Out of Stock' : '£' . $product->price }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                @if ($product->style)
                                                <div class="row">
                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                        <p
                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                            <small>Style</small>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                            <small>{{ $product->style->name }}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif
                                                @if ($product->colour)
                                                <div class="row">
                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                        <p
                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                            <small>Colour</small>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                            <small>{{ $product->colour->trade_colour ? $product->colour->trade_colour : $product->colour->name }}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif
                                                @if ($category->name != 'DOORS')
                                                @if ($product->assembly)
                                                <div class="row">
                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                        <p
                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                            <small>Assembly</small>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                            <small>{{ $product->assembly->name }}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-0">
                                <a href="{{ route('orderbyproduct', $product->slug) }}" class="product-short-title text-decoration-underline">
                                    <small>View more</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            No products found.
                        </div>
                    </div>
                    @endif
                </div>

                <div id="custom-pagination-container">
                    {{-- {{ $products->links() }} --}}
                    {{-- <nav aria-label="...">
                        <ul class="pagination">
                            @for ($i = 1; $i <= $pages; $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                    <a class="page-link" href="javascript:void(0)"
                        data-page="{{ $i }}">{{ $i }}</a>
                    </li>
                    @endfor
                    </ul>
                    </nav> --}}
                    <nav aria-label="...">
                        <ul class="pagination">
                            <!-- Back arrow -->
                            @if ($currentPage > 1)
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" data-page="{{ $currentPage - 1 }}">Back</a>
                            </li>
                            @endif

                            <!-- Page numbers -->
                            @php
                            $start = max(1, $currentPage - 4);
                            $end = min($pages, $currentPage + 5);
                            if ($end - $start < 9) {
                                $start=max(1, $end - 9);
                                $end=min($pages, $start + 9);
                                }
                                @endphp

                                @for ($i=$start; $i <=$end; $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                <a class="page-link" href="javascript:void(0)" data-page="{{ $i }}">{{ $i }}</a>
                                </li>
                                @endfor

                                <!-- Next arrow -->
                                @if ($currentPage < $pages)
                                    <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)" data-page="{{ $currentPage + 1 }}">Next</a>
                                    </li>
                                    @endif
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">

            @if (count($category->testimonials) > 0)
            <section class="container-fluid py-5">
                <div class="row">
                    <h3 class="text-dark text-uppercase fw-bolder text-center mb-4">Testimonials</h3>
                </div>
                <div class="row">
                    <div class="carousel main-carousel-banner owl-carousel clients mb-0"
                            data-margin="30"
                            data-loop="true"
                            data-dots="false"
                            data-autoplay="true"
                            data-autoplay-timeout="3000"
                            data-responsive='{"0":{"items": "3"}, "768":{"items": "4"}, "992":{"items": "4"}, "1200":{"items": "4"}, "1400":{"items": "4"}}'>
                            @foreach ($category->testimonials as $testimonial)
                            <div class="item mx-10 px-0 w-100" style="border: 2px solid #2b969d">
                                <div class="carousel-card card border border-default w-100" style="border-radius: 0px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                                    <div class="card-body carousel-card-body">
                                        <div class="col-12 mb-4 d-flex justify-content-center">
                                            <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="fw-bold text-center">
                                            {{$testimonial->user_name}}
                                        </div>
                                        <div class="text-center">
                                            <small class="text-center">{{$testimonial->date}}</small>
                                        </div>
                                    </div>
                                    <div class="card-footer carousel-card-footer">
                                        <small class="text-dark text-start" style="font-size: 12px">{{$testimonial->testimonial}}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </section>
            @endif

            @if (count($category->faqs) > 0)
            <section class="container-fluid py-5 p-0">
                <div class="row">
                    <h3 class="text-dark text-uppercase fw-bolder text-center">FAQs</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @if (count($category->faqs) > 0)
                                @foreach ($category->faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed fw-bolder text-dark btn btn-outline-warning" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $loop->index + 1 }}"
                                                aria-expanded="false" aria-controls="flush-collapse{{ $loop->index + 1 }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ $loop->index + 1 }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">{!! $faq->answer !!}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info" role="alert">
                                    No FAQ's found.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            @endif
        </div>
    </section>

    @push('scripts')
    <script>
        var order_component_filter = '{{ route('order_component_filter', $category->slug) }}';
        let selectedHeights = [];

        function toggleHeightSelection(button) {
            const heightId = button.getAttribute('data-height-id');

            // Toggle selected state
            if (selectedHeights.includes(heightId)) {
                selectedHeights = selectedHeights.filter(id => id !== heightId);
                button.classList.remove('btn-success');
                button.classList.add('btn-primary');
            } else {
                selectedHeights.push(heightId);
                button.classList.remove('btn-primary');
                button.classList.add('btn-success');
            }

            // Update the hidden input with selected heights
            document.getElementById('selectedHeights').value = selectedHeights.join(',');
        }
    </script>
    <script src="{{ asset('js/order-component-by-name.js') }}"></script>
    @endpush
</x-guest-layout>