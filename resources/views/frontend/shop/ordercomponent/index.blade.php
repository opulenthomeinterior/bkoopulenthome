<x-guest-layout>
    <section class="container-fluid"
        style="background-image: url('{{ asset('images/Slab-Kitchen.jpg') }}'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 50vh;">
    </section>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('orderkitchen') }}" class="text-uppercase">Order
                        Kitchen</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Order Component
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-2" style="background-color: #f0f0f0;">
        <div class="row py-4">
            @if ($components->count() > 0)
                @foreach ($components as $index => $component)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card component-card card-hover position-relative">
                            <a href="{{ route('ordercomponentbyname', $component->slug) }}"
                                class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                            <div class="card-header p-0"
                                style="background-image: url('{{ $component->image_path ? asset('uploads/categories/' . $component->image_path) : asset('images/no-image-available.jpg') }}'); min-height: 300px;background-size: cover;background-position: center center;background-repeat: no-repeat;">
                            </div>
                            <div class="card-body component-card-body">
                                <div class="component-card-content">
                                    <h4 class="text-uppercase fs-3 fw-bold text-dark">{{ $component->name }}</h4>
                                    <div class="text-dark">{!! $component->description !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        No components found!
                    </div>
                </div>
            @endif
        </div>
    </section>

</x-guest-layout>
