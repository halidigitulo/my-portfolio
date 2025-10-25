@extends('admin.partials.app')
@section('title', 'FAQ Management')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('title')</h4>
                    @can('faq.create')
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#faqModal" id="addfaqButton">Add
                            FAQ</button>
                    @endcan
                </div>
                
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table_faq" class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pertanayaan</th>
                                    <th>Jawaban</th>
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
    <div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="faqModalLabel">Add faq</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="faqForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="faq_id">
                        <div class="form-group">
                            <label for="question">Pertanayaan</label>
                            <textarea name="question" id="question" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="answer">Jawaban</label>
                            <textarea name="answer" id="answer" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('faq.create')
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
                $('#table_faq').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "{{ route('faq.index') }}",
                        type: 'GET',
                    },
                    columns: [{
                            orderable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'question',
                            name: 'question',
                        },
                        {
                            data: 'answer',
                            name: 'answer',
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
                    ], // Default ordering by the second column (kode_faq)
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
            $('#addfaqButton').click(function() {
                $('#faqForm')[0].reset(); // Clear the form
                $('#faq_id').val(''); // Clear hidden input
                $('#faqModalLabel').text('Add faq'); // Set modal title
                $('#savefaq').text('Create'); // Change button text
                $('#faqModal').modal('show'); // Show modal
            });

            $(document).on('click', '.edit-faq', function() {
                const id = $(this).data('id'); // Ambil ID dari tombol yang diklik

                $.ajax({
                    url: `/admin/faq/${id}`,
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function(data) {
                        $('#faq_id').val(data.id);
                        $('#question').val(data.question);
                        $('#answer').val(data.answer);
                        $('#faqModalLabel').text('Edit Data');
                        $('#savefaq').text('Update');
                        $('#faqModal').modal('show');
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
            $('#faqForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = $('#faq_id').val();
                let url = id ? `/admin/faq/${id}` :
                    '/admin/faq'; // Update if ID exists, otherwise create
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
                        $('#table_faq').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#faqModal').modal('hide'); // Hide the modal
                        $('#faqForm')[0].reset(); // Reset the form
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
            $(document).on('click', '.hapus-faq', function() {
                let id = $(this).data('id');
                let deleteUrl = '{{ route('faq.destroy', ':id') }}'.replace(':id', id);

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
                                $('#table_faq').DataTable().ajax
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
