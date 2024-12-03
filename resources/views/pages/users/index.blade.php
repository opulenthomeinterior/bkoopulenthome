<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Users</li>
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
                            <h3 class="card-title">Super Admins</h3>
                        </div>
                        <div class="card-body">
                            <table id="superadmin_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($superadmins as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->email_verified_at)
                                                    <span class="badge bg-success p-2">VERIFIED</span>
                                                @else
                                                    <span class="badge badge-soft-danger p-2">UNVERIFIED</span>
                                                @endif
                                            </td>
                                            <td align="center">
                                                <div class="d-flex flex-row gap-2">
                                                    <a class="btn btn-soft-info btn-sm d-inline-block edit-button" href="{{ route('user.edit', $user->id) }}"
                                                        title="Edit user">
                                                        <i class="las la-pen fs-17 align-middle"></i>
                                                    </a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users List</h3>
                        </div>
                        <div class="card-body">
                            <table id="user_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        {{-- <th>Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            {{-- <td>
                                                @foreach ($user->companies as $company)
                                                    {{ $company->name }}
                                                    @unless ($loop->last)
                                                        <!-- Add a comma unless it's the last item -->
                                                        |
                                                    @endunless
                                                @endforeach
                                            </td> --}}

                                            <td>
                                                @if ($user->email_verified_at)
                                                    <span class="badge bg-success p-2">VERIFIED</span>
                                                @else
                                                    <span class="badge badge-soft-danger p-2">UNVERIFIED</span>
                                                @endif
                                            </td>
                                            {{-- <td align="center">
                                                <div class="d-flex flex-row gap-2">
                                                    <a class="edit_btn" href="{{ route('edit.user', $user->id) }}"
                                                        title="Edit user">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('destroy.user', $user->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        <a href="javascript::void(0)"
                                                            onclick="confirm_form_delete(this)" class="del_btn"
                                                            title="Delete user">
                                                            <i class="fas fa-user-minus text-danger"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                            </td> --}}
                                        </tr>
                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        {{-- <th>Actions</th> --}}
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
