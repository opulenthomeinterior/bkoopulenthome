<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('orderkitchen') }}" class="text-uppercase">
                        Order Kitchen
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
            <div class="col-lg-3 col-md-4 bg-light p-3 pb-4">
                <div class="">
                    <h4 style="font-weight: 600; font-size: 1.3rem">Filters</h4>
                    <p><b>CURRENT ITEMS: </b><span id="number-of-products">{{ $count }}</span></p>
                </div>
                <form action="">
                    <input type="hidden" name="slug" id="slug" value="{{ $category->slug }}">
                    @if ($types->count() > 0)
                        <div class="accordion accordion-flush" id="accordionFlushExample1">
                            <div class="accordion-item bg-transparent border border-dark border-1 rounded-1 px-2">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button legend collapsed text-uppercase" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                        aria-expanded="true" aria-controls="flush-collapseOne">
                                        TYPE
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show"
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

                    @if ($assemblies->count() > 0)
                        <div class="accordion accordion-flush mt-3" id="accordionFlushExample2">
                            <div class="accordion-item bg-transparent border border-dark border-1 rounded-1 px-2">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button legend collapsed text-uppercase" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                        aria-expanded="true" aria-controls="flush-collapseTwo">
                                        ASSEMBLY
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body px-0 py-0 pb-1">
                                        <div class="row g-1">
                                            @foreach ($assemblies as $index => $assembly)
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($styles->count() > 0)
                        <div class="accordion accordion-flush mt-3" id="accordionFlushExample3">
                            <div class="accordion-item bg-transparent border border-dark border-1 rounded-1 px-2">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button legend collapsed text-uppercase" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                        aria-expanded="true" aria-controls="flush-collapseThree">
                                        Style
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse show"
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
                        </div>
                    @endif

                    @if ($colours->count() > 0)
                        <div class="accordion accordion-flush mt-3" id="accordionFlushExample4">
                            <div class="accordion-item bg-transparent border border-dark border-1 rounded-1 px-2">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button legend collapsed text-uppercase" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                        aria-expanded="true" aria-controls="flush-collapseFour">
                                        Colour
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse show"
                                    aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample4">
                                    <div class="accordion-body px-0 py-0 pb-1">
                                        <div class="row g-1">
                                            @foreach ($colours as $index => $colour)
                                                <div class="col-lg-12 col-md-12 col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="colours[]" id="colour{{ $index }}"
                                                            value="{{ $colour->id }}">
                                                        <label class="form-check-label d-flex gap-1"
                                                            for="colour{{ $index }}">
                                                            @if ($colour->colour_code)
                                                                <div class="d-inline"
                                                                    style="width: 20px;height:20px;background-color:{{ $colour->colour_code }}">
                                                                </div>
                                                            @endif
                                                            {{ $colour->trade_colour ? $colour->trade_colour : $colour->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="row text-sm-center" id="products_container">
                    @if ($products->count() > 0)
                        @foreach ($products as $index => $product)
                            <div class="col-lg-4 col-6 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <!-- Button trigger modal -->
                                        <a class="modal-icon z-3" href="#" data-bs-toggle="modal"
                                            data-bs-target="#productModal{{ $index }}">
                                            <i class="ri-add-circle-line text-black fs-4"></i>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="productModal{{ $index }}" tabindex="-1"
                                            aria-labelledby="productModalLabel{{ $index }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-5 col-12">
                                                                    <img src="{{ $product->image_path ? $product->image_path : asset('images/no-image-available.jpg') }}"
                                                                        class="img-fluid" />
                                                                </div>
                                                                <div class="col-lg-8 col-md-7 col-12 text-start">
                                                                    <h1 class="fs-5 fw-bold">
                                                                        {{ $product->full_title }}
                                                                    </h1>
                                                                    <hr>
                                                                    <h6 class="fs-6 fw-bolder text-dark">Styling</h6>
                                                                    <ul>
                                                                        @if ($product->style)
                                                                            <li>
                                                                                <p class="mb-0">
                                                                                    <small
                                                                                        class="fw-bold text-uppercase">Style:</small>
                                                                                    {{ $product->style->name }}
                                                                                </p>
                                                                            </li>
                                                                        @endif
                                                                        @if ($product->assembly)
                                                                            <li>
                                                                                <p class="mb-0">
                                                                                    <small
                                                                                        class="fw-bold text-uppercase">Assembly:</small>
                                                                                    {{ $product->assembly->name }}
                                                                                </p>
                                                                            </li>
                                                                        @endif
                                                                        @if ($product->colour)
                                                                            <li>
                                                                                <p class="mb-0">
                                                                                    <small
                                                                                        class="fw-bold text-uppercase">Colour:</small>
                                                                                    {{ $product->colour->trade_colour ? $product->colour->trade_colour : $product->colour->name }}
                                                                                </p>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                    <h6 class="fs-6 fw-bolder text-dark">Dimensions
                                                                    </h6>
                                                                    <ul>
                                                                        <li>
                                                                            <p class="mb-0">
                                                                                <small
                                                                                    class="fw-bold text-uppercase">HEIGHT:</small>
                                                                                {{ intval($product->height) }}mm
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="mb-0">
                                                                                <small
                                                                                    class="fw-bold text-uppercase">WIDTH:</small>
                                                                                {{ intval($product->width) }}mm
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="mb-0">
                                                                                <small
                                                                                    class="fw-bold text-uppercase">DEPTH:</small>
                                                                                {{ intval($product->depth) }}mm
                                                                            </p>
                                                                        </li>
                                                                    </ul>
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
                                                    <div class="modal-footer"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <figure>
                                                        <img class="product-image px-0"
                                                            style="min-height:175px;max-height:175px;object-fit:contain"
                                                            src="{{ $product->image_path ? $product->image_path : asset('images/no-image-available.jpg') }}"
                                                            alt="Card image cap">
                                                    </figure>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="text-start">
                                                        <a href="{{ route('orderbyproduct', $product->slug) }}"
                                                            class="text-start text-decoration-underline fs-5 fw-bold">
                                                            {{ $product->short_title }}
                                                        </a>
                                                        <p class="py-lg-3 py-2">
                                                            <small
                                                                class="fw-bold text-start">{{ $product->dimensions }}</small>
                                                        </p>
                                                    </div>
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
                                                                    onclick="increaseQuantity('{{ $product->id }}', '{{ $product->product_code }}', '{{ $product->full_title }}', {{ $product->price }}, {{ $product->discounted_price }}, {{ $product->discounted_percentage ?? 0 }}, '{{ $product->ParentCategory->slug }}')" />
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="fs-5 fw-bold mt-lg-2">£{{ $product->price }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container-fluid">
                                                        @if ($product->style)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Style</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $product->style->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($product->colour)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Color</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $product->colour->trade_colour ? $product->colour->trade_colour : $product->colour->name }}</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($product->assembly)
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>{{ $product->assembly->name }}</small>
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
                                    $start = max(1, $end - 9);
                                    $end = min($pages, $start + 9);
                                }
                            @endphp
                    
                            @for ($i = $start; $i <= $end; $i++)
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
    </section>

    @push('scripts')
        <script>
            var order_component_filter = '{{ route('order_component_filter', $category->slug) }}';
        </script>
        <script src="{{ asset('js/order-component-by-name.js') }}"></script>
    @endpush
</x-guest-layout>
