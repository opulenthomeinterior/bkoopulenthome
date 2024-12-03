<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Order Detail</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Order Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row ">
                <div class="col-xl-8 col-lg-7 col-12">
                    <!-- card -->
                    <div class="card">
                        <!-- card header -->
                        <div class="card-header border-bottom-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <!-- heading -->
                                    <h4 class="mb-1">Order ID: {{ $order->order_number }}</h4>
                                    <span>Order Date: {{ $order->created_at->format('d/m/Y h:ia') }}
                                        <span
                                            class="ms-2 badge bg-primary rounded-0">{{ strtoupper($order->payment_status) }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Table -->
                            <table class="table mb-0 text-nowrap">
                                <!-- Table Head -->
                                <thead class="table-light">
                                    <tr>
                                        <th>Products</th>
                                        <th>Amounts</th>
                                    </tr>
                                </thead>
                                <!-- tbody -->
                                <tbody>
                                    @php
                                        $order_items = json_decode($order->order_items, true);
                                        $order_total = 0;
                                    @endphp
                                    @foreach ($order_items as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ route('orderbyproduct', $item['slug']) }}" target="_blank"
                                                    class="text-inherit">
                                                    <div class="d-lg-flex">
                                                        <div>
                                                            <img src="{{ asset('imgs/products/' . $item['image_path']) }}"
                                                                class="image-fluid rounded"
                                                                style="width:150px;height:150px;object-fit:cover;object-position:center;"
                                                                alt="{{ $item['full_title'] }}">
                                                        </div>
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <!-- heading -->
                                                            <h4 class="mb-1 fs-6">
                                                                {{ $item['full_title'] }}
                                                            </h4>
                                                            <div class="fw-bold">Product Code:
                                                                <span
                                                                    class="text-dark fw-normal">{{ $item['product_code'] }}</span>
                                                            </div>
                                                            <!-- text -->
                                                            <span class="fw-bold">Quantity:
                                                                <span
                                                                    class="text-dark fw-normal">{{ $item['quantity'] }}</span>
                                                            </span>
                                                            <!-- text -->
                                                            <div class="fw-bold">Price:
                                                                @if ($item['discounted_price'] && $item['discounted_price'] != $item['price'])
                                                                    <span
                                                                        class="fw-normal text-primary">€{{ $item['discounted_price'] }}/</span>
                                                                    <s
                                                                        class="fw-normal text-muted">€{{ $item['price'] }}</s>
                                                                @else
                                                                    <span
                                                                        class="fw-normal text-primary">€{{ $item['price'] }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>€{{ $item['price'] }}</td>
                                        </tr>
                                        @php
                                            $order_total += $item['price'] * $item['quantity'];
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">
                                            <!-- text -->
                                            Sub Total :
                                        </td>
                                        <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                                            <!-- text -->
                                            €{{ round($order_total, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" class="fw-semibold text-dark ">
                                            <!-- text -->
                                            Paid by Customer
                                        </td>
                                        <td class="fw-semibold text-dark text-end">
                                            <!-- text -->
                                            {{ mmadev_get_currency_symbol($order->currency) . $order->total_amount }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="card mt-4">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <div>
                                    <!-- text -->
                                    <h4 class="">Order Status</h4>
                                </div>

                                <form class="d-flex justify-content-end" action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <select class="form-select rounded-0" style="width: 200px;" id="order_status"
                                            name="order_status">
                                            <option value="pending" {{ $order->order_status == "pending" ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="processing" {{ $order->order_status == "processing" ? 'selected' : '' }}>
                                                Processing</option>
                                            <option value="completed" {{ $order->order_status == "completed" ? 'selected' : '' }}>
                                                Delivered</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark rounded-0" style="width: 150px;">
                                        Update Status
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5  col-12">
                    <!-- card -->
                    <div class="card mb-4 mt-4 mt-lg-0">

                        <!-- card body -->
                        <div class="card-body border-top">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- text -->
                                <h4 class="mb-0">Contact Details</h4>
                            </div>
                            <div>
                                <!-- text -->
                                <div class="d-flex align-items-center mb-2">
                                    <i class="mdi mdi-email fs-4"></i>
                                    <a href="#" class="ms-2">{{ $order->contact_email_address }}</a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-phone fs-4"></i>
                                    <span class="ms-2">{{ $order->contact_mobile_number }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body border-top">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="mb-0">Delivery Details</h4>
                            </div>
                            <div>
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
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body border-top">
                            <div class=" mb-3">
                                <!-- heading -->
                                <h4 class="mb-0">Card Holder Details</h4>
                            </div>
                            <div>
                                <!-- address -->
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</x-app-layout>
