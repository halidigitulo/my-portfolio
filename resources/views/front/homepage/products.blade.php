<!-- Services Section -->
<section id="products" class="products section">

    <!-- Section Title -->
    <div class="container section-title d-flex justify-content-between align-items-center">
        <div>
            <h2>Products</h2>
            <p>Kami menawarkan produk mulai dari desain kreatif hingga pengembangan sistem web dan keamanan.</p>
        </div>
        <a href="{{ route('product.listing') }}" class="btn d-flex align-items-center">
            {{-- View All Projects --}}
            <i class="bi bi-arrow-right"></i> <!-- Panah ke kanan -->
        </a>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
            <!-- Card 1 -->
            @php
                use Illuminate\Support\Str;
            @endphp

            @foreach ($produk as $item)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="card service-item border-0 shadow-sm rounded-4 overflow-hidden h-100 position-relative transition-all">

                        <div class="card-img-wrapper overflow-hidden position-relative">
                            @if (!$item->thumbnail)
                                <img src="{{ asset('uploads/' . $profile->logo) }}" alt="{{ $item->nama }}"
                                    class="card-img-top img-fluid hover-zoom object-fit-cover" style="max-height: 250px; width:100%; object-fit:cover">
                            @else
                                <img src="{{ asset('uploads/products/' . $item->thumbnail) }}" alt="{{ $item->nama }}"
                                    class="card-img-top img-fluid hover-zoom" style="max-height: 250px; width:100%; object-fit:cover">
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold mb-2">{{ $item->nama }}</h5>

                            {{-- Batasi deskripsi maksimal 50 kata --}}
                            <p class="card-text text-muted flex-grow-1">
                                {!! Str::words(strip_tags($item->deskripsi), 20, '...') !!}
                            </p>

                            <div class="mt-3">
                                <a href="#"
                                    class="btn w-100 rounded-pill d-flex justify-content-center align-items-center gap-2">
                                    Learn More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section><!-- /products Section -->
