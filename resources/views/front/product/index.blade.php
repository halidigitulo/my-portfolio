@extends('front.partials.starter')
@section('title', 'Produk Kami')
@section('sub-title','Koleksi produk buatan kami yang mencerminkan kualitas dan dedikasi dalam setiap solusi digital.')
@section('meta_description','')
@section('meta_keywords','')
@section('content')

    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title">
            <h2>@yield('title')</h2>
            <p>@yield('sub-title')</p>
        </div><!-- End Section Title -->


        <div class="container py-5" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4" data-aos="fade-up" data-aos-delay="300">
                @foreach ($products as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card product-card border-0 shadow-sm h-100 rounded-4 overflow-hidden position-relative">

                            <div class="card-img-wrapper overflow-hidden position-relative">
                                @if (!$item->thumbnail)
                                    <img src="{{ asset('uploads/' . $profile->logo) }}" alt="{{ $item->nama }}"
                                        class="card-img-top img-fluid hover-zoom">
                                @else
                                    <img src="{{ asset('uploads/products/' . $item->thumbnail) }}" alt="{{ $item->nama }}"
                                        class="card-img-top img-fluid hover-zoom">
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column p-3">
                                <h5 class="fw-bold text-primary mb-2">{{ $item->nama }}</h5>

                                <p class="text-muted small flex-grow-1 mb-3">
                                    {!! \Illuminate\Support\Str::words(strip_tags($item->deskripsi), 30, '...') !!}
                                </p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ asset('uploads/products/' . $item->thumbnail) }}"
                                        class="btn btn-light btn-sm rounded-pill px-3 shadow-sm glightbox"
                                        data-gallery="portfolio-gallery-ui"
                                        data-glightbox="title: {{ $item->nama }}; description: {{ $item->deskripsi }}">
                                        <i class="bi bi-arrows-angle-expand"></i> View
                                    </a>
                                    <a href="{{ route('product.detail', $item->slug) }}"
                                        class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm">
                                        Detail <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
