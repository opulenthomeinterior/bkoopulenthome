<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="auth-full-page-content d-flex min-vh-100 py-2">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100 py-0 py-xl-4">

                            <div class="row g-0">
                                <div class="col-lg-6 mx-auto">
                                    <div class="card my-auto overflow-hidden">
                                        <div class="p-lg-5 p-4">
                                            <div class="text-center mb-3">
                                                <a href="{{ route('home') }}">
                                                    <span class="logo-lg">
                                                        <img src="{{ asset('images/BKO_LOGO.png') }}" alt="" width="100">
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="text-center">
                                                <h5 class="mb-0">Create New Account</h5>
                                            </div>
                                            
                                            <div class="mt-4">
                                                <form action="{{ route('register') }}" method="post" id="signupform"
                                                    class="auth-input">
                                                    @csrf
                                                    {{-- Username --}}
                                                    <div class="form-group mb-2">
                                                        <label for="name" class="form-label">Name
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Enter Name" autofocus
                                                            autocomplete="name" value="{{ old('name') }}">
                                                    </div>
                                                    {{-- Email --}}
                                                    <div class="form-group mb-2">
                                                        <label for="email" class="form-label">Email
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="email"
                                                            name="email" placeholder="Enter Email"
                                                            autocomplete="username" value="{{ old('email') }}">
                                                    </div>
                                                    {{-- Password --}}
                                                    <div class="form-group mb-2">
                                                        <label for="password-input" class="form-label">Password
                                                            <span class="text-danger">*</span></label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input type="password" id="password-input"
                                                                class="form-control pe-5 password-input" name="password"
                                                                placeholder="Enter Password"
                                                                autocomplete="new-password">
                                                            <button
                                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                type="button" id="password-addon">
                                                                <i class="las la-eye align-middle fs-18"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{-- Confirm Password --}}
                                                    <div class="form-group mb-2">
                                                        <label for="password_confirmation" class="form-label">Confirm
                                                            Password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input id="password_confirmation"
                                                                class="form-control pe-5 password-input" type="password"
                                                                name="password_confirmation"
                                                                placeholder="Confirm Password"
                                                                autocomplete="new-password">
                                                            <button
                                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                type="button" id="password-addon1">
                                                                <i class="las la-eye align-middle fs-18"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="fs-16 pb-2">
                                                        <p class="mb-0 fs-14 text-muted fst-italic">By registering
                                                            you agree to the Invoika <a href="#"
                                                                class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                                of Use</a></p>
                                                    </div>

                                                    <div class="mt-2">
                                                        <button class="btn btn-primary w-100" id="signupbutton"
                                                            type="submit">Sign Up</button>

                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <p class="mb-0">Don't have an account ? <a
                                                                href="{{ route('login') }}"
                                                                class="fw-medium text-primary text-decoration-underline">
                                                                Signin </a> </p>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</x-guest-layout>
