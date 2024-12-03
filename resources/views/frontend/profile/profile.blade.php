<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <div class="row">
            <div class="col-6">
                <h1 class="text-uppercase text-dark fw-bolder">
                    Profile
                </h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('edit-profile') }}" class="btn btn-dark btn-md rounded-0">Edit
                    Profile</a>
            </div>
        </div>
    </section>


    <section class="container-fluid px-lg-5 px-md-3 px-3 py-lg-3 py-3">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('images/users/avatar-4.jpg') }}" alt="Profile"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4 class="fw-bolder text-dark">{{ $user->name . ' ' . $user->last_name }}</h4>
                                    <p class="text-dark mb-1">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 fw-bolder text-dark">Company Name</h6>
                                <span class="text-dark">{{ $user->company_name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 fw-bolder text-dark">Role in Company</h6>
                                <span class="text-dark">{{ $user->role_in_company }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 fw-bolder text-dark">Website</h6>
                                <span class="text-dark">{{ $user->company_website }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 fw-bolder text-dark">Type</h6>
                                <span class="text-dark">{{ $user->company_type }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 fw-bolder text-dark">Eori</h6>
                                <span class="text-dark">{{ $user->eori_number }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-4">
                                    <h6 class="mb-0 text-dark">Phone Number</h6>
                                </div>
                                <div class="col-lg-9 col-8 text-dark">
                                    {{ $user->phonenumber }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6 class="mb-0 text-dark">Work Number</h6>
                                </div>
                                <div class="col-lg-9 col-8 text-dark">
                                    {{ $user->worknumber }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6 class="mb-0 text-dark">Country</h6>
                                </div>
                                <div class="col-lg-9 col-8 text-dark">
                                    {{ $user->country }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6 class="mb-0 text-dark">Post Code</h6>
                                </div>
                                <div class="col-lg-9 col-8 text-dark">
                                    {{ $user->postcode }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6 class="mb-0 text-dark">House</h6>
                                </div>
                                <div class="col-lg-9 col-8 text-dark">
                                    {{ $user->house }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6 class="mb-0 text-dark">City</h6>
                                </div>
                                <div class="col-lg-9 col-8 text-dark">
                                    {{ $user->city }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6 class="mb-0 text-dark">Address Line 1</h6>
                                </div>
                                <div class="col-lg-9 col-8 text-dark">
                                    {{ $user->address1 }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6 class="mb-0 text-dark">Address Line 2</h6>
                                </div>
                                <div class="col-lg-9 col-8 text-dark">
                                    {{ $user->address2 }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>




</x-guest-layout>
