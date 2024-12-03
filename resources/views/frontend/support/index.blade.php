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
                    Support
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <div class="row py-3">
            <div class="col-lg-6 py-lg-0 py-md-3 py-4">
                <h2 class="text-uppercase fw-bolder text-dark">In this Section</h2>
            </div>
        </div>
        <div class="row slick-slider">
            <div class="px-3">
                <a href="{{ route('downloadable') }}">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body about-card-body">
                            <div class="about-card-content">
                                <h3 class="fw-bold text-dark text-uppercase">Downloadable Resources</h3>
                                <p>Product Information Guides and Instructions for BW Online Installation</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="{{ route('termandcondition') }}">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body about-card-body">
                            <div class="about-card-content">
                                <h3 class="fw-bold text-dark text-uppercase">Terms and Conditions</h3>
                                <p>Terms and conditions for using WardrobeKit.co.uk and its associated products.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="{{ route('installationvideos') }}">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body about-card-body">
                            <div class="about-card-content">
                                <h3 class="fw-bold text-dark text-uppercase">Installation Videos</h3>
                                <p>New to BW Online? Learn how to install and enhance the BW Online range by
                                    following
                                    these instructional videos.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="{{ route('deliveries') }}">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>

                        <div class="card-body about-card-body">
                            <div class="about-card-content">
                                <h3 class="fw-bold text-dark text-uppercase">Deliveries</h3>
                                <p>Information about delivery times, processes and fees for BW Online.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="px-3">
                <a href="{{ route('printresources') }}">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('/images/Strada-matt-porcelain-wardrobe.jpg') }}" class="img-fluid" />
                        </div>
                        <div class="card-body about-card-body">
                            <div class="about-card-content">
                                <h3 class="fw-bold text-dark text-uppercase">Print Resources</h3>
                                <p>Complete this form to receive printable versions of BW Online brochures and
                                    instructions.</p>
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

</x-guest-layout>
