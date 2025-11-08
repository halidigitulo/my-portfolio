@extends('front.partials.starter')
@section('title', 'Product Detail - ' . $data->nama)
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
                    <div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
                        <div class="service-hero">
                            @if (!$data->thumbnail)
                                <img src="{{ asset('uploads/' . $profile->logo) }}" alt="{{ $profile->nama }}"
                                    class="img-fluid">
                            @else
                                <img src="{{ asset('uploads/products/' . $data->thumbnail) }}" alt="{{ $profile->nama }}"
                                    class="img-fluid">
                            @endif
                            <div class="service-badge">
                                <span>{{ $data->nama }} by {{ $profile->nama }}</span>
                            </div>
                        </div>
                        <div class="service-content">
                            <div class="service-features">
                                <p>{!! $data->deskripsi !!}</p>
                            </div>
                            @include('front.partials.share')

                            <div class="cta-buttons" data-aos="fade-up" data-aos-delay="400">
                                <a href="{{ route('product.listing') }}" class="btn btn-danger"><i class="bi bi-list"></i>
                                    Show All Products</a>

                                {{-- Tombol Next Project --}}
                                @if ($nextProduct)
                                    <a href="{{ route('product.detail', $nextProduct->slug) }}" class="btn btn-primary">
                                        Next Product <i class="bi bi-arrow-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @include('front.others.sidebar')
                </div>
                @include('front.partials.banner')
            </div>
        </section>
    </section>
@endsection
