<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                                <li class="breadcrumb-item active">Edit Category</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('category.update', $category->id) }}" method="post" class="auth-input" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="name" class="form-label">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Category Name" value="{{ $category->name }}">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="parent_category_id" class="form-label">
                                        Select Parent Category
                                    </label>
                                    <select name="parent_category_id" id="parent_category_id"
                                        class="form-control select2">
                                        <option value="">Select Parent Category</option>
                                        @foreach ($parentCategories as $key => $pcategory)
                                            <option value="{{ $pcategory->id }}"
                                                {{ $pcategory->id == $category->parent_category_id ? 'selected' : '' }}>
                                                {{ $pcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 form-group mb-2">
                                    <label for="editor" class="form-label">
                                        Category Description
                                    </label>
                                    <textarea name="description" class="editor"><?= str_replace('&', '&', $category->description) ?></textarea>
                                </div>

                                <!-- Tetimonials -->
                                <div class="col-md-12 form-group mb-4">
                                    <section class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed fw-bolder text-dark bg-light" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse"
                                                                aria-expanded="false" aria-controls="flush-collapse">
                                                                <span class="text-dark text-uppercase fw-bold text-center">Testimonials</span>
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapse" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                @if (count($category->testimonials) > 0)
                                                                    @foreach ($category->testimonials as $key => $testimonial)
                                                                        <div class="card border border-default p-3 current-testimonial-card">
                                                                            <label for="" class="form-label">
                                                                                Testimonial
                                                                            </label>
                                                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                                                <input type="date" name="date[]" class="form-control" value="{{$testimonial->date}}">
                                                                            </div>
                                                                            <label for="" class="form-label">
                                                                            </label>
                                                                            <input type="text" name="user_name[]" class="form-control" placeholder="Enter User Name" value="{{$testimonial->user_name}}">
                                                                            <label for="" class="form-label">
                                                                            </label>
                                                                            <textarea name="testimonial[]" class="form-control" placeholder="Enter Testimonial"><?= str_replace('&', '&', $testimonial->testimonial) ?></textarea>
                                                                            <label for="" class="form-label">
                                                                            </label>
                                                                            @if ($loop->first)
                                                                                <button type="button" id="add-new-style-testimonial" class="btn btn-sm btn-warning w-25">Add New Testimonial</button>
                                                                            @else
                                                                                <button type="button" class="btn btn-sm btn-danger w-25 mt-2 remove-current-style-testimonial">Remove</button>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="card border border-default p-3">
                                                                        <label for="" class="form-label">
                                                                            Testimonial
                                                                        </label>
                                                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                                            <input type="date" name="date[]" class="form-control">
                                                                        </div>
                                                                        <label for="" class="form-label">
                                                                        </label>
                                                                        <input type="text" name="user_name[]" class="form-control" placeholder="Enter User Name">
                                                                        <label for="" class="form-label">
                                                                        </label>
                                                                        <textarea name="testimonial[]" class="form-control" placeholder="Enter Testimonial"></textarea>
                                                                        <label for="" class="form-label">
                                                                        </label>
                                                                        <button type="button" id="add-new-style-testimonial" class="btn btn-sm btn-warning w-25">Add New Testimonial</button>
                                                                    </div>
                                                                @endif
                                                                <div class="testimonial-card">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <!-- FAQs -->
                                <div class="col-md-12 form-group mb-4">
                                    <section class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="accordion accordion-flush" id="faqsaccordionFlush">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed fw-bolder text-dark bg-light" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#faqs-flush-collapse"
                                                                aria-expanded="false" aria-controls="faqs-flush-collapse">
                                                                <span class="text-dark text-uppercase fw-bold text-center">FAQs</span>
                                                            </button>
                                                        </h2>
                                                        <div id="faqs-flush-collapse" class="accordion-collapse collapse"
                                                            data-bs-parent="#faqsaccordionFlush">
                                                            <div class="accordion-body">
                                                                @if (count($category->faqs) > 0)
                                                                    @foreach ($category->faqs as $key => $faq)
                                                                        <div class="card border border-default p-3 current-faq-card">
                                                                            <label for="" class="form-label">
                                                                                FAQ
                                                                            </label>
                                                                            <input type="text" name="question[]" value="{{$faq->question}}" class="form-control" placeholder="Enter Question">
                                                                            <label for="" class="form-label">
                                                                            </label>
                                                                            <textarea name="answer[]" class="form-control editor" placeholder="Enter Answer">{!! $faq->answer !!}</textarea>
                                                                            <label for="" class="form-label">
                                                                            </label>
                                                                            @if ($loop->first)
                                                                                <button type="button" id="add-new-style-faq" class="btn btn-sm btn-warning w-25">Add New FAQ</button>
                                                                            @else
                                                                                <button type="button" class="btn btn-sm btn-danger w-25 mt-2 remove-current-style-faq">Remove</button>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="card border border-default p-3">
                                                                        <label for="" class="form-label">
                                                                            FAQ
                                                                        </label>
                                                                        <input type="text" name="question[]" class="form-control" placeholder="Enter Question">
                                                                        <label for="" class="form-label">
                                                                        </label>
                                                                        <textarea name="answer[]" class="form-control editor" placeholder="Enter Answer"></textarea>
                                                                        <label for="" class="form-label">
                                                                        </label>
                                                                        <button type="button" id="add-new-style-faq" class="btn btn-sm btn-warning w-25">Add New FAQ</button>
                                                                    </div>
                                                                @endif
                                                                <div class="faq-card">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-lg-6 form-group mb-2">
                                    <label for="image_path" class="form-label">Upload Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image_path"
                                        name="image_path" onchange="display_image(this)">
                                </div>
                                <div class="col-lg-6">
                                    <label for="category_status" class="form-label">Status</label>
                                    <br>
                                    <input type="checkbox" id="category_status" name="status" {{$category->status == 1 ? 'checked' : ''}}>
                                </div>
                                <div class="col-lg-6 form-group mb-2 preview-image-wrapper {{ $category->image_path ? 'd-block' : 'd-none' }}">
                                    <label for="image_preview" class="form-label">Image Preview</label>
                                    <img id="image_preview"
                                        src="{{ $category->image_path ? asset('uploads/categories/uploads/' . $category->image_path) : '#' }}"
                                        alt="Image Preview"
                                        class="img-thumbnail box-image-preview {{ $category->image_path ? 'd-block' : 'd-none' }}" />
                                    <button type="button" id="remove_image"
                                        class="btn btn-danger mt-2 {{ $category->image_path ? 'd-block' : 'd-none' }}"
                                        onclick="removeImage(this, {{ $category->id }}, '{{ $category->image_path }}')">Remove</button>
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">
                                        Update Category
                                    </button>
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
        var removeImageUrl = "{{ route('category.removeImage', $category->id) }}";
    </script>
    <script>
        document.querySelectorAll('.editor').forEach((editorElement) => {
            ClassicEditor.create(editorElement, {
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
        });
    </script>
</x-app-layout>
