@extends('front.partials.starter')
@section('title', 'FAQ')
@section('sub-title', 'Frequently Asked Questions')
@section('meta_description', 'Find answers to the most commonly asked questions about our services, policies, and
    procedures. Our FAQ section is designed to help you get the information you need quickly and easily.')
@section('meta_keywords', 'FAQ, frequently asked questions, help, support, customer service, policies, procedures')
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
                            {{-- <div class="service-header">
                                <h2>Common Questions</h2>
                                <p class="service-intro">Here are some of the most frequently asked questions by our customers. If you have any other questions, feel free to contact us.</p>
                            </div> --}}

                            <div class="service-features">
                                <div class="accordion" id="faqAccordion">
                                    @foreach ($faqs as $index => $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $index }}">
                                                <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $index }}"
                                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                                    aria-controls="collapse{{ $index }}">
                                                    <i
                                                        class="bi {{ $index == 0 ? 'bi-chevron-down' : 'bi-chevron-right' }} accordion-icon"></i>
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $index }}"
                                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                                aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    {!! nl2br(e($faq->answer)) !!}
                                                </div>
                                            </div>
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
