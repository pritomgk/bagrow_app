<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Bagrow - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="icon" type="image/x-icon" href="{{ asset('pub_assets/img/favicon.ico') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('pub_assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('pub_assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('pub_assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('pub_assets/css/style.css') }}" rel="stylesheet">

        <!-- Custom Stylesheet -->

        @php
        function getCurrentUrl() {
          $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
          $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
          return $url;
        }

        function urlContainsWord($word) {
            $url = getCurrentUrl();
            return strpos($url, $word) !== false;
        }

        $word = "home";  // Replace with the word you are looking for

        if (urlContainsWord($word)) {
            // echo "The word '$word' was found in the URL.";
            // Perform your desired action here

        @endphp


        <style>

        /* Mobile styles */
        // @media only screen and (max-width: 768px) {
            // #header_body {
            //   display: none;
            // }
        // }

        /* Desktop styles */
        // @media only screen and (min-width: 769px) {
            #header_body {
              display: block;
            }
        // }

        </style>


        @php
        } else {
        @endphp

        <style>

          /* Mobile styles */
          @media only screen and (min-width: 144px) {
              #header_body {
                display: none;
              }
          }

          /* Desktop styles */
          // @media only screen and (min-width: 769px) {
              // #header_body {
                // display: block;
          //     }
          // }

        </style>

        @php

        // echo "The word '$word' was not found in the URL.";
        }
        @endphp


    </head>

    <body>

        @php
          $home_procats = App\Models\Product_category::home_procats();
          $home_sercats = App\Models\Service_category::home_sercats();
        @endphp


        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">House-42, Road-02, Sector-09. Uttara, Dhaka</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="mailto:bagrowgroup@gmail.com" class="text-white">bagrowgroup@gmail.com</a></small>
                        <small class="me-3"><i class="fas fa-phone me-2 text-secondary"></i><a href="tel:+8801711479884" class="text-white">+8801711-479884</a></small>
                    </div>
                    <div class="top-link pe-2">
                        {{-- <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a> --}}
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small></a>
                        {{-- <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a> --}}
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl" style="background-color: #e7fff9;">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        {{-- <h2 class="text-primary display-6">Bagrow Company LTD</h2> --}}
                        <img width="70px" src="{{ asset('pub_assets/img/logo.png') }}" alt="Bagrow">
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                            <a href="{{ route('about_us') }}" class="nav-item nav-link">About Us</a>
                            <a href="{{ route('procats') }}" class="nav-item nav-link">Product</a>
                            <a href="{{ route('sercats') }}" class="nav-item nav-link">Service</a>
                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.html" class="dropdown-item">Cart</a>
                                    <a href="chackout.html" class="dropdown-item">Chackout</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div> --}}
                            <a href="{{ route('activities') }}" class="nav-item nav-link">Activities</a>
                            {{-- <a href="" class="nav-item nav-link">Career</a> --}}
                            <a href="{{ route('contact_us') }}" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            {{-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="#" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a>
                            <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a> --}}
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header" id="header_body">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-12 text-center mx-auto">
                        <h3 class="text-white bg-dark"><marquee behavior="" direction="">This site is under development..</marquee></h3>
                    </div>
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">Bagrow Company Limited</h4>
                        <h2 class="mb-5 display-3 text-primary">চলো ফসল ফলাই...</h2>
                        {{-- <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </div> --}}
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="{{ asset('pub_assets/img/hero-img-1.png') }}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{ asset('pub_assets/img/hero-img-2.jpg') }}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="{{ route('home') }}">
                                <h3 class="text-primary mb-0">Bagrow Company LTD</h3>
                                {{-- <p class="text-secondary mb-0">Fresh products</p> --}}
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                {{-- <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button> --}}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://www.youtube.com/@bagrowseed"><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Company Info</h4>
                            <a class="btn-link" href="">About Us</a>
                            <a class="btn-link" href="{{ route('contact_us') }}">Contact Us</a>
                            <a class="btn-link" href="">Privacy Policy</a>
                            <a class="btn-link" href="">Terms & Condition</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Service Category</h4>
                            @foreach ($home_sercats as $home_sercat)
                                <a class="btn-link" href="">{{ $home_sercat->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Product Category</h4>
                            @foreach ($home_procats as $home_procat)
                                <a class="btn-link" href="">{{ $home_procat->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            {{-- <p>Reg. No : SW/MOA/24750</p> --}}
                            <p>Address : House-42, Road-02, Sector-09. Uttara, Dhaka</p>
                            <p>Email : <a href="mailto:bagrowgroup@gmail.com">bagrowgroup@gmail.com</a></p>
                            <p>Phone : <a href="tel:+8801711479884">+8801711-479884</a></p>
                            {{-- <p>Payment Accepted</p> --}}
                            {{-- <img src="{{ asset('pub_assets/img/payment.png') }}" class="img-fluid" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="{{ route('home') }}"><i class="fas fa-copyright text-light me-2"></i>Copyright &copy; Bagrow Company LTD</a> {{ date('Y') }}, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Developed By <a class="border-bottom" target="_blank" href="https://holyit.org">Holy IT</a>
                        {{-- Developed By <a class="border-bottom" href="https://techpartit.net">Techpart IT</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('pub_assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('pub_assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('pub_assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('pub_assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('pub_assets/js/main.js') }}"></script>
    </body>

</html>


