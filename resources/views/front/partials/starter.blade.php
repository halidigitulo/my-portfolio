<!DOCTYPE html>
<html lang="en">

@include('front.partials.head')

<body class="starter-page-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- Uncomment the line below if you also wish to use an text logo -->
                <!-- <h1 class="sitename">Style</h1>  -->
            </a>
            {{-- @include('front.partials.menu') --}}
        </div>
    </header>

    <main class="main">
        @include('front.partials.page-title')
        @yield('content')
    </main>

    @include('front.partials.footer')
    @include('front.partials.scripts')

</body>

</html>
