<section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
    <div class="row py-3">
        <div class="col-lg-6 py-lg-0 py-md-3 py-4">
            <h2 class="text-uppercase fw-bolder text-dark">Help & Guides</h2>
        </div>
    </div>
    <div class="row slick-slider">
        <div class="px-3">
            <a href="{{ route('terminology') }}">
                <div class="card">
                    <div class="card-header p-0">
                        <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid"
                            style="max-height: 200px;object-fit: cover;" />
                    </div>

                    <div class="card-body about-card-body">
                        <div class="about-card-content">
                            <h3 class="fw-bold text-dark text-uppercase">Kitchen Terminology</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="px-3">
            <a href="{{ route('kitchenarrive') }}">
                <div class="card">
                    <div class="card-header p-0">
                        <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                    </div>

                    <div class="card-body about-card-body">
                        <div class="about-card-content">
                            <h3 class="fw-bold text-dark text-uppercase">How will my kitchen arrive?</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="px-3">
            <a href="{{ route('faq') }}">
                <div class="card">
                    <div class="card-header p-0">
                        <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                    </div>

                    <div class="card-body about-card-body">
                        <div class="about-card-content">
                            <h3 class="fw-bold text-dark text-uppercase">BK Online faqs</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="px-3">
            <a href="{{ route('fittingguide') }}">
                <div class="card">
                    <div class="card-header p-0">
                        <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                    </div>

                    <div class="card-body about-card-body">
                        <div class="about-card-content">
                            <h3 class="fw-bold text-dark text-uppercase">Fitting guides</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="px-3">
            <a href="{{ route('needhelp') }}">
                <div class="card">
                    <div class="card-header p-0">
                        <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                    </div>

                    <div class="card-body about-card-body">
                        <div class="about-card-content">
                            <h3 class="fw-bold text-dark text-uppercase">Need help measuring?</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="px-3">
            <a href="{{ route('designservice') }}">
                <div class="card">
                    <div class="card-header p-0">
                        <img src="{{ asset('/images/Strada-matt-porcelain-kitchen.jpg') }}" class="img-fluid" />
                    </div>

                    <div class="card-body about-card-body">
                        <div class="about-card-content">
                            <h3 class="fw-bold text-dark text-uppercase">Virtual Design Service</h3>
                            <p>Having been making, packing and distributing kitchens since 1990, we have developed
                                trusted
                                methods to get what it is you need, to where you need it.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.slick-slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true,
                            arrows: true,

                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    }
                ]
            });
        });
    </script>
@endpush
