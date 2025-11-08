<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title">
        <h2>Services</h2>
        <p>Kami menawarkan layanan mulai dari desain kreatif hingga pengembangan sistem web dan keamanan.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

            <!-- Card 1 -->
            @foreach ($layanan as $item)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item">
                        <div class="icon">
                            <i class="bi bi-{{$item->icon}}"></i>
                        </div>
                        <h3>{{$item->judul}}</h3>
                        <p>{{$item->deskripsi}}</p>
                        <div class="card-links">
                            <a href="/services" class="link-item">
                                Learn More
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            @endforeach
        </div>
    </div>
</section><!-- /Services Section -->
