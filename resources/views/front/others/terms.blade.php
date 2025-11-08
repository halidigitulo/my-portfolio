@extends('front.partials.starter')
@section('title', 'Terms and Conditions')
@section('sub-title', 'Our Terms and Conditions')
@section('meta_description', 'Read our detailed terms and conditions to understand the rules and guidelines for using our services. We are committed to transparency and ensuring a safe experience for all our users.')
@section('meta_keywords', 'terms and conditions, user agreement, policies, rules, guidelines, service terms, legal')
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
                                {!! $generalsettings->terms !!}
                            </div>
                        </div>
                    </div>

                    @include('front.others.sidebar')

                </div>

            </div>

        </section><!-- /Service Details Section -->
    </section>
@endsection
