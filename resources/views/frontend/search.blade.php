<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item">Search</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Search Results
                </h1>
                <h4 class="text-dark py-3">You searched for "{{ $search }}"</h4>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 mb-5">
        <div class="row g-4">
            @if ($products->isEmpty())
                <div class="col-12">
                    <p class="fw-bolder">No matching results were found</p>
                </div>
            @else
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <a href="{{ route('orderbyproduct', $product->slug) }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row flex-column align-items-center">
                                        <div class="col-12">
                                            <figure>
                                                <img class="product-image px-0"
                                                    src="{{ $product->image_path ? asset('uploads/products/' . $product->image_path) : asset('images/no-image-available.jpg') }}"
                                                    alt="{{ $product->full_title }}">
                                            </figure>
                                        </div>
                                        <div class="col-12">
                                            <h3 class="fs-4">{{ $product->full_title }}</h3>
                                            <p class="fs-5 fw-bold mt-lg-2 mb-0">£{{ $product->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div id="custom-pagination-container">
                    {{ $products->appends(['search' => request()->input('search')])->links() }}
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
