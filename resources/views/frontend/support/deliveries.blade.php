<x-guest-layout>
    <style>
        ol li {
            list-style-type: unset;
        }

        ul li {
            list-style-type: disc;
        }
    </style>

    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Support</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Deliveries
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-5">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-dark text-uppercase fw-bolder">Deliveries FAQ</h3>
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
        </div>

    </section>

</x-guest-layout>
