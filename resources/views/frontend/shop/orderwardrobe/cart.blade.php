<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-uppercase">Shop</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Cart</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Cart
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-3">
        <div class="row">
            <div class="col-lg-12 border rounded p-4">
                <h4 class="fw-bold text-dark ">Cart Summary</h4>
                <table class="table table-card">
                    <thead>
                        <th>&nbsp;</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th class="text-end">Sub</th>
                    </thead>
                    <tbody id="productCartTableBody">
                        <td colspan="5" class="text-center py-5">No items in cart</td>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12 mt-4 border rounded p-4 mb-3 pb-3">
                <h4 class="fw-bold text-dark ">Pricing</h4>
                <div class="bg-white py-2">
                    <div class="row py-2">
                        <div class="col-6">
                            <h6 class="fw-bold">Cart Total</h6>
                        </div>
                        <div class="col-6">
                            <h6 class="text-end" id="cartTotalAmount">£0</h6>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm-6 text-sm-start text-center">
                            <h6 class="fw-bold">Add Coupon</h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex justify-content-sm-end justify-content-center">
                                        <input type="text" class="form-control" id="promoCode"
                                            placeholder="Enter Promo Code" aria-label="Enter Promo Code"
                                            style="width: 200px">
                                        <button type="button" class="btn btn-dark rounded-0" style="width: 100px"
                                            id="addPromoCode">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="add_discount_details">

                    </div>
                    <hr class="mx-n4">
                    <div class="row py-2">
                        <div class="col-6">
                            <h6 class="fw-bold">Total Price</h6>
                        </div>
                        <div class="col-6">
                            <h6 class="text-end" id="cartTotalAmountWithVAT">£0</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-lg-12 text-lg-end text-md-end text-center">
                <a href="{{ route('checkout') }}" class="btn btn-md btn-dark fw-bold rounded-0">Checkout</a>
            </div>
        </div>
    </section>

    <style>
        .modal {
            --in-modal-width: 80% !important;
        }
    </style>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Compare Products</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row" id="cart_Product">
                                {{-- <div class="col-lg-12 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <figure>
                                                            <img class="product-image px-0"
                                                                src="{{ asset('images/no-image-available.jpg') }}"
                                                                alt="Card image cap">
                                                        </figure>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="text-start">
                                                            <a href=""
                                                                class="text-start text-decoration-underline fs-5 fw-bold">
                                                                new product
                                                            </a>
                                                            <p class="py-lg-3 py-2">
                                                                <small class="fw-bold text-start">23x42x64mm</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center">
                                                                <div class="col-12">
                                                                    <p class="fs-5 fw-bold mt-lg-2">£7845</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Style</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>Jpull</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Colour</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>Cashmere ultra white</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>Rigid</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-8" style="height: 400px; overflow-y:auto">
                            <div class="row" id="compareProducts">
                                {{-- <div class="col-lg-6 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <figure>
                                                            <img class="product-image px-0"
                                                                src="{{ asset('images/no-image-available.jpg') }}"
                                                                alt="Card image cap">
                                                        </figure>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="text-start">
                                                            <a href=""
                                                                class="text-start text-decoration-underline fs-5 fw-bold">
                                                                new product
                                                            </a>
                                                            <p class="py-lg-3 py-2">
                                                                <small class="fw-bold text-start">23x42x64mm</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center">
                                                                <div class="col-12">
                                                                    <p class="fs-5 fw-bold mt-lg-2">£7845</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Style</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>Jpull</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Colour</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>Cashmere ultra white</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 p-0 d-md-flex d-none">
                                                                    <p
                                                                        class="category-text text-start text-uppercase m-0 pt-1">
                                                                        <small>Assembly</small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 p-0 text-center">
                                                                    <p class="category-value fw-semibold py-1 mb-2">
                                                                        <small>Rigid</small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark rounded-0 hideCompareModel" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cart-items-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Change Styles</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <th>Item</th>
                                </thead>
                                <tbody id="changeStyleTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark rounded-0 hideCompareModel" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var check_code_route = "{{ route('apply.promocode') }}";
    
                $(document).on('click', '#addPromoCode', function() {
                    var promoCode = $('#promoCode').val();
    
                    let products = localStorage.getItem('bko_cart');
                    if (!products) {
                        return;
                    }
                    products = JSON.parse(products);
                    let totalAmount = 0;
                    products.forEach(product => {
                        totalAmount += product.quantity * product.price;
                    });
    
                    $.ajax({
                        url: "{{ route('apply.promocode') }}",
                        type: "POST",
                        data: {
                            code: promoCode
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                if (response.result) {
                                    var code = response.result.id;
                                    var name = response.result.name;
                                    var discount = parseFloat(response.result.percent_off);
    
                                    // Save discount code in localStorage
                                    localStorage.setItem('discountCode', code);
    
                                    var discountAmount = (totalAmount * discount) / 100;
    
                                    $('#add_discount_details').html(`
                                        <div class="row py-2">
                                            <div class="col-6">
                                                <h6 class="fw-bold">Discount Percentage</h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="text-end">${discount}%</h6>
                                            </div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-6">
                                                <h6 class="fw-bold">Discount (${name})</h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="text-end">-£${discountAmount.toFixed(2)}</h6>
                                            </div>
                                        </div>
                                    `);
    
                                    // Update total price after discount
                                    var cartTotalAmountWithVAT = totalAmount - discountAmount;
                                    $('#cartTotalAmountWithVAT').text(`£${cartTotalAmountWithVAT.toFixed(2)}`);
    
                                }
                            } else {
                                $('#add_discount_details').html(`
                                    <div class="row py-2">
                                        <div class="col-12">
                                            <h6 class="text-danger text-end">Invalid promo code</h6>
                                        </div>
                                    </div>
                                `);
    
                                localStorage.removeItem('discountCode');
    
                                // Update total price after discount
                                var cartTotalAmountWithVAT = totalAmount;
                                $('#cartTotalAmountWithVAT').text(`£${cartTotalAmountWithVAT.toFixed(2)}`);
    
                            }
                        }
                    });
                });
            });

        </script>
    @endpush

</x-guest-layout>
