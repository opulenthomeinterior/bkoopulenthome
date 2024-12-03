<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Faq</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">Faqs</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">Edit Faq</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('faqs.update', $faq->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="question" class="form-label">Question<span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="{{ $faq->question }}" class="form-control"
                                        id="question" name="question" placeholder="Enter Faq question" autofocus>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="faq_type" class="form-label">
                                        Type
                                    </label>
                                    <select name="faq_type" id="faq_type" class="form-control select2">
                                        <option disabled>Select Faq Type</option>
                                        <option value="general" {{ $faq->type == 'general' ? 'selected' : '' }}>General
                                        </option>
                                        <option value="delivery" {{ $faq->type == 'delivery' ? 'selected' : '' }}>
                                            Delivery</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group mb-2">
                                    <label for="answer" class="form-label">Answer<span
                                            class="text-danger">*</span></label>
                                    <textarea name="answer" id="editor"><?= str_replace('&', '&', $faq->answer) ?></textarea>
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">Update Faq</button>
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
