<x-guest-layout>
    <style>
        ol li {
            list-style-type: unset;
        }

        ul li {
            list-style-type: disc;
        }
    </style>


    <section class="container-fluid px-lg-5 py-4 px-md-3 px-3" style="background-color: #f0f0f0;">
        <div class="row w-75 mx-auto">
            <div class="col-12 text-center">
                <h2 class="fs-1 text-dark text-uppercase fw-bolder">{{ $blog->title }}</h2>
                <h4 class="text-dark text-uppercase">{{ $blog->subtitle }}</h4>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-4 ">
        <div class="row w-75 mx-auto">
            <div class="col-12 py-2">
                <h5><a href="{{ route('blog') }}">Blog</a> / {{ $blog->created_at->format('d F Y') }}</h5>
            </div>
            <div class="col-12">
                <img src="{{ asset('/uploads/blogs/' . $blog->image_path) }}" class="img-fluid" />
                <p class="text-dark pt-3"> {!! $blog->content !!}
                </p>
            </div>
        </div>
    </section>

</x-guest-layout>
