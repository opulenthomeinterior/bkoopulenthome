<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Image Gallery</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Image Gallery</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    {{-- check all --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkAll">
                            <label class="form-check-label" for="checkAll">Check All</label>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <div class="col-sm-6 d-flex justify-content-end gap-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#uploadImages">
                                    Upload Images
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="uploadImages" tabindex="-1"
                                    aria-labelledby="uploadImagesLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="uploadImagesLabel">Upload
                                                    Images</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('attachments.store') }}" method="POST"
                                                    enctype="multipart/form-data" class="row" id="uploadForm">
                                                    @csrf
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label" for="images">Choose Images:</label>
                                                        <input type="file" class="form-control" name="images[]"
                                                            multiple accept="image/*" id="images" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-sm btn-secondary"
                                                            id="uploadBtn">
                                                            Upload
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
                            <form action="{{ route('attachments.bulkDelete') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="text" name="selectedIds" id="selectedIds" class="d-none">
                                <button type="submit" class="btn btn-sm btn-danger">Delete Selected</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                {{-- search --}}
                <div class="col-12">
                    <form action="{{ route('attachments.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search images" name="search"
                                value="{{ request()->query('search') }}">
                            <button class="btn btn-secondary" type="submit" id="button-addon2">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="row mt-4">
                @foreach ($attachments as $attachment)
                    <div class="col-md-2 col-sm-4">
                        <div class="card">
                            <img src="{{ asset('uploads/products/' . $attachment->path) }}" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <form action="{{ route('attachments.destroy', $attachment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex">
                                        <p class="card-text text-truncate small mb-1">
                                            {{ $attachment->name }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex gap-2">
                                            {{-- delete button --}}
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Delete Image">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                            {{-- copy link button with tooltip --}}
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Link"
                                                onclick="copyToClipboard('{{ asset('uploads/products/' . $attachment->path) }}')">
                                                <i class="mdi mdi-link"></i>
                                            </button>
                                        </div>
                                        {{-- check box --}}
                                        <div class="form-check mt-2">
                                            <input class="form-check-input single-select" type="checkbox"
                                                name="selected[]" value="{{ $attachment->id }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($attachments->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-info" role="alert">
                            No images found.
                        </div>
                    </div>
                @endif
            </div>

            <div class="row mt-4 mb-10">
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center">
                        {{-- check if there is search query param them also add it --}}
                        {{ $attachments->appends(request()->query())->links() }}
                    </div>
                    @if (!$attachments->isEmpty())
                        <div class="d-flex justify-content-center align-items-center">
                            {{ $attachments->count() }} of {{ $attachments->total() }} images
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('input[name="selected[]"]').on('change', function() {
                    let selectedIds = [];
                    $('input[name="selected[]"]:checked').each(function() {
                        selectedIds.push($(this).val());
                    });
                    $('#selectedIds').val(selectedIds);
                    console.log(selectedIds);
                });

                $('#checkAll').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('input[name="selected[]"]').prop('checked', true);
                        // trigger change event
                        $('input[name="selected[]"]').trigger('change');
                    } else {
                        $('input[name="selected[]"]').prop('checked', false);
                        // trigger change event
                        $('input[name="selected[]"]').trigger('change');
                    }
                });

                // Add file selection validation
                $('#uploadForm').on('submit', function(e) {
                    const files = $('#images')[0].files;
                    const maxFiles = 100; // Set your limit here
                    if (files.length > maxFiles) {
                        e.preventDefault();
                        alert(`You can only upload a maximum of ${maxFiles} files.`);
                        return false;
                    }
                });
            });

            function copyToClipboard(text) {
                var input = document.createElement('input');
                input.setAttribute('value', text);
                document.body.appendChild(input);
                input.select();
                var result = document.execCommand('copy');
                document.body.removeChild(input);
                return result;
            }
        </script>
    @endpush

</x-app-layout>
