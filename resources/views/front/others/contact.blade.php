@extends('front.partials.starter')
@section('title', 'Hubungi Kami')
@section('sub-title', 'Get in Touch with Us')
@section('meta_description',
    'Reach out to us for any inquiries, support, or feedback. We are here to assist you and
    ensure you have the best experience with our services.')
@section('meta_keywords', 'contact, support, inquiries, feedback, customer service, help, get in touch')
@section('content')

    <section class="starter-section section">
        <div class="container section-title">
            <h2>@yield('title')</h2>
            <p>@yield('sub-title')</p>
        </div>

        <section id="service-details" class="service-details section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5">
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="row">
                            <div class="col-md-12 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box me-3">
                                    <i class="bi bi-geo-alt text-danger fs-4"></i>
                                </div>
                                <div class="content">
                                    <h4>Alamat Kami</h4>
                                    <p>{{ $profile->alamat }}</p>
                                    <p>{{ $profile->kota }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box me-3">
                                    <i class="bi bi-telephone text-danger fs-4"></i>
                                </div>
                                <div class="content">
                                    <h4>No. Telp / WA</h4>
                                    <p><a href="tel:{{ $profile->telp }}"></a>{{ $profile->telp }}</p>
                                    <p>{{ $profile->hp }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box me-3">
                                    <i class="bi bi-envelope text-danger fs-4"></i>
                                </div>
                                <div class="content">
                                    <h4>Email</h4>
                                    <p>{{ $profile->email }}</p>
                                    {{-- <p>contact@example.com</p> --}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="service-content">
                            <div class="service-features">
                                <iframe src="{{ $profile->maps }}" width="100%" height="450"
                                    style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    @include('front.others.sidebar')
                </div>
            </div>
        </section><!-- /Service Details Section -->
    </section>
@endsection
