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
                    KITCHEN TERMINOLOGY
                </h1>
                <h4 class="text-dark text-uppercase">
                    LET’S CUT THROUGH THE JARGON TO MAKE KITCHEN PLANNING EASY.
                </h4>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3">
        <div class="row mx-auto">
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <img src="{{ asset('images/Slab-Kitchen.jpg') }}" class="img-fluid" />

                <h4 class="text-dark pt-3">Planning a brand new kitchen is an exciting project, but it can be a daunting
                    task. There are a lot
                    of decisions and choices to be made and you may encounter a number of technical phrases and terms
                    that you might be unfamiliar with. To help, here is our simple guide with explanations to the major
                    components in the production and installation of a kitchen. Let’s get started.</h4>

            </div>
        </div>

        <div class="row mx-auto">
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <h3 class="text-dark fw-bold">Plinth</h3>
                <p>Known as the kick plate or kick board, this is used to bridge the gap between the floor and the
                    bottom of your kitchen cabinets.<br>
                    The plinth is used to hide away cabinet legs and unsightly gaps giving the kitchen a complete tidy
                    finish.</p>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <h3 class="text-dark fw-bold">Multi-Rail</h3>
                <p>The Multi-Rail is an aesthetic finish that is used for wall units. It can be used as various
                    applications including cornice or pelmet and to box around a group of units to give that modern
                    finish.</p>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <h3 class="text-dark fw-bold">Cornice</h3>
                <p>The cornice is the strip of decorative trim at the top of the wall cabinets. The cornice eliminates
                    the empty space at the top of the wall cabinets. Only available in our Shaker kitchens.
                </p>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <h3 class="text-dark fw-bold">ABS Edging </h3>
                <p>Edging is the trim that is placed around the sides of the worktop area to cover exposed chipboard. It
                    creates a uniform look across the whole counter leaving a clean and tidy finish.
                </p>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <h3 class="text-dark fw-bold">Appliance Door</h3>
                <p>The appliance door is used for disguising various cooking and cleaning appliances in your kitchen
                    space to create a seamless aesthetic.</p>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <h3 class="text-dark fw-bold">End Panel</h3>
                <p>An end panel is placed on the side of a cabinet which isn’t directly against the wall, to hide the
                    interior of the cabinet. We can supply a Base End Panel, a Wall End Panel and a Larder End Panel.
                </p>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-12 mx-auto p-0">
                <h3 class="text-dark fw-bold">Upstand </h3>
                <p>A decorative piece matching the worktop that runs the length of the worktop. Supplied 100mm in
                    Height.
                </p>
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
