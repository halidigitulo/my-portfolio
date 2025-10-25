@extends('admin.partials.app')
@section('title', 'Resume Management')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('title')</h4>
                    @can('resume.create')
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#resumeModal"
                            id="addresumeButton">Add Resume</button>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table_resume" class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Lokasi</th>
                                    <th>Jenis</th>
                                    <th>Mulai Dari</th>
                                    <th>Sampai Dengan</th>
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
    <div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="resumeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resumeModalLabel">Add Resume</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="resumeForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="resume_id">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="mulai_dari">Mulai Dari</label>
                            <input type="text" name="mulai_dari" id="mulai_dari" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sampai_dengan">Sampai Dengan</label>
                            <input type="text" name="sampai_dengan" id="sampai_dengan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control select2 text-capitalize">
                                <option value="profesional">Professinoal Journey</option>
                                <option value="akademik">Academic Excellence</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('resume.create')
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
                // var storageBaseUrl = "{{ asset('uploads/resumes') }}";
                $('#table_resume').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "{{ route('resume.index') }}",
                        type: 'GET'
                    },
                    columns: [{
                            orderable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'judul',
                            name: 'judul',
                        },
                        {
                            data: 'lokasi',
                            name: 'lokasi',
                        },
                        {
                            data: 'jenis',
                            name: 'jenis',
                            render: function(data, type, row) {
                                if (!data) return '';
                                if (data === 'profesional') {
                                    return 'Professional Journey';
                                } else if (data === 'akademik') {
                                    return 'Academic Excellence';
                                }
                                // return data.charAt(0).toUpperCase() + data.slice(1);
                            }

                        },
                        {
                            data: 'mulai_dari',
                            name: 'mulai_dari',
                        },
                        {
                            data: 'sampai_dengan',
                            name: 'sampai_dengan',
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
                    ], // Default ordering by the second column (kode_resume)
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
            $('#addresumeButton').click(function() {
                $('#resumeForm')[0].reset(); // Clear the form
                $('#resume_id').val(''); // Clear hidden input
                $('#resumeModalLabel').text('Add Resume'); // Set modal title
                $('#saveresume').text('Create'); // Change button text
                $('#resumeModal').modal('show'); // Show modal
            });


            $(document).on('click', '.edit-resume', function() {
                const id = $(this).data('id'); // Ambil ID dari tombol yang diklik

                $.ajax({
                    url: `/admin/resume/${id}`,
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function(data) {
                        $('#resume_id').val(data.id);
                        $('#judul').val(data.judul);
                        $('#lokasi').val(data.lokasi);
                        $('#deskripsi').val(data.deskripsi);
                        $('#jenis').val(data.jenis);
                        $('#mulai_dari').val(data.mulai_dari);
                        $('#sampai_dengan').val(data.sampai_dengan);
                        $('#resumeModalLabel').text('Edit Resume');
                        $('#saveresume').text('Update');
                        $('#resumeModal').modal('show');
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
            $('#resumeForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = $('#resume_id').val();
                let url = id ? `/admin/resume/${id}` :
                    '/admin/resume'; // Update if ID exists, otherwise create
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
                        $('#table_resume').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#resumeModal').modal('hide'); // Hide the modal
                        $('#resumeForm')[0].reset(); // Reset the form
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
            $(document).on('click', '.hapus-resume', function() {
                let id = $(this).data('id');
                let deleteUrl = '{{ route('resume.destroy', ':id') }}'.replace(':id', id);

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
                                $('#table_resume').DataTable().ajax
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
