<!-- Testimonials Section -->
<section id="clients" class="clients section">
    <!-- Section Title -->
    <div class="container section-title">
        <h2>Clients</h2>
        <p>Klient yang bekerjasama dengan kami</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-12">
                <div class="clients-container">
                    <div class="swiper clients-slider init-swiper" data-aos="fade-up" data-aos-delay="400">

                        <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 400,
                    "autoplay": {
                    "delay": 4000
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
                        "slidesPerView": 5
                    }
                    }
                }
                </script>
                        <div class="swiper-wrapper">
                            @foreach ($clients as $item)
                                <div class="swiper-slide">
                                    <div class="client-item">
                                        <div class="client-profile text-center">
                                            @if (!$item->logo)
                                                <img src="{{ asset('uploads/' . $profile->logo) }}"
                                                    alt="{{ $item->nama }}" class="img-fluid" style="height: 100px">
                                            @else
                                                <img src="{{ asset('uploads/clients/' . $item->logo) }}"
                                                    alt="{{ $item->nama }}" title="{{ $item->nama }}"
                                                    class="img-fluid" style="height: 100px;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="swiper-pagination"></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
