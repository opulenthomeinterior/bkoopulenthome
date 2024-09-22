<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Colour</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('colours') }}">Colours</a></li>
                                <li class="breadcrumb-item active">Create Colour</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('colours.store') }}" method="post" class="auth-input" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="name" class="form-label">Colour Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Colour Name" autofocus>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="colour_code" class="form-label">Colour Code</label>
                                    <input type="color" class="form-control form-control-color w-100" id="colour_code" name="colour_code" placeholder="Enter Colour Code">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="finishing" class="form-label">Finishing</label>
                                    <select class="form-select" id="finishing" name="finishing">
                                        <option value="">Select Finishing</option>
                                        <option value="Gloss">Gloss</option>
                                        <option value="Matt">Matt</option>
                                        <option value="Standard MFC">Standard MFC</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="image_path" class="form-label">Upload Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image_path" name="image_path" onchange="display_image(this)">
                                </div>
                                <div class="col-lg-6 form-group mb-2 preview-image-wrapper d-none">
                                    <label for="image_preview" class="form-label">Image Preview</label>
                                    <img id="image_preview" style="height: 100px;width: 100px;" src="#" alt="Image Preview" class="img-thumbnail box-image-preview d-none" />
                                    <button type="button" id="remove_image" class="btn btn-danger mt-2 d-none" onclick="removeImage(this)">Remove</button>
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">Create Colour</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</x-app-layout>
