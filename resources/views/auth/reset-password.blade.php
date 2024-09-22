<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="auth-full-page-content d-flex min-vh-100 py-2">
                    <div class="w-100">
                        <div class="d-flex flex-column justify-content-center h-100 py-0 py-xl-4">

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
                                            
                                            <form method="POST" action="{{ route('password.store') }}">
                                                @csrf

                                                <!-- Password Reset Token -->
                                                <input type="hidden" name="token"
                                                    value="{{ $request->route('token') }}">

                                                <!-- Email Address -->
                                                <div>
                                                    <x-input-label for="email" :value="__('Email')" />
                                                    <x-text-input id="email" class="block mt-1 w-full"
                                                        type="email" name="email" :value="old('email', $request->email)" required
                                                        autofocus autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>

                                                <!-- Password -->
                                                <div class="mt-4">
                                                    <x-input-label for="password" :value="__('Password')" />
                                                    <x-text-input id="password" class="block mt-1 w-full"
                                                        type="password" name="password" required
                                                        autocomplete="new-password" />
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>

                                                <!-- Confirm Password -->
                                                <div class="mt-4">
                                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="password" name="password_confirmation" required
                                                        autocomplete="new-password" />

                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>

                                                <div class="flex items-center justify-end mt-4">
                                                    <x-primary-button>
                                                        {{ __('Reset Password') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
