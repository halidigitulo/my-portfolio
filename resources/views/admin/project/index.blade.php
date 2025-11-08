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
                                    <th>Galeri</th>
                                    <th>Stack</th>
                                    <th>Fitur</th>
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
                                <div class="form-group">
                                    <label for="gallery">Gallery</label>
                                    <input type="file" class="form-control" name="gallery[]" id="gallery" multiple
                                        onchange="previewGallery(event)">
                                    <div id="preview-gallery" class="d-flex flex-wrap mt-2"></div>
                                </div>

                                <!-- Tempat tampilkan gallery yang sudah ada -->
                                <div id="existing-gallery" class="row mt-3 d-flex"></div>

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
                                    <label for="stack" class="form-label">Stack</label>
                                    <select id="stack" name="stacks[]" class="form-control select2"
                                        multiple="multiple">
                                        @foreach ($stacks as $item)
                                            <option value="{{ $item->id }}"
                                                {{ collect(old('stacks'))->contains($item->id) || (isset($project) && $project->stack->contains($item->id)) ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="feature" class="form-label">Feature</label>
                                    <select id="feature" name="features[]" class="form-control select2"
                                        multiple="multiple">
                                        @foreach ($features as $item)
                                            <option value="{{ $item->id }}"
                                                {{ collect(old('features'))->contains($item->id) || (isset($project) && $project->feature->contains($item->id)) ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        #existing-gallery .position-relative {
            transition: transform 0.2s ease;
        }

        #existing-gallery .position-relative:hover {
            transform: scale(1.03);
        }

        #existing-gallery button {
            opacity: 0.85;
        }

        #existing-gallery button:hover {
            opacity: 1;
        }

        #existing-gallery {
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #e0e0e0;
            padding: 8px;
            border-radius: 8px;
            background-color: #fafafa;
        }

        #existing-gallery img {
            border: 1px solid #ddd;
        }

        table.dataTable td img {
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: transform 0.2s ease;
        }

        table.dataTable td img:hover {
            transform: scale(1.1);
        }
    </style>
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

        function previewGallery(event) {
            const files = event.target.files;
            const container = document.getElementById('preview-gallery');
            container.innerHTML = ''; // Kosongkan preview sebelumnya

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail', 'm-1');
                    img.style.width = '80px';
                    img.style.height = '80px';
                    container.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }

        function deleteGallery(id) {
            Swal.fire({
                title: 'Hapus gambar ini?',
                text: "Tindakan ini tidak bisa dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/project/gallery/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            if (res.success) {
                                Swal.fire('Berhasil!', res.message, 'success');
                                $(`#gallery-${id}`).remove(); // hapus elemen dari DOM
                            } else {
                                Swal.fire('Gagal!', res.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error!', 'Terjadi kesalahan server.', 'error');
                        }
                    });
                }
            });
        }

        // Simpan instance agar bisa diakses ulang saat edit
        let tomStack, tomFeature;

        document.addEventListener('DOMContentLoaded', function() {
            tomStack = new TomSelect('#stack', {
                plugins: ['remove_button'],
                maxOptions: 100,
                closeAfterSelect: false,
                hideSelected: true,
                sortField: {
                    field: 'text',
                    direction: 'asc'
                }
            });

            tomFeature = new TomSelect('#feature', {
                plugins: ['remove_button'],
                maxOptions: 100,
                closeAfterSelect: false,
                hideSelected: true,
                sortField: {
                    field: 'text',
                    direction: 'asc'
                }
            });
        });

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
                            data: 'galleries',
                            name: 'galleries',
                            render: function(data) {
                                if (!data || data.length === 0) {
                                    return '<small class="text-muted">Tidak ada</small>';
                                }

                                let html = '';
                                data.forEach(g => {
                                    html += `
                        <img src="/uploads/projects/gallery/${g.filename}" 
                             alt="${g.filename}" 
                             class="rounded me-1 mb-1" 
                             style="width:40px;height:40px;object-fit:cover;cursor:pointer;"
                             onclick="window.open('/uploads/projects/gallery/${g.filename}', '_blank')">
                    `;
                                });
                                return html;
                            },
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: 'stack',
                            name: 'stack',
                            orderable: false,
                            render: function(data, type, row) {
                                let badges = '';
                                data.forEach(stack => {
                                    badges +=
                                        `<span class="badge bg-success">${stack.nama}</span> `;
                                });
                                return badges;
                            }
                        },
                        {
                            data: 'feature',
                            name: 'feature',
                            orderable: false,
                            render: function(data, type, row) {
                                let badges = '';
                                data.forEach(feature => {
                                    badges +=
                                        `<span class="badge bg-success">${feature.nama}</span> `;
                                });
                                return badges;
                            }
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

                        // 🔹 Bersihkan gallery lama dulu
                        $('#existing-gallery').empty();

                        // 🔹 Cek apakah ada gallery
                        if (data.galleries && data.galleries.length > 0) {
                            data.galleries.forEach(g => {
                                $('#existing-gallery').append(`
            <div class="position-relative mb-3" id="gallery-${g.id}">
                <img src="/uploads/projects/gallery/${g.filename}" 
                     class="img-fluid rounded" 
                     style="width:100%; object-fit:cover;">
                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                        onclick="deleteGallery(${g.id})">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        `);
                            });
                        }
                        // 🔹 Isi relasi stack
                        if (data.stack && Array.isArray(data.stack)) {
                            tomStack.clear(); // reset pilihan lama
                            const selectedStackIds = data.stack.map(s => s.id);
                            tomStack.setValue(selectedStackIds);
                        }

                        // 🔹 Isi relasi feature
                        if (data.feature && Array.isArray(data.feature)) {
                            tomFeature.clear(); // reset pilihan lama
                            const selectedFeatureIds = data.feature.map(f => f.id);
                            tomFeature.setValue(selectedFeatureIds);
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
                        $('#stack').val(null).trigger('change');
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
