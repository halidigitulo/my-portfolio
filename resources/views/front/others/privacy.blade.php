@extends('front.partials.starter')
@section('title', 'Privacy Policy')
@section('sub-title', 'Our Privacy Policy')
@section('meta_description', 'Understand how we protect your personal information with our comprehensive privacy policy. We are committed to ensuring your data is secure and used responsibly.')
@section('meta_keywords', 'privacy policy, data protection, personal information, security, user data, GDPR, CCPA')
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
                        <div class="service-content">
                            <div class="service-features">
                                {!! $generalsettings->privacy !!}
                            </div>
                        </div>
                    </div>

                    @include('front.others.sidebar')

                </div>

            </div>

        </section><!-- /Service Details Section -->
    </section>
@endsection
