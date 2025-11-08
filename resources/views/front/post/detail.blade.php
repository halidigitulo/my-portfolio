@extends('front.partials.starter')
@section('title', 'Posts')
@section('sub-title', 'Informasi bermanfaat')
@section('content')

    <section id="starter-section" class="starter-section section">

        {{-- <div class="container section-title">
            <h2>@yield('title')</h2>
            <p>@yield('sub-title')</p>
        </div> --}}

        <section id="service-details" class="service-details section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="container">
                    <div class="row gy-5">
                        <!-- Latest Post -->
                        <div class="row">
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                                <div class="row">
                                    @if ($data)
                                        <div class="latest-post-card mb-4">
                                            <!-- Thumbnail -->
                                            <h2>{{ $data->judul }}</h2>


                                            @if (!$data->thumbnail)
                                                <img src="{{ asset('uploads/' . $profile->logo) }}"
                                                    alt="{{ $profile->nama }}" class="img-fluid w-100 rounded my-3"
                                                    style="height: 350px; object-fit:cover">
                                            @else
                                                <img src="{{ asset('uploads/posts/' . $data->thumbnail) }}"
                                                    alt="{{ $profile->nama }}" class="img-fluid w-100 rounded my-3"
                                                    style="height: 350px; object-fit:cover">
                                            @endif
                                            <!-- Post Info -->
                                            <div class="latest-post-info">
                                                <p><strong><i class="bi bi-person-square"></i> </strong>
                                                    {{ $data->author->name }} | <strong><i
                                                            class="bi bi-calendar-event-fill"></i> </strong>
                                                    {{-- {{ \App\Helpers\FormatHelper::tanggalIndonesia($data->created_at) }} --}}
                                                    {{ $data->created_at->diffForHumans() }}
                                                </p>
                                                @include('front.partials.share')
                                                <div class="latest-post-description">
                                                    <p>{!! $data->isi !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="comments-section">
                                    <h3 class="section-title">Comments</h3>

                                    <!-- Form untuk menambahkan komentar -->
                                    <form id="commentForm" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="author_name">Name</label>
                                            <input type="text" class="form-control" id="author_name" name="author_name"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="author_email">Email</label>
                                            <input type="email" class="form-control" id="author_email" name="author_email"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Comment</label>
                                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-outline-danger my-3">Post Comment</button>
                                    </form>

                                    <!-- Tampilkan komentar yang sudah ada -->
                                    <div class="existing-comments mt-4" id="existingComments">
                                        <h5>Existing Comments:</h5>
                                        @forelse ($data->comments as $comment)
                                            <div class="comment-card">
                                                <div class="comment-header">
                                                    <strong>{{ $comment->author_name }}</strong>
                                                    <span class="comment-email">({{ $comment->author_email }})</span>
                                                </div>
                                                <p class="comment-content">{{ $comment->content }}</p>
                                                <p class="comment-date"><small>Posted on
                                                        {{ $comment->created_at->format('d M Y') }}</small></p>
                                            </div>
                                        @empty
                                            <div class="alert alert-danger text-center" role="alert">
                                                Jadilah yang pertama memberikan komentar. 🧑‍💻
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <section id="portfolio" class="portfolio section">
                                        <!-- All Posts -->
                                        <div class="container" data-aos="fade-up" data-aos-delay="100">
                                            <h4>Artikel Lainnya</h4>
                                            <hr>
                                            <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                                                data-sort="original-order">
                                                <div class="row g-4 isotope-container" data-aos="fade-up"
                                                    data-aos-delay="300">
                                                    @foreach ($randomData as $item)
                                                        <div
                                                            class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $item->kategori->id }}">
                                                            <article class="portfolio-entry">
                                                                <figure class="entry-image">
                                                                    @if (!$item->thumbnail)
                                                                        <img src="{{ asset('uploads/' . $profile->logo) }}"
                                                                            alt="{{ $profile->nama }}"
                                                                            class="img-fluid w-100 rounded"
                                                                            style="height: 200px; object-fit:cover;">
                                                                    @else
                                                                        <img src="{{ asset('uploads/posts/' . $item->thumbnail) }}"
                                                                            class="img-fluid w-100 rounded"
                                                                            alt="{{ $item->judul }}" loading="lazy">
                                                                    @endif
                                                                    <div class="entry-overlay">
                                                                        <div class="overlay-content">
                                                                            {{-- <div class="entry-meta">
                                                                        {{ $item->kategori->nama ?? '' }}</div> --}}
                                                                            <h3 class="entry-title">{{ $item->judul }}
                                                                            </h3>
                                                                            <div class="entry-links">
                                                                                <a href="{{ asset('uploads/posts/' . $item->thumbnail) }}"
                                                                                    class="glightbox"
                                                                                    data-gallery="portfolio-gallery-ui"
                                                                                    data-glightbox="title: {{ $item->judul }}; description: {{ $item->deskripsi }}">
                                                                                    <i
                                                                                        class="bi bi-arrows-angle-expand"></i>
                                                                                </a>
                                                                                <a
                                                                                    href="{{ route('post.detail', $item->slug) }}">
                                                                                    <i class="bi bi-arrow-right"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </figure>
                                                            </article>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            @include('front.others.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission with AJAX
            $('#commentForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah form untuk melakukan submit biasa

                // Menampilkan spinner loading
                $('.loading').addClass('show');

                // Ambil data dari form
                let formData = {
                    _token: $('input[name="_token"]').val(),
                    author_name: $('#author_name').val(),
                    author_email: $('#author_email').val(),
                    content: $('#content').val()
                };

                $.ajax({
                    url: "{{ route('comments.store', $data->id) }}", // Ganti dengan route yang sesuai
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Setelah berhasil mengirimkan komentar
                        $('.loading').removeClass('show');

                        if (response.status === 'success') {
                            // Clear the form fields
                            $('#author_name').val('');
                            $('#author_email').val('');
                            $('#content').val('');

                            // Tambahkan komentar yang baru ke dalam daftar komentar tanpa reload
                            $('#existingComments').prepend(`
                        <div class="comment-card">
                            <div class="comment-header">
                                <strong>${response.comment.author_name}</strong>
                                <span class="comment-email">(${response.comment.author_email})</span>
                            </div>
                            <p class="comment-content">${response.comment.content}</p>
                            <p class="comment-date"><small>Posted on ${response.comment.created_at}</small></p>
                        </div>
                    `);

                            // Notifikasi sukses menggunakan SweetAlert2
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            // Menampilkan notifikasi gagal menggunakan SweetAlert2
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.loading').removeClass('show');
                        // Menampilkan notifikasi error menggunakan SweetAlert2
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>
@endpush
