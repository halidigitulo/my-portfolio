@extends('front.partials.starter')
@section('title', 'Posts')
@section('sub-title', 'Informasi bermanfaat')
@section('content')

    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title">
            <h2>@yield('title')</h2>
            <p>@yield('sub-title')</p>
        </div><!-- End Section Title -->

        <section id="service-details" class="service-details section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="container">
                    <div class="row gy-5">
                        <!-- Latest Post -->
                        <div class="row">
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                                <div class="row">
                                    @if ($latestPost)
                                        <div class="latest-post-card mb-4">
                                            <!-- Thumbnail -->
                                            @if (!$latestPost->thumbnail)
                                                <img src="{{ asset('uploads/' . $profile->logo) }}"
                                                    alt="{{ $profile->nama }}" class="img-fluid w-100 rounded"
                                                    style="height: 350px; object-fit:cover">
                                            @else
                                                <img src="{{ asset('uploads/posts/' . $latestPost->thumbnail) }}"
                                                    alt="{{ $profile->nama }}" class="img-fluid w-100 rounded"
                                                    style="height: 350px; object-fit:cover">
                                            @endif
                                            <!-- Post Info -->
                                            <div class="latest-post-info">
                                                <h2>{{ $latestPost->judul }}</h2>
                                                <p><strong>By:</strong> {{ $latestPost->author->name }} |
                                                    <strong>Date:</strong>
                                                    {{ \App\Helpers\FormatHelper::tanggalIndonesia($latestPost->created_at) }}
                                                </p>
                                                {{-- <div class="latest-post-description">
                                                    <p>{!! Str::limit($latestPost->isi, 150) !!}</p>
                                                </div> --}}
                                                <a href="{{ route('post.detail', $latestPost->slug) }}"
                                                    class="btn btn-outline-danger"><i class="bi bi-arrow-right"></i> Read
                                                    More</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <section id="portfolio" class="portfolio section">
                                        <!-- All Posts -->
                                        <div class="container" data-aos="fade-up" data-aos-delay="100">
                                            <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                                                data-sort="original-order">
                                                <div class="row g-4 isotope-container" data-aos="fade-up"
                                                    data-aos-delay="300">

                                                    @foreach ($posts as $item)
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
