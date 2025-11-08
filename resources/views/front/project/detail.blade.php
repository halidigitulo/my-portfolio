@extends('front.partials.starter')
@section('title', 'Detail Project - ' . $data->nama)
@section('content')

    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="portfolio-details-media">
                        <div class="main-image">
                            <div class="portfolio-details-slider swiper init-swiper" data-aos="zoom-in">
                                <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 1000,
                      "autoplay": {
                        "delay": 6000
                      },
                      "effect": "creative",
                      "creativeEffect": {
                        "prev": {
                          "shadow": true,
                          "translate": [0, 0, -400]
                        },
                        "next": {
                          "translate": ["100%", 0, 0]
                        }
                      },
                      "slidesPerView": 1,
                      "navigation": {
                        "nextEl": ".swiper-button-next",
                        "prevEl": ".swiper-button-prev"
                      }
                    }
                  </script>
                                <div class="swiper-wrapper">
                                    @foreach ($data->galleries as $item)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('uploads/projects/gallery/' . $item->filename) }}"
                                                alt="{{ $item->filename }}" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>

                        <div class="thumbnail-grid" data-aos="fade-up" data-aos-delay="200">
                            <div class="row g-2 mt-3">
                                @foreach ($data->galleries as $item)
                                    <div class="col-3">
                                        <img src="{{ asset('uploads/projects/gallery/' . $item->filename) }}"
                                            alt="{{ $data->nama }}" class="img-fluid glightbox">
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        @php
                            $colors = [
                                '#e74c3c', // merah
                                '#27ae60', // hijau
                                '#2980b9', // biru
                                '#8e44ad', // ungu
                                '#f39c12', // oranye
                                '#16a085', // toska
                                '#d35400', // coklat
                                '#2c3e50', // abu tua
                                '#c0392b', // merah tua
                                '#7f8c8d', // abu muda
                            ];

                            // Fungsi untuk mendapatkan warna berdasarkan nama stack
                            function getColor($name, $colors)
                            {
                                $index = crc32($name) % count($colors); // tetap konsisten berdasarkan nama
                                return $colors[$index];
                            }
                        @endphp

                        {{-- <div class="tech-stack-badges" data-aos="fade-up" data-aos-delay="300">
                            @foreach ($data->stack as $stack)
                                <span>{{ $stack->nama }}</span>
                            @endforeach
                        </div> --}}
                        <div class="tech-stack-badges" data-aos="fade-up" data-aos-delay="300">
                            @foreach ($data->stack as $stack)
                                @php $color = getColor($stack->nama, $colors); @endphp
                                <span
                                    style="
            background-color: {{ $color }};
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
            margin: 4px;
        ">
                                    {{ $stack->nama }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="portfolio-details-content">
                        <div class="project-meta">
                            <div class="badge-wrapper">
                                <span class="project-badge">{{ $data->kategori->nama ?? '' }}</span>
                            </div>
                            <div class="date-client">
                                <div class="meta-item">
                                    <i class="bi bi-calendar-check"></i>
                                    <span>{{ \App\Helpers\FormatHelper::bulanTahunIndonesia($data->created_at) }}</span>
                                </div>
                                <div class="meta-item">
                                    <i class="bi bi-buildings"></i>
                                    <span>{{ $data->client->nama ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                        <h2 class="project-title">{{ $data->nama }}</h2>
                        <div class="project-website">
                            <i class="bi bi-link-45deg"></i>
                            <a href="{{ $data->link }}" target="_blank">{{ $data->link }}</a>
                        </div>
                        <div class="project-overview">
                            {{-- <p class="lead">
                                {!! $data->deskripsi !!}
                            </p> --}}
                            <div class="accordion project-accordion" id="portfolio-details-projectAccordion">
                                <div class="accordion-item" data-aos="fade-up">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#portfolio-details-collapse-1" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <i class="bi bi-clipboard-data me-2"></i> Project Overview
                                        </button>
                                    </h2>
                                    <div id="portfolio-details-collapse-1" class="accordion-collapse collapse show"
                                        data-bs-parent="#portfolio-details-projectAccordion">
                                        <div class="accordion-body">
                                            <p>{!! $data->deskripsi !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-features" data-aos="fade-up" data-aos-delay="300">
                            <h3><i class="bi bi-stars"></i> Key Features</h3>
                            <div class="row g-3">
                                @foreach ($data->feature->chunk(ceil($data->feature->count() / 2)) as $chunk)
                                    <div class="col-md-6">
                                        <ul class="feature-list">
                                            @foreach ($chunk as $item)
                                                <li><i class="bi bi-check2-circle"></i> {{ $item->nama }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="cta-buttons" data-aos="fade-up" data-aos-delay="400">
                            <a href="{{ route('project.listing') }}" class="btn-next-project"><i
                                    class="bi bi-list"></i> Show All Projects</a>

                            {{-- Tombol View Live Project (jika ada link) --}}
                            @if ($data->link)
                                <a href="{{ $data->link }}" target="_blank" class="btn-view-project">View Live
                                    Project</a>
                            @endif

                            {{-- Tombol Next Project --}}
                            @if ($nextProject)
                                <a href="{{ route('project.detail', $nextProject->slug) }}" class="btn-next-project">
                                    Next Project <i class="bi bi-arrow-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Portfolio Details Section -->
@endsection
