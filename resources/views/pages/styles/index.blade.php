<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Styles</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Styles</li>
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
                                    <h3 class="card-title">Styles</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-primary btn-sm float-end" href="{{ route('style.create') }}">Add
                                        Style</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($styles as $style)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ $style->image_path ? asset('uploads/styles/' . $style->image_path) : '#' }}"
                                                    class="{{ $style->image_path ? 'd-inline-block' : 'd-none' }}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ $style->image_path ? asset('uploads/styles/' . $style->image_path) : '#' }}"
                                                        alt="Image Preview" width="100"
                                                        class="img-thumbnail box-image-preview {{ $style->image_path ? 'd-block' : 'd-none' }}" />
                                                </a>
                                            </td>
                                            <td class="align-middle">{{ $style->name }}</td>
                                            <td class="align-middle" align="center">
                                                <div class="d-flex flex-row gap-2">
                                                    <a class="btn btn-soft-info btn-sm d-inline-block edit-button"
                                                        href="{{ route('style.edit', $style->id) }}" title="Edit style">
                                                        <i class="las la-pen fs-17 align-middle"></i>
                                                    </a>
                                                    <form action="{{ route('style.destroy', $style->id) }}"
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
                                        <th>Image</th>
                                        <th>Name</th>
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
