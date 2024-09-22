<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Help & Guides</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    HOW WILL MY KITCHEN ARRIVE?
                </h1>
                <h4 class="text-dark">
                    Having been making, packing and distributing kitchens since 1990, we have developed trusted methods
                    to get what it is you need, to where you need it.
                </h4>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3" style="background-color: #f0f0f0;">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h2 class="text-dark fw-bold text-uppercase">TRUSTED METHODS, TRUSTED PARTNERS</h2>
                <p>
                    Flat-Packed kitchens will be delivered to you by our courier DX.
                    <br><br>
                    Goods are packaged with polystyrene and packed in cardboard. Larger orders will be packed onto a
                    pallet. Plinths and Multi Rail will be delivered as a long bundle, again packed in cardboard.
                    <br><br>
                    Rigid Kitchens are delivered by TDL, the goods are packed onto a pallet(s) and wrapped in shrink
                    wrap. Again Plinths and Multi Rail will be delivered as a long bundle.
                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <img src="{{ asset('images/Slab-Kitchen.jpg') }}" class="img-fluid" />
            </div>
        </div>
    </section>

    {{ view('frontend.help-and-guides') }}

    {{-- <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <div class="row py-3">
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
