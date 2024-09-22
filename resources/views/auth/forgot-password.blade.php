<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

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
                                                <h5 class="mb-0">Forgot Password?</h5>
                                            </div>

                                            <div class="text-center my-4">
                                                <div class="alert alert-borderless alert-warning text-center mb-2 mx-2"
                                                    role="alert">
                                                    Enter your email and instructions will be sent to you!
                                                </div>
                                            </div>



                                            <div class="mt-4">
                                                <form method="POST" action="{{ route('password.email') }}"
                                                    class="auth-input">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="email"
                                                            name="email" placeholder="Enter Email"
                                                            autocomplete="username" value="{{ old('email') }}"
                                                            autofocus>
                                                    </div>

                                                    <div class="mt-2">
                                                        <button class="btn btn-primary w-100" type="submit">Send Reset
                                                            Link</button>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <p class="mb-0">Wait, I remember my password... <a
                                                                href="{{ route('login') }}"
                                                                class="fw-medium text-primary text-decoration-underline">
                                                                Click here </a> </p>
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
