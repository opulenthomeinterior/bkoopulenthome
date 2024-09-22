<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Colours</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Colours</li>
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
                                    <h3 class="card-title">Colours</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-primary btn-sm float-end" href="{{ route('colours.create') }}">Add
                                        Colour</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Colour Code</th>
                                        <th>Finishing</th>
                                        <th>Trade Colour</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colours as $colour)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $colour->name }}</td>
                                            <td class="align-middle">
                                                @php
                                                    // Example usage:
                                                    $colourCode = $colour->colour_code;
                                                    $rgb = hexToRgb($colourCode);
                                                    $luminance = calculateLuminance($rgb['red'], $rgb['green'], $rgb['blue']);

                                                    // Set the text color based on luminance
                                                    $textColor = $luminance > 0.5 ? '#000000' : '#ffffff';
                                                @endphp

                                                <span class="badge"
                                                    style="background-color: {{ $colourCode }}; color: {{ $textColor }}">
                                                    {{ $colourCode }}
                                                </span>
                                            </td>
                                            <td class="align-middle">{{ $colour->finishing }}</td>
                                            <td class="align-middle">{{ $colour->trade_colour }}</td>
                                            <td>
                                                <a href="{{ $colour->image_path ? asset('uploads/colours/uploads/' . $colour->image_path) : '#' }}"
                                                    class="{{ $colour->image_path ? 'd-inline-block' : 'd-none' }}"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ $colour->image_path ? asset('uploads/colours/uploads/' . $colour->image_path) : '#' }}"
                                                        alt="Image Preview" style="height: 100px;width: 100px;"
                                                        class="img-thumbnail box-image-preview {{ $colour->image_path ? 'd-block' : 'd-none' }}" />
                                                </a>
                                            </td>
                                            <td class="align-middle" align="center">
                                                <div class="d-flex flex-row gap-2">
                                                    <a class="btn btn-soft-info btn-sm d-inline-block edit-button"
                                                        href="{{ route('colours.edit', $colour->id) }}"
                                                        title="Edit colour">
                                                        <i class="las la-pen fs-17 align-middle"></i>
                                                    </a>
                                                    <form action="{{ route('colours.destroy', $colour->id) }}"
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
                                        <th>Name</th>
                                        <th>Colour Code</th>
                                        <th>Finishing</th>
                                        <th>Trade Colour</th>
                                        <th>Image</th>
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
