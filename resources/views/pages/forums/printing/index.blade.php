<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Printing Forums</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Printing Forums</li>
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
                                    <h3 class="card-title">Printing Forums</h3>
                                </div>
                                <div class="col-sm-6">
                                    {{-- <a class="btn btn-primary btn-sm float-end" href="{{ route('faqs.create') }}">Add
                                        Faq</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>First name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($printing as $print)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $print->firstname }}</td>
                                            <td class="align-middle">{{ $print->email }}</td>
                                            <td class="align-middle">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input printing-status-toggle"
                                                        type="checkbox" id="statusToggle{{ $loop->iteration }}"
                                                        data-print-id="{{ $print->id }}"
                                                        {{ $print->status == 'approved' ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="statusToggle{{ $loop->iteration }}"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>First name</th>
                                        <th>Email</th>
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
