<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

    {{-- <!-- Section Title -->
    <div class="container section-title">
        <h2><a href="{{route('project.listing')}}">Portfolio</a></h2>
        <p>Koleksi proyek terbaik kami yang mencerminkan kualitas dan dedikasi dalam setiap solusi digital.</p>
    </div><!-- End Section Title --> --}}

    <!-- Section Title -->
    <div class="container section-title d-flex justify-content-between align-items-center">
        <div>
            <h2>Portfolio</h2>
            <p>Koleksi proyek terbaik kami yang mencerminkan kualitas dan dedikasi dalam setiap solusi digital.</p>
        </div>
        <a href="{{ route('project.listing') }}" class="btn d-flex align-items-center">
            {{-- View All Projects --}}
            <i class="bi bi-arrow-right"></i> <!-- Panah ke kanan -->
        </a>
    </div><!-- End Section Title -->


    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
                <li data-filter="*" class="filter-active">
                    <i class="bi bi-grid-3x3"></i> All Projects
                </li>
                {{-- @foreach ($projects->pluck('kategori')->unique() as $kategori) --}}
                @foreach ($categories as $kategori)
                    <li data-filter=".filter-{{ $kategori->id }}">
                        {{ $kategori->nama }}
                    </li>
                @endforeach
                
            </ul>

            <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">
                @foreach ($projects as $item)
                    <div
                        class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $item->kategori->id }}">
                        <article class="portfolio-entry">
                            <figure class="entry-image">
                                <img src="{{ asset('uploads/projects/' . $item->thumbnail) }}" class="img-fluid"
                                    alt="" loading="lazy">
                                <div class="entry-overlay">
                                    <div class="overlay-content">
                                        <div class="entry-meta">{{ $item->kategori->nama ?? '' }}</div>
                                        <h3 class="entry-title">{{ $item->nama }}</h3>
                                        <div class="entry-links">
                                            <a href="{{ asset('uploads/projects/' . $item->thumbnail) }}"
                                                class="glightbox" data-gallery="portfolio-gallery-ui"
                                                data-glightbox="title: {{ $item->nama }}; description: {{ $item->deskripsi }}">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                            <a href="portfolio-details.html">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div><!-- End Portfolio Item -->
                @endforeach
            </div>
        </div>
    </div>

</section><!-- /Portfolio Section -->
