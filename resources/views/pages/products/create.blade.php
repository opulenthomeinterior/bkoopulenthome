<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                                <li class="breadcrumb-item active">Create Product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('product.store') }}" method="post" class="auth-input"
                            enctype="multipart/form-data" id="productForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="product_code" class="form-label fw-bold">Product Code
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="product_code" name="product_code"
                                        placeholder="Enter Product Code" required>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="short_title" class="form-label fw-bold">Short Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="short_title" name="short_title"
                                        placeholder="Enter Short Title" required>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="full_title" class="form-label fw-bold">Full Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="full_title" name="full_title"
                                        placeholder="Enter Full Title" required>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="price" class="form-label fw-bold">Price
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">£</span>
                                        <input type="number" class="form-control" id="price" name="price"
                                            placeholder="Enter Price" step="0.01" min="0" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="discounted_percentage" class="form-label fw-bold">Discount %</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="discounted_percentage" name="discounted_percentage"
                                            placeholder="Enter Discount %" step="0.01" min="0" value="0" max="100">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="discounted_price" class="form-label fw-bold">Discounted Price
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">£</span>
                                        <input type="number" class="form-control" id="discounted_price"
                                            name="discounted_price" placeholder="Discounted Price" step="0.01"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group mb-lg-3 mb-2">
                                    <label for="product_description" class="form-label fw-bold">Product
                                        Description</label>
                                    <textarea name="product_description" id="product_description"></textarea>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="category_id" class="form-label fw-bold">Select Category
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="category_id" id="category_id" class="form-control select2" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="style_id" class="form-label fw-bold">Select Style</label>
                                    <select name="style_id" id="style_id" class="form-control select2">
                                        <option value="">Select Style</option>
                                        @foreach ($styles as $key => $style)
                                            <option value="{{ $style->id }}">{{ $style->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="colour_id" class="form-label fw-bold">Select Colour</label>
                                    <select name="colour_id" id="colour_id" class="form-control select2">
                                        <option value="">Select Colour</option>
                                        @foreach ($colours as $key => $colour)
                                            <option value="{{ $colour->id }}">{{ $colour->trade_colour }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="assembly_id" class="form-label fw-bold">Select Assembly</label>
                                    <select name="assembly_id" id="assembly_id" class="form-control select2">
                                        <option value="">Select Assembly</option>
                                        @foreach ($assemblies as $key => $assembly)
                                            <option value="{{ $assembly->id }}">{{ $assembly->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="height" class="form-label fw-bold">Height</label>
                                    <div class="form-icon right">
                                        <input type="number" class="form-control form-control-icon" id="height"
                                            name="height" placeholder="Enter Height">
                                        <i>mm</i>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="width" class="form-label fw-bold">Width</label>
                                    <div class="form-icon right">
                                        <input type="number" class="form-control form-control-icon" id="width"
                                            name="width" placeholder="Enter Width">
                                        <i>mm</i>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="depth" class="form-label fw-bold">Depth</label>
                                    <div class="form-icon right">
                                        <input type="number" class="form-control form-control-icon" id="depth"
                                            name="depth" placeholder="Enter Depth">
                                        <i>mm</i>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="length" class="form-label fw-bold">Length</label>
                                    <div class="form-icon right">
                                        <input type="number" class="form-control form-control-icon" id="length"
                                            name="length" placeholder="Enter Length">
                                        <i>mm</i>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="weight" class="form-label fw-bold">Weight</label>
                                    <div class="form-icon right">
                                        <input type="number" class="form-control form-control-icon" id="weight"
                                            name="weight" placeholder="Enter Weight">
                                        <i>mm</i>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="dimensions" class="form-label fw-bold">Dimensions</label>
                                    <input type="text" class="form-control" id="dimensions" name="dimensions"
                                        placeholder="Dimensions">
                                </div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2">
                                    <label for="image_path" class="form-label fw-bold">Upload Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image_path"
                                        name="image_path" onchange="display_image(this)">
                                </div>
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6 form-group mb-lg-3 mb-2 preview-image-wrapper d-none">
                                    <label for="image_preview" class="form-label fw-bold">Image Preview</label>
                                    <img id="image_preview" src="#" alt="Image Preview"
                                        class="img-thumbnail box-image-preview d-none" />
                                    <button type="button" id="remove_image" class="btn btn-danger mt-2 d-none"
                                        onclick="removeImage(this)">Remove</button>
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">
                                        Create Product
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
        ClassicEditor
            .create(document.querySelector('#product_description'), {
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
