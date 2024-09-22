<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <form action="{{ route('user.profile.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card py-4">
                            <div class="row card-body">
                                <div class="col-lg-4 col-12 text-center">
                                    <div class="text-center">
                                        <div
                                            class="profile-user preview-image-wrapper position-relative d-inline-block mx-auto mb-2">
                                            <img src="{{ auth()->user()->image_path ? asset('uploads/users/uploads/' . auth()->user()->image_path) : asset('/images/users/user-dummy-img.jpg') }}"
                                                class="avatar-lg img-thumbnail user-profile-image company-profile-image box-image-preview"
                                                alt="company-profile-image">
                                            <div class="avatar-xs p-0 profile-photo-edit">
                                                <input id="profile-img-file-input" type="file" name="image_path"
                                                    class="profile-img-file-input" accept="image/png, image/jpeg"
                                                    onchange="display_image(this);">
                                                <label for="profile-img-file-input"
                                                    class="profile-photo-edit custom-profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-12 mt-lg-0 mt-4">
                                    <div class="row gutters">
                                        <div class="col-12">
                                            <h5 class="mb-2 text-primary">Personal Details</h5>
                                        </div>
                                        <div class="col-sm-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" name="name" id="fullName"
                                                    placeholder="Enter full name" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="eMail">Email</label>
                                                <input type="email" class="form-control" name="email" id="eMail"
                                                    placeholder="Enter email ID" value="{{ auth()->user()->email }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-12">
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="sol-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.password.update') }}" method="POST" class="auth-input"
                                id="pass-update">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-12">
                                        <h5 class="mt-3 mb-2 text-primary">Change Password</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            {{-- Old Password --}}
                                            <div class="col-sm-6 form-group mb-3">
                                                <label for="old-password" class="form-label">Old Password
                                                    <span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" id="old-password"
                                                        class="form-control pe-5 password-input" name="old_password"
                                                        placeholder="Enter Old Password">
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                        type="button" id="old-password-addon">
                                                        <i class="las la-eye align-middle fs-18"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- Password --}}
                                            <div class="col-sm-6 form-group mb-3">
                                                <label for="password-input" class="form-label">New Password
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
                                            <div class="col-sm-6 form-group mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm
                                                    Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input id="password_confirmation"
                                                        class="form-control pe-5 password-input" type="password"
                                                        name="password_confirmation" placeholder="Confirm Password"
                                                        autocomplete="new-password">
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                        type="button" id="password-addon1">
                                                        <i class="las la-eye align-middle fs-18"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</x-app-layout>
