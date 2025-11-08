<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">
    <!-- Section Title -->
    <div class="container section-title">
        <h2>Testimonials</h2>
        <p>Dengar langsung dari klien kami tentang pengalaman mereka bekerja dengan tim kami.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-12">
                <div class="testimonials-container">
                    <div class="swiper testimonials-slider init-swiper" data-aos="fade-up" data-aos-delay="400">

                        <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": 1,
                    "spaceBetween": 30,
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    },
                    "breakpoints": {
                      "768": {
                        "slidesPerView": 2
                      },
                      "992": {
                        "slidesPerView": 3
                      }
                    }
                  }
                </script>

                        <div class="swiper-wrapper">
                            @foreach ($totalReviews as $item)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="stars">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="bi bi-star{{ $i <= $item->rating ? '-fill' : '' }}"></i>
                                            @endfor
                                        </div>
                                        <p>
                                            {{ $item->testimoni }}
                                        </p>
                                        <div class="testimonial-profile">
                                            @if (!$item->foto)
                                                <img src="{{ asset('uploads/' . $profile->logo) }}" alt="Reviewer"
                                                    class="img-fluid rounded-circle">
                                            @else
                                                <img src="{{ asset('uploads/testimonis/' . $item->foto) }}"
                                                    alt="Reviewer" class="img-fluid rounded-circle object-fit-cover">
                                            @endif
                                            <div>
                                                <h3>{{ $item->nama }}</h3>
                                                <h4>{{ $item->pekerjaan }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            @endforeach
                            {{-- <div class="swiper-pagination"></div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <div class="overall-rating">
                        <div class="rating-number">
                            <!-- Menampilkan rata-rata rating dengan 1 angka desimal -->
                            {{ number_format($averageRating, 1) }}
                        </div>
                        <div class="rating-stars">
                            <!-- Menampilkan bintang penuh berdasarkan rating -->
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($averageRating))
                                    <i class="bi bi-star-fill"></i>
                                @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                                    <i class="bi bi-star-half"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor
                        </div>
                        <p>Based on {{ $totalReviews->count() }}+ reviews</p>
                        {{-- <div class="rating-platforms">
                            <span>Goodreads</span>
                            <span>Amazon</span>
                            <span>Barnes &amp; Noble</span>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
</section><!-- /Testimonials Section -->
