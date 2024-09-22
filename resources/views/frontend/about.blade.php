<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Help & guides</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    About Us
                </h1>
                <h4 class="text-dark">BA is proud to be one of the UK’s leading manufacturers of factory-built
                    kitchens
                    and bedrooms, bespoke, made-to-measure doors and one of the largest ranges of matching accessories
                    in the market place today.</h4>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-lg-5 py-3" style="background-color: #f0f0f0;">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="text-uppercase text-dark fw-bolder">A LITTLE BIT ABOUT US</h2>

                <p>
                    We eat, sleep and breathe kitchens and bedrooms, making them look incredible using the perfect mix
                    of quality, sustainable materials and cutting-edge design.
                    <br><br>
                    Born out of a desire to offer better products and service in the market, BA was established in 1990
                    and has gone from strength to strength since. BA operates from three state of the art factories in
                    Cookstown, Co. Tyrone and two in Yorkshire at Rotherham and Doncaster.
                </p>

                <a href="{{ route('orderkitchen') }}" class="btn btn-md btn-dark rounded-0">Order Now</a>
            </div>

            <div class="col-lg-6 py-lg-0 py-md-3 py-4">
                <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <div class="row">
            <div class="col-lg-6 py-lg-0 py-md-3 py-4">
                <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
            </div>

            <div class="col-lg-6">
                <h2 class="text-uppercase text-dark fw-bolder">A LITTLE BIT ABOUT US</h2>

                <p class="">
                    We eat, sleep and breathe kitchens and bedrooms, making them look incredible using the perfect mix
                    of quality, sustainable materials and cutting-edge design.
                    <br><br>
                    Born out of a desire to offer better products and service in the market, BA was established in 1990
                    and has gone from strength to strength since. BA operates from three state of the art factories in
                    Cookstown, Co. Tyrone and two in Yorkshire at Rotherham and Doncaster.
                </p>
            </div>
        </div>
    </section>


    {{ view('frontend.help-and-guides') }}

</x-guest-layout>
