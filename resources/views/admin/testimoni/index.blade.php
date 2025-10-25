@extends('admin.partials.app')
@section('title', 'Testimoni Management')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('title')</h4>
                    @can('testimoni.create')
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#testimoniModal"
                            id="addtestimoniButton">Add Testimoni</button>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table_testimoni" class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                    <th>Testimoni</th>
                                    <th>Rating</th>
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
    <div class="modal fade" id="testimoniModal" tabindex="-1" role="dialog" aria-labelledby="testimoniModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimoniModalLabel">Add Testimoni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="testimoniForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="testimoni_id">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto"
                                onchange="previewFoto(event)">
                            <img id="preview-foto" alt="Preview" class="rounded img-fluid mt-2" style="max-width: 100px;"
                                display="none">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="testimoni">Testimoni</label>
                            <textarea class="form-control" id="testimoni" name="testimoni" rows="3" required></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" min="0" max="100" class="form-control" id="rating"
                                name="rating" autocomplete="off" required>
                        </div> --}}
                        <div class="form-group">
                            <label for="rating" class="form-label">Rating</label>
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="5 stars">&#9733;</label>

                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="4 stars">&#9733;</label>

                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="3 stars">&#9733;</label>

                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="2 stars">&#9733;</label>

                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="1 star">&#9733;</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('testimoni.create')
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
        function previewFoto(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview-foto');
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
                var storageBaseUrl = "{{ asset('uploads/testimonis') }}";
                $('#table_testimoni').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "{{ route('testimoni.index') }}",
                        type: 'GET',
                    },
                    columns: [{
                            orderable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'foto',
                            name: 'foto',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                if (data) {
                                    return `<img src="${storageBaseUrl}/${data}" alt="foto" class="img-foto rounded-circle square-image" style="width: 50px; height: 50px;" />`;
                                } else {
                                    return `<span class="text-muted">No Photo</span>`;
                                }
                            }
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                        },
                        {
                            data: 'pekerjaan',
                            name: 'pekerjaan',
                        },
                        {
                            data: 'testimoni',
                            name: 'testimoni',
                        },
                        {
                            data: 'rating',
                            name: 'rating',
                            render: function(data, type, row) {
                                if (!data) return '-';
                                let stars = '';
                                for (let i = 1; i <= 5; i++) {
                                    stars +=
                                        `<span style="color:${i <= data ? '#ffc107' : '#ddd'};">&#9733;</span>`;
                                }
                                return `<div class="text-left">${stars}</div>`;
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
                    ], // Default ordering by the second column (kode_testimoni)
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
            $('#addtestimoniButton').click(function() {
                $('#testimoniForm')[0].reset(); // Clear the form
                $('#testimoni_id').val(''); // Clear hidden input
                $('#testimoniModalLabel').text('Add testimoni'); // Set modal title
                $('#savetestimoni').text('Create'); // Change button text
                $('#testimoniModal').modal('show'); // Show modal
            });

            document.querySelectorAll('.rating input').forEach((radio) => {
                radio.addEventListener('change', (e) => {
                    const selectedRating = e.target.value;
                    console.log(`Selected Rating: ${selectedRating}`);
                    // You can also update a hidden field if needed:
                    // document.getElementById('hiddenRate').value = selectedRating;
                });
            });

            $(document).on('click', '.edit-testimoni', function() {
                const id = $(this).data('id'); // Ambil ID dari tombol yang diklik

                $.ajax({
                    url: `/admin/testimoni/${id}`,
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function(data) {
                        $('#testimoni_id').val(data.id);
                        $('#nama').val(data.nama);
                        $('#pekerjaan').val(data.pekerjaan);
                        // $('#rating').val(data.rating);
                        // 🔹 Reset semua radio rating dulu
                        $('input[name="rating"]').prop('checked', false);

                        // 🔹 Pilih rating sesuai data dari database
                        if (data.rating) {
                            $(`input[name="rating"][value="${data.rating}"]`).prop('checked',
                                true);
                        }
                        $('#testimoni').val(data.testimoni);
                        // 🔹 Tampilkan thumbnail
                        if (data.foto) {
                            $('#preview-foto')
                                .attr('src', `/uploads/testimonis/${data.foto}`)
                                .removeClass('d-none')
                                .show();
                        } else {
                            $('#preview-foto').addClass('d-none').hide();
                        }
                        $('#testimoniModalLabel').text('Edit Testimoni');
                        $('#savetestimoni').text('Update');
                        $('#testimoniModal').modal('show');
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
            $('#testimoniForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = $('#testimoni_id').val();
                let url = id ? `/admin/testimoni/${id}` :
                    '/admin/testimoni'; // Update if ID exists, otherwise create
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
                        $('#table_testimoni').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#testimoniModal').modal('hide'); // Hide the modal
                        $('#testimoniForm')[0].reset(); // Reset the form
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
            $(document).on('click', '.hapus-testimoni', function() {
                let id = $(this).data('id');
                let deleteUrl = '{{ route('testimoni.destroy', ':id') }}'.replace(':id', id);

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
                                $('#table_testimoni').DataTable().ajax
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
        $('#testimoniModal').on('shown.bs.modal', function() {
            const selects = ['#kategori_id'];

            selects.forEach(function(selector) {
                new TomSelect(selector, {
                    sortField: {
                        field: "text",
                        direction: "asc"
                    },
                    // dropdownParent: $('#testimoniModal'), // Ensure the dropdown remains properly aligned in the modal
                    closeAfterSelect: true // Optional: close dropdown after selecting an option
                });
            });
        });
    </script>
@endpush
