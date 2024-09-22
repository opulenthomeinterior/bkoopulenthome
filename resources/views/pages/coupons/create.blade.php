<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Coupon</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('downloadableguides') }}">Coupons</a>
                                </li>
                                <li class="breadcrumb-item active">Create Coupon</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('coupons.store') }}" method="post" class="auth-input"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Coupon Title">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="code" class="form-label">Code <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        placeholder="Enter Coupon Code">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="percentage" class="form-label">Percentage <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="percent_off" name="percent_off"
                                        placeholder="Enter Coupon Percentage" minlength="1" maxlength="100">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="percentage" class="form-label">Duration <span
                                            class="text-danger">*</span>
                                    </label>
                                    <select id="duration" name="duration" class="form-control select2">
                                        <option value="forever">Forever</option>
                                        <option value="once">Once</option>
                                        <option value="repeating">Repeating</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="duration_in_months" class="form-label">Duration in Months (Required<span class="text-danger">*</span> for Repeating)</label>
                                    <input type="number" class="form-control" id="duration_in_months" name="duration_in_months" placeholder="Enter Duration in Months" min="1" autofocus>
                                </div>
                                {{-- <div class="col-lg-6 form-group mb-2">
                                    <label for="status" class="form-label">
                                        Status
                                    </label>
                                    <select name="status" id="status" class="form-control select2">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div> --}}
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="title" class="form-label">Expiry</label>
                                    <input type="datetime-local" class="form-control" id="redeem_by" name="redeem_by">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="max_redemptions" class="form-label">Max Redemptions</label>
                                    <input type="number" class="form-control" id="max_redemptions" name="max_redemptions"
                                        placeholder="Enter Max Redemptions" min="1">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="minimum_order" class="form-label">Minimun order value</label>
                                    <input type="number" class="form-control" id="minimum_order"
                                        name="minimum_order" placeholder="Enter minimun order value" min="0">
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">Create Coupon</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</x-app-layout>
