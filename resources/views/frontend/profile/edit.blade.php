<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="text-dark text-uppercase fw-bolder">
                    Edit Profile
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{ route('update-profile') }}" method="post" class="py-5">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <div class="row border-bottom border-dark">
                                <div class="col-12">
                                    <h3 class="fw-bolder text-uppercase text-dark">Personal Details</h3>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6">
                                    <label class="py-1">First <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $user->name }}"
                                        name="firstname" required />
                                </div>
                                <div class="col-6">
                                    <label class="py-1">Surname <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $user->last_name }}"
                                        name="lastname" required />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" value="{{ $user->email }}"
                                        name="email" required disabled />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Phone Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" value="{{ $user->phonenumber }}"
                                        name="phone" />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Work Number</label>
                                    <input type="number" class="form-control" value="{{ $user->worknumber }}"
                                        name="worknumber" />
                                </div>
                            </div>

                            <div class="row border-bottom border-dark">
                                <div class="col-12">
                                    <h3 class="fw-bolder text-uppercase text-dark mt-4">Company Details</h3>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $user->company_name }}"
                                        name="company" required />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Role in Company</label>
                                    <input type="text" class="form-control" value="{{ $user->role_in_company }}"
                                        name="role_in_company" required />
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">VAT</label>
                                    <input type="text" class="form-control" value="{{ $user->vat }}"
                                        name="vat" required />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Company Website</label>
                                    <input type="text" class="form-control" value="{{ $user->company_website }}"
                                        name="company_website" required />
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-12">
                                    <label class="py-1">Company Type <span class="text-danger">* &nbsp;
                                            &nbsp;&nbsp;</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input border-dark" type="radio" name="company_type"
                                            id="inlineRadio1" value="Tradeperson"
                                            {{ $user->company_type == 'Tradeperson' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">Tradeperson</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input border-dark" type="radio"
                                            name="company_type" id="inlineRadio2" value="Contractor"
                                            {{ $user->company_type == 'Contractor' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio2">Contractor</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input border-dark" type="radio"
                                            name="company_type" id="inlineRadio3" value="Landlord"
                                            {{ $user->company_type == 'Landlord' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio3">Landlord</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row border-bottom border-dark">
                                <div class="col-12">
                                    <h3 class="fw-bolder text-uppercase text-dark mt-4">Primary Address</h3>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">EORI Number</label>
                                    <input type="text" class="form-control" value="{{ $user->eori_number }}"
                                        name="eori" />
                                </div>
                                <div class="col-6">
                                    <label class="py-1">Country <span class="text-danger">*</span></label>
                                    <select name="country" class="form-select border-dark"
                                        aria-label="Default select example">
                                        <option value="" selected>Select your country</option>
                                        <option value="unitedstate"
                                            {{ $user->country == 'unitedstate' ? 'selected' : '' }}>United States
                                        </option>
                                        <option value="ireland" {{ $user->country == 'ireland' ? 'selected' : '' }}>
                                            Ireland</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Postcode <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $user->postcode }}"
                                        name="postcode" required />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">House/ Building Number </label>
                                    <input type="text" name="house" value="{{ $user->house }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Street Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $user->address1 }}"
                                        name="address1" required />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Address Line 2</label>
                                    <input type="text" class="form-control" value="{{ $user->address2 }}"
                                        name="address2">
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Town / City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $user->city }}"
                                        name="city" required />
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-12">
                                    <button class="btn btn-md btn-dark rounded-0" id="nextBtn"
                                        type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-guest-layout>
