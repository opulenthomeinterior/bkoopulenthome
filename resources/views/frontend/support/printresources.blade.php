<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Support</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Print Resources
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-4">
        <div class="row">
            <form action="{{ route('submit.printresources') }}" method="POST">
                @csrf
                <div class="col-lg-7">
                    <h4 class="text-dark">Complete the form below to order printed copies of the OpulentHomeInteriors Product
                        Guide.
                        All fields are
                        required are we may first contact you to verify your request.</h4>
                    <div class="row py-3">
                        <div class="col-6">
                            <label class="py-1">First <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="first_name" required />
                        </div>
                        <div class="col-6">
                            <label class="py-1">Surname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="sur_name" required />
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-6 ">
                            <label class="py-1">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" required />
                        </div>

                        <div class="col-6 ">
                            <label class="py-1">Phone Number <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="phone" required />
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-12 ">
                            <label class="py-1">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="company" required />
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-6 ">
                            <label class="py-1">Delivery Street Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address1" required />
                        </div>
                        <div class="col-6 ">
                            <label class="py-1">Delivery Address Line 2
                            </label>
                            <input type="text" class="form-control" name="address2" />
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-6 ">
                            <label class="py-1">Delivery Town / City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="city" required />
                        </div>
                        <div class="col-6 ">
                            <label class="py-1">Delivery Country <span class="text-danger">*</span></label>
                            <select name="country" class="form-select" aria-label="Default select example">
                                <option selected>Select your country</option>
                                <option value="1">United States</option>
                                <option value="2">Ireland</option>
                            </select>
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-12">
                            <label class="py-1">Describe the purpose and indicate the quantities required:
                                <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="purpose" required></textarea>
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-12">
                            <input class="form-check-input" type="checkbox" value="" id="consent">
                            <label class="form-check-label" for="consent">
                                By submitting this form, I agree to OpulentHomeInteriors's terms and privacy
                                policy
                            </label>
                            <p class="pt-1"><a href="{{ route('privacy') }}">View our Privacy Policy</a></p>
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-12">
                            <button class="btn btn-md btn-dark rounded-0" type="submit">Submit Request</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>


    </section>

</x-guest-layout>
