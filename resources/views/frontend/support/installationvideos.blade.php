<x-guest-layout>
    <section class="container-fluid px-lg-5 py-3 px-md-3 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a class="text-uppercase">Support</a></li>
            </ol>
        </nav>
    </section>

    <section class="container-fluid px-lg-5 pb-5 px-md-3 px-3">
        <div class="row">
            <div class="col-12">
                <h1 class="fs-1 text-dark text-uppercase fw-bolder">
                    Installation Videos
                </h1>
            </div>
            @if ($installationvideo->count() > 0)
                @foreach ($installationvideo as $video)
                    <div class="col-lg-4 col-md-4 col-6 pt-2">
                        <div class="ratio ratio-16x9">
                            <iframe src="{{ $video->video_url }}" title="YouTube video"
                                style="max-width: 100%;height: 100%;" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info" role="alert">
                    No videos found.
                </div>
            @endif
        </div>
    </section>


</x-guest-layout>
