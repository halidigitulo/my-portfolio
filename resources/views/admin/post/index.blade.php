@extends('admin.partials.app')
@section('title', 'Posts Management')
@section('content')
    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('title')</h4>
                    @can('post.create')
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#postModal"
                            id="addpostButton">Add Post</button>
                    @endcan
                </div>
                
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table_post" class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Judul</th>
                                    <th>Excerpt</th>
                                    <th>Tags</th>
                                    <th>Kategori</th>
                                    <th>Slider</th>
                                    <th>Author</th>
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
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Add Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="postForm" enctype="multipart/form-data">
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
                                <input type="hidden" id="post_id">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        autocomplete="off" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="isi">Isi</label>
                                    <textarea name="isi" id="isi" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="form-label">Tags</label>
                                    <input type="text" class="form-control" name="tag" id="tag">
                                </div>
                                <div class="form-group">
                                    <label for="is_slider" class="form-label">Slider?</label>
                                    <select name="is_slider" id="is_slider" class="form-control">
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('post.create')
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
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
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
                var storageBaseUrl = "{{ asset('uploads/posts') }}";
                $('#table_post').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "{{ route('post.index') }}",
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
                            data: 'judul',
                            name: 'judul',
                        },
                        {
                            data: 'excerpt',
                            name: 'excerpt',
                            render: function(data, type, row) {
                                if (!data) return '';

                                // Hilangkan semua tag HTML
                                let plainText = data.replace(/<\/?[^>]+(>|$)/g, "");

                                // Ganti multiple spasi dan newline dengan satu spasi
                                plainText = plainText.replace(/\s+/g, ' ').trim();

                                // Potong teks jika terlalu panjang (opsional)
                                if (plainText.length > 120) {
                                    plainText = plainText.substring(0, 120) + '...';
                                }

                                return plainText;
                            }
                        },
                        {
                            data: 'tag',
                            name: 'tag',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                if (data) {
                                    // Split tags by comma and create badges for each
                                    let tags = data.split(',');
                                    let badges = tags.map(tag =>
                                        `<span class="badge bg-primary me-1">${tag.trim()}</span>`
                                    );
                                    return badges.join(' ');
                                }
                                return '';
                            }
                        },
                        {
                            data: 'kategori',
                            name: 'kategori',
                        },
                        {
                            data: 'is_slider',
                            name: 'is_slider',
                            // render: function(data, type, row) {
                            //     if (data == 1) {
                            //         return '<span class="badge bg-success">Yes</span>';
                            //     } else {
                            //         return '<span class="badge bg-secondary">No</span>';
                            //     }
                            // }

                            orderable: false,
                            render: function(data, type, row) {
                                let checked = data == 1 ? 'checked' : '';
                                return `<input type="checkbox" class="form-check-input check-is_slider" data-id="${row.id}" ${checked} />`;
                            }
                        },
                        {
                            data: 'author',
                            name: 'author',
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
                    ], // Default ordering by the second column (kode_post)
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
                        },
                        processing: '<i class="bx bx-loader-alt bx-spin fs-3"></i> Memuat data...'
                    }
                })
            }

            const judul = document.querySelector('#judul');
            const slug = document.querySelector('#slug');

            judul.addEventListener('change', function() {
                fetch('/admin/post/cekSlug?judul=' + judul.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            });

            // Show modal for creating a new record
            $('#addpostButton').click(function() {
                $('#postForm')[0].reset(); // Clear the form
                $('#post_id').val(''); // Clear hidden input
                $('#postModalLabel').text('Add Data'); // Set modal title
                $('#savepost').text('Create'); // Change button text
                $('#postModal').modal('show'); // Show modal
            });

            $(document).on('click', '.edit-post', function() {
                const id = $(this).data('id'); // Ambil ID produk dari tombol

                $.ajax({
                    url: `/admin/post/${id}`,
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function(data) {

                        // Isi field dasar
                        $('#post_id').val(data.id);
                        $('#judul').val(data.judul);
                        $('#slug').val(data.slug);
                        $('#kategori_id').val(data.kategori_id);
                        $('#is_slider').val(data.is_slider);
                        $('#tag').val(data.tag);

                        // 🔹 Isi Summernote (deskripsi)
                        $('#isi').summernote('code', data.isi || '');

                        // 🔹 Tampilkan thumbnail
                        if (data.thumbnail) {
                            $('#preview-thumbnail')
                                .attr('src', `/uploads/posts/${data.thumbnail}`)
                                .removeClass('d-none')
                                .show();
                        } else {
                            $('#preview-thumbnail').addClass('d-none').hide();
                        }

                        // 🔹 Ubah teks modal
                        $('#postModalLabel').text('Edit Data');
                        $('#savepost').text('Update');

                        // 🔹 Tampilkan modal
                        $('#postModal').modal('show');
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

            // Handle form submission for both create and update
            $('#postForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = $('#post_id').val();
                let url = id ? `/admin/post/${id}` :
                    '/admin/post'; // Update if ID exists, otherwise create
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
                        $('#table_post').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#postModal').modal('hide'); // Hide the modal
                        $('#postForm')[0].reset(); // Reset the form
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

            // update status via table
            $(document).on('change', '.check-is_slider', function() {
                let is_slider = $(this).is(':checked') ? 1 : 0;
                let id = $(this).data('id');

                $.ajax({
                    url: '{{ route('post.toggle-accept') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        is_slider: is_slider,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            position: "top-end",
                            width: '400px',
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            background: '#28a745',
                            color: '#fff'
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: xhr.responseJSON.text || 'An error occurred.',
                            icon: 'error',
                            position: 'top-end',
                            width: '400px',
                            showConfirmButton: false,
                            timer: 3000,
                            toast: true,
                            background: '#dc3545',
                            color: '#fff'
                        });
                    }
                });
            });

            // Hapus thumbnail
            $(document).on('click', '.hapus-thumbnail', function() {
                var postId = $(this).attr('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will remove the thumbnail permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, remove it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/post/remove-thumbnail/' + postId,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1000,
                                    toast: true,
                                    position: 'top-end'
                                });
                                $('#table_post').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Something went wrong. Please try again.',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    position: 'top-end'
                                });
                            }
                        });
                    }
                });
            });

            // Hapus Data 
            $(document).on('click', '.hapus-post', function() {
                let id = $(this).data('id');
                let deleteUrl = '{{ route('post.destroy', ':id') }}'.replace(':id', id);

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
                                $('#table_post').DataTable().ajax
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new TomSelect("#tag", {
                persist: false,
                createOnBlur: true,
                create: true,
                delimiter: ',',
                hideSelected: true
            });
        });
    </script>
@endpush
