<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Admin</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Create Admin</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('user.store') }}" method="post" id="signupform" class="auth-input">
                            @csrf
                            {{-- Username --}}
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="name" class="form-label">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name" autofocus autocomplete="name"
                                        value="{{ old('name') }}">
                                </div>
                                {{-- Email --}}
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="email" class="form-label">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" autocomplete="username" value="{{ old('email') }}">
                                </div>
                                {{-- Password --}}
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="password-input" class="form-label">Password
                                        <span class="text-danger">*</span></label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" id="password-input"
                                            class="form-control pe-5 password-input" name="password"
                                            placeholder="Enter Password" autocomplete="new-password">
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon">
                                            <i class="las la-eye align-middle fs-18"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- Confirm Password --}}
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="password_confirmation" class="form-label">
                                        Confirm Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input id="password_confirmation" class="form-control pe-5 password-input"
                                            type="password" name="password_confirmation" placeholder="Confirm Password"
                                            autocomplete="new-password">
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon1">
                                            <i class="las la-eye align-middle fs-18"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" id="signupbutton" type="submit">
                                        Create Admin
                                    </button>
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
