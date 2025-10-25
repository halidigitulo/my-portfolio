@extends('admin.partials.app')
@section('title', 'Invoice Management')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('title')</h4>
                    @can('invoice.create')
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#invoiceModal"
                            id="addinvoiceButton">Add Invoice</button>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table_invoice" class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. Invoice</th>
                                    <th>Tgl. Invoice</th>
                                    <th>Terima Dari</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
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
    <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Add Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="invoiceForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="invoice_id">
                        <div class="form-group">
                            <label for="no_invoice">No. Invoice</label>
                            <input type="text" class="form-control" id="no_invoice" name="no_invoice" autocomplete="off"
                                placeholder="Otomatis" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_invoice">Tgl. Invoice</label>
                            <input type="date" class="form-control" id="tgl_invoice" name="tgl_invoice">
                        </div>
                        <div class="form-group">
                            <label for="client_id">Terima Dari</label>
                            <select name="client_id" id="client_id" class="form-control select2 text-capitalize">
                                <option value="">-- Pilih Client --</option>
                                @foreach ($clients as $c)
                                    <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                @endforeach
                                <option value="lainnya" class="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" class="form-control d-none" id="terima_dari" name="terima_dari"
                                placeholder="Masukkan nama lainnya">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('invoice.create')
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
                // var storageBaseUrl = "{{ asset('uploads/invoices') }}";
                $('#table_invoice').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "{{ route('invoice.index') }}",
                        type: 'GET',
                    },
                    columns: [{
                            orderable: false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'no_invoice',
                            name: 'no_invoice',
                        },
                        {
                            data: 'tgl_invoice',
                            name: 'tgl_invoice',
                        },
                        {
                            data: 'client',
                            name: 'client',
                        },
                        {
                            data: 'jumlah',
                            name: 'jumlah',
                        },
                        {
                            data: 'keterangan',
                            name: 'keterangan',
                        },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data, type, row) {
                                if (data == 0) {
                                    return '<span class="badge bg-warning">Pending</span>';
                                } else if (data == 1) {
                                    return '<span class="badge bg-success">Paid</span>';
                                } else {
                                    return '<span class="badge bg-secondary">Unknown</span>';
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
                    ], // Default ordering by the second column (kode_invoice)
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
            $('#addinvoiceButton').click(function() {
                $('#invoiceForm')[0].reset(); // Clear the form
                $('#invoice_id').val(''); // Clear hidden input
                $('#invoiceModalLabel').text('Add Invoice'); // Set modal title
                $('#saveinvoice').text('Create'); // Change button text
                $('#invoiceModal').modal('show'); // Show modal
            });

            $(document).on('click', '.edit-invoice', function() {
                const id = $(this).data('id'); // Ambil ID dari tombol yang diklik
                $.ajax({
                    url: `/admin/invoice/${id}`,
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function(data) {
                        $('#invoice_id').val(data.id);
                        $('#no_invoice').val(data.no_invoice);
                        $('#tgl_invoice').val(data.tgl_invoice);
                        $('#client_id').val(data.client_id);
                        $('#jumlah').val(data.jumlah);
                        $('#keterangan').val(data.keterangan);
                        $('#invoiceModalLabel').text('Edit Invoice');
                        $('#saveinvoice').text('Update');
                        $('#invoiceModal').modal('show');
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

            // Saat tombol "Update Status" diklik
            $(document).on('click', '.paid-invoice', function() {
                var invoiceId = $(this).data('id'); // Ambil ID invoice dari data-id

                // Menampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Ubah Status Invoice menjadi Paid!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, ubah!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika konfirmasi "Ya" dipilih, lakukan aksi untuk update status invoice
                        $.ajax({
                            url: '/admin/invoice/update-status/' +
                                invoiceId, // Ganti dengan URL yang sesuai
                            method: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr(
                                    'content'), // Jika menggunakan CSRF token
                                status: 'paid' // Atau status lain yang ingin kamu kirimkan
                            },
                            success: function(response) {
                                // Tampilkan notifikasi sukses
                                Swal.fire(
                                    'Status Diperbarui!',
                                    'Invoice telah berhasil diperbarui.',
                                    'success'
                                );
                                $('#table_invoice').DataTable().ajax
                                    .reload();
                                // Lakukan tindakan lain setelah sukses, misalnya reload halaman atau update tampilan
                            },
                            error: function(xhr, status, error) {
                                // Tampilkan notifikasi error jika ada masalah
                                Swal.fire(
                                    'Terjadi Kesalahan!',
                                    'Gagal memperbarui status invoice.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Print Invoice
            $(document).on('click', '.print-invoice', function() {
                var id = $(this).data('id');
                window.open('/admin/invoice/print/' + id, '_blank'); // buka halaman print di tab baru
            });

            // Handle form submission for both create and update
            $('#invoiceForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let id = $('#invoice_id').val();
                let url = id ? `/admin/invoice/${id}` :
                    '/admin/invoice'; // Update if ID exists, otherwise create
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
                        $('#table_invoice').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#invoiceModal').modal('hide'); // Hide the modal
                        $('#invoiceForm')[0].reset(); // Reset the form
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
            $(document).on('click', '.hapus-invoice', function() {
                let id = $(this).data('id');
                let deleteUrl = '{{ route('invoice.destroy', ':id') }}'.replace(':id', id);

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
                                $('#table_invoice').DataTable().ajax
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

            $(document).ready(function() {
                // Sembunyikan input "terima_dari" pada awalnya
                $('#terima_dari').addClass('d-none');

                // Ketika pilihan pada select berubah
                $('#client_id').on('change', function() {
                    var selectedValue = $(this).val();

                    // Jika memilih opsi "Lainnya"
                    if (selectedValue === 'lainnya') {
                        $('#terima_dari').removeClass('d-none'); // Tampilkan input "terima_dari"
                        $('#client_id').val(''); // Kosongkan nilai client_id
                    } else {
                        $('#terima_dari').addClass('d-none'); // Sembunyikan input "terima_dari"
                    }
                });

                // Sebelum form disubmit, pastikan nilai client_id kosong jika memilih "Lainnya"
                $('form').on('submit', function() {
                    var selectedValue = $('#client_id').val();
                    // Jika memilih "Lainnya", kosongkan client_id agar tidak dikirimkan
                    if (selectedValue === 'lainnya') {
                        $('#client_id').val('');
                    }
                });
            });
        })
    </script>
@endpush
