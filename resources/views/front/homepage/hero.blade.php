<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="container">
        <div class="row g-0 align-items-center">

            <div class="col-lg-6 hero-content" data-aos="fade-right" data-aos-delay="100">
                <div class="content-wrapper">
                    {{-- <h1 class="hero-title">Creative <span class="typed"
                            data-typed-items="{{ $generalsettings->hero_title }}"></span></h1>
                    <p class="lead">{{ $generalsettings->hero_text }}</p> --}}

                    @php
                        // Ambil semua nama service jadi string, dipisah koma untuk Typed.js
                        $typedItems = $services->pluck('judul')->implode(', ');
                    @endphp

                    <h1 class="hero-title">
                        Kami Bantu Anda <span class="typed" data-typed-items="{{ $typedItems }}"></span>
                    </h1>
                    <p class="lead">{{ $generalsettings->hero_text }}</p>


                    <div class="hero-stats" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-item">
                            <span class="purecounter" data-purecounter-start="0"
                                data-purecounter-end="{{ $completedprojects }}" data-purecounter-duration="2">0</span>
                            <span class="stat-label">Project Selesai</span>
                        </div>
                        <div class="stat-item">
                            <span class="purecounter" data-purecounter-start="0"
                                data-purecounter-end="{{ $generalsettings->experiences }}"
                                data-purecounter-duration="2">0</span>
                            <span class="stat-label">Tahun Pengalaman</span>
                        </div>
                        <div class="stat-item">
                            <span class="purecounter" data-purecounter-start="0"
                                data-purecounter-end="{{ $clients->count() }}" data-purecounter-duration="2">0</span>
                            <span class="stat-label">Klien Bahagia</span>
                        </div>
                    </div>

                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="300">
                        <a href="#portfolio" class="btn btn-primary">View My Work</a>
                        <a href="#contact" class="btn btn-outline">Get In Touch</a>
                    </div>

                    <div class="social-links" data-aos="fade-up" data-aos-delay="400">
                        @include('front.partials.socmed')

                    </div>
                </div>
            </div>

            <div class="col-lg-6 hero-image" data-aos="fade-left" data-aos-delay="200">
                <div class="image-container">
                    <div class="floating-elements">
                        @foreach ($services as $index => $item)
                            @php
                                // Hitung delay animasi otomatis (misal: 300, 400, 500, ...)
                                $delay = 300 + $index * 100;

                                // Tentukan nama class card unik
                                $cardClass = 'card-' . ($index + 1);
                            @endphp

                            <div class="floating-card {{ $cardClass }}" data-aos="zoom-in"
                                data-aos-delay="{{ $delay }}">
                                <i class="bi bi-{{ $item->icon }}"></i>
                                <span>{{ $item->judul }}</span>
                            </div>
                        @endforeach
                    </div>

                    <img src="{{ asset('uploads/' . $profile->hero) }}" alt="Portfolio Hero"
                        class="img-fluid hero-main-image" style="height: 650px; width: 100%; object-fit:cover">
                    <div class="image-overlay"></div>
                </div>
            </div>

        </div>
    </div>

</section><!-- /Hero Section -->
