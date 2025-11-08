<div class="row my-3">
    <div class="col-md-6">
        <form id="form_terms">
            @csrf
            <div class="mb-3">
                <label for="terms" class="form-label fw-bold">Terms & Conditions</label>
                <textarea name="terms" id="terms" cols="30" rows="10" class="form-control">{{ old('terms', $general->terms) }}</textarea>
                <small id="autosave-terms" class="autosave-status text-muted d-block mt-2 fst-italic">
                    Belum ada penyimpanan otomatis
                </small>
            </div>
            <button class="btn btn-primary" type="submit">
                <i class="ri-send-plane-line"></i> Submit
            </button>
        </form>
    </div>

    <div class="col-md-6">
        <form id="form_privacy">
            @csrf
            <div class="mb-3">
                <label for="privacy" class="form-label fw-bold">Privacy Policy</label>
                <textarea name="privacy" id="privacy" cols="30" rows="10" class="form-control">{{ old('privacy', $general->privacy) }}</textarea>
                <small id="autosave-privacy" class="autosave-status text-muted d-block mt-2 fst-italic">
                    Belum ada penyimpanan otomatis
                </small>
            </div>
            <button class="btn btn-primary" type="submit">
                <i class="ri-send-plane-line"></i> Submit
            </button>
        </form>
    </div>
</div>

@include('plugins.summernote')
@push('scripts')
    <script>
        $(document).ready(function() {

            // === Inisialisasi Summernote ===
            $('#terms, #privacy').summernote({
                height: 250,
                placeholder: 'Tulis konten di sini...',
            });

            // === Fungsi Format Waktu ===
            function getCurrentTime() {
                const now = new Date();
                return now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
            }

            // === Fungsi tampilkan indikator animasi ===
            function showAutoSaveIndicator(selector) {
                const label = $(selector);
                label.text(`Draft disimpan otomatis pada ${getCurrentTime()}`);
                label.addClass('autosave-active');

                // Setelah 2 detik, kembali ke abu-abu halus
                setTimeout(() => {
                    label.removeClass('autosave-active');
                }, 2000);
            }

            // === Fungsi Submit Reusable ===
            function submitForm(formId, autosave = false) {
                let form = $(formId);
                let formData = new FormData(form[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ route('other.update') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (!autosave) {
                            Swal.fire({
                                position: "top-end",
                                icon: 'success',
                                title: 'Berhasil Disimpan!',
                                text: response.message || 'Data berhasil diperbarui.',
                                showConfirmButton: false,
                                timer: 1200,
                                toast: true,
                                background: '#28a745',
                                color: '#fff'
                            });
                        }

                        // Tampilkan animasi indikator autosave
                        const labelId = (formId === '#form_terms') ? '#autosave-terms' :
                            '#autosave-privacy';
                        showAutoSaveIndicator(labelId);
                    },
                    error: function() {
                        if (!autosave) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan. Silakan coba lagi.',
                                icon: 'error',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                toast: true,
                                background: '#dc3545',
                                color: '#fff'
                            });
                        }
                    }
                });
            }

            // === Manual Submit ===
            $('#form_terms').on('submit', function(e) {
                e.preventDefault();
                submitForm('#form_terms');
            });

            $('#form_privacy').on('submit', function(e) {
                e.preventDefault();
                submitForm('#form_privacy');
            });

            // === Auto-save jika ada perubahan ===
            let isChanged = {
                terms: false,
                privacy: false
            };

            $('#terms').on('summernote.change', function() {
                isChanged.terms = true;
            });

            $('#privacy').on('summernote.change', function() {
                isChanged.privacy = true;
            });

            // === Interval Auto-save setiap 30 detik ===
            setInterval(function() {
                if (isChanged.terms) {
                    submitForm('#form_terms', true);
                    isChanged.terms = false;
                }
                if (isChanged.privacy) {
                    submitForm('#form_privacy', true);
                    isChanged.privacy = false;
                }
            }, 30000); // 30 detik
        });
    </script>
@endpush
