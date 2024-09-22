<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Design Service Forums</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Design Service Forums</li>
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
                                    <h3 class="card-title">Design Service Forums</h3>
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($designservices as $design)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $design->firstname }}</td>
                                            <td class="align-middle">{{ $design->email }}</td>
                                            <td class="align-middle" align="center">
                                                <div class="d-flex flex-row gap-2">
                                                    {{-- <a class="btn btn-soft-info btn-sm d-inline-block edit-button"
                                                        href="{{ route('faqs.edit', $faq->id) }}" title="Edit blog">
                                                        <i class="las la-pen fs-17 align-middle"></i>
                                                    </a> --}}
                                                    <a href="javascript::void(0)"
                                                        onclick="view_design_appointment('{{ $design->firstname }}', '{{ $design->surname }}', '{{ $design->email }}', '{{ $design->phone }}', '{{ asset('/uploads/DesignAppointment/' . $design->file_path) }}')"
                                                        class="btn btn-icon btn-soft-primary btn-sm d-flex flex-column justify-content-center remove-btn">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input status-toggle" type="checkbox"
                                                        id="statusToggle{{ $loop->iteration }}"
                                                        data-design-id="{{ $design->id }}"
                                                        {{ $design->status == 'approved' ? 'checked' : '' }}>
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
    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Design Appointment Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>First Name:</strong> <span id="firstName"></span></p>
                    <p><strong>Surname:</strong> <span id="surname"></span></p>
                    <p><strong>Email:</strong> <span id="email"></span></p>
                    <p><strong>Phone:</strong> <span id="phone"></span></p>

                    <div id="pdfViewerContainer" style="height: 250px;">
                        <iframe id="pdfViewer" width="100%" height="100%" style="border: none;"></iframe>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
