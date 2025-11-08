@extends('front.partials.starter')
@section('title', 'Layanan')
@section('sub-title', 'Kami menawarkan layanan mulai dari desain kreatif hingga pengembangan sistem web dan keamanan.')
@section('meta_description',
    'Discover our comprehensive range of services designed to elevate your business. From
    digital marketing to web development, we provide tailored solutions that drive growth and success.')
@section('meta_keywords', 'services, digital marketing, web development, SEO, content creation, brand strategy')
@section('content')

    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title">
            <h2>@yield('title')</h2>
            <p>@yield('sub-title')</p>
        </div><!-- End Section Title -->

        <section id="service-details" class="service-details section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5">

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-hero">
                            @if (!$profile->cover)
                                <img src="{{ asset('uploads/' . $profile->logo) }}" alt="{{ $profile->nama }}"
                                    class="img-fluid">
                            @else
                                <img src="{{ asset('uploads/' . $profile->cover) }}" alt="{{ $profile->nama }}"
                                    class="img-fluid">
                            @endif
                            <div class="service-badge">
                                <span>{{ $profile->nama }} | {{ $profile->tagline }}</span>
                            </div>
                        </div>

                        <div class="service-content">
                            <div class="service-header">
                                <h2>{{ $profile->nama }}</h2>
                                <p class="service-intro">{!! $profile->isi !!}</p>
                            </div>

                            <div class="service-features">
                                <h4>Apa yang kami berikan</h4>
                                <div class="row gy-3">
                                    @foreach ($services as $item)
                                        <div class="col-md-6">
                                            <div class="feature-item">
                                                <div class="feature-icon">
                                                    <i class="bi bi-{{ $item->icon }}"></i>
                                                </div>
                                                <div class="feature-content">
                                                    <h5>{{ $item->judul }}</h5>
                                                    <p>{{ $item->deskripsi }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="service-process">
                                <h4>Proses Pengerjaan dari Kami</h4>
                                <div class="process-steps">
                                    <div class="process-step">
                                        <div class="step-number">01</div>
                                        <div class="step-content">
                                            <h5>Perencanaan & Analisis</h5>
                                            <p>Memulai proyek dengan memahami kebutuhan klien dan menetapkan tujuan jelas.
                                                Kami menganalisis audiens, fitur utama, dan anggaran untuk memastikan
                                                fondasi yang kokoh.</p>
                                        </div>
                                    </div>
                                    <div class="process-step">
                                        <div class="step-number">02</div>
                                        <div class="step-content">
                                            <h5>Desain & Pengembangan</h5>
                                            <p>Mengubah ide menjadi desain visual menarik, kemudian membangun aplikasi atau
                                                website dengan kode yang efisien dan fungsionalitas yang optimal.</p>
                                        </div>
                                    </div>
                                    <div class="process-step">
                                        <div class="step-number">03</div>
                                        <div class="step-content">
                                            <h5>Uji Coba & Penyempurnaan</h5>
                                            <p>Menguji produk secara menyeluruh untuk memastikan kualitas, stabilitas, dan
                                                keamanan. Kami menyempurnakan setiap elemen agar siap digunakan tanpa
                                                masalah.</p>
                                        </div>
                                    </div>
                                    <div class="process-step">
                                        <div class="step-number">04</div>
                                        <div class="step-content">
                                            <h5>Serah Terima & Pelatihan</h5>
                                            <p>Setelah semuanya siap, kami menyerahkan produk akhir dengan pelatihan dan
                                                dokumentasi lengkap, memastikan klien dapat mengelola proyek dengan mudah.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="service-gallery" data-aos="fade-up" data-aos-delay="300">
                                <h4>Project Showcase</h4>
                                <div class="row gy-3">
                                    @foreach ($projects as $item)
                                        <div class="col-md-4">
                                            <a href="{{ route('project.detail', $item->slug) }}">
                                                <img src="{{ asset('uploads/projects/' . $item->thumbnail) }}"
                                                    alt="{{ $item->judul }}" class="img-fluid rounded"
                                                    style="width:100%; height: 200px; object-fit:cover">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('front.others.sidebar')

                </div>

            </div>

        </section><!-- /Service Details Section -->
    </section>
@endsection
