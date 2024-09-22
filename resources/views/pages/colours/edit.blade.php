<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Colour</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('colours') }}">Colours</a></li>
                                <li class="breadcrumb-item active">Edit Colour</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('colours.update', $colour->id) }}" method="post" class="auth-input" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="name" class="form-label">Colour Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Colour Name" value="{{ $colour->name }}">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="colour_code" class="form-label">Colour Code</label>
                                    <input type="color" class="form-control form-control-color w-100" id="colour_code" name="colour_code" placeholder="Enter Colour Code" value="{{ $colour->colour_code }}">
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="finishing" class="form-label">Finishing</label>
                                    <select class="form-select" id="finishing" name="finishing">
                                        <option value="">Select Finishing</option>
                                        <option value="Gloss" {{ $colour->finishing === 'Gloss' ? 'selected' : '' }}>Gloss</option>
                                        <option value="Matt" {{ $colour->finishing === 'Matt' ? 'selected' : '' }}>Matt</option>
                                        <option value="Standard MFC" {{ $colour->finishing === 'Standard MFC' ? 'selected' : '' }}>Standard MFC</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="image_path" class="form-label">Upload Image</label>
                                    <input type="file" accept="image/*" class="form-control" id="image_path" name="image_path" onchange="display_image(this)">
                                </div>
                                <div class="col-lg-6 form-group mb-2 preview-image-wrapper {{ $colour->image_path ? 'd-block' : 'd-none' }}">
                                    <label for="image_preview" class="form-label">Image Preview</label>
                                    <img id="image_preview" style="height: 100px;width: 100px;"
                                        src="{{ $colour->image_path ? asset('uploads/colours/uploads/' . $colour->image_path) : '#' }}"
                                        alt="Image Preview"
                                        class="img-thumbnail box-image-preview {{ $colour->image_path ? 'd-block' : 'd-none' }}" />
                                    <button type="button" id="remove_image"
                                        class="btn btn-danger mt-2 {{ $colour->image_path ? 'd-block' : 'd-none' }}"
                                        onclick="removeImage(this, {{ $colour->id }}, '{{ $colour->image_path }}')">Remove</button>
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">Update Colour</button>
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
        var removeImageUrl = "{{ route('colours.removeImage', $colour->id) }}";
    </script>
</x-app-layout>
