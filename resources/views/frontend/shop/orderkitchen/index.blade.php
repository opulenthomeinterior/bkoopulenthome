<x-guest-layout>
    <div class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
            </ol>
        </nav>

        <div class="row mb-lg-5 mb-4">
            <div class="col-12">
                <h1 class="fs-1 fw-bolder text-dark text-uppercase">Order Kitchen</h1>
            </div>
        </div>

        {{-- Loop through each style --}}
        @foreach ($data as $styleName => $styleData)
            @php
                if ($loop->iteration % 2 == 0) {
                    $imageOrderClass = 'order-md-1';
                } else {
                    $imageOrderClass = 'order-md-0';
                }
            @endphp
            <div class="row mb-md-5 mb-4">
                <div class="col-lg-6 col-md-6 col-12 pr-4 {{ $imageOrderClass }}">
                    <img src="{{ $styleData['data']->image_path ? asset('uploads/styles/' . $styleData['data']->image_path) : asset('images/Slab-Kitchen.jpg') }}"
                        class="img-fluid" />
                </div>

                <div class="col-lg-6 col-md-6 col-12 px-4 mt-md-0 my-3">
                    <h1 class="fs-3 fw-bolder text-dark text-uppercase">{{ $styleData['data']->name }}</h1>

                    <p>
                        18mm MDF slab doors available in 12 SuperGloss and UltraMatt finishes. Also available in 2 MFC
                        standard finishes.
                    </p>

                    <h2 class="fs-5 text-dark fw-bold text-uppercase">Despatch</h2>
                    <p>First select your choice of assembly:</p>

                    @foreach ($styleData['assemblies'] as $assemblyName => $assemblyData)
                        <button type="button" id="{{ $assemblyName == 'Rigid' ? 'rigid_btn' : 'flatpacked_btn' }}"
                            class="btn btn-sm btn-outline-dark rounded-0">{{ $assemblyName }}</button>
                    @endforeach

                    @foreach ($styleData['assemblies'] as $assemblyName => $assemblyData)
                        <div class="py-2 mt-3 d-none" id="{{ $assemblyData['data']->slug == 'rigid' ? 'rigid' : 'flatpacked' }}">
                            <h2 class="fs-6 text-dark fw-bold">MDF COLOURS ({{ $assemblyName }})</h2>
                            <p>Choose a colour:</p>
                            <div class="row g-1">
                                @foreach ($assemblyData['colours'] as $colour)
                                    <div
                                        class="col-6 d-flex position-relative align-items-center justify-content-center">
                                        <div
                                            class="colour-div position-absolute start-0 top-50 translate-middle-y ms-2 bg-danger">
                                        </div>
                                        <a href="{{ route('orderkitchenbycolour', ['style' => $styleData['data']->slug , 'assembly' => $assemblyData['data']->slug, 'colour' => $colour->slug]) }}" class="colour-btn btn w-100 rounded-0 sidebar-btn text-start">
                                            {{ $colour->trade_colour }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</x-guest-layout>
