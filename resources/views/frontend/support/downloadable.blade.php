<x-guest-layout>
    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Support</a></li>
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Downloadable Resources
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-5" style="background-color: #F0F0F0">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-dark text-uppercase fw-bolder">
                    Latest OpulentHomeInteriors Downloads
                </h3>
            </div>
        </div>

        <div class="row">
            @foreach ($downloadable as $item)
                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ asset('/uploads/guides/' . $item->file_path) }}" target="_blank">
                        <div class="card">
                            <div class="card-header p-0">
                                <img src="{{ asset('/images/tiburon-kitchen-remodel-florence-choux-livingston-interiors-img~03c185f908b07ee7_4-3263-1-9715afd.jpg') }}"
                                    class="img-fluid" />
                            </div>
                            <div class="card-footer">
                                <h4 class="fw-bold">{{ $item->title }}</h4>
                                <small>PDF</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </section>

</x-guest-layout>
