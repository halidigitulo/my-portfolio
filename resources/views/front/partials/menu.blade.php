<nav id="navmenu" class="navmenu">

    <div class="profile-img">
        <img src="{{ asset('uploads/' . $profile->logo) }}" alt="{{ $profile->nama }}" title="{{ $profile->nama }}"
            class="img-fluid rounded-circle">
    </div>

    <a href="/" class="logo d-flex align-items-center justify-content-center active">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{ asset('front') }}/img/logo.webp" alt=""> -->
        <h1 class="sitename">{{ $profile->nama ?? '' }}</h1>
    </a>

    <div class="social-links text-center">
        @include('front.partials.socmed')
    </div>

    <ul>
        <li><a href="#hero">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#resume">Resume</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#products">Products</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="/login">Login</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
