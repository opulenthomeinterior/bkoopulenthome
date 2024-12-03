<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Downloadable Guide</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('downloadableguides') }}">Downloadable
                                        Guides</a></li>
                                <li class="breadcrumb-item active">Create Guide</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('downloadableguides.store') }}" method="post" class="auth-input"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Guide Title" autofocus>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="file_type" class="form-label">
                                        Type
                                    </label>
                                    <select name="file_type" id="file_type" class="form-control select2">
                                        <option disabled>Select File Type</option>
                                        <option value="guide">Guide</option>
                                        <option value="resource">Resource</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="file_path" class="form-label">Upload PDF</label>
                                    <input type="file" accept=".pdf" class="form-control" id="file_path"
                                        name="file" onchange="displayPDF(this)">
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">Create Guide</button>
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
