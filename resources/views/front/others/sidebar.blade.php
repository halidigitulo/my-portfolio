<div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
    <div class="service-sidebar">

        <div class="service-menu">
            <h4>Layanan Kami</h4>
            <div class="menu-list">
                @foreach ($services as $item)
                    <span class="menu-item active">
                        {{-- <i class="bi bi-arrow-right"></i> --}}
                        <i class="bi bi-{{$item->icon ? $item->icon : 'arrow-right'}}"></i>
                        <span>{{ $item->judul }}</span>
                    </span>
                @endforeach
            </div>
        </div>

        {{-- <div class="service-info">
                                <h4>Service Details</h4>
                                <div class="info-list">
                                    <div class="info-item">
                                        <span class="info-label">Duration:</span>
                                        <span class="info-value">3-6 months</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Team Size:</span>
                                        <span class="info-value">4-6 specialists</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Delivery:</span>
                                        <span class="info-value">Bi-weekly reports</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Support:</span>
                                        <span class="info-value">24/7 monitoring</span>
                                    </div>
                                </div>
                            </div> --}}

        <div class="contact-card">
            <div class="contact-content">
                <h4>Butuh Bantuan?</h4>
                <p>Jangan ragu hubungi kami untuk informasi lebih lanjut.</p>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="bi bi-whatsapp"></i>
                        <span>{{ $profile->telp }}</span>
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-envelope"></i>
                        <span>{{ $profile->email }}</span>
                    </div>
                </div>
                <a href="https://api.whatsapp.com/send?phone={{ $profile->telp }}&amp;text={{ urlencode($generalsettings->wa_text) }}"
                    target="_blank" class="btn btn-primary"><i class="bi bi-whatsapp"></i> Kirim Pesan Sekarang</a>
            </div>
        </div>

        <div class="mt-3">
            <a href="https://www.dewaweb.com/aff.php?aff=29114" target="_blank">
                <img src="{{asset('uploads/ads/dewaweb-affiliate-banner-01-336x280px-1.gif')}}" alt="" class="img-fluid rounded w-100">
            </a>
        </div>
    </div>
</div>
