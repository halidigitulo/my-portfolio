 <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title">
        <h2>Resume</h2>
        <p>Lihat perjalanan profesional kami dan pencapaian kami dalam menghadirkan solusi digital terbaik.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="experience-section">
              <div class="section-header">
                <h2><i class="bi bi-briefcase"></i> Professional Journey</h2>
                {{-- <p class="section-subtitle">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas vestibulum tortor quam.</p> --}}
              </div>

              <div class="experience-cards">
                @foreach ($profesional as $item)
                    
                <div class="experience-card" data-aos="zoom-in" data-aos-delay="300">
                  <div class="card-header">
                    <div class="role-info">
                      <h3>{{$item->judul}}</h3>
                      <h4>{{$item->lokasi}}</h4>
                    </div>
                    <span class="duration">{{$item->mulai_dari}} - {{$item->sampai_dengan}}</span>
                  </div>
                  <div class="card-body">
                    <p>{!! $item->deskripsi !!}</p>
                    {{-- <ul class="achievements">
                      <li>Managed cross-functional teams of 15+ professionals</li>
                      <li>Implemented agile methodologies resulting in 40% efficiency gain</li>
                      <li>Led digital transformation initiatives worth $2M+</li>
                    </ul> --}}
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="education-section">
              <div class="section-header">
                <h2><i class="bi bi-mortarboard"></i> Academic Excellence</h2>
                {{-- <p class="section-subtitle">Lorem ipsum dolor sit amet consectetuer adipiscing elit aenean commodo ligula eget dolor aenean massa.</p> --}}
              </div>

              <div class="education-timeline">
                <div class="timeline-track"></div>
                @foreach ($akademik as $item)
                    
                <div class="education-item" data-aos="slide-up" data-aos-delay="300">
                  <div class="timeline-marker"></div>
                  <div class="education-content">
                    <div class="degree-header">
                      <h3>{{$item->judul}}</h3>
                      <span class="year">{{$item->mulai_dari}} - {{$item->sampai_dengan}}</span>
                    </div>
                    <h4 class="institution">{{$item->lokasi}}</h4>
                    <p>{{$item->deskripsi}}</p>
                  </div>
                </div>
                @endforeach

                
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Resume Section -->