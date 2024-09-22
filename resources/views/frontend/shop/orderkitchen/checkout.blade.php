<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Checkout</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Cart
                </h1>
            </div>
        </div>
    </section>


    <section class="container-fluid px-lg-5 px-md-3 px-3 py-3 d-none" id="checkout-container">
        <form id="checkout-form" class="row" action="{{ route('checkout.process') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="discount_code" id="discount_code" value="" readonly>
            <div id="items_for_checkout">

            </div>
            <div class="col-lg-12">
                <nav>
                    <div class="nav nav-tabs custom-nav" style="" id="nav-tab" role="tablist">
                        <button class="nav-link checkout-tabs active" id="nav-checkout-tab1" data-bs-toggle="tab"
                            data-bs-target="#nav-checkout1" type="button" role="tab" aria-controls="nav-checkout1"
                            aria-selected="true">Delivery</button>
                        <button class="nav-link checkout-tabs" id="nav-checkout-tab2" data-bs-toggle="tab"
                            data-bs-target="#nav-checkout2" type="button" role="tab" aria-controls="nav-checkout2"
                            aria-selected="false" disabled="true">Account</button>
                        <button class="nav-link checkout-tabs" id="nav-checkout-tab3" data-bs-toggle="tab"
                            data-bs-target="#nav-checkout3" type="button" role="tab" aria-controls="nav-checkout3"
                            aria-selected="false" disabled="true">CardHolder</button>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent" style="border-top: 1px solid black">
                    <div class="tab-pane fade show active" id="nav-checkout1" role="tabpanel"
                        aria-labelledby="nav-checkout-tab1" tabindex="0">

                        <div class="row pt-3">
                            <div class="col-lg-12" style="border-bottom: 1px solid black">
                                <h3 class="fw-bold text-dark">Delivery Address</h3>
                            </div>
                            <div class="col-lg-12 pt-3">
                                <p class="text-dark">
                                    You can click below for delivery to your default address, or you can change delivery
                                    to the end customer's location, by inserting a new postcode, then clicking on
                                    "Search for Address".<br>
                                    Delivery Service Only. Appliances, worktops, upstands, breakfast bars & edging
                                    cannot be collected at our Doncaster factory.</p>
                            </div>

                            <div class="row py-3">
                                <div class="col-lg-12">
                                    <h4 class="fw-bold text-dark">Delivery Recipient</h4>
                                </div>
                                <div class="col-6">
                                    <label class="py-1" for="first_name">First <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        required />
                                </div>
                                <div class="col-6">
                                    <label class="py-1" for="last_name">Surname <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        required />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6">
                                    <label class="py-1" for="mobile">Mobile <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="mobile" name="mobile" required />
                                </div>

                                <div class="col-6">
                                    <label class="py-1" for="delivery_country">Delivery Country <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="delivery_country" name="delivery_country"
                                        aria-label="Default select example" required>
                                        <option selected>Select your country</option>
                                        <!-- <option value="United States">United States</option>
                                        <option value="Ireland">Ireland</option> -->
                                        <option value="United Kingdom" selected>United Kingdom</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6">
                                    <label class="py-1" for="postcode">Postcode <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="postcode" name="postcode"
                                        required />
                                </div>
                                <div class="col-6">
                                    <label class="py-1" for="house_number">Delivery House / Building Number</label>
                                    <input type="text" class="form-control" id="house_number"
                                        name="house_number" />
                                    <small>if no number, insert 0 or N/A</small>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6">
                                    <label class="py-1" for="street_address">Delivery Street Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="street_address"
                                        name="street_address" required />
                                </div>
                                <div class="col-6">
                                    <label class="py-1" for="address_line2">Delivery Address Line 2</label>
                                    <input type="text" class="form-control" id="address_line2"
                                        name="address_line2" />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6">
                                    <label class="py-1" for="city">Delivery Town / City <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-lg-12" style="border-bottom: 1px solid black">
                                <h3 class="fw-bold text-dark">Delivery Options</h3>
                            </div>

                            <div class="row py-3">
                                <div class="col-12">
                                    <label class="py-1" for="order_reference">Personalize your Order Reference
                                        Number</label>
                                    <input type="text" class="form-control" id="order_reference"
                                        name="order_reference" placeholder="0 of 15 max characters" />
                                    <small>Enter a personalized reference number so you can easily identify this
                                        purchase among your other BK Online orders.</small>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-12">
                                    <label class="py-1" for="delivery_date">Earliest Delivery Date</label>
                                    <input type="date" class="form-control" id="delivery_date"
                                        name="delivery_date" />
                                    <small>Stock and flat-packed items are dispatched within 48 hours. Rigid items are
                                        dispatched within 10 days. You can choose a later delivery date using this
                                        tool.</small>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-12">
                                <button type="button" id="checkout-next1"
                                    class="btn btn-md btn-dark rounded-0">Next</button>
                            </div>
                        </div>

                    </div>



                    <div class="tab-pane fade" id="nav-checkout2" role="tabpanel"
                        aria-labelledby="nav-checkout-tab2" tabindex="0">
                        <div class="row pt-3">
                            <div class="col-lg-12" style="border-bottom: 1px solid black">
                                <h3 class="fw-bold text-dark">Contact Details</h3>
                            </div>

                            <div class="row py-3">
                                <div class="col-6">
                                    <label class="py-1" for="contact_first_name">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="contact_first_name"
                                        name="contact_first_name" required />
                                </div>
                                <div class="col-6">
                                    <label class="py-1" for="contact_last_name">Surname <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="contact_last_name"
                                        name="contact_last_name" required />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1" for="contact_company_name">Your Company Name</label>
                                    <input type="text" class="form-control" id="contact_company_name"
                                        name="contact_company_name" />
                                    <small>0 of 120 max characters</small>
                                </div>

                                <div class="col-6 ">
                                    <label class="py-1" for="contact_email_address">Your Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="contact_email_address"
                                        name="contact_email_address" required />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-12 ">
                                    <label class="py-1" for="contact_mobile_number">Mobile <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="contact_mobile_number"
                                        name="contact_mobile_number" required />
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-12">
                                <button type="button" id="checkout-next2"
                                    class="btn btn-md btn-dark rounded-0">Next</button>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-checkout3" role="tabpanel"
                        aria-labelledby="nav-checkout-tab3" tabindex="0">
                        <div class="row pt-3">
                            <div class="col-lg-12" style="border-bottom: 1px solid black">
                                <h3 class="fw-bold text-dark">Billing Details</h3>
                            </div>

                            <div class="row py-3">
                                <div class="col-6">
                                    <label class="py-1">Choose a payment method <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="inlineRadio1" value="card" checked>
                                        <label class="form-check-label" for="inlineRadio1">Credit Card</label>
                                    </div>
                                    {{-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio2" value="paypal">
                                            <label class="form-check-label" for="inlineRadio2">Paypal</label>
                                        </div> --}}
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="inlineRadio3" value="klarna">
                                        <label class="form-check-label" for="inlineRadio3">Klarna</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6">
                                    <label class="py-1" for="cardholder_name">Cardholder Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="cardholder_name"
                                        name="cardholder_name" required />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1" for="cardholder_email">Cardholder Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="cardholder_email"
                                        name="cardholder_email" required />
                                    <small>0 of 120 max characters</small>
                                </div>

                                <div class="col-6 ">
                                    <label class="py-1" for="cardholder_mobile">Cardholder Mobile Number <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="cardholder_mobile"
                                        name="cardholder_mobile" required />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-12 pb-2 ">
                                    <label class="py-1" for="cardholder_address">Cardholder Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="cardholder_address"
                                        name="cardholder_address" placeholder="Address 1" required />
                                </div>

                                <div class="col-6 py-2 ">
                                    <input type="text" class="form-control" id="cardholder_address_line2"
                                        name="cardholder_address_line2" placeholder="Address 2" />
                                </div>

                                <div class="col-6 py-2 ">
                                    <input type="text" class="form-control" id="cardholder_city"
                                        name="cardholder_city" placeholder="City" />
                                </div>

                                <div class="col-6 py-2 ">
                                    <input type="text" class="form-control" id="cardholder_country"
                                        name="cardholder_country" placeholder="County" />
                                </div>

                                <div class="col-6 py-2 ">
                                    <input type="text" class="form-control" id="cardholder_postcode"
                                        name="cardholder_postcode" placeholder="Postcode" />
                                </div>

                            </div>

                        </div>

                        <div class="row pt-3">
                            <div class="col-12">
                                <button type="button" id="checkout-next3"
                                    class="btn btn-md btn-dark rounded-0">Proceed to Pay</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </form>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-lg-5 py-3">
        <div class="row">
            <div class="col-12">
                <div class="payment-logos d-inline-block position-relative px-4 py-3" style="border: 1px solid black">
                    <small class="fw-bold text-uppercase position-absolute bg-white"
                        style="top:-7px;left:15px">Transactions Secured By</small>
                    <img width="100" height="72" class="logo lazyloaded" alt="Payments verified through Opayo"
                        src="{{ asset('images/payments/opayo.png') }}">
                    <img width="100" height="72" class="logo lazyloaded" alt="Visa Payments Accepted"
                        src="{{ asset('images/payments/visa.png') }}">
                    <img width="100" height="72" class="logo lazyloaded" alt="Mastercard Payments Accepted"
                        src="{{ asset('images/payments/mastercard.png') }}">
                    <img width="100" height="72" class="logo lazyloaded" alt="Maestro Payments Accepted"
                        src="{{ asset('images/payments/maestro.png') }}">
                    <img width="100" height="72" class="logo lazyloaded"
                        alt="Payments accepted through PayPal" src="{{ asset('images/payments/paypal.png') }}">
                    <img width="100" height="72" class="logo lazyloaded"
                        alt="Payments accepted through Klarna" src="{{ asset('images/payments/klarna.png') }}">
                </div>

            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var code = localStorage.getItem('discountCode');
                if (code) {
                    $.ajax({
                        url: "{{ route('apply.promocode') }}",
                        type: "POST",
                        data: {
                            code: code
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                if (response.result) {
                                    $('#discount_code').val(code);
                                }
                            } else {
                                localStorage.removeItem('discountCode');
                                $('#discount_code').val('');
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
</x-guest-layout>
