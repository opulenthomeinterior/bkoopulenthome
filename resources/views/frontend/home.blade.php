<x-guest-layout>
    <style>
        ol li {
            list-style-type: unset;
        }

        ul li {
            list-style-type: disc;
        }

        .hover-button:hover {
            background-color: #000; /* Change background color to dark */
        }

        .hover-button:hover .card-title {
            color: #fff; /* Change text color to white */
        }
   
        #message {
            resize: none; /* Prevents resizing */
        }
   
        #name::placeholder {
            color: black;
            opacity: 1; /* Ensures the color is fully applied */
        }

        #email::placeholder {
            color: black;
            opacity: 1; /* Ensures the color is fully applied */
        }

        #phone::placeholder {
            color: black;
            opacity: 1; /* Ensures the color is fully applied */
        }

        #call-me-at::placeholder {
            color: black;
            opacity: 1; /* Ensures the color is fully applied */
        }

        #message::placeholder {
            color: black;
            opacity: 1; /* Ensures the color is fully applied */
        }

    /* Ensure the image fades out smoothly on hover */
    .card-body:hover img {
        /* opacity: 0.3; */
        transition: opacity 0.4s ease-in-out;
    }

    /* Display the hover text when hovering over the card */
    .card-body:hover .hover-text {
        opacity: 1;
    }

    /* Ensure the hover text is initially hidden */
    .hover-text {
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
        z-index: 2; /* Make sure text is above the image */
    }

    /* Ensure the image has a lower z-index */
    .img-container img {
        z-index: 1;
        display: block;
        width: 100%;
        height: auto;
    }

    /* Ensuring relative positioning for hover text and image */
    .img-container {
        position: relative;
    }

    .unique-font {
        font-family: 'Merienda', cursive;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); /* Optional shadow for emphasis */
        letter-spacing: 0.02rem;
    }

    .image-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .fade-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        opacity: 0;
        transition: opacity 2s ease-in-out;
    }

    .fade-img.active {
        opacity: 1;
    }

    /* #blinking-text {
        animation: blink 3s infinite;
    }

    @keyframes blink {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
    } */
    .styles-card {
        height: 100%; /* Ensures card stretches to fill the container */
        min-height: 350px; /* Set a minimum height for consistent sizing */
        display: flex;
        flex-direction: column; /* Ensures vertical layout */
        justify-content: space-between; /* Distribute content evenly */
        align-items: stretch; /* Stretch content to align evenly */
    }

    .styles-card-body {
        flex-grow: 1; /* Ensures the card body stretches to fill space */
        display: flex;
        flex-direction: column;
        justify-content: flex-end; /* Align content at the bottom */
    }

    .img-container {
        height: 200px; /* Fixed height for the image container */
        background-color: #f5f5f5; /* Light background for missing images */
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden; /* Prevents content from spilling out */
    }

    .img-container img {
        object-fit: cover; /* Ensures the image fits without distortion */
        width: 100%;
        height: 100%;
    }

    .order-component-button:hover {
        color: #fff !important;
    }

    </style>

    <!-- <section class="container-fluid bg-white px-lg-5 py-3 px-md-3 px-3 mt-4" style="border-top: 3px solid #2b969d; border-right: 3px solid #2b969d">
        <div class="row">
            <div class="col-12 text-center">
                <h1 id="typing-effect" class="fs-4 text-dark text-uppercase fw-bolder unique-font">
                </h1>
            </div>
        </div>
    </section> -->

    <section class="container-fluid bg-white px-lg-5 py-3 px-md-3 px-3 mt-4" style="border-top: 3px solid #2b969d; border-right: 3px solid #2b969d">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fs-4 text-dark text-uppercase fw-bolder unique-font">
                    BW Online Wardrobes - Quality Design, Installation, and Affordability in One Package
                </h1>
            </div>
        </div>
    </section>

    <!-- <section class="container-fluid px-lg-5 px-md-3 px-3 py-lg-5 py-3" style="background-color: #f0f0f0;">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2 class="text-uppercase text-dark fw-bolder" style="font-size: 4rem">20% OFF </h2>
                <h3 class="text-uppercase fw-bolder text-dark">GET 20% OFF ALL ORDERS WHEN YOU OPEN A TRADE ACCOUNT</h3>
            </div>
            <div class="col-lg-6">
                <ul>
                    <li class="fw-bold py-1"><i class="ri-check-line"></i>
                        Wardrobe despatched in 48 hours
                    </li>
                    <li class="fw-bold py-1"><i class="ri-check-line"></i>
                        Over 30 years manufacturing in the UK
                    </li>
                    <li class="fw-bold py-1"><i class="ri-check-line"></i>
                        Standard or made to measure
                    </li>
                    <li class="fw-bold py-1"><i class="ri-check-line"></i>
                        25 years quality guarantee on all cabinets
                    </li>
                    <li class="fw-bold py-1"><i class="ri-check-line"></i>
                        FIRA Gold Certified
                    </li>
                </ul>
            </div>
        </div>
    </section> -->

    <section class="container-fluid position-relative" style="height: 100vh; overflow: hidden; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d; border-left: 3px solid #2b969d">
        <div class="image-container">
            <img src="{{ asset('images/homepage.jpeg') }}" alt="Image 1" class="fade-img py-1 active">
            <img src="{{ asset('images/shaker-22.jpeg') }}" alt="Image 1" class="fade-img py-1">
            <img src="{{ asset('images/True-Handleless-SuperGloss-Graphite.jpg') }}" alt="Image 2" class="fade-img py-1">
            <!-- <img src="{{ asset('images/Slab-Wardrobe.jpg') }}" alt="Image 3" class="fade-img py-1"> -->
            <img src="{{ asset('images/slab.jpeg') }}" alt="Image 4" class="fade-img py-1">
        </div>
        <!-- <img src="{{ asset('images/homepage.jpeg') }}"
            alt="Bespoke Wardrobe Units in London and Surroundings"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center; z-index: -1;"> -->

        <div class="row h-100 w-100 d-flex justify-content-between align-items-center">
            <!-- Left div content -->
            <div class="col-xl-7 col-lg-7 col-md-5 col-sm-12 col-xs-12 col-12 text-center d-flex flex-column justify-content-center align-items-center">
                <h2 class="unique-font text-white fw-bolder text-center p-2" id="typing-effect" 
                    style="text-shadow: 5px 5px 5px black; background-color: rgba(0, 0, 0, 0.5); width: 90%; border-radius: 50px; border: 1px solid #2b969d;">
                    
                </h2>
                <div class="mt-auto p-2">
                    <a href="{{ route('orderwardrobe') }}" class="btn btn-md btn-warning text-white fw-bolder text-uppercase rounded-0">
                        Order Now
                    </a>
                </div>
            </div>

            <!-- Right form content -->
            <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12 col-xs-12 col-12 p-0 d-flex justify-content-center">
                <form method="POST" action="{{ route('contact_us_inquiry') }}" class="border border-warning w-75" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 0px;">
                    @csrf
                    <h4 id="blinking-text" class="text-white fw-bold text-center">
                        Book a free consultation now!
                    </h4>
                    <hr class="border border-warning">
                    <div class="mb-3">
                        <input type="text" style="color: black" class="border border-warning form-control text-dark" name="name" id="name" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <input type="email" style="color: black" class="border border-warning form-control text-dark" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <input type="number" style="color: black" class="border border-warning form-control text-dark" name="phone" id="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="mb-3">
                        <label for="" class="text-white bg-warning p-2 text-end fw-bold">Call me at</label>
                        <input type="datetime-local" style="color: black" class="border border-warning form-control text-dark" name="call_time">
                    </div>
                    <div class="mb-3">
                        <textarea name="message" id="message" name="message" rows="3" class="w-100 border border-warning form-control text-dark" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning fw-bolder text-uppercase" style="border-radius: 0;">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-lg-5 py-3" style="background-color: #f0f0f0; border-bottom: 3px solid #2b969d; border-right: 3px solid #2b969d">
        <div class="row">
            <div class="col-12">
                <p>
                    BW Online is a premier provider of complete wardrobe solutions, specialising in the design and delivery of ready-made wardrobes, rigid wardrobe units, and components in slab, shaker, or J-pull styles. Serving London and the surrounding areas, we pride ourselves on delivering showroom-quality wardrobes directly to your door.
                </p>
                <p>
                    At BW Online, we are committed to crafting every wardrobe with precision and care, ensuring that our customers receive only the highest quality products. Our years of experience in wardrobe design and manufacturing allow us to offer a seamless and stress-free ordering process, from initial design consultation to final delivery.
                </p>
                <p>
                    Operating from state-of-the-art facilities, our skilled workforce uses the latest sustainable manufacturing techniques to create wardrobes that not only meet but exceed our clients' expectations. Our dedication to innovation ensures that our customers always have access to the most up-to-date designs and materials.
                </p>
                <p>
                    Whether you're looking for a modern slab wardrobe, a timeless shaker design, or the sleek lines of a J-pull handleless wardrobe, BW Online makes it easy. Our wardrobes are designed to be user-friendly, with components that are straightforward to assemble, thanks to our advanced clic technology. We offer both flat-pack and pre-assembled options, with fast and reliable delivery.
                </p>
                <p>
                    Born out of a passion for offering better wardrobe solutions, BW Online stands as a trusted partner in creating wardrobes that bring joy for years to come. We invite you to explore our range and experience the difference that quality craftsmanship can make.

                </p>
            </div>
        </div>
    </section>

    <section class="container-fluid py-lg-5 py-3" style="border-bottom: 3px solid #2b969d; border-left: 3px solid #2b969d">
        <div class="row">
            <h3 class="text-uppercase fw-bolder text-dark text-center">ORDER KITCHEN</h3>
        </div>
        <div class="row mt-4 px-0" id="stylesContainer">
            @foreach ($styles as $key => $style)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4 style-card" style="display: {{ $key < 4 ? 'flex' : 'none' }};">
                    <a class="btn btn-outline-warning p-1 border-0 w-100" style="border-radius: 0" href="{{ route('orderwardrobebyname', $style->slug) }}">
                        <div class="card styles-card component-card border-0 h-100 d-flex flex-column justify-content-between">
                            <h4 class="p-4 card-title bg-warning text-uppercase fw-bold text-center text-white">{{$style->name}}</h4>
                            <div class="card-body styles-card-body p-0 border-warning bg-light border d-flex flex-column justify-content-end position-relative" style="box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                                <div class="position-relative img-container">
                                    @if ($style->image_path)
                                        <img src="{{asset('uploads/styles/'.$style->image_path)}}" alt="{{$style->name}}">
                                    @else
                                        <div class="text-center w-100 h-100 d-flex align-items-center justify-content-center">
                                            <span class="text-muted">No Image Available</span>
                                        </div>
                                    @endif
                                    <!-- Hover text -->
                                    <!-- <div class="hover-text position-absolute w-100 h-100 bg-warning text-dark d-flex justify-content-center align-items-center" style="top: 0; left: 0; transition: opacity 0.4s;">
                                        <h5 class="text-dark">Do you find it challenging to find the dream luxury true-handleless wardrobe within your budget? No more with BKO wardrobe, we are here with our true handleless style wardrobes that combine elegance and style with affordability.</h5>
                                    </div> -->
                                </div>
                                <p class="text-center mt-3" style="text-decoration: underline;">See our range</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <button id="showMoreButton" class="btn btn-warning px-4 py-2 text-white" style="border-radius: 0;">Show More</button>
            </div>
        </div>
    </section>
    {{--<section>
        <div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12 col-12 mb-4">
                <a class="btn btn-outline-warning p-1 border-0" style="border-radius: 0;" href="{{ route('orderwardrobebyname', 'true-handleless') }}">
                    <div style="height: 200px;" class="card component-card border-0 h-100 d-flex flex-column justify-content-between">
                        <h4 class="p-4 card-title bg-warning text-uppercase fw-bold text-center">TRUE HANDLELESS KITCHEN</h4>
                        <div class="card-body p-0 border-warning bg-light border d-flex flex-column justify-content-end position-relative">
                            <!-- Image container -->
                            <div class="position-relative img-container">
                                <img src="https://bkonline.uk/public/uploads/styles/15_11_2024_171644_673781fcba4e5-true-handleless.jpeg" class="img-fluid w-100 h-100">
                                <!-- Hover text -->
                                <div class="hover-text position-absolute w-100 h-100 bg-warning text-dark d-flex justify-content-center align-items-center" style="top: 0; left: 0; transition: opacity 0.4s;">
                                    <h5 class="text-dark">Do you find it challenging to find the dream luxury true-handleless wardrobe within your budget? No more with BKO wardrobe, we are here with our true handleless style wardrobes that combine elegance and style with affordability.</h5>
                                </div>
                            </div>
                            <p class="text-center mt-3" style="text-decoration: underline;">See our range</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12 col-12 mb-4">
                <a class="btn btn-outline-warning p-1 border-0" style="border-radius: 0;" href="{{ route('orderwardrobebyname', 'shaker') }}">
                    <div style="height: 200px;" class="card component-card border-0 h-100 d-flex flex-column justify-content-between">
                        <h4 class="p-4 card-title bg-warning text-uppercase fw-bold text-center">SHAKER KITCHEN</h4>
                        <div class="card-body p-0 border-warning bg-light border d-flex flex-column justify-content-end position-relative">
                            <!-- Image container -->
                            <div class="position-relative img-container">
                                <img src="https://bkonline.uk/public/uploads/styles/15_11_2024_171606_673781d675f0e-shaker-22.jpeg" class="img-fluid w-100 h-100">
                                <!-- Hover text -->
                                <div class="hover-text position-absolute w-100 h-100 bg-warning text-dark d-flex justify-content-center align-items-center" style="top: 0; left: 0; transition: opacity 0.4s;">
                                    <h5 class="text-dark">Are you struggling to find an online wardrobe partner in the UK that installs shaker wardrobes with retail quality at online prices? Consider BKO Wardrobe as your trusted partner for streamlining your wardrobe remodeling journey.</h5>
                                </div>
                            </div>
                            <p class="text-center mt-3" style="text-decoration: underline;">See our range</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12 col-12 mb-4">
                <a class="btn btn-outline-warning p-1 border-0" style="border-radius: 0;" href="{{ route('orderwardrobebyname', 'slab-painted') }}">
                    <div style="height: 200px;" class="card component-card border-0 h-100 d-flex flex-column justify-content-between">
                        <h4 class="p-4 card-title bg-warning text-uppercase fw-bold text-center">SLAB PAINTED KITCHEN</h4>
                        <div class="card-body p-0 border-warning bg-light border d-flex flex-column justify-content-end position-relative">
                            <!-- Image container -->
                            <div class="position-relative img-container">
                                <img src="https://bkonline.uk/public/uploads/styles/15_11_2024_171731_6737822b56477-slab-painted.jpeg" class="img-fluid w-100 h-100">
                                <!-- Hover text -->
                                <div class="hover-text position-absolute w-100 h-100 bg-warning text-dark d-flex justify-content-center align-items-center" style="top: 0; left: 0; transition: opacity 0.4s;">
                                    <h5 class="text-dark">Are you thinking of renovating your old wardrobe with a blend of aesthetics and modern touches? If so, it’s time to ease your life with BKO Wardrobe. choose from our Slab Wardrobe designs in your preferred colour to refresh your home vibes.</h5>
                                </div>
                            </div>
                            <p class="text-center mt-3" style="text-decoration: underline;">See our range</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>--}}

    <section class="container-fluid bg-light py-5" style="width: 100%; border-bottom: 3px solid #2b969d; border-right: 3px solid #2b969d">
        <div class="row">
            <h3 class="text-uppercase fw-bolder text-dark text-center">ORDER COMPONENT</h3>
        </div>
        <div class="row mt-4">
            @php
                $categories = \App\Models\Category::where('parent_category_id', null)->whereIn('slug', ['doors', 'accessories', 'internals', 'sinks', 'handles'])->get();
            @endphp
            @foreach($categories as $category)
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 col-12 mb-4">
                <a class="btn btn-outline-warning w-100 text-dark order-component-button" style="border-radius: 0; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);" href="{{route('ordercomponentbyname', [$category->slug])}}">
                    <div class="card-old">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">{{$category->name}}</h5>
                        </div>
        
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <section class="container-fluid py-5" style="border-bottom: 3px solid #2b969d; border-left: 3px solid #2b969d">
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
                    <div class="item mx-10 px-0" style="border: 2px solid #2b969d">
                        <div class="carousel-card card border border-default" style="border-radius: 0px; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);">
                            <div class="card-body carousel-card-body">
                                <div class="col-12 mb-4 d-flex justify-content-center">
                                    <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                                </div>
                                <div class="fw-bold text-center">
                                    Smith
                                </div>
                                <div class="text-center">
                                    <small class="text-center">2023-11-19</small>
                                </div>
                            </div>
                            <div class="card-footer carousel-card-footer">
                                <small class="text-dark text-start" style="font-size: 12px">I discovered BKO Wardrobe's online services through a recommendation from a colleague. Reaching out to them via WhatsApp was incredibly convenient, and they quickly arranged a free consultation call. From the initial planning to the seamless installation of my shaker wardrobe, the entire experience was outstanding. I wouldn’t hesitate to recommend their design and installation services to others!</small>
                            </div>
                        </div>
                    </div>
                    <div class="item mx-10 px-0" style="border: 2px solid #2b969d">
                        <div class="carousel-card card border border-default" style="border-radius: 0px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
                            <div class="card-body carousel-card-body">
                                <div class="col-12 mb-4 d-flex justify-content-center">
                                    <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                                </div>
                                <div class="fw-bold text-center">
                                    Daisy
                                </div>
                                <div class="text-center">
                                    <small class="text-center">2024-04-03</small>
                                </div>
                            </div>
                            <div class="card-footer carousel-card-footer">
                                <small class="text-dark text-start" style="font-size: 12px">After much planning to upgrade my wardrobe utilities, I decided to order from BKO Wardrobe. I purchased their grey sink, tap, and a tall L-shaped blind corner unit. Everything was delivered on time, and the quality exceeded my expectations. On top of that, their prices were very reasonable. I highly recommend BKO Wardrobe for anyone looking for a perfect blend of quality and affordability.</small>
                            </div>
                        </div>
                    </div>
                    <div class="item mx-10 px-0" style="border: 2px solid #2b969d">
                        <div class="carousel-card card border border-default" style="border-radius: 0px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
                            <div class="card-body carousel-card-body">
                                <div class="col-12 mb-4 d-flex justify-content-center">
                                    <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                                </div>
                                <div class="fw-bold text-center">
                                    Katherine Kate
                                </div>
                                <div class="text-center">
                                    <small class="text-center">2024-07-14</small>
                                </div>
                            </div>
                            <div class="card-footer carousel-card-footer">
                                <small class="text-dark text-start" style="font-size: 12px">I reached out to BKO Wardrobe through WhatsApp for their bespoke wardrobe design and installation services in London, and the experience was seamless. They conducted a detailed wardrobe survey and crafted a bespoke wardrobe for my small space, with results that were nothing short of magical. Everything was perfectly executed, and my wardrobe now feels more spacious and functional. I’m beyond satisfied with BKO Wardrobe and highly recommend their services!</small>
                            </div>
                        </div>
                    </div>
                    <div class="item mx-10 px-0" style="border: 2px solid #2b969d">
                        <div class="carousel-card card border border-default" style="border-radius: 0px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
                            <div class="card-body carousel-card-body">
                                <div class="col-12 mb-4 d-flex justify-content-center">
                                    <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" height="50px" width="50px" class="img-fluid rounded-circle">
                                </div>
                                <div class="fw-bold text-center">
                                    Amelia Turner
                                </div>
                                <div class="text-center">
                                    <small class="text-center">2023-08-08</small>
                                </div>
                            </div>
                            <div class="card-footer carousel-card-footer">
                                <small class="text-dark text-start" style="font-size: 12px">It’s ideal for my contemporary London home, and the team ensured a flawless installation. Highly recommend their services! My True Handleless wardrobe from BKO Wardrobe is everything I dreamed of—minimalistic, chic, and functional.</small>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section class="container-fluid py-5 p-0" style="border-bottom: 3px solid #2b969d; border-right: 3px solid #2b969d">
        <div class="row">
            <h3 class="text-dark text-uppercase fw-bolder text-center">FAQs</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @if ($generalFaqs->count() > 0)
                        @foreach ($generalFaqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bolder btn btn-outline-warning" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $loop->index + 1 }}"
                                        aria-expanded="false" aria-controls="flush-collapse{{ $loop->index + 1 }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $loop->index + 1 }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{!! $faq->answer !!}</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info" role="alert">
                            No FAQ's found.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- <div class="row pt-3">
            <div class="col-lg-12">
                <h3 class="text-dark text-uppercase fw-bolder">Deliveries FAQs</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample2">
                    @if ($deliveryFaqs->count() > 0)
                        @foreach ($deliveryFaqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header text-decoration-underline">
                                    <button class="accordion-button collapsed fw-bolder" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapsedelivery{{ $loop->index + 1 }}"
                                        aria-expanded="false"
                                        aria-controls="flush-collapsedelivery{{ $loop->index + 1 }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapsedelivery{{ $loop->index + 1 }}"
                                    class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">{!! $faq->answer !!}</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info" role="alert">
                            No FAQ's found.
                        </div>
                    @endif
                </div>
            </div>
        </div> -->
    </section>

</x-guest-layout>