<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order-history') }}" class="text-uppercase">Order History</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Order History
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-3 mb-5">
        <div class="card">
            <!-- card body-->
            <div class="card-body p-md-5 p-4">
                @if ($orders->count() > 0)
                    <div class="mb-5">
                        <h4 class="mb-0">Your Order</h4>
                        <p>Check your all orders and products.</p>
                    </div>
                    <div class="mb-5">
                        <!-- text -->
                        @foreach ($orders as $order)
                            <div class="mb-3 pb-3 d-lg-flex align-items-center justify-content-between ">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Order #{{ $order->order_number }}</h5>
                                    @if ($order->order_status == 'pending')
                                        <span class="ms-2 badge bg-warning rounded-0">Pending</span>
                                    @elseif ($order->order_status == 'processing')
                                        <span class="ms-2 badge bg-primary rounded-0">Processing</span>
                                    @elseif ($order->order_status == 'completed')
                                        <span class="ms-2 badge bg-success rounded-0">Delivered</span>
                                    @endif
                                    {{-- <span class="ms-2">Delivered on June 26,2022</span> --}}
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="me-2">Order Date: {{ $order->created_at->format('d/m/Y') }}</h5>
                                </div>
                            </div>
                            @php
                                $order->order_items = json_decode($order->order_items, true);
                                $order_total = 0;
                            @endphp
                            @foreach ($order->order_items as $item)
                                <!-- row -->
                                <div class="row justify-content-between">
                                    <!-- col -->
                                    <div class="col-lg-8 col-12">
                                        <div class="d-md-flex">
                                            <div>
                                                <!-- img -->
                                                <img src="{{ asset('imgs/products/' . $item['image_path']) }}"
                                                    class="image-fluid rounded"
                                                    style="width:150px;height:150px;object-fit:cover;object-position:center;"
                                                    alt="{{ $item['full_title'] }}">
                                            </div>
                                            <div class="ms-md-4 mt-2 mt-lg-0">
                                                <!-- heading -->
                                                <h4 class="mb-1 fs-4">
                                                    {{ $item['full_title'] }}
                                                </h4>
                                                <!-- text -->
                                                <span class="fw-bold">Quantity:
                                                    <span class="text-dark fw-normal">{{ $item['quantity'] }}</span>
                                                </span>
                                                <!-- text -->
                                                <div class="mt-3">
                                                    @if ($item['discounted_price'] && $item['discounted_price'] != $item['price'])
                                                        <span
                                                            class="text-primary">€{{ $item['discounted_price'] }}/</span>
                                                        <s class="text-muted">€{{ $item['price'] }}</s>
                                                    @else
                                                        <span class="text-primary">€{{ $item['price'] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- button -->
                                    <div class="col-lg-3 col-12 text-end">
                                        <a href="{{ route('orderbyproduct', $item['slug']) }}" target="_blank"
                                            class="btn btn-dark rounded-0 mb-2" style="width: 200px">Shop again</a>
                                    </div>
                                </div>
                                {{-- <hr class="my-3"> --}}
                                @php
                                    $order_total += $item['price'] * $item['quantity'];
                                @endphp
                            @endforeach
                            <div
                                class="border-bottom border-top my-3 py-3 d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <h5 class="mb-0">Order Total</h5>
                                    <div class="ms-2">€{{ round($order_total, 2) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-md-5 py-4">
                        <img src="{{ asset('images/empty.png') }}" class="img-fluid mb-3" alt="empty">
                        <h4 class="mb-3">No Orders Found</h4>
                        <p class="text-muted">Looks like you haven't placed any orders yet.</p>
                        <a href="{{ route('shop') }}" class="btn btn-dark rounded-0">Shop Now</a>
                    </div>
                @endif
            </div>
        </div>
    </section>

</x-guest-layout>
