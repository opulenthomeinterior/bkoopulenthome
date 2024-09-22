<x-guest-layout>
    <div class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('orderkitchen') }}" class="text-uppercase">Order
                        Kitchen</a></li>
            </ol>
        </nav>
        <h1 class="fs-1 fw-bolder text-dark mb-lg-5 mb-5"></h1>
        <h1 class="fs-4 fw-bolder text-dark">SLAB STANDARD WHITE RIGID KITCHEN </h1>

        <div class="row">
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
                                <button class="nav-link" id="nav-appliance-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-appliance" type="button" role="tab"
                                    aria-controls="nav-appliance" aria-selected="false">Panels & Appliance
                                    Doors</button>
                            </div>
                        </nav>
                        <div class="tab-content p-3" style="border: 1px solid black !important" id="nav-tabContent">

                            {{-- Base Cabinets --}}
                            <div class="tab-pane fade show active" id="baseCabinet-tab" role="tabpanel"
                                aria-labelledby="nav-baseCabinet-tab" tabindex="0">
                                <div class="row">
                                    @if ($baseCabinets->count() > 0)
                                        @foreach ($baseCabinets as $index => $baseCabinet)
                                            <div class="col-lg-4 col-6 mb-3">
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
                                                                                    <img src="{{ $baseCabinet->image_path }}"
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
                                                                    src="{{ $baseCabinet->image_path ? $baseCabinet->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $baseCabinet->short_title }}
                                                                </a>
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
                                                                            onclick="increaseQuantity('{{ $baseCabinet->id }}', '{{ $baseCabinet->product_code }}', '{{ $baseCabinet->full_title }}', {{ $baseCabinet->price }}, {{ $baseCabinet->discounted_price }}, {{ $baseCabinet->discounted_percentage ?? 0 }}, '{{ $baseCabinet->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                                <p class="fs-5 fw-bold mt-lg-2">
                                                                    {{ $baseCabinet->price == 0 ? 'Out of Stock' : '£' . $baseCabinet->price }}
                                                                </p>
                                                                <div class="container-fluid">
                                                                    @if ($baseCabinet->style)
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
                                                                    @if ($baseCabinet->colour)
                                                                        <div class="row">
                                                                            <div class="col-4 p-0 d-md-flex d-none">
                                                                                <p
                                                                                    class="category-text text-start text-uppercase m-0 pt-1">
                                                                                    <small>Color</small>
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
                                                                    @if ($baseCabinet->assembly)
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
                                            </div>
                                        @endforeach
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
                                            <div class="col-lg-4 col-6 mb-3">
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
                                                                                    <img src="{{ $wallCabinet->image_path }}"
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
                                                                    src="{{ $wallCabinet->image_path ? $wallCabinet->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $wallCabinet->short_title }}
                                                                </a>
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
                                                                                    <small>Color</small>
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
                                            </div>
                                        @endforeach
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
                                            <div class="col-lg-4 col-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <!-- Button trigger modal -->
                                                        <a class="modal-icon z-3" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#tallCabinets{{ $index }}">
                                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="tallCabinets{{ $index }}"
                                                            tabindex="-1"
                                                            aria-labelledby="tallCabinetsLabel{{ $index }}"
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
                                                                                    <img src="{{ $tallCabinet->image_path }}"
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
                                                                    src="{{ $tallCabinet->image_path ? $tallCabinet->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $tallCabinet->short_title }}
                                                                </a>
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
                                                                                    <small>Color</small>
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
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p class="">No Tall Cabinets available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Panels & Appliance Doors --}}
                            <div class="tab-pane fade" id="nav-appliance" role="tabpanel"
                                aria-labelledby="nav-appliance-tab" tabindex="0">
                                <div class="row">
                                    @if ($panels->count() > 0)
                                        @foreach ($panels as $index => $panel)
                                            <div class="col-lg-4 col-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <!-- Button trigger modal -->
                                                        <a class="modal-icon z-3" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#panels{{ $index }}">
                                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="panels{{ $index }}"
                                                            tabindex="-1"
                                                            aria-labelledby="panelsLabel{{ $index }}"
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
                                                                                    <img src="{{ $panel->image_path }}"
                                                                                        class="img-fluid" />
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-7 col-12 text-start">
                                                                                    <h1 class="fs-5 fw-bold">
                                                                                        {{ $panel->full_title }}
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
                                                                    src="{{ $panel->image_path ? $panel->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $panel->short_title }}
                                                                </a>
                                                                <p class="py-lg-3 py-2">
                                                                    <small
                                                                        class="fw-bold text-center">{{ $panel->dimensions }}</small>
                                                                </p>
                                                                <div class="container-fluid">
                                                                    <div
                                                                        class="row justify-content-center product-counter">
                                                                        <input id="minus{{ $panel->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $panel->id }}', '{{ $panel->product_code }}', '{{ $panel->full_title }}', {{ $panel->price }}, {{ $panel->discounted_price }}, {{ $panel->discounted_percentage ?? 0 }}, '{{ $panel->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $panel->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0"
                                                                            name="quantity" disabled />
                                                                        <input id="plus{{ $panel->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+"
                                                                            onclick="increaseQuantity('{{ $panel->id }}', '{{ $panel->product_code }}', '{{ $panel->full_title }}', {{ $panel->price }}, {{ $panel->discounted_price }}, {{ $panel->discounted_percentage ?? 0 }}, '{{ $panel->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                                <p class="fs-5 fw-bold mt-lg-2">
                                                                    {{ $panel->price == 0 ? 'Out of Stock' : '£' . $panel->price }}
                                                                </p>
                                                                <div class="container-fluid">
                                                                    @if ($panel->style)
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
                                                                                    <small>{{ $panel->style->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($panel->colour)
                                                                        <div class="row">
                                                                            <div class="col-4 p-0 d-md-flex d-none">
                                                                                <p
                                                                                    class="category-text text-start text-uppercase m-0 pt-1">
                                                                                    <small>Color</small>
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 col-sm-12 p-0 text-center">
                                                                                <p
                                                                                    class="category-value fw-semibold py-1 mb-2">
                                                                                    <small>{{ $panel->colour->trade_colour ? $panel->colour->trade_colour : $panel->colour->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($panel->assembly)
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
                                                                                    <small>{{ $panel->assembly->name }}</small>
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
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p class="">No Panels & Appliance Doors available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="collapse-wrapper my-4">
                    <a class="fw-semibold text-dark text-uppercase collapse-heading" data-bs-toggle="collapse"
                        href="#accessories" role="button" aria-expanded="false" aria-controls="accessories">
                        <span
                            class="bg-dark text-white fw-semibold py-2 px-2 text-center me-2 collapse-heading-number">2</span>
                        Accessories
                    </a>
                    <div class="collapse-container collapse mt-3" id="accessories">
                        <div class="row">
                            @if ($accessories->count() > 0)
                                @foreach ($accessories as $index => $accessory)
                                    <div class="col-lg-4 col-6 mb-3">
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
                                                                            <img src="{{ asset('uploads/products/' . $accessory->image_path) }}"
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
                                                            src="{{ $accessory->image_path ? $accessory->image_path : asset('images/no-image-available.jpg') }}"
                                                            alt="Card image cap">
                                                    </figure>
                                                    <div class="">
                                                        <a href=""
                                                            class="text-center text-decoration-underline fs-5 fw-bold">
                                                            {{ $accessory->short_title }}
                                                        </a>
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
                                                                            <small>Color</small>
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
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="">No accessories available</p>
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
                                @foreach ($handles as $index => $handle)
                                    <div class="col-lg-4 col-6 mb-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <!-- Button trigger modal -->
                                                <a class="modal-icon z-3" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#handles{{ $index }}">
                                                    <i class="ri-add-circle-line text-black fs-4"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="handles{{ $index }}"
                                                    tabindex="-1" aria-labelledby="handlesLabel{{ $index }}"
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
                                                                            <img src="{{ asset('uploads/products/' . $handle->image_path) }}"
                                                                                class="img-fluid" />
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-8 col-md-7 col-12 text-start">
                                                                            <h1 class="fs-5 fw-bold">
                                                                                {{ $handle->full_title }}
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
                                                            src="{{ $handle->image_path ? $handle->image_path : asset('images/no-image-available.jpg') }}"
                                                            alt="Card image cap">
                                                    </figure>
                                                    <div class="">
                                                        <a href=""
                                                            class="text-center text-decoration-underline fs-5 fw-bold">
                                                            {{ $handle->short_title }}
                                                        </a>
                                                        <p class="py-lg-3 py-2">
                                                            <small
                                                                class="fw-bold text-center">{{ $handle->dimensions }}</small>
                                                        </p>
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center product-counter">
                                                                <input id="minus{{ $handle->id }}"
                                                                    class="minus border bg-dark text-light p-0"
                                                                    type="button" value="-"
                                                                    onclick="decreaseQuantity('{{ $handle->id }}', '{{ $handle->product_code }}', '{{ $handle->full_title }}', {{ $handle->price }}, {{ $handle->discounted_price }}, {{ $handle->discounted_percentage ?? 0 }}, '{{ $handle->ParentCategory->slug }}')" />
                                                                <input id="quantity{{ $handle->id }}"
                                                                    class="quantity border border-black text-center"
                                                                    type="text" value="0" name="quantity"
                                                                    disabled />
                                                                <input id="plus{{ $handle->id }}"
                                                                    class="plus border bg-dark text-light p-0"
                                                                    type="button" value="+"
                                                                    onclick="increaseQuantity('{{ $handle->id }}', '{{ $handle->product_code }}', '{{ $handle->full_title }}', {{ $handle->price }}, {{ $handle->discounted_price }}, {{ $handle->discounted_percentage ?? 0 }}, '{{ $handle->ParentCategory->slug }}')" />
                                                            </div>
                                                        </div>
                                                        <p class="fs-5 fw-bold mt-lg-2">
                                                            {{ $handle->price == 0 ? 'Out of Stock' : '£' . $handle->price }}
                                                        </p>
                                                        <div class="container-fluid">
                                                            @if ($handle->style)
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
                                                                            <small>{{ $handle->style->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($handle->colour)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-uppercase m-0 pt-1">
                                                                            <small>Color</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p
                                                                            class="category-value fw-semibold py-1 mb-2">
                                                                            <small>{{ $handle->colour->trade_colour ? $handle->colour->trade_colour : $handle->colour->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($handle->assembly)
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
                                                                            <small>{{ $handle->assembly->name }}</small>
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
                                @endforeach
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
                                        @foreach ($worktops as $index => $worktop)
                                            <div class="col-lg-4 col-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <!-- Button trigger modal -->
                                                        <a class="modal-icon z-3" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#worktops{{ $index }}">
                                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="worktops{{ $index }}"
                                                            tabindex="-1"
                                                            aria-labelledby="worktopsLabel{{ $index }}"
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
                                                                                    <img src="{{ asset('uploads/products/' . $worktop->image_path) }}"
                                                                                        class="img-fluid" />
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-7 col-12 text-start">
                                                                                    <h1 class="fs-5 fw-bold">
                                                                                        {{ $worktop->full_title }}
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
                                                                    src="{{ $worktop->image_path ? $worktop->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $worktop->short_title }}
                                                                </a>
                                                                <p class="py-lg-3 py-2">
                                                                    <small
                                                                        class="fw-bold text-center">{{ $worktop->dimensions }}</small>
                                                                </p>
                                                                <div class="container-fluid">
                                                                    <div
                                                                        class="row justify-content-center product-counter">
                                                                        <input id="minus{{ $worktop->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $worktop->id }}', '{{ $worktop->product_code }}', '{{ $worktop->full_title }}', {{ $worktop->price }}, {{ $worktop->discounted_price }}, {{ $worktop->discounted_percentage ?? 0 }}, '{{ $worktop->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $worktop->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0"
                                                                            name="quantity" disabled />
                                                                        <input id="plus{{ $worktop->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+"
                                                                            onclick="increaseQuantity('{{ $worktop->id }}', '{{ $worktop->product_code }}', '{{ $worktop->full_title }}', {{ $worktop->price }}, {{ $worktop->discounted_price }}, {{ $worktop->discounted_percentage ?? 0 }}, '{{ $worktop->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                                <p class="fs-5 fw-bold mt-lg-2">
                                                                    {{ $worktop->price == 0 ? 'Out of Stock' : '£' . $worktop->price }}
                                                                </p>
                                                                <div class="container-fluid">
                                                                    @if ($worktop->style)
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
                                                                                    <small>{{ $worktop->style->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($worktop->colour)
                                                                        <div class="row">
                                                                            <div class="col-4 p-0 d-md-flex d-none">
                                                                                <p
                                                                                    class="category-text text-start text-uppercase m-0 pt-1">
                                                                                    <small>Color</small>
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 col-sm-12 p-0 text-center">
                                                                                <p
                                                                                    class="category-value fw-semibold py-1 mb-2">
                                                                                    <small>{{ $worktop->colour->trade_colour ? $worktop->colour->trade_colour : $worktop->colour->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($worktop->assembly)
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
                                                                                    <small>{{ $worktop->assembly->name }}</small>
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
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p class="">No Worktops available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Worktops and Upstands --}}
                            <div class="tab-pane fade" id="nav-upstands" role="tabpanel"
                                aria-labelledby="nav-upstands-tab" tabindex="0">
                                <div class="row">
                                    @if ($worktopsAndUpStands->count() > 0)
                                        @foreach ($worktopsAndUpStands as $index => $worktopsAndUpStand)
                                            <div class="col-lg-4 col-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <!-- Button trigger modal -->
                                                        <a class="modal-icon z-3" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#worktopsAndUpStands{{ $index }}">
                                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="worktopsAndUpStands{{ $index }}"
                                                            tabindex="-1"
                                                            aria-labelledby="worktopsAndUpStandsLabel{{ $index }}"
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
                                                                                    <img src="{{ asset('uploads/products/' . $worktopsAndUpStand->image_path) }}"
                                                                                        class="img-fluid" />
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-7 col-12 text-start">
                                                                                    <h1 class="fs-5 fw-bold">
                                                                                        {{ $worktopsAndUpStand->full_title }}
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
                                                                    src="{{ $worktopsAndUpStand->image_path ? $worktopsAndUpStand->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $worktopsAndUpStand->short_title }}
                                                                </a>
                                                                <p class="py-lg-3 py-2">
                                                                    <small
                                                                        class="fw-bold text-center">{{ $worktopsAndUpStand->dimensions }}</small>
                                                                </p>
                                                                <div class="container-fluid">
                                                                    <div
                                                                        class="row justify-content-center product-counter">
                                                                        <input
                                                                            id="minus{{ $worktopsAndUpStand->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $worktopsAndUpStand->id }}', '{{ $worktopsAndUpStand->product_code }}', '{{ $worktopsAndUpStand->full_title }}', {{ $worktopsAndUpStand->price }}, {{ $worktopsAndUpStand->discounted_price }}, {{ $worktopsAndUpStand->discounted_percentage ?? 0 }}, '{{ $worktopsAndUpStand->ParentCategory->slug }}')" />
                                                                        <input
                                                                            id="quantity{{ $worktopsAndUpStand->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0"
                                                                            name="quantity" disabled />
                                                                        <input id="plus{{ $worktopsAndUpStand->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+"
                                                                            onclick="increaseQuantity('{{ $worktopsAndUpStand->id }}', '{{ $worktopsAndUpStand->product_code }}', '{{ $worktopsAndUpStand->full_title }}', {{ $worktopsAndUpStand->price }}, {{ $worktopsAndUpStand->discounted_price }}, {{ $worktopsAndUpStand->discounted_percentage ?? 0 }}, '{{ $worktopsAndUpStand->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                                <p class="fs-5 fw-bold mt-lg-2">
                                                                    {{ $worktopsAndUpStand->price == 0 ? 'Out of Stock' : '£' . $worktopsAndUpStand->price }}
                                                                </p>
                                                                <div class="container-fluid">
                                                                    @if ($worktopsAndUpStand->style)
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
                                                                                    <small>{{ $worktopsAndUpStand->style->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($worktopsAndUpStand->colour)
                                                                        <div class="row">
                                                                            <div class="col-4 p-0 d-md-flex d-none">
                                                                                <p
                                                                                    class="category-text text-start text-uppercase m-0 pt-1">
                                                                                    <small>Color</small>
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 col-sm-12 p-0 text-center">
                                                                                <p
                                                                                    class="category-value fw-semibold py-1 mb-2">
                                                                                    <small>{{ $worktopsAndUpStand->colour->trade_colour ? $worktopsAndUpStand->colour->trade_colour : $worktopsAndUpStand->colour->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($worktopsAndUpStand->assembly)
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
                                                                                    <small>{{ $worktopsAndUpStand->assembly->name }}</small>
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
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p class="">No Worktops and Upstands available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Breakfast Bars --}}
                            <div class="tab-pane fade" id="nav-breakfast" role="tabpanel"
                                aria-labelledby="nav-breakfast-tab" tabindex="0">
                                <div class="row">
                                    @if ($breakfastBars->count() > 0)
                                        @foreach ($breakfastBars as $index => $breakfastBar)
                                            <div class="col-lg-4 col-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <!-- Button trigger modal -->
                                                        <a class="modal-icon z-3" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#breakfastBars{{ $index }}">
                                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="breakfastBars{{ $index }}" tabindex="-1"
                                                            aria-labelledby="breakfastBarsLabel{{ $index }}"
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
                                                                                    <img src="{{ asset('uploads/products/' . $breakfastBar->image_path) }}"
                                                                                        class="img-fluid" />
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-7 col-12 text-start">
                                                                                    <h1 class="fs-5 fw-bold">
                                                                                        {{ $breakfastBar->full_title }}
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
                                                                    src="{{ $breakfastBar->image_path ? $breakfastBar->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $breakfastBar->short_title }}
                                                                </a>
                                                                <p class="py-lg-3 py-2">
                                                                    <small
                                                                        class="fw-bold text-center">{{ $breakfastBar->dimensions }}</small>
                                                                </p>
                                                                <div class="container-fluid">
                                                                    <div
                                                                        class="row justify-content-center product-counter">
                                                                        <input id="minus{{ $breakfastBar->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $breakfastBar->id }}', '{{ $breakfastBar->product_code }}', '{{ $breakfastBar->full_title }}', {{ $breakfastBar->price }}, {{ $breakfastBar->discounted_price }}, {{ $breakfastBar->discounted_percentage ?? 0 }}, '{{ $breakfastBar->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $breakfastBar->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0"
                                                                            name="quantity" disabled />
                                                                        <input id="plus{{ $breakfastBar->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+"
                                                                            onclick="increaseQuantity('{{ $breakfastBar->id }}', '{{ $breakfastBar->product_code }}', '{{ $breakfastBar->full_title }}', {{ $breakfastBar->price }}, {{ $breakfastBar->discounted_price }}, {{ $breakfastBar->discounted_percentage ?? 0 }}, '{{ $breakfastBar->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                                <p class="fs-5 fw-bold mt-lg-2">
                                                                    {{ $breakfastBar->price == 0 ? 'Out of Stock' : '£' . $breakfastBar->price }}
                                                                </p>
                                                                <div class="container-fluid">
                                                                    @if ($breakfastBar->style)
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
                                                                                    <small>{{ $breakfastBar->style->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($breakfastBar->colour)
                                                                        <div class="row">
                                                                            <div class="col-4 p-0 d-md-flex d-none">
                                                                                <p
                                                                                    class="category-text text-start text-uppercase m-0 pt-1">
                                                                                    <small>Color</small>
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 col-sm-12 p-0 text-center">
                                                                                <p
                                                                                    class="category-value fw-semibold py-1 mb-2">
                                                                                    <small>{{ $breakfastBar->colour->trade_colour ? $breakfastBar->colour->trade_colour : $breakfastBar->colour->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($breakfastBar->assembly)
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
                                                                                    <small>{{ $breakfastBar->assembly->name }}</small>
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
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p class="">No Breakfast Bars available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Edging Doors --}}
                            <div class="tab-pane fade" id="nav-edging" role="tabpanel"
                                aria-labelledby="nav-edging-tab" tabindex="0">
                                <div class="row">
                                    @if ($edgings->count() > 0)
                                        @foreach ($edgings as $index => $edging)
                                            <div class="col-lg-4 col-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <!-- Button trigger modal -->
                                                        <a class="modal-icon z-3" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edgings{{ $index }}">
                                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="edgings{{ $index }}"
                                                            tabindex="-1"
                                                            aria-labelledby="edgingsLabel{{ $index }}"
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
                                                                                    <img src="{{ asset('uploads/products/' . $edging->image_path) }}"
                                                                                        class="img-fluid" />
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-7 col-12 text-start">
                                                                                    <h1 class="fs-5 fw-bold">
                                                                                        {{ $edging->full_title }}
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
                                                                    src="{{ $edging->image_path ? $edging->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $edging->short_title }}
                                                                </a>
                                                                <p class="py-lg-3 py-2">
                                                                    <small
                                                                        class="fw-bold text-center">{{ $edging->dimensions }}</small>
                                                                </p>
                                                                <div class="container-fluid">
                                                                    <div
                                                                        class="row justify-content-center product-counter">
                                                                        <input id="minus{{ $edging->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $edging->id }}', '{{ $edging->product_code }}', '{{ $edging->full_title }}', {{ $edging->price }}, {{ $edging->discounted_price }}, {{ $edging->discounted_percentage ?? 0 }}, '{{ $edging->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $edging->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0"
                                                                            name="quantity" disabled />
                                                                        <input id="plus{{ $edging->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+"
                                                                            onclick="increaseQuantity('{{ $edging->id }}', '{{ $edging->product_code }}', '{{ $edging->full_title }}', {{ $edging->price }}, {{ $edging->discounted_price }}, {{ $edging->discounted_percentage ?? 0 }}, '{{ $edging->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                                <p class="fs-5 fw-bold mt-lg-2">
                                                                    {{ $edging->price == 0 ? 'Out of Stock' : '£' . $edging->price }}
                                                                </p>
                                                                <div class="container-fluid">
                                                                    @if ($edging->style)
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
                                                                                    <small>{{ $edging->style->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($edging->colour)
                                                                        <div class="row">
                                                                            <div class="col-4 p-0 d-md-flex d-none">
                                                                                <p
                                                                                    class="category-text text-start text-uppercase m-0 pt-1">
                                                                                    <small>Color</small>
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 col-sm-12 p-0 text-center">
                                                                                <p
                                                                                    class="category-value fw-semibold py-1 mb-2">
                                                                                    <small>{{ $edging->colour->trade_colour ? $edging->colour->trade_colour : $edging->colour->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($edging->assembly)
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
                                                                                    <small>{{ $edging->assembly->name }}</small>
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
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p class="">No Edging Doors available</p>
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
                                        @foreach ($sinks as $index => $sink)
                                            <div class="col-lg-4 col-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <!-- Button trigger modal -->
                                                        <a class="modal-icon z-3" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#sinks{{ $index }}">
                                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="sinks{{ $index }}"
                                                            tabindex="-1"
                                                            aria-labelledby="sinksLabel{{ $index }}"
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
                                                                                    <img src="{{ asset('uploads/products/' . $sink->image_path) }}"
                                                                                        class="img-fluid" />
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-7 col-12 text-start">
                                                                                    <h1 class="fs-5 fw-bold">
                                                                                        {{ $sink->full_title }}
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
                                                                    src="{{ $sink->image_path ? $sink->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $sink->short_title }}
                                                                </a>
                                                                <p class="py-lg-3 py-2">
                                                                    <small
                                                                        class="fw-bold text-center">{{ $sink->dimensions }}</small>
                                                                </p>
                                                                <div class="container-fluid">
                                                                    <div
                                                                        class="row justify-content-center product-counter">
                                                                        <input id="minus{{ $sink->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $sink->id }}', '{{ $sink->product_code }}', '{{ $sink->full_title }}', {{ $sink->price }}, {{ $sink->discounted_price }}, {{ $sink->discounted_percentage ?? 0 }}, '{{ $sink->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $sink->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0"
                                                                            name="quantity" disabled />
                                                                        <input id="plus{{ $sink->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+"
                                                                            onclick="increaseQuantity('{{ $sink->id }}', '{{ $sink->product_code }}', '{{ $sink->full_title }}', {{ $sink->price }}, {{ $sink->discounted_price }}, {{ $sink->discounted_percentage ?? 0 }}, '{{ $sink->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                                <p class="fs-5 fw-bold mt-lg-2">
                                                                    {{ $sink->price == 0 ? 'Out of Stock' : '£' . $sink->price }}
                                                                </p>
                                                                <div class="container-fluid">
                                                                    @if ($sink->style)
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
                                                                                    <small>{{ $sink->style->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($sink->colour)
                                                                        <div class="row">
                                                                            <div class="col-4 p-0 d-md-flex d-none">
                                                                                <p
                                                                                    class="category-text text-start text-uppercase m-0 pt-1">
                                                                                    <small>Color</small>
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 col-sm-12 p-0 text-center">
                                                                                <p
                                                                                    class="category-value fw-semibold py-1 mb-2">
                                                                                    <small>{{ $sink->colour->trade_colour ? $sink->colour->trade_colour : $sink->colour->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($sink->assembly)
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
                                                                                    <small>{{ $sink->assembly->name }}</small>
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
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p class="">No Sinks available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Taps --}}
                            <div class="tab-pane fade" id="nav-taps" role="tabpanel"
                                aria-labelledby="nav-taps-tab" tabindex="0">
                                <div class="row">
                                    @if ($taps->count() > 0)
                                        @foreach ($taps as $index => $tap)
                                            <div class="col-lg-4 col-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <!-- Button trigger modal -->
                                                        <a class="modal-icon z-3" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#taps{{ $index }}">
                                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="taps{{ $index }}"
                                                            tabindex="-1"
                                                            aria-labelledby="tapsLabel{{ $index }}"
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
                                                                                    <img src="{{ asset('uploads/products/' . $tap->image_path) }}"
                                                                                        class="img-fluid" />
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-7 col-12 text-start">
                                                                                    <h1 class="fs-5 fw-bold">
                                                                                        {{ $tap->full_title }}
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
                                                                    src="{{ $tap->image_path ? $tap->image_path : asset('images/no-image-available.jpg') }}"
                                                                    alt="Card image cap">
                                                            </figure>
                                                            <div class="">
                                                                <a href=""
                                                                    class="text-center text-decoration-underline fs-5 fw-bold">
                                                                    {{ $tap->short_title }}
                                                                </a>
                                                                <p class="py-lg-3 py-2">
                                                                    <small
                                                                        class="fw-bold text-center">{{ $tap->dimensions }}</small>
                                                                </p>
                                                                <div class="container-fluid">
                                                                    <div
                                                                        class="row justify-content-center product-counter">
                                                                        <input id="minus{{ $tap->id }}"
                                                                            class="minus border bg-dark text-light p-0"
                                                                            type="button" value="-"
                                                                            onclick="decreaseQuantity('{{ $tap->id }}', '{{ $tap->product_code }}', '{{ $tap->full_title }}', {{ $tap->price }}, {{ $tap->discounted_price }}, {{ $tap->discounted_percentage ?? 0 }}, '{{ $tap->ParentCategory->slug }}')" />
                                                                        <input id="quantity{{ $tap->id }}"
                                                                            class="quantity border border-black text-center"
                                                                            type="text" value="0"
                                                                            name="quantity" disabled />
                                                                        <input id="plus{{ $tap->id }}"
                                                                            class="plus border bg-dark text-light p-0"
                                                                            type="button" value="+"
                                                                            onclick="increaseQuantity('{{ $tap->id }}', '{{ $tap->product_code }}', '{{ $tap->full_title }}', {{ $tap->price }}, {{ $tap->discounted_price }}, {{ $tap->discounted_percentage ?? 0 }}, '{{ $tap->ParentCategory->slug }}')" />
                                                                    </div>
                                                                </div>
                                                                <p class="fs-5 fw-bold mt-lg-2">
                                                                    {{ $tap->price == 0 ? 'Out of Stock' : '£' . $tap->price }}
                                                                </p>
                                                                <div class="container-fluid">
                                                                    @if ($tap->style)
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
                                                                                    <small>{{ $tap->style->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($tap->colour)
                                                                        <div class="row">
                                                                            <div class="col-4 p-0 d-md-flex d-none">
                                                                                <p
                                                                                    class="category-text text-start text-uppercase m-0 pt-1">
                                                                                    <small>Color</small>
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 col-sm-12 p-0 text-center">
                                                                                <p
                                                                                    class="category-value fw-semibold py-1 mb-2">
                                                                                    <small>{{ $tap->colour->trade_colour ? $tap->colour->trade_colour : $tap->colour->name }}</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($tap->assembly)
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
                                                                                    <small>{{ $tap->assembly->name }}</small>
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
                                        @endforeach
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
                                @foreach ($appliances as $index => $appliance)
                                    <div class="col-lg-4 col-6 mb-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <!-- Button trigger modal -->
                                                <a class="modal-icon z-3" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#appliances{{ $index }}">
                                                    <i class="ri-add-circle-line text-black fs-4"></i>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="appliances{{ $index }}"
                                                    tabindex="-1"
                                                    aria-labelledby="appliancesLabel{{ $index }}"
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
                                                                            <img src="{{ asset('uploads/products/' . $appliance->image_path) }}"
                                                                                class="img-fluid" />
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-8 col-md-7 col-12 text-start">
                                                                            <h1 class="fs-5 fw-bold">
                                                                                {{ $appliance->full_title }}
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
                                                            src="{{ $appliance->image_path ? $appliance->image_path : asset('images/no-image-available.jpg') }}"
                                                            alt="Card image cap">
                                                    </figure>
                                                    <div class="">
                                                        <a href=""
                                                            class="text-center text-decoration-underline fs-5 fw-bold">
                                                            {{ $appliance->short_title }}
                                                        </a>
                                                        <p class="py-lg-3 py-2">
                                                            <small
                                                                class="fw-bold text-center">{{ $appliance->dimensions }}</small>
                                                        </p>
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center product-counter">
                                                                <input id="minus{{ $appliance->id }}"
                                                                    class="minus border bg-dark text-light p-0"
                                                                    type="button" value="-"
                                                                    onclick="decreaseQuantity('{{ $appliance->id }}', '{{ $appliance->product_code }}', '{{ $appliance->full_title }}', {{ $appliance->price }}, {{ $appliance->discounted_price }}, {{ $appliance->discounted_percentage ?? 0 }}, '{{ $appliance->ParentCategory->slug }}')" />
                                                                <input id="quantity{{ $appliance->id }}"
                                                                    class="quantity border border-black text-center"
                                                                    type="text" value="0" name="quantity"
                                                                    disabled />
                                                                <input id="plus{{ $appliance->id }}"
                                                                    class="plus border bg-dark text-light p-0"
                                                                    type="button" value="+"
                                                                    onclick="increaseQuantity('{{ $appliance->id }}', '{{ $appliance->product_code }}', '{{ $appliance->full_title }}', {{ $appliance->price }}, {{ $appliance->discounted_price }}, {{ $appliance->discounted_percentage ?? 0 }}, '{{ $appliance->ParentCategory->slug }}')" />
                                                            </div>
                                                        </div>
                                                        <p class="fs-5 fw-bold mt-lg-2">
                                                            {{ $appliance->price == 0 ? 'Out of Stock' : '£' . $appliance->price }}
                                                        </p>
                                                        <div class="container-fluid">
                                                            @if ($appliance->style)
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
                                                                            <small>{{ $appliance->style->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($appliance->colour)
                                                                <div class="row">
                                                                    <div class="col-4 p-0 d-md-flex d-none">
                                                                        <p
                                                                            class="category-text text-start text-uppercase m-0 pt-1">
                                                                            <small>Color</small>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                        <p
                                                                            class="category-value fw-semibold py-1 mb-2">
                                                                            <small>{{ $appliance->colour->trade_colour ? $appliance->colour->trade_colour : $appliance->colour->name }}</small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($appliance->assembly)
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
                                                                            <small>{{ $appliance->assembly->name }}</small>
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
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="">No Appliances available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
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
                            <div class="row text-white pt-1" id="orderKitchenCartItemsList">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row bg-dark mt-2">
                        <div class="col-lg-12 px-4 py-3">
                            <div class="row border-bottom text-white">
                                <h5 class="fw-bold text-white">Kitchen Price</h5>
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
