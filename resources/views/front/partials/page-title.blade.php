 <!-- Page Title -->
 <div class="page-title light-background">
     <div class="container d-lg-flex justify-content-between align-items-center">
         <a href="/">
             <div class="d-flex align-items-center mb-3 mb-lg-0">
                 <img src="{{ asset('uploads/' . $profile->logo) }}" alt="{{ $profile->nama }}" class="logo-img"
                     title="{{ $profile->nama }}" style="height: 40px; margin-right:10px;" />
                 <h1 class="mb-2 mb-lg-0">{{ $profile->nama }}</h1>
             </div>
         </a>
         <nav class="breadcrumbs">
             <ol>
                 <li><a href="/">Home</a></li>
                 <li class="current">@yield('title')</li>
             </ol>
         </nav>
     </div>
 </div><!-- End Page Title -->
