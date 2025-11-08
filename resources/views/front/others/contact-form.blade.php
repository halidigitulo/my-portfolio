<div class="row g-4 g-lg-5">
    <div class="col-lg-5">
        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
            <h3>Informasi Kontak</h3>
            <p>Hubungi kontak dibawah ini untuk mendapatkan informasi lebih lanjut.</p>

            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                    <h4>Alamat Kami</h4>
                    <p>{{ $profile->alamat }}</p>
                    <p>{{ $profile->kota }}</p>
                </div>
            </div>

            <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                    <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                    <h4>No. Telp / WA</h4>
                    <p><a href="tel:{{ $profile->telp }}"></a>{{ $profile->telp }}</p>
                    <p>{{ $profile->hp }}</p>
                </div>
            </div>

            <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                    <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                    <h4>Email</h4>
                    <p>{{ $profile->email }}</p>
                    {{-- <p>contact@example.com</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
            <h3>Tinggalkan Pesan Anda</h3>
            {{-- <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis.</p> --}}

            <form action="{{ route('sendmessage') }}" id="form" method="post" class="php-email-form"
                data-aos="fade-up" data-aos-delay="200">
                @csrf
                <div class="row gy-4">

                    <div class="col-md-6">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                    </div>

                    <div class="col-md-6 ">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="col-12">
                        <input type="text" class="form-control float-input" name="no_hp"
                            placeholder="No. HP / WA (Optional)">
                    </div>

                    <div class="col-12">
                        <input type="text" class="form-control" name="subjek" placeholder="Subjek Pesan" required>
                    </div>

                    <div class="col-12">
                        <textarea class="form-control" name="pesan" id="pesan" rows="6" placeholder="Ketikkan pesan Anda disini..." required></textarea>
                        <p>Characters remaining: <span id="charCount">255</span></p>
                    </div>
                    <div class="text-center d-flex flex-row align-items-center">
                        {{-- <div class="loading">Loading</div> --}}
                        {{-- <div class="error-message"></div> --}}
                        {{-- <div class="sent-message">Your message has been sent. Thank you! --}}
                        </div>
                        {!! NoCaptcha::display() !!}
                        <button type="submit" class="btn w-50 text-center">Send Message</button>
                    </div>
                </div>
            </form>
            {!! NoCaptcha::renderJs() !!}
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#form', function(e) {
                e.preventDefault();
                let formData = new FormData($('#form')[0]);
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    typeData: "JSON",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(res) {

                        setTimeout(() => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Pesan berhasil terkirim',
                                text: 'Kami akan menghubungi Anda segera',
                                // showConfirmButton: false,
                                timer: 3000
                            }).then((res) => {
                                $("#form")[0].reset()
                                $("#charCount").text(255)
                            })
                        });

                    },
                    error: function(xhr) {
                        // console.log(xhr);
                        Swal.fire('Error!', xhr.responseJSON.text,
                            'error');
                    }
                })
            });

            $('#pesan').on('input', function() {
                var text = $(this).val();
                var charCount = text.length;

                // Enforce the character limit
                if (charCount > 255) {
                    $(this).val(text.substr(0, 255)); // Truncate the text to 255 characters
                    charCount = 255;
                }
                // Update the character count
                $('#charCount').text(255 - charCount); // Display remaining characters
            });
        });

        // hanya boleh ketik angka
        $('.float-input').on('input', function() {
            // Replace any character that is not a number or dot
            this.value = this.value.replace(/[^0-9.]/g, '');

            // Ensure only one dot is allowed
            if ((this.value.match(/\./g) || []).length > 1) {
                this.value = this.value.replace(/\.+$/, "");
            }
        });
    </script>
@endpush
