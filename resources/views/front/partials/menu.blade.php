 <nav id="navmenu" class="navmenu">

     <div class="profile-img">
         <img src="{{ asset('front') }}/img/profile/profile-square-1.webp" alt="" class="img-fluid rounded-circle">
     </div>

     <a href="index.html" class="logo d-flex align-items-center justify-content-center active">
         <!-- Uncomment the line below if you also wish to use an image logo -->
         <!-- <img src="{{ asset('front') }}/img/logo.webp" alt=""> -->
         <h1 class="sitename">Alex Smith</h1>
     </a>

     <div class="social-links text-center">
         <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
         <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
         <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
         <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
         <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
     </div>

     <ul>
         <li><a href="#hero">Home</a></li>
         <li><a href="#about">About</a></li>
         <li><a href="#resume">Resume</a></li>
         <li><a href="#portfolio">Portfolio</a></li>
         <li><a href="#services">Services</a></li>
         <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                     class="bi bi-chevron-down toggle-dropdown"></i></a>
             <ul>
                 <li><a href="#">Dropdown 1</a></li>
                 <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                             class="bi bi-chevron-down toggle-dropdown"></i></a>
                     <ul>
                         <li><a href="#">Deep Dropdown 1</a></li>
                         <li><a href="#">Deep Dropdown 2</a></li>
                         <li><a href="#">Deep Dropdown 3</a></li>
                         <li><a href="#">Deep Dropdown 4</a></li>
                         <li><a href="#">Deep Dropdown 5</a></li>
                     </ul>
                 </li>
                 <li><a href="#">Dropdown 2</a></li>
                 <li><a href="#">Dropdown 3</a></li>
                 <li><a href="#">Dropdown 4</a></li>
             </ul>
         </li>
         <li><a href="#contact">Contact</a></li>
         <li><a href="/login">Login</a></li>
     </ul>
     <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
 </nav>
