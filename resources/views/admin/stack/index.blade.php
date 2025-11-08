@extends('admin.partials.app')
@section('title', 'Stack Management')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('title')</h4>
                    @can('stack.create')
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#stackModal"
                            id="addstackButton">Add Stack</button>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table_stack" class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                    <th>Kategori</th>
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
    <div class="modal fade" id="stackModal" tabindex="-1" role="dialog" aria-labelledby="stackModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stackModalLabel">Add Stack</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="stackForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="stack_id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" min="0" max="100" class="form-control" id="nilai" name="nilai" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="kategori_id" id="kategori_id" class="form-control select2 text-capitalize">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoristack as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('stack.create')
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
                // var storageBaseUrl = "{{ asset('uploads/stacks') }}";
                $('#table_stack').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "{{ route('stack.index') }}",
                        type: 'GET',
                    },
                    columns: [{
                            orderable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                        },
                        {
                            data: 'nilai',
                            name: 'nilai',
                        },
                        {
                            data: 'kategori',
                            name: 'kategori',
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
                    ], // Default ordering by the second column (kode_stack)
                    responsive: true, // Makes the table responsive
                    autoWidth: false, // Prevents auto-sizing of columns
                    lengthMenu: [
                        [10, 25, 50],
                        [10, 25, 50, "All"]
                    ], // Controls the page length options
                    pageLength: 10, // Default page length
                })
            }

            // Show modal for creating a new record
            $('#addstackButton').click(function() {
                $('#stackForm')[0].reset(); // Clear the form
                $('#stack_id').val(''); // Clear hidden input
                $('#stackModalLabel').text('Add Stack'); // Set modal title
                $('#savestack').text('Create'); // Change button text
                $('#stackModal').modal('show'); // Show modal
            });


            $(document).on('click', '.edit-stack', function() {
                const id = $(this).data('id'); // Ambil ID dari tombol yang diklik

                $.ajax({
                    url: `/admin/stack/${id}`,
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function(data) {
                        $('#stack_id').val(data.id);
                        $('#nama').val(data.nama);
                        $('#nilai').val(data.nilai);
                        $('#kategori_id').val(data.kategori_id);
                        $('#stackModalLabel').text('Edit Stack');
                        $('#savestack').text('Update');
                        $('#stackModal').modal('show');
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
            $('#stackForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = $('#stack_id').val();
                let url = id ? `/admin/stack/${id}` :
                    '/admin/stack'; // Update if ID exists, otherwise create
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
                        $('#table_stack').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#stackModal').modal('hide'); // Hide the modal
                        $('#stackForm')[0].reset(); // Reset the form
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
            $(document).on('click', '.hapus-stack', function() {
                let id = $(this).data('id');
                let deleteUrl = '{{ route('stack.destroy', ':id') }}'.replace(':id', id);

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
                                $('#table_stack').DataTable().ajax
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
        $('#stackModal').on('shown.bs.modal', function() {
            const selects = ['#kategori_id'];

            selects.forEach(function(selector) {
                new TomSelect(selector, {
                    sortField: {
                        field: "text",
                        direction: "asc"
                    },
                    // dropdownParent: $('#stackModal'), // Ensure the dropdown remains properly aligned in the modal
                    closeAfterSelect: true // Optional: close dropdown after selecting an option
                });
            });
        });
    </script>
@endpush
