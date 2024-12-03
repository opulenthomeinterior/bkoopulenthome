<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Categories</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Categories</li>
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
                                    <h3 class="card-title">Categories</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-primary btn-sm float-end"
                                        href="{{ route('category.create') }}">Add Category</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Image</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Parent Category</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">
                                                <a href="{{ $category->image_path ? asset('uploads/categories/' . $category->image_path) : '#' }}"
                                                    class="{{ $category->image_path ? 'd-inline-block' : 'd-none' }}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ $category->image_path ? asset('uploads/categories/' . $category->image_path) : '#' }}"
                                                        alt="Image Preview" width="100"
                                                        class="img-thumbnail box-image-preview {{ $category->image_path ? 'd-block' : 'd-none' }}" />
                                                </a>
                                            </td>
                                            <td class="align-middle">{{ $category->name }}</td>
                                            <td class="align-middle">
                                                {{ Str::limit(strip_tags($category->description ?? 'N/A'), 20, '...') }}
                                            </td>
                                            <td class="align-middle">{{ $category->parentCategory->name ?? 'N/A' }}</td>
                                            <td class="align-middle">{!! $category->status == 1 ? '<span class="badge bg-primary">Active</span>' : '<span class="badge bg-danger">In Active</span>' !!}</td>
                                            <td class="align-middle" align="center">
                                                <div class="d-flex flex-row gap-2">
                                                    <a class="btn btn-soft-info btn-sm d-inline-block edit-button"
                                                        href="{{ route('category.edit', $category->id) }}"
                                                        title="Edit category">
                                                        <i class="las la-pen fs-17 align-middle"></i>
                                                    </a>
                                                    @if ($category->id > 16)
                                                        <form action="{{ route('category.destroy', $category->id) }}"
                                                            method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="javascript::void(0)"
                                                                onclick="confirm_form_delete(this)"
                                                                class="btn btn-icon btn-soft-danger btn-sm d-flex flex-column justify-content-center remove-btn">
                                                                <i class="las la-trash fs-17 align-middle"></i>
                                                            </a>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Image</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Parent Category</th>
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
