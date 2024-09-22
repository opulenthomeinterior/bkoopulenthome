<x-guest-layout>
    <section class="container-fluid"
    style="background-image: url('{{ asset('images/backgrounds/Virtual-Design-Service-banner.jpg') }}'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 60vh;">
</section>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Design service</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    VIRTUAL DESIGN SERVICE
                </h1>

                <h4>
                    At OpulentHomeInteriors we want to make ordering a trade kitchen as easy as possible. From offering a FREE
                    Virtual Design Kitchen Service to providing 'How To' Videos we are constantly looking at ways to
                    support you.
                </h4>

            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-4">
        <div class="row">
            <form action="{{ route('submit.designservice') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-12 py-2 border-bottom border-dark">
                            <h3 class="text-dark fw-bolder text-uppercase">Request a meeting</h3>
                        </div>
                    </div>
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
                        <div class="col-12">
                            <label class="py-1">Please upload your kitchen measurements and/or existing plans</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-12">
                            <p class="pt-1">Callbacks will take place during office hours.</p>
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-12">
                            <button class="btn btn-md btn-dark text-uppercase fw-bolder rounded-0"
                                type="submit">Request a design
                                appointment</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>


    </section>

</x-guest-layout>
