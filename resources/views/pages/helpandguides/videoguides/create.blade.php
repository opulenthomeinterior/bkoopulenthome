<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Video Guide</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('videoguides') }}">Video Guides</a></li>
                                <li class="breadcrumb-item active">Create Video Guide</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row gutters">
                <div class="col-12">
                    <div class="card p-lg-5 p-4">
                        <form action="{{ route('videoguides.store') }}" method="post" class="auth-input">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="title" class="form-label">Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Video Guide Title" autofocus required>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="video_type" class="form-label">
                                        Type
                                    </label>
                                    <select name="video_type" id="video_type" class="form-control select2">
                                        <option disabled>Select Video Type</option>
                                        <option value="guide">Guide</option>
                                        <option value="installation">Installation</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group mb-2">
                                    <label for="video_url" class="form-label">Video URL
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="url" class="form-control" id="video_url" name="video_url"
                                        placeholder="Enter Video URL" required>
                                </div>
                                <div class="col-lg-12 form-group mt-2">
                                    <button class="btn btn-primary" type="submit">
                                        Create Video Guide
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
</x-app-layout>
