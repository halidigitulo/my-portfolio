<head>
    @include('front.partials.meta')
    <!-- Favicons -->
    <link rel="icon" type="image/x-icon"
        href="{{ asset($profile->logo ? 'uploads/' . $profile->logo : 'admin/img/favicon/favicon.ico') }}" />
    <link href="{{ asset('front') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('front') }}/css/main.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/custom.css" rel="stylesheet">
    @stack('styles')
    {{-- <style>
        #pet-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 250px;
            /* Adjust based on the height of the pets */
            pointer-events: none;
            /* Pets won't block user interaction */
        }

        .walking-pet {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 50px;
            /* Adjust based on pet size */
            height: auto;
            display: none;
            /* Hidden by default */
            animation: walk linear infinite;
        }

        @keyframes walk {
            0% {
                left: -100px;
            }

            100% {
                left: 100%;
            }
        }

        footer {
            background-color: #343a40;
            /* Background dark */
            color: #fff;
            /* Text color */
        }

        footer a {
            color: #fff;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #007bff;
            /* Hover color */
        }

        .footer-logo img {
            max-width: 150px;
            margin-bottom: 15px;
        }

        .social-links a {
            color: #fff;
            font-size: 1.5rem;
            margin-right: 15px;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #007bff;
            /* Hover color */
        }

        footer h5 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        footer .list-unstyled li {
            margin-bottom: 10px;
        }

        footer .list-unstyled a {
            color: #dcdcdc;
            /* Soft white for text */
            font-size: 0.9rem;
        }

        footer .list-unstyled a:hover {
            color: #007bff;
        }

        @media (max-width: 767px) {
            .footer-logo img {
                max-width: 120px;
            }

            footer h5 {
                font-size: 1rem;
            }
        }
    </style> --}}


    <!-- =======================================================
  * Template Name: Style
  * Template URL: https://bootstrapmade.com/style-bootstrap-portfolio-template/
  * Updated: Jul 02 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>
