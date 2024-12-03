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
                <h1 class="fs-1 fw-bolder text-dark text-uppercase">Order Wardrobe</h1>
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
                <img src="{{ $styleData['data']->image_path ? asset('uploads/styles/' . $styleData['data']->image_path) : asset('images/order-component.jpg') }}"
                    class="img-fluid" />
            </div>

            <div class="col-lg-6 col-md-6 col-12 px-4 mt-md-0 my-3">
                <div class="d-flex justify-content-between align-items-center border-bottom border-warning mb-3">
                    <h1 class="fs-3 fw-bolder text-dark text-uppercase">{{ $styleData['data']->name }}</h1>
                    <a class="btn btn-sm btn-outline-warning text-dark" href="{{route('orderwardrobebyname', [$styleData['data']->slug])}}" style="border-radius: 0;">Explore</a>
                </div>

                <!-- <p>
                        18mm MDF slab doors available in 12 SuperGloss and UltraMatt finishes. Also available in 2 MFC
                        standard finishes.
                    </p> -->

                <h2 class="fs-5 text-dark fw-bold text-uppercase">Despatch</h2>
                <p>First select your choice of assembly:</p>

                @foreach ($styleData['assemblies'] as $assemblyName => $assemblyData)
                <button type="button" id="{{ $assemblyName == 'Rigid' ? 'rigid_btn' : 'flatpacked_btn' }}"
                    class="btn btn-sm btn-outline-warning text-dark rounded-0">{{ $assemblyName }}</button>
                @endforeach

                @foreach ($styleData['assemblies'] as $assemblyName => $assemblyData)
                <div class="py-2 mt-3 d-none" id="{{ $assemblyData['data']->slug == 'rigid' ? 'rigid' : 'flatpacked' }}">
                    <h2 class="fs-6 text-dark fw-bold">MDF COLOURS ({{ $assemblyName }})</h2>
                    <p>Choose a colour:</p>
                    <div class="row g-1">
                        @foreach ($assemblyData['colours'] as $colour)
                        <div
                            class="col-6 d-flex position-relative align-items-center justify-content-center">
                            @if (!empty($colour->colour_code))
                            <div
                                class="colour-div position-absolute start-0 top-50 translate-middle-y ms-2 border border-dark" style="background-color: {{$colour->colour_code}};">
                            </div>
                            @else
                            <div
                                class="colour-div position-absolute start-0 top-50 translate-middle-y ms-2 border border-dark" style="background: linear-gradient(to right, red, yellow, green);">
                            </div>
                            @endif
                            <a href="{{ route('orderwardrobebycolour', ['style' => $styleData['data']->slug , 'assembly' => $assemblyData['data']->slug, 'colour' => $colour->slug]) }}" class="colour-btn btn w-100 rounded-0 sidebar-btn text-start">
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
                                I’m thrilled with my new J Pull wardrobe from BKO Wardrobe. The sleek design blends perfectly with my modern London apartment, and the craftsmanship is superb. The installation team was punctual and professional, making the entire process stress-free!
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
                                I couldn’t be happier with the result! The timeless elegance of my new Shaker wardrobe has completely transformed my London home. BKO Wardrobe exceeded my expectations with their attention to detail and high-quality finishes.
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
                                The whole experience, from consultation to installation, was top-notch! The slab laminated wardrobe I purchased from BKO Wardrobe is a game-changer. It’s stylish, durable, and easy to maintain—perfect for the busy city living in London. 
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
                                It’s ideal for my contemporary London home, and the team ensured a flawless installation. Highly recommend their services! My True Handleless wardrobe from BKO Wardrobe is everything I dreamed of—minimalistic, chic, and functional. 
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
                                The MFC wardrobe from BKO Wardrobe was the perfect choice for my /London flat. It combines affordability with quality, and the finish is stunning. The team was incredibly professional and delivered everything on time. I’m so happy with my new wardrobe!
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
                                    Do we offer customised colours in Matt or Gloss?
                                </button>
                            </h2>
                            <div id="flush-collapse1" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                Yes, we offer a customised range of colours in matt, gloss and painted finish for every wardrobe style.
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
                                    aria-expanded="false" aria-controls="flush-collapse2">What is the difference between J Pull and J Pull 22?
                                </button>
                            </h2>
                            <div id="flush-collapse2" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">J Pull 22 is a premium, refined version of the classic J Pull design, The "22" signifies an upgraded version with an enhanced, contemporary edge compared to the traditional, softer J Pull.</div>
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
                                    aria-expanded="false" aria-controls="flush-collapse3">What Is the Most Trending Wardrobe Style in the UK?
                                </button>
                            </h2>
                            <div id="flush-collapse3" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">The most trending wardrobe styles for 2024 include sleek, modern designs with minimalistic aesthetics.</div>
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
                                    aria-expanded="false" aria-controls="flush-collapse4">What Is the Quality Difference Between a Slab Laminated and a Slab Painted?
                                </button>
                            </h2>
                            <div id="flush-collapse4" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Laminated slabs are highly durable, scratch-resistant, and budget-friendly, while painted slabs provide a luxurious, smooth finish with vibrant colour depth, perfect for creating a premium look.</div>
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
                                    aria-expanded="false" aria-controls="flush-collapse5">What Things Should You Know Before Ordering Any Wardrobe?
                                </button>
                            </h2>
                            <div id="flush-collapse5" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Having a clear understanding of your wardrobe space, budget, and personal preferences for colour and design is essential before ordering any wardrobe </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</x-guest-layout>