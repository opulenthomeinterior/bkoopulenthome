<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Coupons</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Coupons</li>
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
                                    <h3 class="card-title">Coupons</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-primary btn-sm float-end"
                                        href="{{ route('coupons.create') }}">Add Coupon</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Percentage</th>
                                        <th>Duration</th>
                                        <th>Duration in Months</th>
                                        <th>Max Redemptions</th>
                                        <th>Expiry Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $key => $coupon)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $coupon->name }}</td>
                                            <td>{{ $coupon->id }}</td>
                                            <td>{{ $coupon->percent_off }}</td>
                                            <td>{{ $coupon->duration }}</td>
                                            <td>{{ $coupon->duration_in_months }}</td>
                                            <td>{{ $coupon->max_redemptions }}</td>
                                            <td>{{ $coupon->redeem_by ? \Carbon\Carbon::parse($coupon->redeem_by)->format('Y-m-d') : '' }}</td>
                                            <td>
                                                <a class="btn btn-soft-info btn-sm d-inline-block edit-button"
                                                    href="{{ route('coupons.edit', $coupon->id) }}"
                                                    title="Edit Coupon">
                                                    <i class="las la-pen fs-17"></i>
                                                </a>

                                                <form action="{{ route('coupons.destroy', $coupon->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript::void(0)" onclick="confirm_form_delete(this)"
                                                        class="btn btn-icon btn-soft-danger btn-sm d-flex flex-column justify-content-center remove-btn">
                                                        <i class="las la-trash fs-17 align-middle"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Percentage</th>
                                        <th>Duration</th>
                                        <th>Duration in Months</th>
                                        <th>Max Redemptions</th>
                                        <th>Expiry Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div>
    </div>
</x-app-layout>
