<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('checkout.success') . "?session_id=" . $order->session_id }}" class="text-uppercase">Order Confirmation</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Order Confirmed
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-3">
        <div id="checkout-confirmation"
            class="content fv-plugins-bootstrap5 fv-plugins-framework active dstepper-block">
            <div class="row mb-3">
                <div class="col-12 col-lg-8 mx-auto text-center mb-3">
                    <h4 class="mt-2">Thank You! 😇</h4>
                    <p>Your order <a href="javascript:void(0)">#{{ $order->order_number }}</a> has been placed!</p>
                    <p>We sent an email to <a
                            href="mailto:{{ $order->contact_email_address }}">{{ $order->contact_email_address }}</a>
                        with your
                        order confirmation and receipt. If the email hasn't arrived within two minutes, please check
                        your spam folder to see if the email was routed there.</p>
                    <p><span class="fw-medium"><i class="bx bx-time-five me-1"></i> Time placed:&nbsp;</span>
                        {{ $order->created_at->format('d/m/Y h:ia') }}</p>
                </div>
                <!-- Confirmation details -->
                <div class="col-12">
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item flex-fill p-4 text-heading">
                            <h6 class="d-flex align-items-center gap-1">
                                <i class="bx bx-map"></i> Shipping
                            </h6>
                            <address class="mb-0">
                                {{ $order->first_name ?? '' }} {{ $order->last_name ?? '' }} <br>
                                {{ $order->house_number ?? '' }} {{ $order->street_address }},
                                @if ($order->address_line2)
                                    {{ $order->address_line2 }},
                                @endif <br>
                                {{ $order->city ?? '' }}, {{ $order->postcode ?? '' }}, <br>
                                {{ $order->delivery_country ?? '' }}
                            </address>
                            <p class="mb-0 mt-3">
                                {{ $order->mobile ?? '' }}
                            </p>
                        </li>
                        <li class="list-group-item flex-fill p-4 text-heading">
                            <h6 class="d-flex align-items-center gap-1">
                                <i class="bx bx-credit-card"></i>
                                Billing Address
                            </h6>
                            <address class="mb-0">
                                {{ $order->cardholder_name }} <br>
                                {{ $order->cardholder_address }},
                                @if ($order->cardholder_address_line2)
                                    {{ $order->cardholder_address_line2 }},
                                @endif
                                <br>
                                {{ $order->cardholder_city ?? $order->city }},
                                {{ $order->cardholder_postcode ?? $order->postcode }},<br>
                                {{ $order->cardholder_country ?? $order->delivery_country }}
                            </address>
                            <p class="mb-0 mt-3">
                                {{ $order->cardholder_mobile ?? '' }}
                            </p>
                        </li>
                        <li class="list-group-item flex-fill p-4 text-heading">
                            <h6 class="d-flex align-items-center gap-1"><i class="bx bxs-ship"></i> Shipping Method</h6>
                            <p class="fw-medium mb-3">Preferred Method:</p>
                            Standard Delivery<br>
                            (Normally 3-4 business days)
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Confirmation items -->
                <div class="col-xl-9 mb-3 mb-xl-0">
                    <ul class="list-group">
                        @foreach ($order->order_details as $item)
                            <li class="list-group-item p-4">
                                <div class="d-flex gap-3">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('imgs/products/' . $item['image_path']) }}"
                                            class="image-fluid"
                                            style="width:150px;height:150px;object-fit:cover;object-position:center;"
                                            alt="{{ $item['full_title'] }}">
                                    </div>
                                    <div class="flex-grow-1 align-self-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="{{ route('orderbyproduct', $item['slug']) }}" target="_blank" class="text-body">
                                                    <h4 class="fs-4">{{ $item['full_title'] }}</h4>
                                                </a>
                                                <div class="text-muted mb-1 d-flex flex-wrap">
                                                    <span class="me-1 fw-bold">Quantity:</span>
                                                    <span class="me-3">{{ $item['quantity'] }}</span>
                                                </div>
                                                <div class="mt-2 mt-lg-4">
                                                    @if ($item['discounted_price'] && $item['discounted_price'] != $item['price'])
                                                        <span class="text-primary">€{{ $item['discounted_price'] }}/</span>
                                                        <s class="text-muted">€{{ $item['price'] }}</s>
                                                    @else
                                                        <span class="text-primary">€{{ $item['price'] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Confirmation total -->
                <div class="col-xl-3">
                    <div class="border rounded p-4 pb-3">
                        <!-- Price Details -->
                        <h6>Price Details</h6>
                        <dl class="row mb-0">
                            <dt class="col-6 fw-normal">Order Total</dt>
                            <dd class="col-6 text-end">€{{ $order->total_amount }}</dd>
                        </dl>
                        <hr class="mx-n4">
                        <dl class="row mb-0">
                            <dt class="col-6">Total</dt>
                            <dd class="col-6 fw-medium text-end mb-0">€{{ $order->total_amount }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function () {
                var empty_cart = '{{ $empty_cart }}';
                if (empty_cart == '1') {
                    localStorage.removeItem('bko_cart');
                }
            });
        </script>
    @endpush

</x-guest-layout>
