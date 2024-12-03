<x-guest-layout>
    <section class="container-fluid"
        style="background-image: url('{{ asset('images/order-component.jpg') }}'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 80vh;">
    </section>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('orderwardrobe') }}" class="text-uppercase">Order
                        Wardrobe</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Order Component
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-2" style="background-color: #f0f0f0;">
        <div class="row py-4">
            @if ($components->count() > 0)
                @foreach ($components as $index => $component)
                @if ($component->slug != 'base-cabinets' && $component->slug != 'wall-cabinets' && $component->slug != 'tall-cabinets')
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card component-card btn btn-outline-warning">
                            <a href="{{ route('ordercomponentbyname', $component->slug) }}"
                                class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                            <div class="card-header p-0"
                                style="background-image: url('{{ $component->image_path ? asset('uploads/categories/' . $component->image_path) : asset('images/no-image-available.jpg') }}'); min-height: 300px;background-size: cover;background-position: center center;background-repeat: no-repeat;">
                            </div>
                            <div class="card-body component-card-body">
                                <div class="component-card-content">
                                    <h4 class="text-uppercase fs-3 fw-bold text-dark">{{ $component->name }}</h4>
                                    <div class="text-dark">{!! $component->description !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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

    <section class="container-fluid py-5">
        <div class="row">
            <h3 class="text-dark text-uppercase fw-bolder text-center mb-4">Testimonials</h3>
        </div>
        <div class="row">
            <div class="carousel main-carousel-banner owl-carousel clients mb-0"
                    data-margin="30"
                    data-loop="true"
                    data-dots="false"
                    data-autoplay="true"
                    data-autoplay-timeout="3000"
                    data-responsive='{"0":{"items": "3"}, "768":{"items": "4"}, "992":{"items": "4"}, "1200":{"items": "4"}, "1400":{"items": "4"}}'>
                <div class="item mx-10 px-0 w-100" style="border: 2px solid #2b969d">
                    <div class="carousel-card card border border-default w-100" style="border-radius: 0px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body carousel-card-body">
                            <div class="col-12 mb-4 d-flex justify-content-center">
                                <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                            </div>
                            <div class="fw-bold text-center"> <!-- Name -->
                                
                            </div>
                            <div class="text-center">
                                <small class="text-center"> <!-- Date -->
                                    
                                </small>
                            </div>
                        </div>
                        <div class="card-footer carousel-card-footer">
                            <small class="text-dark text-start" style="font-size: 12px"> <!-- Testimonial -->
                            The doors I ordered from BKO Wardrobe completely elevated the look of my wardrobe. The quality and finish are outstanding, and they fit perfectly into my existing cabinets. BKO Wardrobe made the entire process so easy.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="item mx-10 px-0 w-100" style="border: 2px solid #2b969d">
                    <div class="carousel-card card border border-default w-100" style="border-radius: 0px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body carousel-card-body">
                            <div class="col-12 mb-4 d-flex justify-content-center">
                                <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                            </div>
                            <div class="fw-bold text-center"> <!-- Name -->
                                
                            </div>
                            <div class="text-center">
                                <small class="text-center"> <!-- Date -->
                                    
                                </small>
                            </div>
                        </div>
                        <div class="card-footer carousel-card-footer">
                            <small class="text-dark text-start" style="font-size: 12px"> <!-- Testimonial -->
                            It’s amazing how such a small detail can transform the entire look of a wardrobe! The handles from BKO Wardrobe are the perfect finishing touch for my cabinets. They’re stylish, durable, and easy to install. 
                            </small>
                        </div>
                    </div>
                </div>
                <div class="item mx-10 px-0 w-100" style="border: 2px solid #2b969d">
                    <div class="carousel-card card border border-default w-100" style="border-radius: 0px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body carousel-card-body">
                            <div class="col-12 mb-4 d-flex justify-content-center">
                                <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                            </div>
                            <div class="fw-bold text-center"> <!-- Name -->
                                
                            </div>
                            <div class="text-center">
                                <small class="text-center"> <!-- Date -->
                                    
                                </small>
                            </div>
                        </div>
                        <div class="card-footer carousel-card-footer">
                            <small class="text-dark text-start" style="font-size: 12px"> <!-- Testimonial -->
                            From soft-close mechanisms to clever storage solutions, BKO Wardrobe’s accessories are a game-changer for my wardrobe’s functionality. Everything was designed to make my wardrobe more efficient. I highly recommend their products!
                            </small>
                        </div>
                    </div>
                </div>
                <div class="item mx-10 px-0 w-100" style="border: 2px solid #2b969d">
                    <div class="carousel-card card border border-default w-100" style="border-radius: 0px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body carousel-card-body">
                            <div class="col-12 mb-4 d-flex justify-content-center">
                                <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                            </div>
                            <div class="fw-bold text-center"> <!-- Name -->
                                
                            </div>
                            <div class="text-center">
                                <small class="text-center"> <!-- Date -->
                                    
                                </small>
                            </div>
                        </div>
                        <div class="card-footer carousel-card-footer">
                            <small class="text-dark text-start" style="font-size: 12px"> <!-- Testimonial -->
                            I recently upgraded to a new sink from BKO Wardrobe, and it’s both beautiful and functional. The modern design fits seamlessly with my wardrobe, and the material quality is top-notch. Their team made the whole experience stress-free! 
                            </small>
                        </div>
                    </div>
                </div>
                <div class="item mx-10 px-0 w-100" style="border: 2px solid #2b969d">
                    <div class="carousel-card card border border-default w-100" style="border-radius: 0px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body carousel-card-body">
                            <div class="col-12 mb-4 d-flex justify-content-center">
                                <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                            </div>
                            <div class="fw-bold text-center"> <!-- Name -->
                                
                            </div>
                            <div class="text-center">
                                <small class="text-center"> <!-- Date -->
                                    
                                </small>
                            </div>
                        </div>
                        <div class="card-footer carousel-card-footer">
                            <small class="text-dark text-start" style="font-size: 12px"> <!-- Testimonial -->
                            The internal solutions I got from BKO Wardrobe have completely changed how I use my wardrobe. The clever storage options and sturdy mechanisms maximise every inch of space. It’s practical and looks great too!
                            </small>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="container-fluid py-5 p-0">
        <div class="row">
            <h3 class="text-dark text-uppercase fw-bolder text-center">FAQs</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bolder text-dark btn btn-outline-warning" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse1"
                                aria-expanded="false" aria-controls="flush-collapse1">
                                Do We provide consultations to help choose the right wardrobe style?
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            Yes, we offer free consultation calls to help you understand which wardrobe is your go-to wardrobe by considering various factors.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bolder text-dark btn btn-outline-warning" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse2"
                                aria-expanded="false" aria-controls="flush-collapse2">Is it worth replacing the old doors?
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Yes, replacing doors is the cost-effective option to refresh & upgrade your wardrobe without undergoing complete wardrobe renovation.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bolder text-dark btn btn-outline-warning" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse3"
                                aria-expanded="false" aria-controls="flush-collapse3">What are the most popular cabinet handles in London?
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Some people prefer true handleless as it gives a sleek, modern and aesthetic look while other factors such as wardrobe colour, material and finish are also considered when choosing handles.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bolder text-dark btn btn-outline-warning" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse4"
                                aria-expanded="false" aria-controls="flush-collapse4">Are your cabinet doors available in different finishes?
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Yes, we offer a broad spectrum of colours in various finishes including matt, gloss and painted.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bolder text-dark btn btn-outline-warning" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse5"
                                aria-expanded="false" aria-controls="flush-collapse5">What types of sinks do you offer?
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">We offer stainless steel, single & double-bowl sinks, half-bowl sinks and ceramic.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
