<!-- About Section -->
<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title">
        <h2>Tentang Kami</h2>
        <p>Tim kreatif yang menyediakan solusi digital inovatif untuk mengembangkan bisnis Anda di dunia online.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">

            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
                <div class="profile-image-wrapper">
                    <div class="profile-image">
                        {{-- <img src="{{asset('front')}}/img/profile/profile-square-1.webp" alt="Profile" class="img-fluid"> --}}
                        <img src="{{ asset('uploads/' . $profile->hero) }}" alt="Profile" class="img-fluid" style="height: 350px; width:100%; object-fit:cover">
                    </div>
                    <div class="signature-section">
                        <img src="{{ asset('uploads/' . $profile->signature) }}" alt="Signature" class="signature">
                        {{-- <p class="quote">Building meaningful digital experiences through creative code.</p> --}}
                        <p class="quote">{{ $profile->tagline ?? '' }}.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
                <div class="about-content">
                    <div class="intro">
                        <h2>Halo, Saya {{ $profile->direktur }} dari {{ $profile->nama }}</h2>
                        <p>{!! $profile->isi !!}</p>
                    </div>

                    <div class="skills-grid">
                        @foreach ($services as $index => $item)
                            @php
                                // Hitung delay animasi otomatis (misal: 300, 400, 500, ...)
                                $delay = 300 + $index * 100;

                            @endphp
                            <div class="skill-item" data-aos="zoom-in" data-aos-delay="{{ $delay }}">
                                <div class="skill-icon">
                                    <i class="bi bi-{{ $item->icon }}"></i>
                                </div>
                                <h4>{{ $item->judul }}</h4>
                                <p>{!! $item->deskripsi !!}</p>
                            </div>
                        @endforeach
                        
                    </div>

                    <div class="journey-timeline" data-aos="fade-up" data-aos-delay="300">
                        @foreach ($resumes as $item)
                            <div class="timeline-item">
                                <div class="year">{{ $item->mulai_dari }}</div>
                                <div class="description">{!! $item->deskripsi !!}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="cta-section" data-aos="fade-up" data-aos-delay="400">
                        <div class="fun-fact">
                            <span class="emoji">☕</span>
                            <span class="text">{{$generalsettings->cta_text}}</span>
                        </div>
                        <div class="action-buttons">
                            <a href="#portfolio" class="btn btn-primary">Lihat Portfolio</a>
                            <a href="#" class="btn btn-outline">Download Resume</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section><!-- /About Section -->
