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
                    OPEN A TRADE ACCOUNT
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3">
        <div class="row">
            <h4 class="text-dark text-uppercase fw-bolder">
                OPEN A TRADE ACCOUNT TODAY AND ENJOY 20% OFF ALL ORDERS!
            </h4>
            <div class="col-lg-8">
                <form action="{{ route('register-user') }}" id="signupform" method="post" class="py-5">
                    @csrf
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
                                    <input type="text" class="form-control" name="firstname" required />
                                </div>
                                <div class="col-6">
                                    <label class="py-1">Surname <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lastname" required />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required />
                                </div>

                                <div class="col-6 ">
                                    <label class="py-1">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" required />
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Phone Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="phone" />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Work Number</label>
                                    <input type="number" class="form-control" name="worknumber" />
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
                                    <input type="text" class="form-control" name="company" required />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Role in Company</label>
                                    <input type="text" class="form-control" name="role_in_company" required />
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">VAT</label>
                                    <input type="text" class="form-control" name="vat" required />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Company Website</label>
                                    <input type="text" class="form-control" name="company_website" required />
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-12">
                                    <label class="py-1">Company Type <span class="text-danger">* &nbsp; &nbsp;
                                            &nbsp;</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input border-dark" type="radio" name="company_type"
                                            id="inlineRadio1" value="Tradeperson">
                                        <label class="form-check-label" for="inlineRadio1">Tradeperson</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input border-dark" type="radio" name="company_type"
                                            id="inlineRadio2" value="Contractor">
                                        <label class="form-check-label" for="inlineRadio2">Contractor</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input border-dark" type="radio"
                                            name="company_type" id="inlineRadio3" value="Landlord">
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
                                    <input type="text" class="form-control" name="eori" />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Country <span class="text-danger">*</span></label>
                                    <select name="country" class="form-select border-dark"
                                        aria-label="Default select example">
                                        <option selected disabled>Select your country</option>
                                        <option value="United Kingdom" selected>United Kingdom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Postcode <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="postcode" required />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">House/ Building Number </label>
                                    <input type="text" name="house" class="form-control">
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Street Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address1" required />
                                </div>
                                <div class="col-6 ">
                                    <label class="py-1">Address Line 2</label>
                                    <input type="text" class="form-control" name="address2">
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6 ">
                                    <label class="py-1">Town / City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" required />
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-12">
                                    <button class="btn btn-md btn-dark rounded-0" id="nextBtn"
                                        type="submit">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $("#signupform").validate({
                rules: {
                    firstname: {
                        required: true,
                        minlength: 2
                    },
                    lastname: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    phone: {
                        digits: true
                    },
                    worknumber: {
                        digits: true
                    },
                    company: {
                        required: true
                    },
                    role_in_company: {
                        required: true
                    },
                    inlineRadioOptions: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    postcode: {
                        required: true
                    },
                    address1: {
                        required: true
                    },
                    city: {
                        required: true
                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    element.closest(".col-6").append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        </script>
    @endpush
</x-guest-layout>
