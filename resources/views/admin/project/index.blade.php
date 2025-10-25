@extends('admin.partials.app')
@section('title', 'Projects Management')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('title')</h4>
                    @can('project.create')
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#projectModal"
                            id="addprojectButton">Add Project</button>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table_project" class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Nama</th>
                                    <th>Klien</th>
                                    <th>Kategori</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal  --}}
    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">Add project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="projectForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                                        onchange="previewThumbnail(event)">
                                    <img id="preview-thumbnail" alt="Preview" class="rounded img-fluid mt-2"
                                        style="max-width: 100px;" display="none">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <input type="hidden" id="project_id">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        autocomplete="off" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="client_id">Client</label>
                                    <select name="client_id" id="client_id" class="form-control">
                                        <option value="">-- Select Client --</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">-- Select Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="link">Link Demo</label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="video_url">Video URL</label>
                                    <input type="text" class="form-control" id="video_url" name="video_url"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">In Progress</option>
                                        <option value="1">Completed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('project.create')
                            <button type="submit" class="btn btn-success"><i class="tf-icons bx bx-save"></i> Save</button>
                        @endcan
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="tf-icons bx bx-x"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('plugins.summernote')
@endsection
@push('style')
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
        function previewThumbnail(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview-thumbnail');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        $(document).ready(function() {
            fetchData();
            // Include CSRF token in all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ambil data
            function fetchData() {
                var storageBaseUrl = "{{ asset('uploads/projects') }}";
                $('#table_project').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "{{ route('project.index') }}",
                        type: 'GET',
                    },
                    columns: [{
                            orderable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'thumbnail',
                            name: 'thumbnail',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                if (data) {
                                    return `<img src="${storageBaseUrl}/${data}" alt="Thumbnail" class="img-thumbnail rounded-circle square-image" style="width: 50px; height: 50px;" />`;
                                } else {
                                    return `<span class="text-muted">No Thumbnail</span>`;
                                }
                            }
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                        },
                        {
                            data: 'client',
                            name: 'client',
                        },
                        {
                            data: 'kategori',
                            name: 'kategori',
                        },
                        {
                            data: 'link',
                            name: 'link',
                        },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data, type, row) {
                                if (data == 1) {
                                    return '<span class="badge bg-success">Completed</span>';
                                } else {
                                    return '<span class="badge bg-warning text-dark">In Progress</span>';
                                }
                            }
                        },
                        {
                            data: 'aksi',
                            name: 'aksi',
                            orderable: false
                        },
                    ],
                    // "columnDefs": [{
                    //     "targets": [3], // Center Price, Quantity, and Total columns
                    //     "className": "text-center"
                    // }],
                    order: [
                        [1, 'asc']
                    ], // Default ordering by the second column (kode_project)
                    responsive: true, // Makes the table responsive
                    autoWidth: false, // Prevents auto-sizing of columns
                    lengthMenu: [
                        [10, 25, 50],
                        [10, 25, 50, "All"]
                    ], // Controls the page length options
                    pageLength: 10, // Default page length
                    language: {
                        lengthMenu: "Show _MENU_", // supaya tampil dropdown lengthMenu
                        search: "Search:",
                        paginate: {
                            previous: "Prev",
                            next: "Next"
                        }
                    }
                })
            }

            const judul = document.querySelector('#nama');
            const slug = document.querySelector('#slug');

            judul.addEventListener('change', function() {
                fetch('/admin/project/cekSlug?nama=' + nama.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            });

            // Show modal for creating a new record
            $('#addprojectButton').click(function() {
                $('#projectForm')[0].reset(); // Clear the form
                $('#project_id').val(''); // Clear hidden input
                $('#projectModalLabel').text('Add Data'); // Set modal title
                $('#saveproject').text('Create'); // Change button text
                $('#projectModal').modal('show'); // Show modal
            });

            $(document).on('click', '.edit-project', function() {
                const id = $(this).data('id'); // Ambil ID produk dari tombol

                $.ajax({
                    url: `/admin/project/${id}`,
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function(data) {

                        // Isi field dasar
                        $('#project_id').val(data.id);
                        $('#nama').val(data.nama);
                        $('#slug').val(data.slug);
                        $('#video_url').val(data.video_url);
                        $('#link').val(data.link);
                        $('#client_id').val(data.client_id);
                        $('#category_id').val(data.category_id);
                        $('#status').val(data.status);

                        // 🔹 Isi Summernote (deskripsi)
                        $('#deskripsi').summernote('code', data.deskripsi || '');

                        // 🔹 Tampilkan thumbnail
                        if (data.thumbnail) {
                            $('#preview-thumbnail')
                                .attr('src', `/uploads/projects/${data.thumbnail}`)
                                .removeClass('d-none')
                                .show();
                        } else {
                            $('#preview-thumbnail').addClass('d-none').hide();
                        }

                        // 🔹 Ubah teks modal
                        $('#projectModalLabel').text('Edit Data');
                        $('#saveproject').text('Update');

                        // 🔹 Tampilkan modal
                        $('#projectModal').modal('show');
                    },
                    error: function(err) {
                        Swal.fire({
                            icon: 'error',
                            title: err.status === 403 ? 'Akses Ditolak' : 'Gagal',
                            text: err.responseJSON?.message || 'Terjadi kesalahan.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            customClass: {
                                popup: 'zindex-99999'
                            }
                        });
                    }
                });
            });

            $('#deskripsi').summernote({
                height: 200,
                placeholder: 'Tulis deskripsi produk...',
            });

            // Handle form submission for both create and update
            $('#projectForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = $('#project_id').val();
                let url = id ? `/admin/project/${id}` :
                    '/admin/project'; // Update if ID exists, otherwise create
                let method = id ? 'POST' :
                    'POST'; // Laravel doesn't support PUT with FormData in jQuery

                let formData = new FormData(this); // Automatically includes all input fields
                // Append the _method for PUT requests
                if (id) {
                    formData.append('_method', 'PUT');
                }
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    contentType: false, // **Important for file uploads**
                    processData: false, // **Prevent jQuery from processing FormData**
                    success: function(response) {
                        $('#table_project').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#projectModal').modal('hide'); // Hide the modal
                        $('#projectForm')[0].reset(); // Reset the form
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong.',
                            icon: 'error',
                            timer: 3000,
                            toast: true,
                            position: 'top-end',
                        });
                    },
                });
            });

            // Hapus Data 
            $(document).on('click', '.hapus-project', function() {
                let id = $(this).data('id');
                let deleteUrl = '{{ route('project.destroy', ':id') }}'.replace(':id', id);

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                $('#table_project').DataTable().ajax
                                    .reload(); // Reload the DataTable
                                Swal.fire('Deleted!', response.message,
                                    'success');
                            },
                            error: function(xhr) {
                                Swal.fire('Error!',
                                    'Failed to delete record.',
                                    'error');
                            },
                        });
                    }
                });
            });
        })
    </script>
@endpush
