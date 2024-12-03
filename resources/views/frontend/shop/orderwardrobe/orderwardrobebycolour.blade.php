<x-guest-layout>
    <div class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('orderwardrobe') }}" class="text-uppercase">Order
                        Wardrobe</a></li>
            </ol>
        </nav>
        <h1 class="fs-1 fw-bolder text-dark mb-lg-5 mb-5"></h1>
        <h1 class="fs-4 fw-bolder text-dark">{{$title}}</h1>

        <div class="row" style="background-color: #e0e0e0;">
            <div class="col-lg-9">
                <div class="collapse-wrapper my-4">
                    <a class="fw-semibold text-dark text-uppercase collapse-heading" data-bs-toggle="collapse"
                        href="#cabinetspanels" role="button" aria-expanded="false" aria-controls="cabinetspanels">
                        <span
                            class="bg-dark text-white fw-semibold py-2 px-2 text-center me-2 collapse-heading-number">1</span>
                        Cabinets and Panels
                    </a>
                    <div class="collapse-container mt-3" id="cabinetspanels">
                        <nav>
                            <div class="nav nav-tabs custom-nav" style="" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-baseCabinet-tab" data-bs-toggle="tab"
                                    data-bs-target="#baseCabinet-tab" type="button" role="tab"
                                    aria-controls="baseCabinet-tab" aria-selected="true">Base Cabinets</button>
                                <button class="nav-link" id="nav-wallCabinet-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-wallCabinet" type="button" role="tab"
                                    aria-controls="nav-wallCabinet" aria-selected="false">Wall Cabinets</button>
                                <button class="nav-link" id="nav-tallCabinet-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-tallCabinet" type="button" role="tab"
                                    aria-controls="nav-tallCabinet" aria-selected="false">Tall Cabinets</button>
                                <button class="nav-link" id="nav-accessories-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-accessories" type="button" role="tab"
                                    aria-controls="nav-accessories" aria-selected="false">Accessories</button>
                            </div>
                        </nav>
                        <div class="tab-content p-3" style="border: 1px solid black !important" id="nav-tabContent">

                            {{-- Base Cabinets --}}
                            <div class="tab-pane fade show active" id="baseCabinet-tab" role="tabpanel"
                                aria-labelledby="nav-baseCabinet-tab" tabindex="0">
                                <div class="row">
                                    @if ($baseCabinets->count() > 0)
                                    @foreach ($baseCabinets as $index => $baseCabinet)
                                    {{--<div class="col-lg-4 col-6 mb-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <!-- Button trigger modal -->
                                                <a class="modal-icon z-3" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#baseCabinets{{ $index }}">
                                                    <i class="ri-add-circle-line text-black fs-4"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="baseCabinets{{ $index }}"
                                                    tabindex="-1"
                                                    aria-labelledby="baseCabinetsLabel{{ $index }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-5 col-12">
                                                                            <img src="{{ !empty($baseCabinet->image_path) ? asset('imgs/products/'.$baseCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                class="img-fluid" />
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-8 col-md-7 col-12 text-start">
                                                                            <h1 class="fs-5 fw-bold">
                                                                                {{ $baseCabinet->full_title }}
                                                                            </h1>
                                                                            <hr>
                                                                            <h6
                                                                                class="fs-6 fw-bolder text-dark">
                                                                                Styling</h6>
                                                                            <ul>
                                                                                <li>HEIGHT: 720mm</li>
                                                                                <li>WIDTH: 1000mm</li>
                                                                                <li>DEPTH: 570mm</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <figure>
                                                        <img class="product-image px-0"
                                                            src="{{ !empty($baseCabinet->image_path) ? asset('imgs/products/'.$baseCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                            alt="Card image cap">
                                                    </figure>
                                                    <div class="">
                                                        <a href=""
                                                            class="text-center text-decoration-underline fs-5 fw-bold">
                                                            {{ $baseCabinet->short_title }}
                                                        </a>
                                                        <p class="py-lg-3 py-2">
                                                            <small
                                                                class="fw-bold text-center">{{ $baseCabinet->product_code }}</small>
                                                        </p>
                                                        <p class="py-lg-3 py-2">
                                                            <small
                                                                class="fw-bold text-center">{{ $baseCabinet->dimensions }}</small>
                                                        </p>
                                                        <div class="container-fluid">
                                                            <div
                                                                class="row justify-content-center product-counter">
                                                                <input id="minus{{ $baseCabinet->id }}"
                                                                    class="minus border bg-dark text-light p-0"
                                                                    type="button" value="-"
                                                                    onclick="decreaseQuantity('{{ $baseCabinet->id }}', '{{ $baseCabinet->product_code }}', '{{ $baseCabinet->full_title }}', {{ $baseCabinet->price }}, {{ $baseCabinet->discounted_price }}, {{ $baseCabinet->discounted_percentage ?? 0 }}, '{{ $baseCabinet->ParentCategory->slug }}')" />
                                                                <input id="quantity{{ $baseCabinet->id }}"
                                                                    class="quantity border border-black text-center"
                                                                    type="text" value="0"
                                                                    name="quantity" disabled />
                                                                <input id="plus{{ $baseCabinet->id }}"
                                                                    class="plus border bg-dark text-light p-0"
                                                                    type="button" value="+"
                                                                    {{$baseCabinet->price == 0 ? 'disabled' : '' }} 
                                                                    onclick="increaseQuantity('{{ $baseCabinet->id }}', '{{ $baseCabinet->product_code }}', '{{ $baseCabinet->full_title }}', {{ $baseCabinet->price }}, {{ $baseCabinet->discounted_price }}, {{ $baseCabinet->discounted_percentage ?? 0 }}, '{{ $baseCabinet->ParentCategory->slug }}')" />
                                                            </div>
                                                        </div>
                                                        <p class="fs-5 fw-bold mt-lg-2">
                                                            {{ $baseCabinet->price == 0 ? 'Out of Stock' : '£' . $baseCabinet->price }}
                                                        </p>
                                                        <div class="container-fluid">
                                                            @if ($baseCabinetData->style)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Style</small>
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p
                                                                        class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $baseCabinet->style->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($baseCabinetData->colour)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Colour</small>
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p
                                                                        class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $baseCabinet->colour->trade_colour ? $baseCabinet->colour->trade_colour : $baseCabinet->colour->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($baseCabinetData->assembly)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p
                                                                        class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $baseCabinet->assembly->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                    
                                    @endforeach

                                    @php 
                                        $baseCabinetData = $baseCabinets->first();
                                    @endphp

                                    <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                        <label for="" class="fw-bold d-flex justify-content-between"><span>ALL BASE CABINETS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $baseCabinet->style?->slug , 'assembly' => $baseCabinet->assembly?->slug, 'colour' => $baseCabinet->colour?->slug])}}">View All</a></span></label>
                                        <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="base-cabinets-section">
                                            @foreach ($baseCabinets as $index => $baseCabinet)
                                            <option class="fw-bold" value="{{$baseCabinet->id }}" data-product-short-title="{{ $baseCabinet->short_title }}" data-product-fullname="{{ $baseCabinet->full_title }}" data-product-image="{{ !empty($baseCabinet->image_path) ? asset('imgs/products/'.$baseCabinet->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $baseCabinet->price }}" data-product-parent-category-slug="{{ $baseCabinet->ParentCategory?->slug }}" data-product-discountedprice="{{ $baseCabinet->discounted_price }}" data-product-assembly-name="{{ $baseCabinet->assembly?->name }}" data-product-discountedpercentage="{{ $baseCabinet->discounted_percentage ?? 0 }}" data-product-code="{{ $baseCabinet->product_code }}" data-product-dimensions="{{ $baseCabinet->dimensions }}" data-product-style="{{ $baseCabinet->style?->name }}" data-product-colour="{{ $baseCabinet->colour?->trade_colour ? $baseCabinet->colour?->trade_colour : $baseCabinet->colour?->name }}" data-product-id="{{ $baseCabinet->id }}">{{ $baseCabinet->full_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 base-cabinets-section order-sm-2 order-xs-2 mt-4">
                                        <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                            <div class="bg-warning card-header px-0 py-0">
                                                <div class="py-2 text-center product-short-title-container w-100">
                                                    <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                        {{ $baseCabinetData->short_title }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="modal fade" id="productModal{{ $baseCabinetData->id }}" tabindex="-1"
                                                    aria-labelledby="productModalLabel{{ $baseCabinetData->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                            <div class="modal-header border-bottom border-light">
                                                                <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                    {{ $baseCabinetData->full_title }}
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                            <img src="{{ !empty($baseCabinetData->image_path) ? asset('imgs/products/'.$baseCabinetData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                class="img-fluid product-image" style="height: 300px;" />
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                            <div>
                                                                                <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                <ul style="list-style: none; padding: 0">
                                                                                    @if ($baseCabinetData->style)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                            {{ $baseCabinetData->style->name }}
                                                                                        </p>
                                                                                    </li>
                                                                                    @endif
                                                                                    @if ($baseCabinetData->assembly)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                            {{ $baseCabinetData->assembly->name }}
                                                                                        </p>
                                                                                    </li>
                                                                                    @endif
                                                                                    @if ($baseCabinetData->colour)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                            {{ $baseCabinetData->colour->trade_colour ? $baseCabinetData->colour->trade_colour : $baseCabinetData->colour->name }}
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
                                                                                            {{ intval($baseCabinetData->height) }}mm
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                            {{ intval($baseCabinetData->width) }}mm
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                            {{ intval($baseCabinetData->depth) }}mm
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
                                                                                        @if ($baseCabinetData->category?->description)
                                                                                        {!! $baseCabinetData->category->description !!}
                                                                                        @elseif ($baseCabinetData->category?->parentCategory?->description)
                                                                                        {!! $baseCabinetData->category->parentCategory->description !!}
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
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                            <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                <img class="product-image px-0"
                                                                    style="margin-bottom: 0px !important;object-fit:contain"
                                                                    src="{{ !empty($baseCabinetData->image_path) ? asset('imgs/products/'.$baseCabinetData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap" data-bs-toggle="modal"
                                                                    data-bs-target="#productModal{{ $baseCabinetData->id }}">
                                                            </figure>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Product Code</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $baseCabinetData->product_code }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Dimensions</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $baseCabinetData->dimensions }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if ($baseCabinetData->style)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Style</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $baseCabinetData->style->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($baseCabinetData->colour)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Colour</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $baseCabinetData->colour->trade_colour ? $baseCabinet->colour->trade_colour : $baseCabinet->colour->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($baseCabinetData->assembly)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Assembly</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $baseCabinetData->assembly->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="row justify-content-center border-top border-default">
                                                                <div class="col-12">
                                                                    <p class="fs-5 fw-bold text-dark">
                                                                        {{ $baseCabinetData->price == 0 ? 'Out of Stock' : '£' . $baseCabinetData->price }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-12 d-flex justify-content-center product-counter">
                                                                    <input id="minus{{ $baseCabinetData->id }}"
                                                                        class="minus border bg-dark text-light p-0"
                                                                        type="button" value="-"
                                                                        onclick="decreaseQuantity('{{ $baseCabinetData->id }}', '{{ $baseCabinetData->product_code }}', '{{ $baseCabinetData->full_title }}', {{ $baseCabinetData->price }}, {{ $baseCabinetData->discounted_price }}, {{ $baseCabinetData->discounted_percentage ?? 0 }}, '{{ $baseCabinetData->ParentCategory->slug }}')" />
                                                                    <input id="quantity{{ $baseCabinetData->id }}"
                                                                        class="quantity border border-black text-center"
                                                                        type="text" value="0" name="quantity"
                                                                        disabled />
                                                                    <input id="plus{{ $baseCabinetData->id }}"
                                                                        class="plus border bg-dark text-light p-0"
                                                                        type="button" value="+" type="number"
                                                                        max="10"
                                                                        {{$baseCabinetData->price == 0 ? 'disabled' : '' }} 
                                                                        onclick="increaseQuantity('{{ $baseCabinetData->id }}', '{{ $baseCabinetData->product_code }}', '{{ $baseCabinetData->full_title }}', {{ $baseCabinetData->price }}, {{ $baseCabinetData->discounted_price }}, {{ $baseCabinetData->discounted_percentage ?? 0 }}, '{{ $baseCabinetData->ParentCategory->slug }}')" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @else
                                    <div class="col-12">
                                        <p class="">No Base Cabinets available</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Wall Cabinets --}}
                            <div class="tab-pane fade" id="nav-wallCabinet" role="tabpanel"
                                aria-labelledby="nav-wallCabinet-tab" tabindex="0">
                                <div class="row">
                                    @if ($wallCabinets->count() > 0)
                                    @foreach ($wallCabinets as $index => $wallCabinet)
                                    {{--<div class="col-lg-4 col-6 mb-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <!-- Button trigger modal -->
                                                    <a class="modal-icon z-3" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#wallCabinets{{ $index }}">
                                                        <i class="ri-add-circle-line text-black fs-4"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="wallCabinets{{ $index }}"
                                                        tabindex="-1"
                                                        aria-labelledby="wallCabinetsLabel{{ $index }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-5 col-12">
                                                                                <img src="{{ !empty($wallCabinet->image_path) ? asset('imgs/products/'.$wallCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid" />
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-8 col-md-7 col-12 text-start">
                                                                                <h1 class="fs-5 fw-bold">
                                                                                    {{ $wallCabinet->full_title }}
                                                                                </h1>
                                                                                <hr>
                                                                                <h6
                                                                                    class="fs-6 fw-bolder text-dark">
                                                                                    Styling</h6>
                                                                                <ul>
                                                                                    <li>HEIGHT: 720mm</li>
                                                                                    <li>WIDTH: 1000mm</li>
                                                                                    <li>DEPTH: 570mm</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <figure>
                                                            <img class="product-image px-0"
                                                                src="{{ !empty($wallCabinet->image_path) ? asset('imgs/products/'.$wallCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                alt="Card image cap">
                                                        </figure>
                                                        <div class="">
                                                            <a href=""
                                                                class="text-center text-decoration-underline fs-5 fw-bold">
                                                                {{ $wallCabinet->short_title }}
                                                            </a>
                                                            <p class="py-lg-3 py-2">
                                                                <small
                                                                    class="fw-bold text-center">{{ $wallCabinet->product_code }}</small>
                                                            </p>
                                                            <p class="py-lg-3 py-2">
                                                                <small
                                                                    class="fw-bold text-center">{{ $wallCabinet->dimensions }}</small>
                                                            </p>
                                                            <div class="container-fluid">
                                                                <div
                                                                    class="row justify-content-center product-counter">
                                                                    <input id="minus{{ $wallCabinet->id }}"
                                                                        class="minus border bg-dark text-light p-0"
                                                                        type="button" value="-"
                                                                        onclick="decreaseQuantity('{{ $wallCabinet->id }}', '{{ $wallCabinet->product_code }}', '{{ $wallCabinet->full_title }}', {{ $wallCabinet->price }}, {{ $wallCabinet->discounted_price }}, {{ $wallCabinet->discounted_percentage ?? 0 }}, '{{ $wallCabinet->ParentCategory->slug }}')" />
                                                                    <input id="quantity{{ $wallCabinet->id }}"
                                                                        class="quantity border border-black text-center"
                                                                        type="text" value="0"
                                                                        name="quantity" disabled />
                                                                    <input id="plus{{ $wallCabinet->id }}"
                                                                        class="plus border bg-dark text-light p-0"
                                                                        type="button" value="+"
                                                                        {{$wallCabinet->price == 0 ? 'disabled' : '' }} 
                                                                        onclick="increaseQuantity('{{ $wallCabinet->id }}', '{{ $wallCabinet->product_code }}', '{{ $wallCabinet->full_title }}', {{ $wallCabinet->price }}, {{ $wallCabinet->discounted_price }}, {{ $wallCabinet->discounted_percentage ?? 0 }}, '{{ $wallCabinet->ParentCategory->slug }}')" />
                                                                </div>
                                                            </div>
                                                            <p class="fs-5 fw-bold mt-lg-2">
                                                                {{ $wallCabinet->price == 0 ? 'Out of Stock' : '£' . $wallCabinet->price }}
                                                            </p>
                                                            <div class="container-fluid">
                                                                @if ($wallCabinet->style)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-uppercase m-0 pt-1">
                                                                            <small>Style</small>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p
                                                                            class="category-value fw-semibold py-1 mb-2">
                                                                            <small>{{ $wallCabinet->style->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($wallCabinet->colour)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-uppercase m-0 pt-1">
                                                                            <small>Colour</small>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p
                                                                            class="category-value fw-semibold py-1 mb-2">
                                                                            <small>{{ $wallCabinet->colour->trade_colour ? $wallCabinet->colour->trade_colour : $wallCabinet->colour->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($wallCabinet->assembly)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-uppercase m-0 pt-1">
                                                                            <small>Assembly</small>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p
                                                                            class="category-value fw-semibold py-1 mb-2">
                                                                            <small>{{ $wallCabinet->assembly->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                        {{--<div class="col-lg-4 col-6 mb-3">
                                            <div class="card border-1 btn btn-outline-warning bg-light p-0" style="border-radius: 0;">
                                                <div class="bg-warning card-header px-0 py-0">
                                                    <div class="py-2 text-center product-short-title-container w-100">
                                                        <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                            {{ $wallCabinet->short_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="modal fade" id="productModal{{ $wallCabinet->id }}" tabindex="-1"
                                                        aria-labelledby="productModalLabel{{ $wallCabinet->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                                <div class="modal-header border-bottom border-light">
                                                                    <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                        {{ $wallCabinet->full_title }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                                <img src="{{ !empty($wallCabinet->image_path) ? asset('imgs/products/'.$wallCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid product-image" style="height: 300px;" />
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                                <div>
                                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                    <ul style="list-style: none; padding: 0">
                                                                                        @if ($wallCabinet->style)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                                {{ $wallCabinet->style->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($wallCabinet->assembly)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                                {{ $wallCabinet->assembly->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($wallCabinet->colour)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                                {{ $wallCabinet->colour->trade_colour ? $wallCabinet->colour->trade_colour : $wallCabinet->colour->name }}
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
                                                                                                {{ intval($wallCabinet->height) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                                {{ intval($wallCabinet->width) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                                {{ intval($wallCabinet->depth) }}mm
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
                                                                                            @if ($wallCabinet->category?->description)
                                                                                            {!! $wallCabinet->category->description !!}
                                                                                            @elseif ($wallCabinet->category?->parentCategory?->description)
                                                                                            {!! $wallCabinet->category->parentCategory->description !!}
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
                                                                        src="{{ !empty($wallCabinet->image_path) ? asset('imgs/products/'.$wallCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                        alt="Card image cap" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal{{ $wallCabinet->id }}">
                                                                </figure>
                                                                <p class="mt-2"><small class="fw-bold text-start text-dark">{{ $wallCabinet->product_code }}</small></p>
                                                                <p class="">
                                                                    <small
                                                                        class="fw-bold text-start text-dark">{{ $wallCabinet->dimensions }}</small>
                                                                </p>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="container-fluid">
                                                                    <div class="row justify-content-center">
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center product-counter">
                                                                            <input id="minus{{ $wallCabinet->id }}"
                                                                                class="minus border bg-dark text-light p-0"
                                                                                type="button" value="-"
                                                                                onclick="decreaseQuantity('{{ $wallCabinet->id }}', '{{ $wallCabinet->product_code }}', '{{ $wallCabinet->full_title }}', {{ $wallCabinet->price }}, {{ $wallCabinet->discounted_price }}, {{ $wallCabinet->discounted_percentage ?? 0 }}, '{{ $wallCabinet->ParentCategory->slug }}')" />
                                                                            <input id="quantity{{ $wallCabinet->id }}"
                                                                                class="quantity border border-black text-center"
                                                                                type="text" value="0" name="quantity"
                                                                                disabled />
                                                                            <input id="plus{{ $wallCabinet->id }}"
                                                                                class="plus border bg-dark text-light p-0"
                                                                                type="button" value="+" type="number"
                                                                                max="10"
                                                                                {{$wallCabinet->price == 0 ? 'disabled' : '' }} 
                                                                                onclick="increaseQuantity('{{ $wallCabinet->id }}', '{{ $wallCabinet->product_code }}', '{{ $wallCabinet->full_title }}', {{ $wallCabinet->price }}, {{ $wallCabinet->discounted_price }}, {{ $wallCabinet->discounted_percentage ?? 0 }}, '{{ $wallCabinet->ParentCategory->slug }}')" />
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="fs-5 fw-bold mt-lg-2 text-dark">
                                                                                {{ $wallCabinet->price == 0 ? 'Out of Stock' : '£' . $wallCabinet->price }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="container-fluid">
                                                                    @if ($wallCabinet->style)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small>Style</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $wallCabinet->style->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($wallCabinet->colour)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small>Colour</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $wallCabinet->colour->trade_colour ? $wallCabinet->colour->trade_colour : $wallCabinet->colour->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($wallCabinet->assembly)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small>Assembly</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $wallCabinet->assembly->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>--}}
                                    @endforeach

                                    @php 
                                        $wallCabinetData = $wallCabinets->first();
                                    @endphp

                                    <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                        <label for="" class="fw-bold d-flex justify-content-between"><span>ALL WALL CABINETS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $wallCabinetData->style?->slug , 'assembly' => $wallCabinetData->assembly?->slug, 'colour' => $wallCabinetData->colour?->slug])}}">View All</a></span></label>
                                        <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="wall-cabinets-section">
                                            @foreach ($wallCabinets as $index => $wallCabinet)
                                            <option class="fw-bold" value="{{$wallCabinet->id }}" data-product-short-title="{{ $wallCabinet->short_title }}" data-product-fullname="{{ $wallCabinet->full_title }}" data-product-image="{{ !empty($wallCabinet->image_path) ? asset('imgs/products/'.$wallCabinet->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $wallCabinet->price }}" data-product-parent-category-slug="{{ $wallCabinet->ParentCategory?->slug }}" data-product-discountedprice="{{ $wallCabinet->discounted_price }}" data-product-assembly-name="{{ $wallCabinet->assembly?->name }}" data-product-discountedpercentage="{{ $wallCabinet->discounted_percentage ?? 0 }}" data-product-code="{{ $wallCabinet->product_code }}" data-product-dimensions="{{ $wallCabinet->dimensions }}" data-product-style="{{ $wallCabinet->style?->name }}" data-product-colour="{{ $wallCabinet->colour?->trade_colour ? $wallCabinet->colour?->trade_colour : $wallCabinet->colour?->name }}" data-product-id="{{ $wallCabinet->id }}">{{ $wallCabinet->full_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 wall-cabinets-section order-sm-2 order-xs-2 mt-4">
                                        <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                            <div class="bg-warning card-header px-0 py-0">
                                                <div class="py-2 text-center product-short-title-container w-100">
                                                    <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                        {{ $wallCabinetData->short_title }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="modal fade" id="productModal{{ $wallCabinetData->id }}" tabindex="-1"
                                                    aria-labelledby="productModalLabel{{ $wallCabinetData->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                            <div class="modal-header border-bottom border-light">
                                                                <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                    {{ $wallCabinetData->full_title }}
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                            <img src="{{ !empty($wallCabinetData->image_path) ? asset('imgs/products/'.$wallCabinetData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                class="img-fluid product-image" style="height: 300px;" />
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                            <div>
                                                                                <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                <ul style="list-style: none; padding: 0">
                                                                                    @if ($wallCabinetData->style)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                            {{ $wallCabinetData->style->name }}
                                                                                        </p>
                                                                                    </li>
                                                                                    @endif
                                                                                    @if ($wallCabinetData->assembly)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                            {{ $wallCabinetData->assembly->name }}
                                                                                        </p>
                                                                                    </li>
                                                                                    @endif
                                                                                    @if ($wallCabinetData->colour)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                            {{ $wallCabinetData->colour->trade_colour ? $wallCabinetData->colour->trade_colour : $wallCabinetData->colour->name }}
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
                                                                                            {{ intval($wallCabinetData->height) }}mm
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                            {{ intval($wallCabinetData->width) }}mm
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                            {{ intval($wallCabinetData->depth) }}mm
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
                                                                                        @if ($wallCabinetData->category?->description)
                                                                                        {!! $wallCabinetData->category->description !!}
                                                                                        @elseif ($wallCabinetData->category?->parentCategory?->description)
                                                                                        {!! $wallCabinetData->category->parentCategory->description !!}
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
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                            <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                <img class="product-image px-0"
                                                                    style="margin-bottom: 0px !important;object-fit:contain"
                                                                    src="{{ !empty($wallCabinetData->image_path) ? asset('imgs/products/'.$wallCabinetData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap" data-bs-toggle="modal"
                                                                    data-bs-target="#productModal{{ $wallCabinetData->id }}">
                                                            </figure>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Product Code</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $wallCabinetData->product_code }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Dimensions</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $wallCabinetData->dimensions }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if ($wallCabinetData->style)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Style</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $wallCabinetData->style->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($wallCabinetData->colour)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Colour</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $wallCabinetData->colour->trade_colour ? $baseCabinet->colour->trade_colour : $baseCabinet->colour->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($wallCabinetData->assembly)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Assembly</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $wallCabinetData->assembly->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="row justify-content-center border-top border-default">
                                                                <div class="col-12">
                                                                    <p class="fs-5 fw-bold text-dark">
                                                                        {{ $wallCabinetData->price == 0 ? 'Out of Stock' : '£' . $wallCabinetData->price }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-12 d-flex justify-content-center product-counter">
                                                                    <input id="minus{{ $wallCabinetData->id }}"
                                                                        class="minus border bg-dark text-light p-0"
                                                                        type="button" value="-"
                                                                        onclick="decreaseQuantity('{{ $wallCabinetData->id }}', '{{ $wallCabinetData->product_code }}', '{{ $wallCabinetData->full_title }}', {{ $wallCabinetData->price }}, {{ $wallCabinetData->discounted_price }}, {{ $wallCabinetData->discounted_percentage ?? 0 }}, '{{ $wallCabinetData->ParentCategory->slug }}')" />
                                                                    <input id="quantity{{ $wallCabinetData->id }}"
                                                                        class="quantity border border-black text-center"
                                                                        type="text" value="0" name="quantity"
                                                                        disabled />
                                                                    <input id="plus{{ $wallCabinetData->id }}"
                                                                        class="plus border bg-dark text-light p-0"
                                                                        type="button" value="+" type="number"
                                                                        max="10"
                                                                        {{$wallCabinetData->price == 0 ? 'disabled' : '' }} 
                                                                        onclick="increaseQuantity('{{ $wallCabinetData->id }}', '{{ $wallCabinetData->product_code }}', '{{ $wallCabinetData->full_title }}', {{ $wallCabinetData->price }}, {{ $wallCabinetData->discounted_price }}, {{ $wallCabinetData->discounted_percentage ?? 0 }}, '{{ $wallCabinetData->ParentCategory->slug }}')" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    @else
                                    <div class="col-12">
                                        <p class="">No Wall Cabinets available</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Tall Cabinets --}}
                            <div class="tab-pane fade" id="nav-tallCabinet" role="tabpanel"
                                aria-labelledby="nav-tallCabinet-tab" tabindex="0">
                                <div class="row">
                                    @if ($tallCabinets->count() > 0)
                                    @foreach ($tallCabinets as $index => $tallCabinet)
                                    {{--<div class="col-lg-4 col-6 mb-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <!-- Button trigger modal -->
                                                    <a class="modal-icon z-3" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#wallCabinets{{ $index }}">
                                                        <i class="ri-add-circle-line text-black fs-4"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="wallCabinets{{ $index }}"
                                                        tabindex="-1"
                                                        aria-labelledby="wallCabinetsLabel{{ $index }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-5 col-12">
                                                                                <img src="{{ !empty($tallCabinet->image_path) ? asset('imgs/products/'.$tallCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid" />
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-8 col-md-7 col-12 text-start">
                                                                                <h1 class="fs-5 fw-bold">
                                                                                    {{ $tallCabinet->full_title }}
                                                                                </h1>
                                                                                <hr>
                                                                                <h6
                                                                                    class="fs-6 fw-bolder text-dark">
                                                                                    Styling</h6>
                                                                                <ul>
                                                                                    <li>HEIGHT: 720mm</li>
                                                                                    <li>WIDTH: 1000mm</li>
                                                                                    <li>DEPTH: 570mm</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <figure>
                                                            <img class="product-image px-0"
                                                                src="{{ !empty($tallCabinet->image_path) ? asset('imgs/products/'.$tallCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                alt="Card image cap">
                                                        </figure>
                                                        <div class="">
                                                            <a href=""
                                                                class="text-center text-decoration-underline fs-5 fw-bold">
                                                                {{ $tallCabinet->short_title }}
                                                            </a>
                                                            <p class="py-lg-3 py-2">
                                                                <small
                                                                    class="fw-bold text-center">{{ $tallCabinet->product_code }}</small>
                                                            </p>
                                                            <p class="py-lg-3 py-2">
                                                                <small
                                                                    class="fw-bold text-center">{{ $tallCabinet->dimensions }}</small>
                                                            </p>
                                                            <div class="container-fluid">
                                                                <div
                                                                    class="row justify-content-center product-counter">
                                                                    <input id="minus{{ $tallCabinet->id }}"
                                                                        class="minus border bg-dark text-light p-0"
                                                                        type="button" value="-"
                                                                        onclick="decreaseQuantity('{{ $tallCabinet->id }}', '{{ $tallCabinet->product_code }}', '{{ $tallCabinet->full_title }}', {{ $tallCabinet->price }}, {{ $tallCabinet->discounted_price }}, {{ $tallCabinet->discounted_percentage ?? 0 }}, '{{ $tallCabinet->ParentCategory->slug }}')" />
                                                                    <input id="quantity{{ $tallCabinet->id }}"
                                                                        class="quantity border border-black text-center"
                                                                        type="text" value="0"
                                                                        name="quantity" disabled />
                                                                    <input id="plus{{ $tallCabinet->id }}"
                                                                        class="plus border bg-dark text-light p-0"
                                                                        type="button" value="+"
                                                                        {{$tallCabinet->price == 0 ? 'disabled' : '' }} 
                                                                        onclick="increaseQuantity('{{ $tallCabinet->id }}', '{{ $tallCabinet->product_code }}', '{{ $tallCabinet->full_title }}', {{ $tallCabinet->price }}, {{ $tallCabinet->discounted_price }}, {{ $tallCabinet->discounted_percentage ?? 0 }}, '{{ $tallCabinet->ParentCategory->slug }}')" />
                                                                </div>
                                                            </div>
                                                            <p class="fs-5 fw-bold mt-lg-2">
                                                                {{ $tallCabinet->price == 0 ? 'Out of Stock' : '£' . $tallCabinet->price }}
                                                            </p>
                                                            <div class="container-fluid">
                                                                @if ($tallCabinet->style)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-uppercase m-0 pt-1">
                                                                            <small>Style</small>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p
                                                                            class="category-value fw-semibold py-1 mb-2">
                                                                            <small>{{ $tallCabinet->style->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($tallCabinet->colour)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-uppercase m-0 pt-1">
                                                                            <small>Colour</small>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p
                                                                            class="category-value fw-semibold py-1 mb-2">
                                                                            <small>{{ $tallCabinet->colour->trade_colour ? $tallCabinet->colour->trade_colour : $tallCabinet->colour->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($tallCabinet->assembly)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-uppercase m-0 pt-1">
                                                                            <small>Assembly</small>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p
                                                                            class="category-value fw-semibold py-1 mb-2">
                                                                            <small>{{ $tallCabinet->assembly->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                        {{--<div class="col-lg-4 col-6 mb-3">
                                            <div class="card border-1 btn btn-outline-warning bg-light p-0" style="border-radius: 0;">
                                                <div class="bg-warning card-header px-0 py-0">
                                                    <div class="py-2 text-center product-short-title-container w-100">
                                                        <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                            {{ $wallCabinet->short_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="modal fade" id="productModal{{ $wallCabinet->id }}" tabindex="-1"
                                                        aria-labelledby="productModalLabel{{ $wallCabinet->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                                <div class="modal-header border-bottom border-light">
                                                                    <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                        {{ $wallCabinet->full_title }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                                <img src="{{ !empty($wallCabinet->image_path) ? asset('imgs/products/'.$wallCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid product-image" style="height: 300px;" />
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                                <div>
                                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                    <ul style="list-style: none; padding: 0">
                                                                                        @if ($wallCabinet->style)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                                {{ $wallCabinet->style->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($wallCabinet->assembly)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                                {{ $wallCabinet->assembly->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($wallCabinet->colour)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                                {{ $wallCabinet->colour->trade_colour ? $wallCabinet->colour->trade_colour : $wallCabinet->colour->name }}
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
                                                                                                {{ intval($wallCabinet->height) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                                {{ intval($wallCabinet->width) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                                {{ intval($wallCabinet->depth) }}mm
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
                                                                                            @if ($wallCabinet->category?->description)
                                                                                            {!! $wallCabinet->category->description !!}
                                                                                            @elseif ($wallCabinet->category?->parentCategory?->description)
                                                                                            {!! $wallCabinet->category->parentCategory->description !!}
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
                                                                        src="{{ !empty($wallCabinet->image_path) ? asset('imgs/products/'.$wallCabinet->image_path) : asset('images/no-image-available.jpg') }}"
                                                                        alt="Card image cap" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal{{ $wallCabinet->id }}">
                                                                </figure>
                                                                <p class="mt-2"><small class="fw-bold text-start text-dark">{{ $wallCabinet->product_code }}</small></p>
                                                                <p class="">
                                                                    <small
                                                                        class="fw-bold text-start text-dark">{{ $wallCabinet->dimensions }}</small>
                                                                </p>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="container-fluid">
                                                                    <div class="row justify-content-center">
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center product-counter">
                                                                            <input id="minus{{ $wallCabinet->id }}"
                                                                                class="minus border bg-dark text-light p-0"
                                                                                type="button" value="-"
                                                                                onclick="decreaseQuantity('{{ $wallCabinet->id }}', '{{ $wallCabinet->product_code }}', '{{ $wallCabinet->full_title }}', {{ $wallCabinet->price }}, {{ $wallCabinet->discounted_price }}, {{ $wallCabinet->discounted_percentage ?? 0 }}, '{{ $wallCabinet->ParentCategory->slug }}')" />
                                                                            <input id="quantity{{ $wallCabinet->id }}"
                                                                                class="quantity border border-black text-center"
                                                                                type="text" value="0" name="quantity"
                                                                                disabled />
                                                                            <input id="plus{{ $wallCabinet->id }}"
                                                                                class="plus border bg-dark text-light p-0"
                                                                                type="button" value="+" type="number"
                                                                                max="10"
                                                                                {{$wallCabinet->price == 0 ? 'disabled' : '' }} 
                                                                                onclick="increaseQuantity('{{ $wallCabinet->id }}', '{{ $wallCabinet->product_code }}', '{{ $wallCabinet->full_title }}', {{ $wallCabinet->price }}, {{ $wallCabinet->discounted_price }}, {{ $wallCabinet->discounted_percentage ?? 0 }}, '{{ $wallCabinet->ParentCategory->slug }}')" />
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="fs-5 fw-bold mt-lg-2 text-dark">
                                                                                {{ $wallCabinet->price == 0 ? 'Out of Stock' : '£' . $wallCabinet->price }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="container-fluid">
                                                                    @if ($wallCabinet->style)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small>Style</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $wallCabinet->style->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($wallCabinet->colour)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small>Colour</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $wallCabinet->colour->trade_colour ? $wallCabinet->colour->trade_colour : $wallCabinet->colour->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($wallCabinet->assembly)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small>Assembly</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $wallCabinet->assembly->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>--}}
                                    @endforeach

                                    @php 
                                        $tallCabinetData = $tallCabinets->first();
                                    @endphp

                                    <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                        <label for="" class="fw-bold d-flex justify-content-between"><span>ALL TALL CABINETS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $tallCabinetData->style?->slug , 'assembly' => $tallCabinetData->assembly?->slug, 'colour' => $tallCabinetData->colour?->slug])}}">View All</a></span></label>
                                        <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="tall-cabinets-section">
                                            @foreach ($tallCabinets as $index => $tallCabinet)
                                            <option class="fw-bold" value="{{$tallCabinet->id }}" data-product-short-title="{{ $tallCabinet->short_title }}" data-product-fullname="{{ $tallCabinet->full_title }}" data-product-image="{{ !empty($tallCabinet->image_path) ? asset('imgs/products/'.$tallCabinet->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $tallCabinet->price }}" data-product-parent-category-slug="{{ $tallCabinet->ParentCategory?->slug }}" data-product-discountedprice="{{ $tallCabinet->discounted_price }}" data-product-assembly-name="{{ $tallCabinet->assembly?->name }}" data-product-discountedpercentage="{{ $tallCabinet->discounted_percentage ?? 0 }}" data-product-code="{{ $tallCabinet->product_code }}" data-product-dimensions="{{ $tallCabinet->dimensions }}" data-product-style="{{ $tallCabinet->style?->name }}" data-product-colour="{{ $tallCabinet->colour?->trade_colour ? $tallCabinet->colour?->trade_colour : $tallCabinet->colour?->name }}" data-product-id="{{ $tallCabinet->id }}">{{ $tallCabinet->full_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 tall-cabinets-section order-sm-2 order-xs-2 mt-4">
                                        <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                            <div class="bg-warning card-header px-0 py-0">
                                                <div class="py-2 text-center product-short-title-container w-100">
                                                    <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                        {{ $tallCabinetData->short_title }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="modal fade" id="productModal{{ $tallCabinetData->id }}" tabindex="-1"
                                                    aria-labelledby="productModalLabel{{ $tallCabinetData->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                            <div class="modal-header border-bottom border-light">
                                                                <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                    {{ $tallCabinetData->full_title }}
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                            <img src="{{ !empty($tallCabinetData->image_path) ? asset('imgs/products/'.$tallCabinetData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                class="img-fluid product-image" style="height: 300px;" />
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                            <div>
                                                                                <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                <ul style="list-style: none; padding: 0">
                                                                                    @if ($tallCabinetData->style)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                            {{ $tallCabinetData->style->name }}
                                                                                        </p>
                                                                                    </li>
                                                                                    @endif
                                                                                    @if ($tallCabinetData->assembly)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                            {{ $tallCabinetData->assembly->name }}
                                                                                        </p>
                                                                                    </li>
                                                                                    @endif
                                                                                    @if ($tallCabinetData->colour)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                            {{ $tallCabinetData->colour->trade_colour ? $tallCabinetData->colour->trade_colour : $tallCabinetData->colour->name }}
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
                                                                                            {{ intval($tallCabinetData->height) }}mm
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                            {{ intval($tallCabinetData->width) }}mm
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                            {{ intval($tallCabinetData->depth) }}mm
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
                                                                                        @if ($tallCabinetData->category?->description)
                                                                                        {!! $tallCabinetData->category->description !!}
                                                                                        @elseif ($tallCabinetData->category?->parentCategory?->description)
                                                                                        {!! $tallCabinetData->category->parentCategory->description !!}
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
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                            <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                <img class="product-image px-0"
                                                                    style="margin-bottom: 0px !important;object-fit:contain"
                                                                    src="{{ !empty($tallCabinetData->image_path) ? asset('imgs/products/'.$tallCabinetData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap" data-bs-toggle="modal"
                                                                    data-bs-target="#productModal{{ $tallCabinetData->id }}">
                                                            </figure>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Product Code</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $tallCabinetData->product_code }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Dimensions</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $tallCabinetData->dimensions }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if ($tallCabinetData->style)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Style</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $tallCabinetData->style->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($tallCabinetData->colour)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Colour</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $tallCabinetData->colour->trade_colour ? $tallCabinetData->colour->trade_colour : $baseCabinet->colour->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($tallCabinetData->assembly)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Assembly</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $tallCabinetData->assembly->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="row justify-content-center border-top border-default">
                                                                <div class="col-12">
                                                                    <p class="fs-5 fw-bold text-dark">
                                                                        {{ $tallCabinetData->price == 0 ? 'Out of Stock' : '£' . $tallCabinetData->price }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-12 d-flex justify-content-center product-counter">
                                                                    <input id="minus{{ $tallCabinetData->id }}"
                                                                        class="minus border bg-dark text-light p-0"
                                                                        type="button" value="-"
                                                                        onclick="decreaseQuantity('{{ $tallCabinetData->id }}', '{{ $tallCabinetData->product_code }}', '{{ $tallCabinetData->full_title }}', {{ $tallCabinetData->price }}, {{ $tallCabinetData->discounted_price }}, {{ $tallCabinetData->discounted_percentage ?? 0 }}, '{{ $tallCabinetData->ParentCategory->slug }}')" />
                                                                    <input id="quantity{{ $tallCabinetData->id }}"
                                                                        class="quantity border border-black text-center"
                                                                        type="text" value="0" name="quantity"
                                                                        disabled />
                                                                    <input id="plus{{ $tallCabinetData->id }}"
                                                                        class="plus border bg-dark text-light p-0"
                                                                        type="button" value="+" type="number"
                                                                        max="10"
                                                                        {{$tallCabinetData->price == 0 ? 'disabled' : '' }} 
                                                                        onclick="increaseQuantity('{{ $tallCabinetData->id }}', '{{ $tallCabinetData->product_code }}', '{{ $tallCabinetData->full_title }}', {{ $tallCabinetData->price }}, {{ $tallCabinetData->discounted_price }}, {{ $tallCabinetData->discounted_percentage ?? 0 }}, '{{ $tallCabinetData->ParentCategory->slug }}')" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    @else
                                    <div class="col-12">
                                        <p class="">No Tall Cabinets available</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Accessories --}}
                            <div class="tab-pane fade" id="nav-accessories" role="tabpanel"
                                aria-labelledby="nav-accessories-tab" tabindex="0">
                                <div class="row">
                                    @if ($accessories->count() > 0)

                                    @php 
                                        $accessoriesData = $accessories->first();
                                    @endphp

                                    <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                        <label for="" class="fw-bold d-flex justify-content-between"><span>ALL ACCESSORIES</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $accessoriesData->style?->slug , 'assembly' => $accessoriesData->assembly?->slug, 'colour' => $accessoriesData->colour?->slug])}}">View All</a></span></label>
                                        <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="accessories-section">
                                            @foreach ($accessories as $index => $accessory)
                                            <option class="fw-bold" value="{{$accessory->id }}" data-product-short-title="{{ $accessory->short_title }}" data-product-fullname="{{ $accessory->full_title }}" data-product-image="{{ !empty($accessory->image_path) ? asset('imgs/products/'.$accessory->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $accessory->price }}" data-product-parent-category-slug="{{ $accessory->ParentCategory?->slug }}" data-product-discountedprice="{{ $accessory->discounted_price }}" data-product-assembly-name="{{ $accessory->assembly?->name }}" data-product-discountedpercentage="{{ $accessory->discounted_percentage ?? 0 }}" data-product-code="{{ $accessory->product_code }}" data-product-dimensions="{{ $accessory->dimensions }}" data-product-style="{{ $accessory->style?->name }}" data-product-colour="{{ $accessory->colour?->trade_colour ? $accessory->colour?->trade_colour : $accessory->colour?->name }}" data-product-id="{{ $accessory->id }}">{{ $accessory->full_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 accessories-section order-sm-2 order-xs-2 mt-4">
                                        <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                            <div class="bg-warning card-header px-0 py-0">
                                                <div class="py-2 text-center product-short-title-container w-100">
                                                    <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                        {{ $accessoriesData->short_title }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="modal fade" id="productModal{{ $accessoriesData->id }}" tabindex="-1"
                                                    aria-labelledby="productModalLabel{{ $accessoriesData->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                            <div class="modal-header border-bottom border-light">
                                                                <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                    {{ $accessoriesData->full_title }}
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                            <img src="{{ !empty($accessoriesData->image_path) ? asset('imgs/products/'.$accessoriesData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                class="img-fluid product-image" style="height: 300px;" />
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                            <div>
                                                                                <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                <ul style="list-style: none; padding: 0">
                                                                                    @if ($accessoriesData->style)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                            {{ $accessoriesData->style->name }}
                                                                                        </p>
                                                                                    </li>
                                                                                    @endif
                                                                                    @if ($accessoriesData->assembly)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                            {{ $accessoriesData->assembly->name }}
                                                                                        </p>
                                                                                    </li>
                                                                                    @endif
                                                                                    @if ($accessoriesData->colour)
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                            {{ $accessoriesData->colour->trade_colour ? $accessoriesData->colour->trade_colour : $accessoriesData->colour->name }}
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
                                                                                            {{ intval($accessoriesData->height) }}mm
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                            {{ intval($accessoriesData->width) }}mm
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <p class="mb-0">
                                                                                            <small
                                                                                                class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                            {{ intval($accessoriesData->depth) }}mm
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
                                                                                        @if ($accessoriesData->category?->description)
                                                                                        {!! $accessoriesData->category->description !!}
                                                                                        @elseif ($accessoriesData->category?->parentCategory?->description)
                                                                                        {!! $accessoriesData->category->parentCategory->description !!}
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
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                            <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                <img class="product-image px-0"
                                                                    style="margin-bottom: 0px !important;object-fit:contain"
                                                                    src="{{ !empty($accessoriesData->image_path) ? asset('imgs/products/'.$accessoriesData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap" data-bs-toggle="modal"
                                                                    data-bs-target="#productModal{{ $accessoriesData->id }}">
                                                            </figure>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Product Code</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $accessoriesData->product_code }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Dimensions</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $accessoriesData->dimensions }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if ($accessoriesData->style)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Style</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $accessoriesData->style->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($accessoriesData->colour)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Colour</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $accessoriesData->colour->trade_colour ? $accessory->colour->trade_colour : $accessory->colour->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($accessoriesData->assembly)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                            <small class="fw-bold">Assembly</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                            <small>{{ $accessoriesData->assembly->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="row justify-content-center border-top border-default">
                                                                <div class="col-12">
                                                                    <p class="fs-5 fw-bold text-dark">
                                                                        {{ $accessoriesData->price == 0 ? 'Out of Stock' : '£' . $accessoriesData->price }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-12 d-flex justify-content-center product-counter">
                                                                    <input id="minus{{ $accessoriesData->id }}"
                                                                        class="minus border bg-dark text-light p-0"
                                                                        type="button" value="-"
                                                                        onclick="decreaseQuantity('{{ $accessoriesData->id }}', '{{ $accessoriesData->product_code }}', '{{ $accessoriesData->full_title }}', {{ $accessoriesData->price }}, {{ $accessoriesData->discounted_price }}, {{ $accessoriesData->discounted_percentage ?? 0 }}, '{{ $accessoriesData->ParentCategory->slug }}')" />
                                                                    <input id="quantity{{ $accessoriesData->id }}"
                                                                        class="quantity border border-black text-center"
                                                                        type="text" value="0" name="quantity"
                                                                        disabled />
                                                                    <input id="plus{{ $accessoriesData->id }}"
                                                                        class="plus border bg-dark text-light p-0"
                                                                        type="button" value="+" type="number"
                                                                        max="10"
                                                                        {{$accessoriesData->price == 0 ? 'disabled' : '' }} 
                                                                        onclick="increaseQuantity('{{ $accessoriesData->id }}', '{{ $accessoriesData->product_code }}', '{{ $accessoriesData->full_title }}', {{ $accessoriesData->price }}, {{ $accessoriesData->discounted_price }}, {{ $accessoriesData->discounted_percentage ?? 0 }}, '{{ $accessoriesData->ParentCategory->slug }}')" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    @else
                                    <div class="col-12">
                                        <p class="">No Accessories Available</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse-wrapper my-4">
                    <a class="fw-semibold text-dark text-uppercase collapse-heading" data-bs-toggle="collapse"
                        href="#internals" role="button" aria-expanded="false" aria-controls="internals">
                        <span
                            class="bg-dark text-white fw-semibold py-2 px-2 text-center me-2 collapse-heading-number">2</span>
                        Internals
                    </a>
                    <div class="collapse-container collapse mt-3" id="internals">
                        <div class="row">
                            @if ($internals->count() > 0)
                                @foreach ($internals as $index => $internal)
                                {{--<div class="col-lg-4 col-6 mb-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <!-- Button trigger modal -->
                                                <a class="modal-icon z-3" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#accessories{{ $index }}">
                                                    <i class="ri-add-circle-line text-black fs-4"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="accessories{{ $index }}"
                                                    tabindex="-1"
                                                    aria-labelledby="accessoriesLabel{{ $index }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-5 col-12">
                                                                            <img src="{{ !empty($accessory->image_path) ? asset('imgs/products/'.$accessory->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                class="img-fluid" />
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-8 col-md-7 col-12 text-start">
                                                                            <h1 class="fs-5 fw-bold">
                                                                                {{ $accessory->full_title }}
                                                                            </h1>
                                                                            <hr>
                                                                            <h6 class="fs-6 fw-bolder text-dark">
                                                                                Styling</h6>
                                                                            <ul>
                                                                                <li>HEIGHT: 720mm</li>
                                                                                <li>WIDTH: 1000mm</li>
                                                                                <li>DEPTH: 570mm</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <figure>
                                                        <img class="product-image px-0"
                                                            src="{{ !empty($accessory->image_path) ? asset('imgs/products/'.$accessory->image_path) : asset('images/no-image-available.jpg') }}"
                                                            alt="Card image cap">
                                                    </figure>
                                                    <div class="">
                                                        <a href=""
                                                            class="text-center text-decoration-underline fs-5 fw-bold">
                                                            {{ $accessory->short_title }}
                                                        </a>
                                                        <p class="py-lg-3 py-2">
                                                            <small
                                                                class="fw-bold text-center">{{ $accessory->product_code }}</small>
                                                        </p>
                                                        <p class="py-lg-3 py-2">
                                                            <small
                                                                class="fw-bold text-center">{{ $accessory->dimensions }}</small>
                                                        </p>
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center product-counter">
                                                                <input id="minus{{ $accessory->id }}"
                                                                    class="minus border bg-dark text-light p-0"
                                                                    type="button" value="-"
                                                                    onclick="decreaseQuantity('{{ $accessory->id }}', '{{ $accessory->product_code }}', '{{ $accessory->full_title }}', {{ $accessory->price }}, {{ $accessory->discounted_price }}, {{ $accessory->discounted_percentage ?? 0 }}, '{{ $accessory->ParentCategory->slug }}')" />
                                                                <input id="quantity{{ $accessory->id }}"
                                                                    class="quantity border border-black text-center"
                                                                    type="text" value="0" name="quantity"
                                                                    disabled />
                                                                <input id="plus{{ $accessory->id }}"
                                                                    class="plus border bg-dark text-light p-0"
                                                                    type="button" value="+"
                                                                    {{$accessory->price == 0 ? 'disabled' : '' }} 
                                                                    onclick="increaseQuantity('{{ $accessory->id }}', '{{ $accessory->product_code }}', '{{ $accessory->full_title }}', {{ $accessory->price }}, {{ $accessory->discounted_price }}, {{ $accessory->discounted_percentage ?? 0 }}, '{{ $accessory->ParentCategory->slug }}')" />
                                                            </div>
                                                        </div>
                                                        <p class="fs-5 fw-bold mt-lg-2">
                                                            {{ $accessory->price == 0 ? 'Out of Stock' : '£' . $accessory->price }}
                                                        </p>
                                                        <div class="container-fluid">
                                                            @if ($accessory->style)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Style</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p
                                                                        class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $accessory->style->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($accessory->colour)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Colour</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p
                                                                        class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $accessory->colour->trade_colour ? $accessory->colour->trade_colour : $accessory->colour->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($accessory->assembly)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p
                                                                        class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $accessory->assembly->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                <!-- <div class="col-lg-4 col-6 mb-3">
                                    <div class="card border-1 btn btn-outline-warning bg-light p-0" style="border-radius: 0;">
                                        <div class="bg-warning card-header px-0 py-0">
                                            <div class="py-2 text-center product-short-title-container w-100">
                                                <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                    {{ $accessory->short_title }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="modal fade" id="productModal{{ $accessory->id }}" tabindex="-1"
                                                aria-labelledby="productModalLabel{{ $accessory->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                        <div class="modal-header border-bottom border-light">
                                                            <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                {{ $accessory->full_title }}
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                        <img src="{{ !empty($accessory->image_path) ? asset('imgs/products/'.$accessory->image_path) : asset('images/no-image-available.jpg') }}"
                                                                            class="img-fluid product-image" style="height: 300px;" />
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                        <div>
                                                                            <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                            <ul style="list-style: none; padding: 0">
                                                                                @if ($accessory->style)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                        {{ $accessory->style->name }}
                                                                                    </p>
                                                                                </li>
                                                                                @endif
                                                                                @if ($accessory->assembly)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                        {{ $accessory->assembly->name }}
                                                                                    </p>
                                                                                </li>
                                                                                @endif
                                                                                @if ($accessory->colour)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                        {{ $accessory->colour->trade_colour ? $accessory->colour->trade_colour : $accessory->colour->name }}
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
                                                                                        {{ intval($accessory->height) }}mm
                                                                                    </p>
                                                                                </li>
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                        {{ intval($accessory->width) }}mm
                                                                                    </p>
                                                                                </li>
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                        {{ intval($accessory->depth) }}mm
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
                                                                                    @if ($accessory->category?->description)
                                                                                    {!! $accessory->category->description !!}
                                                                                    @elseif ($accessory->category?->parentCategory?->description)
                                                                                    {!! $accessory->category->parentCategory->description !!}
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
                                                                src="{{ !empty($accessory->image_path) ? asset('imgs/products/'.$accessory->image_path) : asset('images/no-image-available.jpg') }}"
                                                                alt="Card image cap" data-bs-toggle="modal"
                                                                data-bs-target="#productModal{{ $accessory->id }}">
                                                        </figure>
                                                        <p class="mt-2"><small class="fw-bold text-start text-dark">{{ $accessory->product_code }}</small></p>
                                                        <p class="">
                                                            <small
                                                                class="fw-bold text-start text-dark">{{ $accessory->dimensions }}</small>
                                                        </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center">
                                                                <div
                                                                    class="col-6 d-flex justify-content-center product-counter">
                                                                    <input id="minus{{ $accessory->id }}"
                                                                        class="minus border bg-dark text-light p-0"
                                                                        type="button" value="-"
                                                                        onclick="decreaseQuantity('{{ $accessory->id }}', '{{ $accessory->product_code }}', '{{ $accessory->full_title }}', {{ $accessory->price }}, {{ $accessory->discounted_price }}, {{ $accessory->discounted_percentage ?? 0 }}, '{{ $accessory->ParentCategory->slug }}')" />
                                                                    <input id="quantity{{ $accessory->id }}"
                                                                        class="quantity border border-black text-center"
                                                                        type="text" value="0" name="quantity"
                                                                        disabled />
                                                                    <input id="plus{{ $accessory->id }}"
                                                                        class="plus border bg-dark text-light p-0"
                                                                        type="button" value="+" type="number"
                                                                        max="10"
                                                                        {{$accessory->price == 0 ? 'disabled' : '' }} 
                                                                        onclick="increaseQuantity('{{ $accessory->id }}', '{{ $accessory->product_code }}', '{{ $accessory->full_title }}', {{ $accessory->price }}, {{ $accessory->discounted_price }}, {{ $accessory->discounted_percentage ?? 0 }}, '{{ $accessory->ParentCategory->slug }}')" />
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fs-5 fw-bold mt-lg-2 text-dark">
                                                                        {{ $accessory->price == 0 ? 'Out of Stock' : '£' . $accessory->price }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container-fluid">
                                                            @if ($accessory->style)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small>Style</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $accessory->style->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($accessory->colour)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small>Colour</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $accessory->colour->trade_colour ? $accessory->colour->trade_colour : $accessory->colour->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($accessory->assembly)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small>Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $accessory->assembly->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer p-0">
                                            <a href="#" class="product-short-title text-decoration-underline">
                                                <small>View more</small>
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                                @endforeach
                                @php 
                                    $internalsData = $internals->first();
                                @endphp

                                <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                    <label for="" class="fw-bold d-flex justify-content-between"><span>ALL INTERNALS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $internalsData->style?->slug , 'assembly' => $internalsData->assembly?->slug, 'colour' => $internalsData->colour?->slug])}}">View All</a></span></label>
                                    <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="internals-section">
                                        @foreach ($internals as $index => $internal)
                                        <option class="fw-bold" value="{{$internal->id }}" data-product-short-title="{{ $internal->short_title }}" data-product-fullname="{{ $internal->full_title }}" data-product-image="{{ !empty($internal->image_path) ? asset('imgs/products/'.$internal->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $internal->price }}" data-product-parent-category-slug="{{ $internal->ParentCategory?->slug }}" data-product-discountedprice="{{ $internal->discounted_price }}" data-product-assembly-name="{{ $internal->assembly?->name }}" data-product-discountedpercentage="{{ $internal->discounted_percentage ?? 0 }}" data-product-code="{{ $internal->product_code }}" data-product-dimensions="{{ $internal->dimensions }}" data-product-style="{{ $internal->style?->name }}" data-product-colour="{{ $internal->colour?->trade_colour ? $internal->colour?->trade_colour : $internal->colour?->name }}" data-product-id="{{ $internal->id }}">{{ $internal->full_title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 internals-section order-sm-2 order-xs-2 mt-4">
                                    <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                        <div class="bg-warning card-header px-0 py-0">
                                            <div class="py-2 text-center product-short-title-container w-100">
                                                <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                    {{ $internalsData->short_title }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="modal fade" id="productModal{{ $internalsData->id }}" tabindex="-1"
                                                aria-labelledby="productModalLabel{{ $internalsData->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                        <div class="modal-header border-bottom border-light">
                                                            <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                {{ $internalsData->full_title }}
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                        <img src="{{ !empty($internalsData->image_path) ? asset('imgs/products/'.$internalsData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                            class="img-fluid product-image" style="height: 300px;" />
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                        <div>
                                                                            <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                            <ul style="list-style: none; padding: 0">
                                                                                @if ($internalsData->style)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                        {{ $internalsData->style->name }}
                                                                                    </p>
                                                                                </li>
                                                                                @endif
                                                                                @if ($internalsData->assembly)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                        {{ $internalsData->assembly->name }}
                                                                                    </p>
                                                                                </li>
                                                                                @endif
                                                                                @if ($internalsData->colour)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                        {{ $internalsData->colour->trade_colour ? $internalsData->colour->trade_colour : $internalsData->colour->name }}
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
                                                                                        {{ intval($internalsData->height) }}mm
                                                                                    </p>
                                                                                </li>
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                        {{ intval($internalsData->width) }}mm
                                                                                    </p>
                                                                                </li>
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                        {{ intval($internalsData->depth) }}mm
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
                                                                                    @if ($internalsData->category?->description)
                                                                                    {!! $internalsData->category->description !!}
                                                                                    @elseif ($internalsData->category?->parentCategory?->description)
                                                                                    {!! $internalsData->category->parentCategory->description !!}
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
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                        <figure class="my-0" style="margin-bottom: 0px !important;">
                                                            <img class="product-image px-0"
                                                                style="margin-bottom: 0px !important;object-fit:contain"
                                                                src="{{ !empty($internalsData->image_path) ? asset('imgs/products/'.$internalsData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                alt="Card image cap" data-bs-toggle="modal"
                                                                data-bs-target="#productModal{{ $internalsData->id }}">
                                                        </figure>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Product Code</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $internalsData->product_code }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Dimensions</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $internalsData->dimensions }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @if ($internalsData->style)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Style</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $internalsData->style->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($internalsData->colour)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Colour</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $internalsData->colour->trade_colour ? $internalsData->colour->trade_colour : $baseCabinet->colour->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($internalsData->assembly)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $internalsData->assembly->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="row justify-content-center border-top border-default">
                                                            <div class="col-12">
                                                                <p class="fs-5 fw-bold text-dark">
                                                                    {{ $internalsData->price == 0 ? 'Out of Stock' : '£' . $internalsData->price }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="col-12 d-flex justify-content-center product-counter">
                                                                <input id="minus{{ $internalsData->id }}"
                                                                    class="minus border bg-dark text-light p-0"
                                                                    type="button" value="-"
                                                                    onclick="decreaseQuantity('{{ $internalsData->id }}', '{{ $internalsData->product_code }}', '{{ $internalsData->full_title }}', {{ $internalsData->price }}, {{ $internalsData->discounted_price }}, {{ $internalsData->discounted_percentage ?? 0 }}, '{{ $internalsData->ParentCategory->slug }}')" />
                                                                <input id="quantity{{ $internalsData->id }}"
                                                                    class="quantity border border-black text-center"
                                                                    type="text" value="0" name="quantity"
                                                                    disabled />
                                                                <input id="plus{{ $internalsData->id }}"
                                                                    class="plus border bg-dark text-light p-0"
                                                                    type="button" value="+" type="number"
                                                                    max="10"
                                                                    {{$internalsData->price == 0 ? 'disabled' : '' }} 
                                                                    onclick="increaseQuantity('{{ $internalsData->id }}', '{{ $internalsData->product_code }}', '{{ $internalsData->full_title }}', {{ $internalsData->price }}, {{ $internalsData->discounted_price }}, {{ $internalsData->discounted_percentage ?? 0 }}, '{{ $internalsData->ParentCategory->slug }}')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @else
                                <div class="col-12">
                                    <p class="">No Internals available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="collapse-wrapper my-4">
                    <a class="fw-semibold text-dark text-uppercase collapse-heading" data-bs-toggle="collapse"
                        href="#handles" role="button" aria-expanded="false" aria-controls="handles">
                        <span
                            class="bg-dark text-white fw-semibold py-2 px-2 text-center me-2 collapse-heading-number">3</span>
                        Handles
                    </a>
                    <div class="collapse-container collapse mt-3" id="handles">
                        <div class="row">
                            @if ($handles->count() > 0)
                                @php 
                                    $handlesData = $handles->first();
                                @endphp

                                <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                    <label for="" class="fw-bold d-flex justify-content-between"><span>ALL HANDLES</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $handlesData->style?->slug , 'assembly' => $handlesData->assembly?->slug, 'colour' => $handlesData->colour?->slug])}}">View All</a></span></label>
                                    <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="handles-section">
                                        @foreach ($handles as $index => $handle)
                                        <option class="fw-bold" value="{{$handle->id }}" data-product-short-title="{{ $handle->short_title }}" data-product-fullname="{{ $handle->full_title }}" data-product-image="{{ !empty($handle->image_path) ? asset('imgs/products/'.$handle->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $handle->price }}" data-product-parent-category-slug="{{ $handle->ParentCategory?->slug }}" data-product-discountedprice="{{ $handle->discounted_price }}" data-product-assembly-name="{{ $handle->assembly?->name }}" data-product-discountedpercentage="{{ $handle->discounted_percentage ?? 0 }}" data-product-code="{{ $handle->product_code }}" data-product-dimensions="{{ $handle->dimensions }}" data-product-style="{{ $handle->style?->name }}" data-product-colour="{{ $handle->colour?->trade_colour ? $handle->colour?->trade_colour : $handle->colour?->name }}" data-product-id="{{ $handle->id }}">{{ $handle->full_title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 handles-section order-sm-2 order-xs-2 mt-4">
                                    <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                        <div class="bg-warning card-header px-0 py-0">
                                            <div class="py-2 text-center product-short-title-container w-100">
                                                <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                    {{ $handlesData->short_title }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="modal fade" id="productModal{{ $handlesData->id }}" tabindex="-1"
                                                aria-labelledby="productModalLabel{{ $handlesData->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                        <div class="modal-header border-bottom border-light">
                                                            <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                {{ $handlesData->full_title }}
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                        <img src="{{ !empty($handlesData->image_path) ? asset('imgs/products/'.$handlesData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                            class="img-fluid product-image" style="height: 300px;" />
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                        <div>
                                                                            <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                            <ul style="list-style: none; padding: 0">
                                                                                @if ($handlesData->style)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                        {{ $handlesData->style->name }}
                                                                                    </p>
                                                                                </li>
                                                                                @endif
                                                                                @if ($handlesData->assembly)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                        {{ $handlesData->assembly->name }}
                                                                                    </p>
                                                                                </li>
                                                                                @endif
                                                                                @if ($handlesData->colour)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                        {{ $handlesData->colour->trade_colour ? $handlesData->colour->trade_colour : $handlesData->colour->name }}
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
                                                                                        {{ intval($handlesData->height) }}mm
                                                                                    </p>
                                                                                </li>
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                        {{ intval($handlesData->width) }}mm
                                                                                    </p>
                                                                                </li>
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                        {{ intval($handlesData->depth) }}mm
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
                                                                                    @if ($handlesData->category?->description)
                                                                                    {!! $handlesData->category->description !!}
                                                                                    @elseif ($handlesData->category?->parentCategory?->description)
                                                                                    {!! $handlesData->category->parentCategory->description !!}
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
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                        <figure class="my-0" style="margin-bottom: 0px !important;">
                                                            <img class="product-image px-0"
                                                                style="margin-bottom: 0px !important;object-fit:contain"
                                                                src="{{ !empty($handlesData->image_path) ? asset('imgs/products/'.$handlesData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                alt="Card image cap" data-bs-toggle="modal"
                                                                data-bs-target="#productModal{{ $handlesData->id }}">
                                                        </figure>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Product Code</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $handlesData->product_code }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Dimensions</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $handlesData->dimensions }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @if ($handlesData->style)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Style</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $handlesData->style->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($handlesData->colour)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Colour</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $handlesData->colour->trade_colour ? $handlesData->colour->trade_colour : $baseCabinet->colour->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($handlesData->assembly)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $handlesData->assembly->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="row justify-content-center border-top border-default">
                                                            <div class="col-12">
                                                                <p class="fs-5 fw-bold text-dark">
                                                                    {{ $handlesData->price == 0 ? 'Out of Stock' : '£' . $handlesData->price }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="col-12 d-flex justify-content-center product-counter">
                                                                <input id="minus{{ $handlesData->id }}"
                                                                    class="minus border bg-dark text-light p-0"
                                                                    type="button" value="-"
                                                                    onclick="decreaseQuantity('{{ $handlesData->id }}', '{{ $handlesData->product_code }}', '{{ $handlesData->full_title }}', {{ $handlesData->price }}, {{ $handlesData->discounted_price }}, {{ $handlesData->discounted_percentage ?? 0 }}, '{{ $handlesData->ParentCategory->slug }}')" />
                                                                <input id="quantity{{ $handlesData->id }}"
                                                                    class="quantity border border-black text-center"
                                                                    type="text" value="0" name="quantity"
                                                                    disabled />
                                                                <input id="plus{{ $handlesData->id }}"
                                                                    class="plus border bg-dark text-light p-0"
                                                                    type="button" value="+" type="number"
                                                                    max="10"
                                                                    {{$handlesData->price == 0 ? 'disabled' : '' }} 
                                                                    onclick="increaseQuantity('{{ $handlesData->id }}', '{{ $handlesData->product_code }}', '{{ $handlesData->full_title }}', {{ $handlesData->price }}, {{ $handlesData->discounted_price }}, {{ $handlesData->discounted_percentage ?? 0 }}, '{{ $handlesData->ParentCategory->slug }}')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @else
                                <div class="col-12">
                                    <p class="">No Handles available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="collapse-wrapper my-4">
                    <a class="fw-semibold text-dark text-uppercase collapse-heading" data-bs-toggle="collapse"
                        href="#worktops" role="button" aria-expanded="false" aria-controls="worktops">
                        <span
                            class="bg-dark text-white fw-semibold py-2 px-2 text-center me-2 collapse-heading-number">4</span>WORKTOPS,
                        UPSTANDS AND
                        EDGING
                    </a>
                    <div class="collapse-container collapse mt-3" id="worktops">
                        <nav>
                            <div class="nav nav-tabs custom-nav" style="" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-worktops-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-worktops" type="button" role="tab"
                                    aria-controls="nav-worktops" aria-selected="true">Worktops</button>
                                <button class="nav-link" id="nav-upstands-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-upstands" type="button" role="tab"
                                    aria-controls="nav-upstands" aria-selected="false">Worktops and Upstands</button>
                                <button class="nav-link" id="nav-breakfast-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-breakfast" type="button" role="tab"
                                    aria-controls="nav-breakfast" aria-selected="false">Breakfast Bars</button>
                                <button class="nav-link" id="nav-edging-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-edging" type="button" role="tab"
                                    aria-controls="nav-edging-tab" aria-selected="false">Edging
                                    Doors</button>
                            </div>
                        </nav>
                        <div class="tab-content p-3" style="border: 1px solid black !important" id="nav-tabContent">

                            {{-- Worktops --}}
                            <div class="tab-pane fade show active" id="nav-worktops" role="tabpanel"
                                aria-labelledby="nav-worktops-tab" tabindex="0">
                                <div class="row">
                                    @if ($worktops->count() > 0)
                                        @php 
                                            $worktopsData = $worktops->first();
                                        @endphp

                                        <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                            <label for="" class="fw-bold d-flex justify-content-between"><span>ALL WORKTOPS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $worktopsData->style?->slug , 'assembly' => $worktopsData->assembly?->slug, 'colour' => $worktopsData->colour?->slug])}}">View All</a></span></label>
                                            <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="worktops-section">
                                                @foreach ($worktops as $index => $worktop)
                                                <option class="fw-bold" value="{{$worktop->id }}" data-product-short-title="{{ $worktop->short_title }}" data-product-fullname="{{ $worktop->full_title }}" data-product-image="{{ !empty($worktop->image_path) ? asset('imgs/products/'.$worktop->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $worktop->price }}" data-product-parent-category-slug="{{ $worktop->ParentCategory?->slug }}" data-product-discountedprice="{{ $worktop->discounted_price }}" data-product-assembly-name="{{ $worktop->assembly?->name }}" data-product-discountedpercentage="{{ $worktop->discounted_percentage ?? 0 }}" data-product-code="{{ $worktop->product_code }}" data-product-dimensions="{{ $worktop->dimensions }}" data-product-style="{{ $worktop->style?->name }}" data-product-colour="{{ $worktop->colour?->trade_colour ? $worktop->colour?->trade_colour : $worktop->colour?->name }}" data-product-id="{{ $worktop->id }}">{{ $worktop->full_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 worktops-section order-sm-2 order-xs-2 mt-4">
                                            <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                                <div class="bg-warning card-header px-0 py-0">
                                                    <div class="py-2 text-center product-short-title-container w-100">
                                                        <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                            {{ $worktopsData->short_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="modal fade" id="productModal{{ $worktopsData->id }}" tabindex="-1"
                                                        aria-labelledby="productModalLabel{{ $worktopsData->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                                <div class="modal-header border-bottom border-light">
                                                                    <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                        {{ $worktopsData->full_title }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                                <img src="{{ !empty($worktopsData->image_path) ? asset('imgs/products/'.$worktopsData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid product-image" style="height: 300px;" />
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                                <div>
                                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                    <ul style="list-style: none; padding: 0">
                                                                                        @if ($worktopsData->style)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                                {{ $worktopsData->style->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($worktopsData->assembly)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                                {{ $worktopsData->assembly->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($worktopsData->colour)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                                {{ $worktopsData->colour->trade_colour ? $worktopsData->colour->trade_colour : $worktopsData->colour->name }}
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
                                                                                                {{ intval($worktopsData->height) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                                {{ intval($worktopsData->width) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                                {{ intval($worktopsData->depth) }}mm
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
                                                                                            @if ($worktopsData->category?->description)
                                                                                            {!! $worktopsData->category->description !!}
                                                                                            @elseif ($worktopsData->category?->parentCategory?->description)
                                                                                            {!! $worktopsData->category->parentCategory->description !!}
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
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                                <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                    <img class="product-image px-0"
                                                                        style="margin-bottom: 0px !important;object-fit:contain"
                                                                        src="{{ !empty($worktopsData->image_path) ? asset('imgs/products/'.$worktopsData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                        alt="Card image cap" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal{{ $worktopsData->id }}">
                                                                </figure>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Product Code</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsData->product_code }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Dimensions</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsData->dimensions }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @if ($worktopsData->style)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Style</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsData->style->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($worktopsData->colour)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Colour</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsData->colour->trade_colour ? $worktopsData->colour->trade_colour : $worktopsData->colour->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($worktopsData->assembly)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Assembly</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsData->assembly->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="row justify-content-center border-top border-default">
                                                                    <div class="col-12">
                                                                        <p class="fs-5 fw-bold text-dark">
                                                                            {{ $worktopsData->price == 0 ? 'Out of Stock' : '£' . $worktopsData->price }}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 d-flex justify-content-center product-counter">
                                                                        <input id="minus{{ $worktopsData->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $worktopsData->id }}', '{{ $worktopsData->product_code }}', '{{ $worktopsData->full_title }}', {{ $worktopsData->price }}, {{ $worktopsData->discounted_price }}, {{ $worktopsData->discounted_percentage ?? 0 }}, '{{ $worktopsData->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $worktopsData->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0" name="quantity"
                                                                            disabled />
                                                                        <input id="plus{{ $worktopsData->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+" type="number"
                                                                            max="10"
                                                                            {{$worktopsData->price == 0 ? 'disabled' : '' }} 
                                                                            onclick="increaseQuantity('{{ $worktopsData->id }}', '{{ $worktopsData->product_code }}', '{{ $worktopsData->full_title }}', {{ $worktopsData->price }}, {{ $worktopsData->discounted_price }}, {{ $worktopsData->discounted_percentage ?? 0 }}, '{{ $worktopsData->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <p class="">No Worktops available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Worktops and Upstands --}}
                            <div class="tab-pane fade active" id="nav-upstands" role="tabpanel"
                                aria-labelledby="nav-upstands-tab" tabindex="0">
                                <div class="row">
                                    @if ($worktopsAndUpStands->count() > 0)
                                        @php 
                                            $worktopsAndUpStandData = $worktopsAndUpStands->first();
                                        @endphp

                                        <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                            <label for="" class="fw-bold d-flex justify-content-between"><span>ALL WORKTOPS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $worktopsAndUpStandData->style?->slug , 'assembly' => $worktopsAndUpStandData->assembly?->slug, 'colour' => $worktopsAndUpStandData->colour?->slug])}}">View All</a></span></label>
                                            <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="worktopandupstands-section">
                                                @foreach ($worktopsAndUpStands as $index => $worktopsAndUpStand)
                                                <option class="fw-bold" value="{{$worktopsAndUpStand->id }}" data-product-short-title="{{ $worktopsAndUpStand->short_title }}" data-product-fullname="{{ $worktopsAndUpStand->full_title }}" data-product-image="{{ !empty($worktopsAndUpStand->image_path) ? asset('imgs/products/'.$worktopsAndUpStand->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $worktopsAndUpStand->price }}" data-product-parent-category-slug="{{ $worktopsAndUpStand->ParentCategory?->slug }}" data-product-discountedprice="{{ $worktopsAndUpStand->discounted_price }}" data-product-assembly-name="{{ $worktopsAndUpStand->assembly?->name }}" data-product-discountedpercentage="{{ $worktopsAndUpStand->discounted_percentage ?? 0 }}" data-product-code="{{ $worktopsAndUpStand->product_code }}" data-product-dimensions="{{ $worktopsAndUpStand->dimensions }}" data-product-style="{{ $worktopsAndUpStand->style?->name }}" data-product-colour="{{ $worktopsAndUpStand->colour?->trade_colour ? $worktopsAndUpStand->colour?->trade_colour : $worktopsAndUpStand->colour?->name }}" data-product-id="{{ $worktopsAndUpStand->id }}">{{ $worktopsAndUpStand->full_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 worktopandupstands-section order-sm-2 order-xs-2 mt-4">
                                            <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                                <div class="bg-warning card-header px-0 py-0">
                                                    <div class="py-2 text-center product-short-title-container w-100">
                                                        <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                            {{ $worktopsAndUpStandData->short_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="modal fade" id="productModal{{ $worktopsAndUpStandData->id }}" tabindex="-1"
                                                        aria-labelledby="productModalLabel{{ $worktopsAndUpStandData->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                                <div class="modal-header border-bottom border-light">
                                                                    <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                        {{ $worktopsAndUpStandData->full_title }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                                <img src="{{ !empty($worktopsAndUpStandData->image_path) ? asset('imgs/products/'.$worktopsAndUpStandData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid product-image" style="height: 300px;" />
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                                <div>
                                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                    <ul style="list-style: none; padding: 0">
                                                                                        @if ($worktopsAndUpStandData->style)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                                {{ $worktopsAndUpStandData->style->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($worktopsAndUpStandData->assembly)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                                {{ $worktopsAndUpStandData->assembly->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($worktopsAndUpStandData->colour)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                                {{ $worktopsAndUpStandData->colour->trade_colour ? $worktopsAndUpStandData->colour->trade_colour : $worktopsAndUpStandData->colour->name }}
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
                                                                                                {{ intval($worktopsAndUpStandData->height) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                                {{ intval($worktopsAndUpStandData->width) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                                {{ intval($worktopsAndUpStandData->depth) }}mm
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
                                                                                            @if ($worktopsAndUpStandData->category?->description)
                                                                                            {!! $worktopsAndUpStandData->category->description !!}
                                                                                            @elseif ($worktopsAndUpStandData->category?->parentCategory?->description)
                                                                                            {!! $worktopsAndUpStandData->category->parentCategory->description !!}
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
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                                <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                    <img class="product-image px-0"
                                                                        style="margin-bottom: 0px !important;object-fit:contain"
                                                                        src="{{ !empty($worktopsAndUpStandData->image_path) ? asset('imgs/products/'.$worktopsAndUpStandData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                        alt="Card image cap" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal{{ $worktopsAndUpStandData->id }}">
                                                                </figure>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Product Code</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsAndUpStandData->product_code }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Dimensions</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsAndUpStandData->dimensions }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @if ($worktopsAndUpStandData->style)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Style</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsAndUpStandData->style->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($worktopsAndUpStandData->colour)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Colour</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsAndUpStandData->colour->trade_colour ? $worktopsAndUpStandData->colour->trade_colour : $worktopsAndUpStandData->colour->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($worktopsAndUpStandData->assembly)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Assembly</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $worktopsAndUpStandData->assembly->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="row justify-content-center border-top border-default">
                                                                    <div class="col-12">
                                                                        <p class="fs-5 fw-bold text-dark">
                                                                            {{ $worktopsAndUpStandData->price == 0 ? 'Out of Stock' : '£' . $worktopsAndUpStandData->price }}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 d-flex justify-content-center product-counter">
                                                                        <input id="minus{{ $worktopsAndUpStandData->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $worktopsAndUpStandData->id }}', '{{ $worktopsAndUpStandData->product_code }}', '{{ $worktopsAndUpStandData->full_title }}', {{ $worktopsAndUpStandData->price }}, {{ $worktopsAndUpStandData->discounted_price }}, {{ $worktopsAndUpStandData->discounted_percentage ?? 0 }}, '{{ $worktopsAndUpStandData->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $worktopsAndUpStandData->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0" name="quantity"
                                                                            disabled />
                                                                        <input id="plus{{ $worktopsAndUpStandData->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+" type="number"
                                                                            max="10"
                                                                            {{$worktopsAndUpStandData->price == 0 ? 'disabled' : '' }} 
                                                                            onclick="increaseQuantity('{{ $worktopsAndUpStandData->id }}', '{{ $worktopsAndUpStandData->product_code }}', '{{ $worktopsAndUpStandData->full_title }}', {{ $worktopsAndUpStandData->price }}, {{ $worktopsAndUpStandData->discounted_price }}, {{ $worktopsAndUpStandData->discounted_percentage ?? 0 }}, '{{ $worktopsAndUpStandData->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <p class="">No Worktops and Upstands available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Breakfast Bars --}}
                            <div class="tab-pane fade active" id="nav-breakfast" role="tabpanel"
                                aria-labelledby="nav-breakfast-tab" tabindex="0">
                                <div class="row">
                                    @if ($breakfastBars->count() > 0)
                                        @php 
                                            $breakfastBarData = $breakfastBars->first();
                                        @endphp

                                        <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                            <label for="" class="fw-bold d-flex justify-content-between"><span>ALL BREAKFAST BARS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $breakfastBarData->style?->slug , 'assembly' => $breakfastBarData->assembly?->slug, 'colour' => $breakfastBarData->colour?->slug])}}">View All</a></span></label>
                                            <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="breakfastbars-section">
                                                @foreach ($breakfastBars as $index => $breakfastBar)
                                                <option class="fw-bold" value="{{$breakfastBar->id }}" data-product-short-title="{{ $breakfastBar->short_title }}" data-product-fullname="{{ $breakfastBar->full_title }}" data-product-image="{{ !empty($breakfastBar->image_path) ? asset('imgs/products/'.$breakfastBar->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $breakfastBar->price }}" data-product-parent-category-slug="{{ $breakfastBar->ParentCategory?->slug }}" data-product-discountedprice="{{ $breakfastBar->discounted_price }}" data-product-assembly-name="{{ $breakfastBar->assembly?->name }}" data-product-discountedpercentage="{{ $breakfastBar->discounted_percentage ?? 0 }}" data-product-code="{{ $breakfastBar->product_code }}" data-product-dimensions="{{ $breakfastBar->dimensions }}" data-product-style="{{ $breakfastBar->style?->name }}" data-product-colour="{{ $breakfastBar->colour?->trade_colour ? $breakfastBar->colour?->trade_colour : $breakfastBar->colour?->name }}" data-product-id="{{ $breakfastBar->id }}">{{ $breakfastBar->full_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 breakfastbars-section order-sm-2 order-xs-2 mt-4">
                                            <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                                <div class="bg-warning card-header px-0 py-0">
                                                    <div class="py-2 text-center product-short-title-container w-100">
                                                        <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                            {{ $breakfastBarData->short_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="modal fade" id="productModal{{ $breakfastBarData->id }}" tabindex="-1"
                                                        aria-labelledby="productModalLabel{{ $breakfastBarData->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                                <div class="modal-header border-bottom border-light">
                                                                    <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                        {{ $breakfastBarData->full_title }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                                <img src="{{ !empty($breakfastBarData->image_path) ? asset('imgs/products/'.$breakfastBarData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid product-image" style="height: 300px;" />
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                                <div>
                                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                    <ul style="list-style: none; padding: 0">
                                                                                        @if ($breakfastBarData->style)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                                {{ $breakfastBarData->style->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($breakfastBarData->assembly)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                                {{ $breakfastBarData->assembly->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($breakfastBarData->colour)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                                {{ $breakfastBarData->colour->trade_colour ? $breakfastBarData->colour->trade_colour : $breakfastBarData->colour->name }}
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
                                                                                                {{ intval($breakfastBarData->height) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                                {{ intval($breakfastBarData->width) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                                {{ intval($breakfastBarData->depth) }}mm
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
                                                                                            @if ($breakfastBarData->category?->description)
                                                                                            {!! $breakfastBarData->category->description !!}
                                                                                            @elseif ($breakfastBarData->category?->parentCategory?->description)
                                                                                            {!! $breakfastBarData->category->parentCategory->description !!}
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
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                                <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                    <img class="product-image px-0"
                                                                        style="margin-bottom: 0px !important;object-fit:contain"
                                                                        src="{{ !empty($breakfastBarData->image_path) ? asset('imgs/products/'.$breakfastBarData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                        alt="Card image cap" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal{{ $breakfastBarData->id }}">
                                                                </figure>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Product Code</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $breakfastBarData->product_code }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Dimensions</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $breakfastBarData->dimensions }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @if ($breakfastBarData->style)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Style</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $breakfastBarData->style->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($breakfastBarData->colour)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Colour</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $breakfastBarData->colour->trade_colour ? $breakfastBarData->colour->trade_colour : $breakfastBarData->colour->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($breakfastBarData->assembly)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Assembly</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $breakfastBarData->assembly->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="row justify-content-center border-top border-default">
                                                                    <div class="col-12">
                                                                        <p class="fs-5 fw-bold text-dark">
                                                                            {{ $breakfastBarData->price == 0 ? 'Out of Stock' : '£' . $breakfastBarData->price }}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 d-flex justify-content-center product-counter">
                                                                        <input id="minus{{ $breakfastBarData->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $breakfastBarData->id }}', '{{ $breakfastBarData->product_code }}', '{{ $breakfastBarData->full_title }}', {{ $breakfastBarData->price }}, {{ $breakfastBarData->discounted_price }}, {{ $breakfastBarData->discounted_percentage ?? 0 }}, '{{ $breakfastBarData->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $breakfastBarData->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0" name="quantity"
                                                                            disabled />
                                                                        <input id="plus{{ $breakfastBarData->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+" type="number"
                                                                            max="10"
                                                                            {{$breakfastBarData->price == 0 ? 'disabled' : '' }} 
                                                                            onclick="increaseQuantity('{{ $breakfastBarData->id }}', '{{ $breakfastBarData->product_code }}', '{{ $breakfastBarData->full_title }}', {{ $breakfastBarData->price }}, {{ $breakfastBarData->discounted_price }}, {{ $breakfastBarData->discounted_percentage ?? 0 }}, '{{ $breakfastBarData->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <p class="">No Breakfast Bars available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Edging Doors --}}
                            <div class="tab-pane fade active" id="nav-edging" role="tabpanel"
                                aria-labelledby="nav-edging-tab" tabindex="0">
                                <div class="row">
                                    @if ($edgings->count() > 0)
                                        @php 
                                            $edgingData = $edgings->first();
                                        @endphp

                                        <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                            <label for="" class="fw-bold d-flex justify-content-between"><span>ALL EDGINGS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $edgingData->style?->slug , 'assembly' => $edgingData->assembly?->slug, 'colour' => $edgingData->colour?->slug])}}">View All</a></span></label>
                                            <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="edgings-section">
                                                @foreach ($$edgings as $index => $edging)
                                                <option class="fw-bold" value="{{$edging->id }}" data-product-short-title="{{ $edging->short_title }}" data-product-fullname="{{ $edging->full_title }}" data-product-image="{{ !empty($edging->image_path) ? asset('imgs/products/'.$edging->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $edging->price }}" data-product-parent-category-slug="{{ $edging->ParentCategory?->slug }}" data-product-discountedprice="{{ $edging->discounted_price }}" data-product-assembly-name="{{ $edging->assembly?->name }}" data-product-discountedpercentage="{{ $edging->discounted_percentage ?? 0 }}" data-product-code="{{ $edging->product_code }}" data-product-dimensions="{{ $edging->dimensions }}" data-product-style="{{ $edging->style?->name }}" data-product-colour="{{ $edging->colour?->trade_colour ? $edging->colour?->trade_colour : $edging->colour?->name }}" data-product-id="{{ $edging->id }}">{{ $edging->full_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 edgings-section order-sm-2 order-xs-2 mt-4">
                                            <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                                <div class="bg-warning card-header px-0 py-0">
                                                    <div class="py-2 text-center product-short-title-container w-100">
                                                        <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                            {{ $edgingData->short_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="modal fade" id="productModal{{ $edgingData->id }}" tabindex="-1"
                                                        aria-labelledby="productModalLabel{{ $edgingData->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                                <div class="modal-header border-bottom border-light">
                                                                    <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                        {{ $edgingData->full_title }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                                <img src="{{ !empty($edgingData->image_path) ? asset('imgs/products/'.$edgingData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid product-image" style="height: 300px;" />
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                                <div>
                                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                    <ul style="list-style: none; padding: 0">
                                                                                        @if ($edgingData->style)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                                {{ $edgingData->style->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($edgingData->assembly)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                                {{ $edgingData->assembly->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($edgingData->colour)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                                {{ $edgingData->colour->trade_colour ? $edgingData->colour->trade_colour : $edgingData->colour->name }}
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
                                                                                                {{ intval($edgingData->height) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                                {{ intval($edgingData->width) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                                {{ intval($edgingData->depth) }}mm
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
                                                                                            @if ($edgingData->category?->description)
                                                                                            {!! $edgingData->category->description !!}
                                                                                            @elseif ($edgingData->category?->parentCategory?->description)
                                                                                            {!! $edgingData->category->parentCategory->description !!}
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
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                                <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                    <img class="product-image px-0"
                                                                        style="margin-bottom: 0px !important;object-fit:contain"
                                                                        src="{{ !empty($edgingData->image_path) ? asset('imgs/products/'.$edgingData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                        alt="Card image cap" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal{{ $edgingData->id }}">
                                                                </figure>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Product Code</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $edgingData->product_code }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Dimensions</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $edgingData->dimensions }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @if ($edgingData->style)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Style</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $edgingData->style->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($edgingData->colour)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Colour</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $edgingData->colour->trade_colour ? $edgingData->colour->trade_colour : $edgingData->colour->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($edgingData->assembly)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Assembly</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $edgingData->assembly->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="row justify-content-center border-top border-default">
                                                                    <div class="col-12">
                                                                        <p class="fs-5 fw-bold text-dark">
                                                                            {{ $edgingData->price == 0 ? 'Out of Stock' : '£' . $edgingData->price }}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 d-flex justify-content-center product-counter">
                                                                        <input id="minus{{ $edgingData->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $edgingData->id }}', '{{ $edgingData->product_code }}', '{{ $edgingData->full_title }}', {{ $edgingData->price }}, {{ $edgingData->discounted_price }}, {{ $edgingData->discounted_percentage ?? 0 }}, '{{ $edgingData->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $edgingData->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0" name="quantity"
                                                                            disabled />
                                                                        <input id="plus{{ $edgingData->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+" type="number"
                                                                            max="10"
                                                                            {{$edgingData->price == 0 ? 'disabled' : '' }} 
                                                                            onclick="increaseQuantity('{{ $edgingData->id }}', '{{ $edgingData->product_code }}', '{{ $edgingData->full_title }}', {{ $edgingData->price }}, {{ $edgingData->discounted_price }}, {{ $edgingData->discounted_percentage ?? 0 }}, '{{ $edgingData->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <p class="">No Edgings available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse-wrapper my-4">
                    <a class="fw-semibold text-dark text-uppercase collapse-heading" data-bs-toggle="collapse"
                        href="#sinkstaps" role="button" aria-expanded="false" aria-controls="sinkstaps">
                        <span
                            class="bg-dark text-white fw-semibold py-2 px-2 text-center me-2 collapse-heading-number">5</span>
                        Sinks and Taps
                    </a>
                    <div class="collapse-container collapse mt-3" id="sinkstaps">
                        <nav>
                            <div class="nav nav-tabs custom-nav" style="" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-sinks-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-sinks" type="button" role="tab"
                                    aria-controls="nav-sinks" aria-selected="true">Sinks</button>
                                <button class="nav-link" id="nav-taps-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-taps" type="button" role="tab"
                                    aria-controls="nav-taps" aria-selected="false">Taps</button>
                            </div>
                        </nav>
                        <div class="tab-content p-3" style="border: 1px solid black !important" id="nav-tabContent">
                            {{-- Sinks --}}
                            <div class="tab-pane fade show active" id="nav-sinks" role="tabpanel"
                                aria-labelledby="nav-sinks-tab" tabindex="0">
                                <div class="row">
                                    @if ($sinks->count() > 0)
                                        @php 
                                            $sinkData = $sinks->first();
                                        @endphp

                                        <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                            <label for="" class="fw-bold d-flex justify-content-between"><span>ALL WORKTOPS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $sinkData->style?->slug , 'assembly' => $sinkData->assembly?->slug, 'colour' => $sinkData->colour?->slug])}}">View All</a></span></label>
                                            <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="sinks-section">
                                                @foreach ($sinks as $index => $sink)
                                                <option class="fw-bold" value="{{$sink->id }}" data-product-short-title="{{ $sink->short_title }}" data-product-fullname="{{ $sink->full_title }}" data-product-image="{{ !empty($sink->image_path) ? asset('imgs/products/'.$sink->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $sink->price }}" data-product-parent-category-slug="{{ $sink->ParentCategory?->slug }}" data-product-discountedprice="{{ $sink->discounted_price }}" data-product-assembly-name="{{ $sink->assembly?->name }}" data-product-discountedpercentage="{{ $sink->discounted_percentage ?? 0 }}" data-product-code="{{ $sink->product_code }}" data-product-dimensions="{{ $sink->dimensions }}" data-product-style="{{ $sink->style?->name }}" data-product-colour="{{ $sink->colour?->trade_colour ? $sink->colour?->trade_colour : $sink->colour?->name }}" data-product-id="{{ $sink->id }}">{{ $sink->full_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 sinks-section order-sm-2 order-xs-2 mt-4">
                                            <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                                <div class="bg-warning card-header px-0 py-0">
                                                    <div class="py-2 text-center product-short-title-container w-100">
                                                        <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                            {{ $sinkData->short_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="modal fade" id="productModal{{ $sinkData->id }}" tabindex="-1"
                                                        aria-labelledby="productModalLabel{{ $sinkData->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                                <div class="modal-header border-bottom border-light">
                                                                    <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                        {{ $sinkData->full_title }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                                <img src="{{ !empty($sinkData->image_path) ? asset('imgs/products/'.$sinkData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid product-image" style="height: 300px;" />
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                                <div>
                                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                    <ul style="list-style: none; padding: 0">
                                                                                        @if ($sinkData->style)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                                {{ $sinkData->style->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($sinkData->assembly)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                                {{ $sinkData->assembly->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($sinkData->colour)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                                {{ $sinkData->colour->trade_colour ? $sinkData->colour->trade_colour : $sinkData->colour->name }}
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
                                                                                                {{ intval($sinkData->height) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                                {{ intval($sinkData->width) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                                {{ intval($sinkData->depth) }}mm
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
                                                                                            @if ($sinkData->category?->description)
                                                                                            {!! $sinkData->category->description !!}
                                                                                            @elseif ($sinkData->category?->parentCategory?->description)
                                                                                            {!! $sinkData->category->parentCategory->description !!}
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
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                                <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                    <img class="product-image px-0"
                                                                        style="margin-bottom: 0px !important;object-fit:contain"
                                                                        src="{{ !empty($sinkData->image_path) ? asset('imgs/products/'.$sinkData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                        alt="Card image cap" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal{{ $sinkData->id }}">
                                                                </figure>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Product Code</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $sinkData->product_code }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Dimensions</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $sinkData->dimensions }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @if ($sinkData->style)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Style</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $sinkData->style->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($sinkData->colour)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Colour</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $sinkData->colour->trade_colour ? $sinkData->colour->trade_colour : $sinkData->colour->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($sinkData->assembly)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Assembly</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $sinkData->assembly->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="row justify-content-center border-top border-default">
                                                                    <div class="col-12">
                                                                        <p class="fs-5 fw-bold text-dark">
                                                                            {{ $sinkData->price == 0 ? 'Out of Stock' : '£' . $sinkData->price }}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 d-flex justify-content-center product-counter">
                                                                        <input id="minus{{ $sinkData->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $sinkData->id }}', '{{ $sinkData->product_code }}', '{{ $sinkData->full_title }}', {{ $sinkData->price }}, {{ $sinkData->discounted_price }}, {{ $sinkData->discounted_percentage ?? 0 }}, '{{ $sinkData->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $sinkData->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0" name="quantity"
                                                                            disabled />
                                                                        <input id="plus{{ $sinkData->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+" type="number"
                                                                            max="10"
                                                                            {{$sinkData->price == 0 ? 'disabled' : '' }} 
                                                                            onclick="increaseQuantity('{{ $sinkData->id }}', '{{ $sinkData->product_code }}', '{{ $sinkData->full_title }}', {{ $sinkData->price }}, {{ $sinkData->discounted_price }}, {{ $sinkData->discounted_percentage ?? 0 }}, '{{ $sinkData->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <p class="">No Sinks available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- Taps --}}
                            <div class="tab-pane fade active" id="nav-taps" role="tabpanel"
                                aria-labelledby="nav-taps-tab" tabindex="0">
                                <div class="row">
                                    @if ($taps->count() > 0)
                                        @php 
                                            $tapsData = $taps->first();
                                        @endphp

                                        <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                            <label for="" class="fw-bold d-flex justify-content-between"><span>ALL TAPS</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $tapsData->style?->slug , 'assembly' => $tapsData->assembly?->slug, 'colour' => $tapsData->colour?->slug])}}">View All</a></span></label>
                                            <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="taps-section">
                                                @foreach ($taps as $index => $tap)
                                                <option class="fw-bold" value="{{$tap->id }}" data-product-short-title="{{ $tap->short_title }}" data-product-fullname="{{ $tap->full_title }}" data-product-image="{{ !empty($tap->image_path) ? asset('imgs/products/'.$tap->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $tap->price }}" data-product-parent-category-slug="{{ $tap->ParentCategory?->slug }}" data-product-discountedprice="{{ $tap->discounted_price }}" data-product-assembly-name="{{ $tap->assembly?->name }}" data-product-discountedpercentage="{{ $tap->discounted_percentage ?? 0 }}" data-product-code="{{ $tap->product_code }}" data-product-dimensions="{{ $tap->dimensions }}" data-product-style="{{ $tap->style?->name }}" data-product-colour="{{ $tap->colour?->trade_colour ? $tap->colour?->trade_colour : $tap->colour?->name }}" data-product-id="{{ $tap->id }}">{{ $tap->full_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 taps-section order-sm-2 order-xs-2 mt-4">
                                            <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                                <div class="bg-warning card-header px-0 py-0">
                                                    <div class="py-2 text-center product-short-title-container w-100">
                                                        <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                            {{ $tapsData->short_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="modal fade" id="productModal{{ $tapsData->id }}" tabindex="-1"
                                                        aria-labelledby="productModalLabel{{ $tapsData->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                                <div class="modal-header border-bottom border-light">
                                                                    <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                        {{ $tapsData->full_title }}
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                                <img src="{{ !empty($tapsData->image_path) ? asset('imgs/products/'.$tapsData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                                    class="img-fluid product-image" style="height: 300px;" />
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                                <div>
                                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                                    <ul style="list-style: none; padding: 0">
                                                                                        @if ($tapsData->style)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                                {{ $tapsData->style->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($tapsData->assembly)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                                {{ $tapsData->assembly->name }}
                                                                                            </p>
                                                                                        </li>
                                                                                        @endif
                                                                                        @if ($tapsData->colour)
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                                {{ $tapsData->colour->trade_colour ? $tapsData->colour->trade_colour : $tapsData->colour->name }}
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
                                                                                                {{ intval($tapsData->height) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                                {{ intval($tapsData->width) }}mm
                                                                                            </p>
                                                                                        </li>
                                                                                        <li>
                                                                                            <p class="mb-0">
                                                                                                <small
                                                                                                    class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                                {{ intval($tapsData->depth) }}mm
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
                                                                                            @if ($tapsData->category?->description)
                                                                                            {!! $tapsData->category->description !!}
                                                                                            @elseif ($tapsData->category?->parentCategory?->description)
                                                                                            {!! $tapsData->category->parentCategory->description !!}
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
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                                <figure class="my-0" style="margin-bottom: 0px !important;">
                                                                    <img class="product-image px-0"
                                                                        style="margin-bottom: 0px !important;object-fit:contain"
                                                                        src="{{ !empty($tapsData->image_path) ? asset('imgs/products/'.$tapsData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                        alt="Card image cap" data-bs-toggle="modal"
                                                                        data-bs-target="#productModal{{ $tapsData->id }}">
                                                                </figure>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Product Code</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $tapsData->product_code }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Dimensions</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $tapsData->dimensions }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @if ($tapsData->style)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Style</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $tapsData->style->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($tapsData->colour)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Colour</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $tapsData->colour->trade_colour ? $tapsData->colour->trade_colour : $tapsData->colour->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($tapsData->assembly)
                                                                    <div class="row">
                                                                        <div class="col-4 p-0 d-md-flex d-none">
                                                                            <p
                                                                                class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                                <small class="fw-bold">Assembly</small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                            <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                                <small>{{ $tapsData->assembly->name }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="row justify-content-center border-top border-default">
                                                                    <div class="col-12">
                                                                        <p class="fs-5 fw-bold text-dark">
                                                                            {{ $tapsData->price == 0 ? 'Out of Stock' : '£' . $tapsData->price }}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 d-flex justify-content-center product-counter">
                                                                        <input id="minus{{ $tapsData->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $tapsData->id }}', '{{ $tapsData->product_code }}', '{{ $tapsData->full_title }}', {{ $tapsData->price }}, {{ $tapsData->discounted_price }}, {{ $tapsData->discounted_percentage ?? 0 }}, '{{ $tapsData->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $tapsData->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0" name="quantity"
                                                                            disabled />
                                                                        <input id="plus{{ $tapsData->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+" type="number"
                                                                            max="10"
                                                                            {{$tapsData->price == 0 ? 'disabled' : '' }} 
                                                                            onclick="increaseQuantity('{{ $tapsData->id }}', '{{ $tapsData->product_code }}', '{{ $tapsData->full_title }}', {{ $tapsData->price }}, {{ $tapsData->discounted_price }}, {{ $tapsData->discounted_percentage ?? 0 }}, '{{ $tapsData->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <p class="">No Taps available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse-wrapper my-4">
                    <a class="fw-semibold text-dark text-uppercase collapse-heading" data-bs-toggle="collapse"
                        href="#appliances" role="button" aria-expanded="false" aria-controls="appliances">
                        <span
                            class="bg-dark text-white fw-semibold py-2 px-2 text-center me-2 collapse-heading-number">6</span>Appliances
                    </a>
                    <div class="collapse-container collapse mt-3" id="appliances">
                        <div class="row">
                            @if ($appliances->count() > 0)
                                @php 
                                    $applianceData = $appliances->first();
                                @endphp

                                <div class="col-lg-12 col-md-12 col-sm-12 order-sm-1 order-xs-1">
                                    <label for="" class="fw-bold d-flex justify-content-between"><span>ALL APPLIANCES</span><span><a href="{{route('viewallorderwardrobebycolour', ['style' => $applianceData->style?->slug , 'assembly' => $applianceData->assembly?->slug, 'colour' => $applianceData->colour?->slug])}}">View All</a></span></label>
                                    <select class="form-control order-component-dropdown select-2 fw-bold" data-dropdown-type="sinks-section">
                                        @foreach ($appliances as $index => $appliance)
                                        <option class="fw-bold" value="{{$appliance->id }}" data-product-short-title="{{ $appliance->short_title }}" data-product-fullname="{{ $appliance->full_title }}" data-product-image="{{ !empty($appliance->image_path) ? asset('imgs/products/'.$appliance->image_path) : asset('images/no-image-available.jpg') }}" data-product-price="{{ $appliance->price }}" data-product-parent-category-slug="{{ $appliance->ParentCategory?->slug }}" data-product-discountedprice="{{ $appliance->discounted_price }}" data-product-assembly-name="{{ $appliance->assembly?->name }}" data-product-discountedpercentage="{{ $appliance->discounted_percentage ?? 0 }}" data-product-code="{{ $appliance->product_code }}" data-product-dimensions="{{ $appliance->dimensions }}" data-product-style="{{ $appliance->style?->name }}" data-product-colour="{{ $appliance->colour?->trade_colour ? $appliance->colour?->trade_colour : $appliance->colour?->name }}" data-product-id="{{ $appliance->id }}">{{ $appliance->full_title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 sinks-section order-sm-2 order-xs-2 mt-4">
                                    <div class="card bg-light p-0 border border-warning" style="border-radius: 0; border: none">
                                        <div class="bg-warning card-header px-0 py-0">
                                            <div class="py-2 text-center product-short-title-container w-100">
                                                <a href="#" class="product-short-title fw-bold text-decoration-underline fs-4">
                                                    {{ $applianceData->short_title }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="modal fade" id="productModal{{ $applianceData->id }}" tabindex="-1"
                                                aria-labelledby="productModalLabel{{ $applianceData->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">
                                                        <div class="modal-header border-bottom border-light">
                                                            <h1 class="fs-5 fw-bold text-dark border-bottom border-dark">
                                                                {{ $applianceData->full_title }}
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">
                                                                        <img src="{{ !empty($applianceData->image_path) ? asset('imgs/products/'.$applianceData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                            class="img-fluid product-image" style="height: 300px;" />
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-4 text-start text-dark">
                                                                        <div>
                                                                            <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                            <ul style="list-style: none; padding: 0">
                                                                                @if ($applianceData->style)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Style:</small>
                                                                                        {{ $applianceData->style->name }}
                                                                                    </p>
                                                                                </li>
                                                                                @endif
                                                                                @if ($applianceData->assembly)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Assembly:</small>
                                                                                        {{ $applianceData->assembly->name }}
                                                                                    </p>
                                                                                </li>
                                                                                @endif
                                                                                @if ($applianceData->colour)
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">Colour:</small>
                                                                                        {{ $applianceData->colour->trade_colour ? $applianceData->colour->trade_colour : $applianceData->colour->name }}
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
                                                                                        {{ intval($applianceData->height) }}mm
                                                                                    </p>
                                                                                </li>
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">WIDTH:</small>
                                                                                        {{ intval($applianceData->width) }}mm
                                                                                    </p>
                                                                                </li>
                                                                                <li>
                                                                                    <p class="mb-0">
                                                                                        <small
                                                                                            class="fw-bold text-uppercase text-dark">DEPTH:</small>
                                                                                        {{ intval($applianceData->depth) }}mm
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
                                                                                    @if ($applianceData->category?->description)
                                                                                    {!! $applianceData->category->description !!}
                                                                                    @elseif ($applianceData->category?->parentCategory?->description)
                                                                                    {!! $applianceData->category->parentCategory->description !!}
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
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-0">
                                                        <figure class="my-0" style="margin-bottom: 0px !important;">
                                                            <img class="product-image px-0"
                                                                style="margin-bottom: 0px !important;object-fit:contain"
                                                                src="{{ !empty($applianceData->image_path) ? asset('imgs/products/'.$applianceData->image_path) : asset('images/no-image-available.jpg') }}"
                                                                alt="Card image cap" data-bs-toggle="modal"
                                                                data-bs-target="#productModal{{ $applianceData->id }}">
                                                        </figure>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 border border-default">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Product Code</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $applianceData->product_code }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Dimensions</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $applianceData->dimensions }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @if ($applianceData->style)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Style</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $applianceData->style->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($applianceData->colour)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Colour</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $applianceData->colour->trade_colour ? $applianceData->colour->trade_colour : $applianceData->colour->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if ($applianceData->assembly)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-dark text-uppercase m-0 pt-1">
                                                                        <small class="fw-bold">Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2 text-dark">
                                                                        <small>{{ $applianceData->assembly->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="row justify-content-center border-top border-default">
                                                            <div class="col-12">
                                                                <p class="fs-5 fw-bold text-dark">
                                                                    {{ $applianceData->price == 0 ? 'Out of Stock' : '£' . $applianceData->price }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="col-12 d-flex justify-content-center product-counter">
                                                                <input id="minus{{ $applianceData->id }}"
                                                                    class="minus border bg-dark text-light p-0"
                                                                    type="button" value="-"
                                                                    onclick="decreaseQuantity('{{ $applianceData->id }}', '{{ $applianceData->product_code }}', '{{ $applianceData->full_title }}', {{ $applianceData->price }}, {{ $applianceData->discounted_price }}, {{ $applianceData->discounted_percentage ?? 0 }}, '{{ $applianceData->ParentCategory->slug }}')" />
                                                                <input id="quantity{{ $applianceData->id }}"
                                                                    class="quantity border border-black text-center"
                                                                    type="text" value="0" name="quantity"
                                                                    disabled />
                                                                <input id="plus{{ $applianceData->id }}"
                                                                    class="plus border bg-dark text-light p-0"
                                                                    type="button" value="+" type="number"
                                                                    max="10"
                                                                    {{$applianceData->price == 0 ? 'disabled' : '' }} 
                                                                    onclick="increaseQuantity('{{ $applianceData->id }}', '{{ $applianceData->product_code }}', '{{ $applianceData->full_title }}', {{ $applianceData->price }}, {{ $applianceData->discounted_price }}, {{ $applianceData->discounted_percentage ?? 0 }}, '{{ $applianceData->ParentCategory->slug }}')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @else
                                <div class="col-12">
                                    <p class="">No Appliances available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 p-4">
                <div class="container">
                    <div class="row bg-dark">
                        <div class="col-lg-12 px-4 py-3">
                            <div class="row border-bottom text-white">
                                <h5 class="fw-bold text-white">Order Overview</h5>
                            </div>
                            <div class="row text-white pt-2">
                                <h6 class="text-white fw-bold">Style: <span
                                        class="fw-normal">{{ $style->name }}</span></h6>
                                <h6 class="text-white fw-bold">Assembly: <span
                                        class="fw-normal">{{ $assembly->name }}</span></h6>
                                <h6 class="text-white fw-bold">Colour: <span
                                        class="fw-normal">{{ $colour->trade_colour ? $colour->trade_colour : $colour->name }}</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-dark mt-2">
                        <div class="col-lg-12 px-4 py-3">
                            <div class="row border-bottom text-white">
                                <h5 class="fw-bold text-white">Items</h5>
                            </div>
                            <div class="row text-white pt-1" id="orderWardrobeCartItemsList">

                            </div>
                        </div>
                    </div>
                    <div class="row bg-dark mt-2">
                        <div class="col-lg-12 px-4 py-3">
                            <div class="row border-bottom text-white">
                                <h5 class="fw-bold text-white">Wardrobe Price</h5>
                            </div>
                            <div class="row text-white ">
                                <h2 class="text-white fw-bold py-2 m-0" id="cartTotalAmount_side">

                                </h2>
                                <small class="text-white">Price includes delivery costs.</small>
                                <small class="text-white">Surcharges may apply.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>