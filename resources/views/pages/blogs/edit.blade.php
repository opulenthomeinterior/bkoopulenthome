<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Blog</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Blogs</a></li>
                                <li class="breadcrumb-item active">Edit Blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('blog.update', $blog->id) }}" method="post" class="auth-input"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="title" class="form-label">Title<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $blog->title }}" placeholder="Enter Blog Title" autofocus>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="subtitle" class="form-label">Subtitle<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                        value="{{ $blog->subtitle }}" placeholder="Enter Blog Subtitle">
                                </div>
                                <div class="col-md-12 form-group mb-2">
                                    <label for="content" class="form-label">Content<span
                                            class="text-danger">*</span></label>
                                    <textarea name="content" id="editor"><?= str_replace('&', '&', $blog->content) ?></textarea>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="image_path" class="form-label">Upload Image<span
                                            class="text-danger">*</span></label>
                                    <input type="file" accept="image/*" class="form-control" id="image_path"
                                        name="image_path" onchange="display_image(this)">
                                </div>
                                <div class="col-lg-6"></div>
                                <div
                                    class="col-lg-6 form-group mb-2 preview-image-wrapper {{ $blog->image_path ? 'd-block' : 'd-none' }}">
                                    <label for="image_preview" class="form-label">Image Preview</label>
                                    <img id="image_preview" src="{{ asset('uploads/blogs/' . $blog->image_path) }}"
                                        alt="Image Preview"
                                        class="img-thumbnail box-image-preview {{ $blog->image_path ? 'd-block' : 'd-none' }}" />
                                    <button type="button" id="remove_image"
                                        class="btn btn-danger mt-2 {{ $blog->image_path ? 'd-block' : 'd-none' }}"
                                        onclick="removeImage(this, {{ $blog->id }}, '{{ $blog->image_path }}')">Remove</button>
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">Update Blog</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <script>
        var removeImageUrl = "{{ route('blog.removeImage', $blog->id) }}";
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                }
            })
            .catch(error => {
                console.log(error);
            });
    </script>
</x-app-layout>
