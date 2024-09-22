<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Video Guides</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Video Guides</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Video Guides</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-primary btn-sm float-end"
                                        href="{{ route('videoguides.create') }}">Add Video Guide</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Title</th>
                                        <th>Video URL</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videoGuides as $videoGuide)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $videoGuide->title }}</td>
                                            <td>{{ $videoGuide->video_url }}</td>
                                            <td>{{ $videoGuide->type }}</td>
                                            <td align="center">
                                                <div class="d-flex flex-row gap-2">
                                                    <a class="btn btn-soft-info btn-sm d-inline-block edit-button"
                                                        href="{{ route('videoguides.edit', $videoGuide->id) }}"
                                                        title="Edit video guide">
                                                        <i class="las la-pen fs-17 align-middle"></i>
                                                    </a>
                                                    <form action="{{ route('videoguides.destroy', $videoGuide->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript::void(0)"
                                                            onclick="confirm_form_delete(this)"
                                                            class="btn btn-icon btn-soft-danger btn-sm d-flex flex-column justify-content-center remove-btn">
                                                            <i class="las la-trash fs-17 align-middle"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Title</th>
                                        <th>Video URL</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</x-app-layout>
