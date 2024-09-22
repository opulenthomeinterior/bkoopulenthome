<x-guest-layout>
    <section class="container-fluid"
        style="background-image: url('{{ $styleData['data']['image_path'] ? asset('uploads/styles/' . $styleData['data']['image_path']) : asset('images/Slab-Kitchen.jpg') }}'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 50vh;">
    </section>
    <section class="container-fluid px-lg-5 py-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('orderkitchen') }}" class="text-uppercase">Order
                        Kitchen</a></li>
            </ol>
        </nav>

        <div class="row mb-lg-5 mb-4">
            <div class="col-12">
                <h1 class="fs-1 fw-bolder text-dark text-uppercase">
                    {{ $styleData['data']['name'] }} Kitchen
                </h1>
            </div>
        </div>


        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="fs-3 fw-bold text-uppercase text-dark">
                    Ordering a {{ $styleData['data']['name'] }} Kitchen
                </h1>
                <p>To start ordering a {{ $styleData['data']['name'] }} kitchen, first choose your preferred assembly,
                    then from our range of colours and finishes.</p>
            </div>
            <div class="col-lg-4 mb-3">
                <h2 class="fs-5 text-dark text-uppercase fw-bold">Despatch</h2>
                <p>First select your choice of assembly:</p>
                @foreach ($styleData['assemblies'] as $assemblyName => $assemblyData)
                    <button type="button" id="{{ $assemblyName == 'Rigid' ? 'rigid_btn' : 'flatpacked_btn' }}"
                        class="btn btn-sm btn-outline-dark rounded-0">{{ $assemblyName }}</button>
                @endforeach
            </div>

            <div class="col-lg-6 mt-lg-0 mt-3">
                @foreach ($styleData['assemblies'] as $assemblyName => $assemblyData)
                    <div class="d-none" id="{{ $assemblyName == 'Rigid' ? 'rigid' : 'flatpacked' }}">
                        <h2 class="fs-6 text-dark fw-bold">MDF COLOURS ({{ $assemblyName }})</h2>
                        <p>Choose a colour:</p>
                        <div class="row g-1">
                            @foreach ($assemblyData['colours'] as $colour)
                                <div class="col-6 d-flex position-relative align-items-center justify-content-center">
                                    <div
                                        class="colour-div position-absolute start-0 top-50 translate-middle-y ms-2 bg-danger">
                                    </div>
                                    <a href="{{ route('orderkitchenbycolour', ['style' => $styleData['data']->slug, 'assembly' => $assemblyData['data']->slug, 'colour' => $colour->slug]) }}"
                                        class="colour-btn btn w-100 rounded-0 sidebar-btn text-start">
                                        {{ $colour->trade_colour }}
                                    </a>
                                    {{-- <button type="button"
                                        class="colour-btn btn w-100 rounded-0 sidebar-btn text-start">
                                        {{ $colour->trade_colour }}
                                    </button> --}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if ($styleData['data']['style_title'] || $styleData['data']['style_description'] || $styleData['data']['image_path'])
        <section class="container-fluid px-lg-5 px-md-3 px-3 py-lg-4 py-md-3 py-2" style="background-color: #f0f0f0;">
            <div class="row">
                <div class="col-12 mb-lg-5 mb-4">
                    <h1 class="fs-1 fw-bolder text-dark text-uppercase">
                        {{ $styleData['data']['style_title'] }}
                    </h1>
                </div>
                @if ($styleData['data']['image_path'])
                    <div class="col-md-6">
                        <img src="{{ asset('uploads/styles/' . $styleData['data']['image_path']) }}"
                            class="img-fluid" />
                    </div>
                @endif
                @if ($styleData['data']['style_description'])
                    <div class="col-md-6">
                        {!! $styleData['data']['style_description'] !!}
                    </div>
                @endif
            </div>
        </section>
    @endif

</x-guest-layout>
