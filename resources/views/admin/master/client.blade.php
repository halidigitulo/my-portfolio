@extends('admin.partials.app')
@section('title', 'Clients Management')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('title')</h4>
                    @can('client.create')
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#clientModal"
                            id="addClientButton">Add Client</button>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table_client" class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Nama</th>
                                    <th>PIC</th>
                                    <th>No. HP</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
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
    <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientModalLabel">Add Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="clientForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="client_id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="pic">PIC</label>
                            <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="no_wa">No. HP</label>
                            <input type="no_wa" class="form-control" id="no_wa" name="no_wa" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <p class="text-muted">Logo</p>
                            <input type="file" class="form-control" id="logo" name="logo"
                                onchange="previewLogo(event)">
                            <img id="preview-logo" alt="Preview" class="rounded img-fluid mt-2" style="max-width: 100px;"
                                display="none">
                        </div>

                    </div>
                    <div class="modal-footer">
                        @can('client.create')
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
@endsection
@push('style')
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
        function previewLogo(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview-logo');
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
                var storageBaseUrl = "{{ asset('uploads/clients') }}";
                $('#table_client').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "{{ route('client.index') }}",
                        type: 'GET'
                    },
                    columns: [{
                            orderable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'logo',
                            name: 'logo',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                if (data) {
                                    return `<img src="${storageBaseUrl}/${data}" alt="Logo" class="img-thumbnail rounded-circle" style="width: 50px; height: 50px; object-fit:cover;" />`;
                                } else {
                                    return `<span class="text-muted">No Logo</span>`;
                                }
                            }
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                        },
                        {
                            data: 'pic',
                            name: 'pic',
                        },
                        {
                            data: 'no_wa',
                            name: 'no_wa',
                        },
                        {
                            data: 'email',
                            name: 'email',
                        },
                        {
                            data: 'alamat',
                            name: 'alamat',
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
                    ], // Default ordering by the second column (kode_client)
                    responsive: true, // Makes the table responsive
                    autoWidth: false, // Prevents auto-sizing of columns
                    lengthMenu: [
                        [10, 25, 50],
                        [10, 25, 50, "All"]
                    ], // Controls the page length options
                    pageLength: 10, // Default page length
                    language: {
                        lengthMenu: "show _MENU_", // supaya tampil dropdown lengthMenu
                        search: "Search:",
                        paginate: {
                            previous: "Prev",
                            next: "Next"
                        }
                    }
                })
            }

            // Show modal for creating a new record
            $('#addClientButton').click(function() {
                $('#clientForm')[0].reset(); // Clear the form
                $('#client_id').val(''); // Clear hidden input
                $('#clientModalLabel').text('Add Client'); // Set modal title
                $('#saveclient').text('Create'); // Change button text
                $('#clientModal').modal('show'); // Show modal
            });

            $(document).on('click', '.edit-client', function() {
                const id = $(this).data('id'); // Ambil ID dari tombol yang diklik

                $.ajax({
                    url: `/admin/client/${id}`,
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function(data) {
                        $('#client_id').val(data.id);
                        $('#nama').val(data.nama);
                        $('#pic').val(data.pic);
                        $('#no_wa').val(data.no_wa);
                        $('#email').val(data.email);
                        $('#alamat').val(data.alamat);
                        if (data.logo) {
                            $('#preview-logo').attr('src',
                                `/uploads/clients/${data.logo}`).show();
                        } else {
                            $('#preview-logo').hide();
                        }
                        $('#clientModalLabel').text('Edit Data');
                        $('#saveclient').text('Update');
                        $('#clientModal').modal('show');
                    },
                    error: function(err) {
                        if (err.status === 403) {
                            Swal.fire('Akses Ditolak', err.responseJSON?.message ||
                                'Anda tidak punya izin', 'error');
                        } else {
                            Swal.fire('Gagal', 'Terjadi kesalahan', 'error');
                        }
                    }
                });
            });

            // Handle form submission for both create and update
            $('#clientForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = $('#client_id').val();
                let url = id ? `/admin/client/${id}` :
                    '/admin/client'; // Update if ID exists, otherwise create
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
                        $('#table_client').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#clientModal').modal('hide'); // Hide the modal
                        $('#clientForm')[0].reset(); // Reset the form
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
            $(document).on('click', '.hapus-client', function() {
                let id = $(this).data('id');
                let deleteUrl = '{{ route('client.destroy', ':id') }}'.replace(':id', id);

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
                                $('#table_client').DataTable().ajax
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
