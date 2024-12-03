<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Products</li>
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
                                    <h3 class="card-title">Products</h3>
                                </div>
                                <div class="col-sm-6 d-flex justify-content-end gap-2">
                                    <a class="btn btn-primary btn-sm" href="{{ route('product.create') }}">Add
                                        Product</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#importProducts">
                                        Import Products
                                    </button>

                                    <form action="{{ route('truncate_all_data') }}" method="post" class="d-inline">
                                        @csrf
                                        @method('POST')
                                        <a href="javascript:void(0)"
                                            onclick="confirm_truncate(this)"
                                            class="btn btn-icon btn-soft-danger btn-sm d-flex flex-column justify-content-center remove-btn">
                                            <i class="las la-trash fs-17 align-middle"></i>
                                        </a>
                                    </form>

                                    <!-- Modal -->
                                    <div class="modal fade" id="importProducts" tabindex="-1"
                                        aria-labelledby="importProductsLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="importProductsLabel">Import
                                                        Products</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('products.import') }}" method="post"
                                                        enctype="multipart/form-data" class="row" id="importForm">
                                                        @csrf
                                                        <div class="col-12 mb-3">
                                                            <label class="form-label" for="file">Choose Excel
                                                                file:</label>
                                                            <input type="file" class="form-control" name="file"
                                                                accept=".xlsx, .xls, .csv" id="file" required>
                                                        </div>
                                                        <div class="col-12" id="loadingText">

                                                        </div>
                                                        <div class="col-12">
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-sm btn-secondary"
                                                                id="importBtn">
                                                                Import
                                                            </button>
                                                            {{-- Spinner --}}
                                                            <div class="spinner-border float-end d-none" role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="product_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Product Code</th>
                                        <th>Image</th>
                                        <th>Short Title</th>
                                        <th>Full Title</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Parent Category</th>
                                        <th>Style</th>
                                        <th>Colour</th>
                                        <th>Assembly</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Product Code</th>
                                        <th>Image</th>
                                        <th>Short Title</th>
                                        <th>Full Title</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Parent Category</th>
                                        <th>Style</th>
                                        <th>Colour</th>
                                        <th>Assembly</th>
                                        <th>Status</th>
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
    @push('scripts')
        <script>
            var productDataRoute = "{{ route('products.data') }}";
            var imageURL = "{{ asset('imgs/products') }}";
            // Products Table
            var table = $("#product_table").DataTable({
                processing: true,
                serverSide: true,
                ajax: productDataRoute,
                responsive: true,
                lengthChange: true,
                lengthMenu: [10, 25, 50],
                autoWidth: false,
                order: [
                    [0, "desc"]
                ],
                columns: [{
                        data: 'product_serial_number'
                    },
                    {
                        data: 'product_code'
                    },
                    {
                        data: 'image_path',
                        render: function(data, type, row) {
                            if (type === 'display' && data) {
                                return `
                                <a href="${imageURL}/`+data+`" class="d-inline-block" target="_blank" rel="noopener noreferrer">
                                    <img src="${imageURL}/`+data+`" alt="Image Preview" width="100" class="img-thumbnail box-image-preview d-block" />
                                </a>`;
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'short_title'
                    },
                    {
                        data: 'full_title'
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: 'category_name'
                    },
                    {
                        data: 'parent_category_name'
                    },
                    {
                        data: 'style_name'
                    },
                    {
                        data: 'colour_name'
                    },
                    {
                        data: 'assembly_name',
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            return data == 'active' ? '<span class="badge bg-primary">Active</span>' : '<span class="badge bg-danger">In Active</span>';
                        }
                    },
                    {
                        data: 'product_id',
                        render: function(data, type, row) {
                            var editUrl = "{{ route('product.edit', ':id') }}".replace(':id', data);
                            var deleteUrl = "{{ route('product.destroy', ':id') }}".replace(':id', data);

                            return `
                                <td class="align-middle" align="center">
                                    <div class="d-flex flex-row gap-2">
                                        <a class="btn btn-soft-info btn-sm d-inline-block edit-button"
                                            href="${editUrl}"
                                            title="Edit product">
                                            <i class="las la-pen fs-17 align-middle"></i>
                                        </a>
                                        <form action="${deleteUrl}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)"
                                                onclick="confirm_form_delete(this)"
                                                class="btn btn-icon btn-soft-danger btn-sm d-flex flex-column justify-content-center remove-btn">
                                                <i class="las la-trash fs-17 align-middle"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>`;
                        }
                    },
                ],
            });
        </script>
    @endpush
</x-app-layout>
