<div class="row my-3">
    <div class="col">
        @can('kategori-berita.create')
            <button class="btn btn-primary mb-3" id="btn-add-kategori-berita"><i class="ri-add-line"></i> Add Data</button>
        @endcan
        <div class="table-responsive-md">
            <table class="table table-sm table-hover table-striped" id="kategori-berita-table">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Kategori</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                {{-- <tbody></tbody> --}}
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalkategori-berita" tabindex="-1" aria-hidden="false">
            <div class="modal-dialog">
                <form id="formkategori-berita">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="ri-add-line"></i> Add Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" id="kategori-berita_id">
                            <input type="text" class="form-control mb-2" id="kategori-berita_nama"
                                placeholder="Kategori berita" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                    class="ri-close-line"></i> Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('style')
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            fetchData();

            function fetchData() {
                $(document).ready(function() {

                    $('#kategori-berita-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '{{ route('kategori-berita.index') }}',
                            type: 'GET'
                        },
                        columns: [{
                                orderable: false,
                                render: function(data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }
                            },
                            {
                                data: 'nama',
                                name: 'nama'
                            },
                            {
                                data: 'aksi',
                                name: 'aksi'
                            }
                        ],
                        order: [
                            [0, 'asc']
                        ], // Default ordering by the second column (kode_bank)
                        responsive: true, // Makes the table responsive
                        autoWidth: false, // Prevents auto-sizing of columns
                        lengthMenu: [
                            [5, 10, 25, 50, -1],
                            [5, 10, 25, 50, "All"]
                        ], // Controls the page length options
                        pageLength: 5, // Default page length
                        // columnDefs: [{
                        //     targets: [0, 1, 2], // Adjust column indexes as needed
                        //     className: 'center-align'
                        // }]
                    });
                });
            }

            $('#btn-add-kategori-berita').click(() => {
                $('#modalkategori-berita').modal('show');
                $('#formkategori-berita')[0].reset();
                $('#kategori-berita_id').val('');
                $('.modal-title').text('Add Data');
            });

            $(document).on('click', '.edit-kategori-berita', function() {
                let id = $(this).data('id');
                $.get(`/admin/kategori-berita/${id}`, function(data) {
                    $('#modalkategori-berita').modal('show');
                    $('.modal-title').text('Edit Data');
                    $('#kategori-berita_id').val(data.id);
                    $('#kategori-berita_nama').val(data.nama);
                    $('#poin').val(data.poin);
                });
            });

            $('#formkategori-berita').submit(function(e) {
                e.preventDefault();
                let id = $('#kategori-berita_id').val();
                let url = id ? `/admin/kategori-berita/${id}` : `{{ route('kategori-berita.store') }}`;
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url,
                    type: 'POST',
                    data: {
                        _token: $('input[name=_token]').val(),
                        _method: method,
                        nama: $('#kategori-berita_nama').val(),
                        poin: $('#poin').val(),
                    },
                    success: function(res) {
                        $('#kategori-berita-table').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: res.message,
                            icon: 'success',
                            timer: 3000,
                            toast: true,
                            position: 'top-end',
                        });
                        $('#modalkategori-berita').modal('hide');
                        $('#formkategori-berita')[0].reset(); // Reset form
                    },
                    error: function(err) {
                        Swal.fire('Error', 'Failed to save kategori-berita', 'error');
                    }
                });
            });

            $(document).on('click', '.hapus-kategori-berita', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then(result => {
                    if (result.isConfirmed) {
                        $.post(`/admin/kategori-berita/${id}`, {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        }, function(response) {
                            $('#kategori-berita-table').DataTable().ajax.reload();
                            Swal.fire('Deleted!', response.message, 'success');
                            // fetchData();
                        });
                    }
                });
            });

        });

        $('#modalkategori-berita').on('hidden.bs.modal', function() {
            // Arahkan fokus ke tombol pemicu modal
            $('#btnOpenModal').focus();
        });

        $('#modalkategori-berita').on('hide.bs.modal', function() {
            $(this).find(':focus').blur();
        });
    </script>
@endpush
