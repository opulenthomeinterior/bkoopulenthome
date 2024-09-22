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
                    Blog
                </h1>
            </div>
        </div>
    </section>

    <section class="container-fluid px-lg-5 px-md-3 px-3 py-5" style="background-color: #f0f0f0;">
        <div class="row">
            @if ($blogs->count())
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-6 py-2">
                        <div class="card">
                            <div class="card-header p-0">
                                <!-- Use blog's image_path here -->
                                <img src="{{ asset('/uploads/blogs/' . $blog->image_path) }}" class="img-fluid" />
                            </div>
                            <div class="card-body">
                                <!-- Use blog's created_at to display date -->
                                <small>{{ $blog->created_at->format('d F Y') }}</small>
                                <h4 class="fw-bolder text-dark text-uppercase py-2">{{ $blog->title }}</h4>
                                <p>{{ $blog->subtitle }}</p>
                                <!-- Link to view the full blog -->
                                <a href="{{ route('blog.show', $blog->slug) }}"
                                    class="btn btn-sm btn-dark fw-bolder">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <h4 class="text-dark">No blog posts found.</h4>
                </div>

            @endif
        </div>
    </section>

</x-guest-layout>
