<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">SiteMap</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="text-dark text-uppercase fw-bolder">
                    SiteMap
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-lg-5 py-3">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-dark text-uppercase fw-bolder">
                    Pages
                </h2>
                <ul style="list-style: disc">
                    <li><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li><a href="{{ route('orderwardrobe') }}" class="text-dark">Our Wardrobe</a></li>
                    <li><a href="{{ route('help_and_guides') }}" class="text-dark">Help & Guides</a></li>
                    <ul style="list-style: circle">
                        <li><a href="{{ route('about') }}" class="text-dark">About Us</a></li>
                        <li><a href="{{ route('terminology') }}" class="text-dark">Wardrobe Terminology</a></li>
                        <li><a href="{{ route('fittingguide') }}" class="text-dark">Fitting Guide</a></li>
                        <li><a href="{{ route('wardrobearrive') }}" class="text-dark">How willy our Wardrobe Arrive?</a>
                        </li>
                        <li><a href="{{ route('needhelp') }}" class="text-dark">Need Help Measuring?</a></li>
                        <li><a href="{{ route('faq') }}" class="text-dark">Wardrobe FAQs</a></li>
                        <li><a href="{{ route('designservice') }}" class="text-dark">Virtual Design Service</a></li>
                    </ul>
                    <li><a href="{{ route('shop') }}" class="text-dark">Shop</a></li>
                    <ul style="list-style: circle">
                        <li><a href="{{ route('orderwardrobe') }}" class="text-dark">Order Your Wardrobe</a></li>
                        <ul style="list-style: square">
                            @foreach ($orderWardrobe as $styleName => $styleData)
                                @foreach ($styleData['assemblies'] as $assemblyName => $assemblyData)
                                    @foreach ($assemblyData['colours'] as $colour)
                                        <li>
                                            <a href="{{ route('orderwardrobebycolour', ['style' => $styleData['data']->slug, 'assembly' => $assemblyData['data']->slug, 'colour' => $colour->slug]) }}"
                                                class="text-dark">
                                                {{ $styleData['data']->name }} {{ $colour->trade_colour }}
                                                {{ $assemblyData['data']->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </ul>
                    </ul>
                    <ul style="list-style: circle">
                        <li><a href="{{ route('ordercomponent') }}" class="text-dark">Order Components</a></li>
                        <ul style="list-style: square">
                            @foreach ($orderComponent as $component)
                                <li>
                                    <a href="{{ route('ordercomponentbyname', $component->slug) }}" class="text-dark">
                                        {{ $component->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </ul>
                    <li><a href="{{ route('open-account') }}" class="text-dark">Open Trade Account</a></li>
                    <li><a href="{{ route('login') }}" class="text-dark">Login</a></li>
                    <li><a href="{{ route('cart') }}" class="text-dark">Cart</a></li>
                    <li><a href="{{ route('checkout') }}" class="text-dark">Checkout</a></li>
                    <li><a href="{{ route('support') }}" class="text-dark">Support</a></li>
                    <ul style="list-style: circle">
                        <li><a href="{{ route('downloadable') }}" class="text-dark">Downloadable Resources</a></li>
                        <ul style="list-style: square">
                            @foreach ($downloadableResources as $resource)
                                <li>
                                    <a href="{{ asset('/uploads/guides/' . $resource->file_path) }}" target="_blank"
                                        class="text-dark">
                                        {{ $resource->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <li><a href="{{ route('termandcondition') }}" class="text-dark">Terms & Conditions</a></li>
                        <ul style="list-style: square">
                            <li><a href="{{ route('termandcondition') }}" class="text-dark">Terms & Conditions</a></li>
                            <li><a href="{{ route('pricepromise') }}" class="text-dark">Price Promise</a></li>
                            <li><a href="{{ route('pricebeat') }}" class="text-dark">Can't Be Beaten on Price</a></li>
                            <li><a href="{{ route('promotion') }}" class="text-dark">Promotion Terms & Conditions</a></li>
                            <li><a href="{{ route('virtualdesignterm') }}" class="text-dark">Virtual Design Terms & Conditions</a></li>
                        </ul>
                        <li><a href="{{ route('installationvideos') }}" class="text-dark">Installation Videos</a></li>
                        <li><a href="{{ route('printresources') }}" class="text-dark">Print Resources</a></li>
                    </ul>
                    <li><a href="{{ route('site_maps') }}" class="text-dark">Site Pages</a></li>
                    <ul style="list-style: circle">
                        <li><a href="{{ route('privacy') }}" class="text-dark">Privacy Policy</a></li>
                        <li><a href="{{ route('cookies') }}" class="text-dark">Cookie Policy</a></li>
                        <li><a href="{{ route('site_maps') }}" class="text-dark">SiteMap</a></li>
                    </ul>
                </ul>
            </div>
            <div class="col-md-6">
                <h2 class="text-dark text-uppercase fw-bolder">
                    Blogs
                </h2>
                <ul style="list-style: disc">
                    @foreach ($blogs as $blog)
                        <li>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-dark">
                                {{ $blog->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</x-guest-layout>
