<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Orders</h3>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Order Number</th>
                                        <th>Customer Name</th>
                                        <th>Contact Email</th>
                                        <th>Payment Amount</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->contact_email_address }}</td>
                                            <td>{{ mmadev_get_currency_symbol($order->currency) . $order->total_amount }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>
                                                @if ($order->order_status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif ($order->order_status == 'processing')
                                                    <span class="badge bg-primary">Processing</span>
                                                @elseif ($order->order_status == 'completed')
                                                    <span class="badge bg-success">Delivered</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('orders.show', $order->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Order Number</th>
                                        <th>Customer Name</th>
                                        <th>Contact Email</th>
                                        <th>Payment Amount</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</x-app-layout>
