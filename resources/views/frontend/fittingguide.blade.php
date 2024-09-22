<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">help & guides</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Fitting Guides
                </h1>
                <h4 class="text-dark">We've put together a host of step-by-step videos and downloads to help you
                    understand, plan and install OpulentHomeInteriors kitchens.</h4>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 py-5 px-md-3 px-3">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark fw-bolder">How to Video Guides</h2>
            </div>
            @if ($videoguide->count() > 0)
                @foreach ($videoguide as $video)
                    <div class="col-lg-6 col-md-6 col-12 pt-2">
                        <div class="ratio ratio-16x9">
                            <iframe src="{{ $video->video_url }}" title="YouTube video"
                                style="max-width: 100%;height: 100%;" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-dark">No video guide available</p>
                </div>
            @endif
        </div>
    </section>


    <section class="container-fluid px-lg-5 py-5 px-md-3 px-3" style="background-color: #f0f0f0;">
        <div class="row">
            <div class="col-lg-6 py-lg-0 py-md-3 py-4">
                <h2 class="text-uppercase fw-bolder text-dark">HOW TO DOWNLOADABLE GUIDES
                </h2>
            </div>
        </div>
        <div class="row">
            @if ($downloadguide->count() > 0)
                @foreach ($downloadguide as $guide)
                    <div class="col-lg-3">
                        <a href="{{ asset('/uploads/guides/' . $guide->file_path) }}" target="_blank">
                            <div class="card">
                                <div class="card-header p-0">
                                    <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}"
                                        class="img-fluid" />
                                </div>

                                <div class="card-footer">
                                    <p>{{ $guide->title }}</p>
                                    <small>PDF</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-dark">No downloadable guide available</p>
                </div>

            @endif
        </div>
    </section>

    {{ view('frontend.help-and-guides') }}

    {{-- <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <div class="row">
            <div class="col-lg-6 py-lg-0 py-md-3 py-4">
                <h2 class="text-uppercase fw-bolder text-dark">Help & Guides</h2>
            </div>
        </div>
        <div class="row slick-slider">
            <div class="px-3">
                <a href="#">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body">
                            <h3 class="fw-bold text-dark text-uppercase">Kitchen Terminology</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="#">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body h-100">
                            <h3 class="fw-bold text-dark text-uppercase">How will my kitchen arrive?</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="#">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body h-100">
                            <h3 class="fw-bold text-dark text-uppercase">OpulentHomeInteriors faqs</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="#">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body">
                            <h3 class="fw-bold text-dark text-uppercase">Fitting guides</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="#">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body">
                            <h3 class="fw-bold text-dark text-uppercase">Need help measuring?</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="#">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body">
                            <h3 class="fw-bold text-dark text-uppercase">Virtual Design Service</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>


    </section> --}}


</x-guest-layout>
