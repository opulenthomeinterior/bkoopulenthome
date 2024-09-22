<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="container-fluid" style="background: url('{{ asset('images/backgrounds/login-bg.jpg') }}')">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="auth-full-page-content d-flex min-vh-100 py-2">
                    <div class="w-100">
                        <div class="d-flex flex-column justify-content-center h-100 py-0 py-xl-4">
                            <div class="row g-0">
                                <div class="col-lg-6 mx-auto">
                                    <div class="card my-auto overflow-hidden border-0" style="background-color: rgba(255,255,255,0.8)">
                                        <div class="p-lg-5 p-4">
                                            <div class="text-center mb-3">
                                                <a href="{{ route('home') }}">
                                                    <span class="logo-lg">
                                                        <img src="{{ asset('images/opulenthomelogo.png') }}" alt=""
                                                            width="100">
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="text-center">
                                                <h5 class="mb-0">Welcome Back !</h5>
                                            </div>

                                            <div class="mt-4">
                                                <form action="{{ route('login') }}" class="auth-input" method="POST"
                                                    id="loginform">
                                                    @csrf
                                                    <div class="form-group mb-2">
                                                        <label for="username" class="form-label">Email
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="email"
                                                            name="email" placeholder="Enter Email"
                                                            value="{{ old('email') }}" autofocus
                                                            autocomplete="username">
                                                    </div>

                                                    <div class="form-group mb-2">
                                                        <label for="userpassword" class="form-label">Password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                                            <input type="password"
                                                                class="form-control pe-5 password-input" name="password"
                                                                placeholder="Enter Password" id="userpassword"
                                                                autocomplete="current-password">
                                                            <button
                                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                type="button" id="password-addon"><i
                                                                    class="las la-eye align-middle fs-18"></i></button>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-primary fs-16 py-2">
                                                        <input class="form-check-input" type="checkbox" id="remember_me"
                                                            name="remember">
                                                        <label class="form-check-label fs-14" for="remember_me">
                                                            Remember me
                                                        </label>
                                                        {{-- <div class="float-end">
                                                            <a href="{{ route('password.request') }}"
                                                                class="text-muted text-decoration-underline fs-14">Forgot
                                                                your password?</a>
                                                        </div> --}}
                                                    </div>

                                                    <div class="mt-2">
                                                        <button class="btn btn-dark rounded-0 w-100" type="submit"
                                                            id="loginbutton">Log
                                                            In</button>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <p class="mb-0">Don't have an account ? <a
                                                                href="{{ route('register') }}"
                                                                class="fw-medium text-primary text-decoration-underline">
                                                                Signup now </a> </p>
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
    </section>
</x-auth-layout>
