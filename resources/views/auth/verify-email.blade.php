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
                                                        <img src="{{ asset('images/opulenthomelogo.png') }}" alt="" width="100">
                                                    </span>
                                                </a>
                                            </div>
                                            
                                            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                            </div>

                                            @if (session('status') == 'verification-link-sent')
                                                <div
                                                    class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                                </div>
                                            @endif

                                            <div class="mt-4 d-flex items-center justify-content-between">
                                                <form method="POST" action="{{ route('verification.send') }}">
                                                    @csrf
                                                    <div>
                                                        <x-primary-button>
                                                            {{ __('Resend Verification Email') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>

                                                <a class="text-danger" href="{{ route('logout') }}"><i
                                                    class="bx bx-power-off fs-15 align-middle me-1 text-danger"></i> <span
                                                    key="t-logout">Logout</span></a>
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
