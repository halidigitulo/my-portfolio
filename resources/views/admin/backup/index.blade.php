@extends('admin.partials.app')
@section('title', 'Backup & Restore Database')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="ri-settings-line"></i> @yield('title')</h4>
                </div>
                <div class="card-body">
                    <div class="nav-align-top mb-4">
                        <div class="row">
                            <div class="col">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <button class="nav-link active" id="navs-pills-top-reset-tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-top-reset" type="button" role="tab"
                                            aria-controls="navs-pills-top-reset" aria-selected="true">Reset</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" id="navs-pills-top-backup-tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-top-backup" type="button" role="tab"
                                            aria-controls="navs-pills-top-backup" aria-selected="false">Backup &
                                            Restore</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navs-pills-top-reset" role="tabpanel">
                                        <div class="row mt-3">
                                            <h4 class="card-title"><i class="ri-reset-line"></i> Reset</h4>
                                            <div class="col-md-6">
                                                <p>Fitur ini digunakan untuk menghapus semua data pada aplikasi dan
                                                    mengembalikan ke
                                                    data awal (default).</p>
                                                <button class="btn btn-danger" id="resetBtn">🔃 Reset Data</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-top-backup" role="tabpanel">

                                        <div class="row mt-3">
                                            <div class="col">
                                                <h4 class="card-title"><i class="ri-database-2-line"></i> Backup & Restore
                                                    Database</h4>
                                                <button id="btn-backup" class="btn btn-success">Backup Database</button>
                                                <table id="backupTable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama File</th>
                                                            <th>Ukuran</th>
                                                            <th>Tanggal Dibuat</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <hr>
                                                <form id="restore-form" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" accept=".sql" required
                                                        class="form-control mb-2" />
                                                    <button type="submit" class="btn btn-warning">Restore Database</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            // Check if there's a stored active tab in localStorage
            var activeTab = localStorage.getItem('activeTab');

            // If there's a stored tab, show it
            if (activeTab) {
                $('[data-bs-target="' + activeTab + '"]').tab('show');
            }

            // Save the active tab to localStorage when the tab is clicked
            $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                var activeTab = $(e.target).attr('data-bs-target');
                localStorage.setItem('activeTab', activeTab);
            });
        });
    </script>
    <script>
        $('#resetBtn').click(function() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Semua data akan dihapus dan tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, reset sekarang!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('backup-restore.reset') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data berhasil direset'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Reset data gagal'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan saat mereset data'
                            });
                        }
                    });
                }
            });
        });


        $('#btn-backup').click(function() {
            Swal.fire({
                title: 'Sedang memproses...',
                text: 'Mohon tunggu backup sedang dibuat',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.get("{{ route('backup-restore.backup') }}", function(res) {
                Swal.close();
                if (res.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Backup Berhasil',
                        text: res.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // $("#download-link").attr("href", res.download_url).show();
                        table.ajax.reload();
                    });
                } else {
                    Swal.fire('Gagal', 'Backup gagal dibuat', 'error');
                }
            }).fail(function() {
                Swal.close();
                Swal.fire('Error', 'Terjadi kesalahan saat membuat backup', 'error');
            });
        })

        $('#restore-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            Swal.fire({
                title: 'Sedang memproses...',
                text: 'Mohon tunggu restore sedang dilakukan',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "{{ route('backup-restore.restore') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    Swal.close();
                    if (res.success) {
                        Swal.fire('Berhasil', res.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', res.message || 'Restore gagal', 'error');
                    }
                },
                error: function(xhr) {
                    Swal.close();
                    Swal.fire('Error', xhr.responseJSON?.message || 'Terjadi kesalahan saat restore',
                        'error');
                }
            });
        });

        let table = $('#backupTable').DataTable({
            ajax: '{{ route('backup-restore.list') }}',
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'size',
                    name: 'size'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Delete handler
        $(document).on('click', '.btn-delete', function() {
            let file = $(this).data('file');
            Swal.fire({
                title: "Hapus Backup?",
                text: "File: " + file,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/backup-restore/delete/' + encodeURIComponent(file),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            Swal.fire("Berhasil!", res.message, "success");
                            table.ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire("Gagal!", xhr.responseJSON?.message ??
                                "Terjadi kesalahan", "error");
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            // Check if there's a stored active tab in localStorage
            var activeTab = localStorage.getItem('activeTab');

            // If there's a stored tab, show it
            if (activeTab) {
                $('[data-bs-target="' + activeTab + '"]').tab('show');
            }

            // Save the active tab to localStorage when the tab is clicked
            $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                var activeTab = $(e.target).attr('data-bs-target');
                localStorage.setItem('activeTab', activeTab);
            });
        });
    </script>
@endpush
