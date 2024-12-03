<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Help & guides</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    NEED HELP MEASURING?
                </h1>
                <h4 class="text-dark text-uppercase">
                    Before ordering your wardrobe, it’s important to measure correctly to ensure it fits perfectly in
                    your home. The measurements of your wardrobe will form the basis of your design.
                </h4>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3">
        <div class="row mx-auto">
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <img src="{{ asset('images/order-component.jpg') }}" class="img-fluid" />

                <p class="text-dark pt-3">Not sure where to start? Our clever, easy to use Wardrobe Builder tool will
                    help you work out the best use of your space. Simply choose your wardrobe style, input the overall
                    measurements and our tool will recommend a wardrobe for you. Our Wardrobe Builder tool will factor in
                    if you require bespoke, made to measure units saving you the worry of measurements being incorrect.
                    You can then drag and drop units to suit your own preference.

                    Once your wardrobe has arrived it is important that your wardrobe is lined out prior to fitting.
                    Please refer to our Installation Videos section for a tutorial on how to line out your wardrobe.

                    Alternatively you can contact customerservices@wardrobekit.co.uk if you have any measurement
                    concerns.</p>

            </div>
        </div>
    </section>

    {{ view('frontend.help-and-guides') }}

    {{-- <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <div class="row slick-slider">
            <div class="px-3">
                <a href="#">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body">
                            <h3 class="fw-bold text-dark text-uppercase">Wardrobe Terminology</h3>
                            <p>Having been making, packing and distributing wardrobes, we have developed
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
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body h-100">
                            <h3 class="fw-bold text-dark text-uppercase">How will my wardrobe arrive?</h3>
                            <p>Having been making, packing and distributing wardrobes, we have developed
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
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body h-100">
                            <h3 class="fw-bold text-dark text-uppercase">BW Online faqs</h3>
                            <p>Having been making, packing and distributing wardrobes, we have developed
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
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body">
                            <h3 class="fw-bold text-dark text-uppercase">Fitting guides</h3>
                            <p>Having been making, packing and distributing wardrobes, we have developed
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
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body">
                            <h3 class="fw-bold text-dark text-uppercase">Need help measuring?</h3>
                            <p>Having been making, packing and distributing wardrobes, we have developed
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
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body">
                            <h3 class="fw-bold text-dark text-uppercase">Virtual Design Service</h3>
                            <p>Having been making, packing and distributing wardrobes, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>


    </section> --}}

</x-guest-layout>
