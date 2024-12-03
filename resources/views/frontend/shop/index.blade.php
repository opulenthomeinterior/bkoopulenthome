<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Shop
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-2" style="background-color: #f0f0f0;">
        <div class="row py-4">
            <h1 class="text-dark text-uppercase fw-bolder pb-5">
                Order By Range
            </h1>
            @if ($styles->count() > 0)
                @foreach ($styles as $style)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card component-card card-hover position-relative">
                            <a href="{{ route('orderwardrobebyname', $style->slug) }}" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                            <div class="card-header p-0"
                                style="background-image: url('{{ $style->image_path ? asset('uploads/styles/' . $style->image_path) : asset('/images/no-image-available.jpg') }}'); min-height: 300px;background-size: cover;background-position: center center;background-repeat: no-repeat;">
                            </div>
                            <div class="card-body component-card-body">
                                <div class="component-card-content">
                                    <h4 class="text-uppercase fs-3 fw-bold text-dark">{{ $style->name }}</h4>
                                    <div class="text-dark">{!! $style->style_description !!}</div>
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

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-2">
        <div class="row py-4">
            <h1 class="text-dark text-uppercase fw-bolder pb-5">
                Order by Category
            </h1>
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card component-card card-hover position-relative">
                            <a href="{{ route('ordercomponentbyname', $category->slug) }}"
                                class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                            <div class="card-header p-0"
                                style="background-image: url('{{ $category->image_path ? asset('uploads/categories/' . $category->image_path) : asset('/images/no-image-available.jpg') }}'); min-height: 300px;background-size: cover;background-position: center center;background-repeat: no-repeat;">
                            </div>
                            <div class="card-body component-card-body">
                                <div class="component-card-content">
                                    <h4 class="text-uppercase fs-3 fw-bold text-dark">{{ $category->name }}</h4>
                                    <div class="text-dark">{!! $category->category_description !!}</div>
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
