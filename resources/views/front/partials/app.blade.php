<!DOCTYPE html>
<html lang="en">

@include('front.partials.head')

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('front') }}/img/logo.webp" alt=""> -->
                <!-- Uncomment the line below if you also wish to use an text logo -->
                <!-- <h1 class="sitename">Style</h1>  -->
            </a>
            @include('front.partials.menu')
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    @include('front.partials.footer')
    @include('front.partials.scripts')

</body>

</html>
