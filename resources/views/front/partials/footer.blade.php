@include('front.partials.pet-container')

<footer id="footer" class="bg-dark text-white py-5 dark-background">
    <div class="container">
        <div class="row">
            <!-- Kolom 1: Logo dan Sosial Media -->
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <div class="footer-logo">
                    <img src="{{ asset('uploads/' . $profile->logo) }}" alt="{{ $profile->nama }}"
                        title="{{ $profile->nama }}" class="img-fluid mb-3" style="max-width: 150px;">
                    <p class="mb-3">© <strong class="sitename">{{ $profile->nama ?? 'Your Company' }}</strong></p>
                    <div class="social-links">
                        @include('front.partials.socmed')
                    </div>
                </div>
            </div>

            <!-- Kolom 2: Main Menu -->
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <h5>Main Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="/about" class="text-white text-decoration-none">About</a></li>
                    <li><a href="/services" class="text-white text-decoration-none">Services</a></li>
                    <li><a href="/products" class="text-white text-decoration-none">Products</a></li>
                    <li><a href="/projects" class="text-white text-decoration-none">Portfolio</a></li>
                    <li><a href="/contact" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Menu Tambahan -->
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <h5>Additional Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/blog" class="text-white text-decoration-none">Blog</a></li>
                    <li><a href="/faq" class="text-white text-decoration-none">FAQ</a></li>
                    <li><a href="/privacy-policy" class="text-white text-decoration-none">Privacy Policy</a></li>
                    <li><a href="/terms-and-conditions" class="text-white text-decoration-none">Terms of Service</a>
                    </li>
                    <hr>
                    @auth
                        <li><a href="{{ route('dashboard') }}"
                                class="text-capitalize text-bold">Dashboard</a></li>
                    @else
                        <li><a href="/login" class="text-white text-decoration-none">Login</a></li>

                    @endauth
                </ul>
            </div>

            <!-- Optional Kolom 4: Contact info (Jika diperlukan) -->
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <h5>Contact Info</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope-fill"></i> {{ $profile->email }}</li>
                    <li><i class="bi bi-whatsapp"></i> {{ $profile->telp }}</li>
                    <li><i class="bi bi-geo-alt-fill"></i> {{ $profile->alamat }}</li>
                </ul>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="copyright text-center">
                <p>© {{ now()->format('Y') }}<span> Copyright</span> <strong
                        class="px-1 sitename">{{ $profile->nama ?? '' }}</strong> <span>All
                        Rights Reserved</span></p>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Cookie consent bar -->
<div id="cookieConsentBar"
    style="display: none; background-color: #333; color: white; position: fixed; bottom: 0; left: 0; right: 0; padding: 10px; text-align: center; z-index: 9999;">
    <span>We use cookies to improve your experience. By continuing to visit this site you agree to our use of
        cookies.</span>
    <button id="acceptCookies"
        style="background-color: #007bff; color: white; border: none; padding: 5px 15px; cursor: pointer; margin-left: 10px;">Accept</button>
    <button id="rejectCookies"
        style="background-color: #dc3545; color: white; border: none; padding: 5px 15px; cursor: pointer; margin-left: 10px;">Reject</button>
</div>
