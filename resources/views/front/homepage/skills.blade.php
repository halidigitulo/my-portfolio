<!-- Skills Section -->
<section id="skills" class="skills section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-lg-8">
                <div class="skills-grid">
                    <div class="row g-4">
                        <div class="col-md-6" data-aos="flip-left" data-aos-delay="200">
                            <div class="skill-card">
                                <div class="skill-header">
                                    <i class="bi bi-code-slash"></i>
                                    <h3>Frontend Development</h3>
                                </div>
                                <div class="skills-animation">
                                    @foreach ($frontend as $item)
                                        <div class="skill-item">
                                            <div class="skill-info">
                                                <span class="skill-name">{{$item->nama}}</span>
                                                <span class="skill-percentage">{{$item->nilai}}%</span>
                                            </div>
                                            <div class="skill-bar progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->nilai}}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- End Frontend Card -->
                        </div>

                        <div class="col-md-6" data-aos="flip-left" data-aos-delay="300">
                            <div class="skill-card">
                                <div class="skill-header">
                                    <i class="bi bi-server"></i>
                                    <h3>Backend Development</h3>
                                </div>
                                <div class="skills-animation">
                                    @foreach ($backend as $item)
                                        <div class="skill-item">
                                            <div class="skill-info">
                                                <span class="skill-name">{{$item->nama}}</span>
                                                <span class="skill-percentage">{{$item->nilai}}%</span>
                                            </div>
                                            <div class="skill-bar progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->nilai}}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- End Backend Card -->
                        </div>

                        <div class="col-md-6" data-aos="flip-left" data-aos-delay="400">
                            <div class="skill-card">
                                <div class="skill-header">
                                    <i class="bi bi-palette"></i>
                                    <h3>Design &amp; Tools</h3>
                                </div>
                                <div class="skills-animation">
                                    @foreach ($design as $item)
                                        <div class="skill-item">
                                            <div class="skill-info">
                                                <span class="skill-name">{{$item->nama}}</span>
                                                <span class="skill-percentage">{{$item->nilai}}%</span>
                                            </div>
                                            <div class="skill-bar progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->nilai}}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- End Design Card -->
                        </div>

                        <div class="col-md-6" data-aos="flip-left" data-aos-delay="500">
                            <div class="skill-card">
                                <div class="skill-header">
                                    <i class="bi bi-cloud"></i>
                                    <h3>Cloud &amp; DevOps</h3>
                                </div>
                                <div class="skills-animation">
                                    @foreach ($cloud as $item)
                                        <div class="skill-item">
                                            <div class="skill-info">
                                                <span class="skill-name">{{$item->nama}}</span>
                                                <span class="skill-percentage">{{$item->nilai}}%</span>
                                            </div>
                                            <div class="skill-bar progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->nilai}}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- End DevOps Card -->
                        </div>
                    </div>
                </div><!-- End Skills Grid -->
            </div>

            <div class="col-lg-4">
                <div class="skills-summary" data-aos="fade-left" data-aos-delay="200">
                    <h3>Professional Expertise</h3>
                    <p>{!! $profile->isi !!}</p>

                    <div class="summary-stats">
                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                            <div class="stat-circle">
                                <i class="bi bi-trophy"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number">{{$generalsettings->experiences}}+</span>
                                <span class="stat-label">Years Experience</span>
                            </div>
                        </div>

                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
                            <div class="stat-circle">
                                <i class="bi bi-diagram-3"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number">{{$completedprojects}}+</span>
                                <span class="stat-label">Projects Completed</span>
                            </div>
                        </div>

                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="500">
                            <div class="stat-circle">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number">{{$clients->count()}}+</span>
                                <span class="stat-label">Happy Clients</span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="skills-badges" data-aos="fade-up" data-aos-delay="600">
                        <h4>Certifications</h4>
                        <div class="badge-list">
                            <div class="skill-badge">AWS Certified</div>
                            <div class="skill-badge">Laravel Expert</div>
                            <div class="skill-badge">Vue.js Developer</div>
                            <div class="skill-badge">UI/UX Design</div>
                        </div>
                    </div> --}}
                </div><!-- End Skills Summary -->
            </div>
        </div>
    </div>
</section><!-- /Skills Section -->
