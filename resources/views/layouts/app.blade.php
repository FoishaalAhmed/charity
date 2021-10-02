<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- xxx Basics xxx -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- xxx Change With Your Information xxx -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    <title>@yield('title')</title>
    <meta name="author" content="Mannat Studio">
    <meta name="description" content="Gracious is a Responsive HTML5 Template for Charity and NGO related services.">
    <meta name="keywords"
        content="Gracious, responsive, html5, charity, charity agency, charity foundation, charity template, church, donate, donation, fundraiser, fundraising, mosque, ngo, non-profit, nonprofit, organization, volunteer">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontend/assets/images/favicon.ico') }}">
    <!-- Animate CSSS -->
    <link href="{{ asset('public/frontend/assets/library/animate/animate.min.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/frontend/assets/library/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icofont CSS -->
    <link href="{{ asset('public/frontend/assets/library/icofont/icofont.min.css') }}" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="{{ asset('public/frontend/assets/library/owlcarousel/css/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Select Dropdown CSS -->
    <link href="{{ asset('public/frontend/assets/library/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Magnific Popup CSS -->
    <link href="{{ asset('public/frontend/assets/library/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <!-- Main Theme CSS -->
    <link href="{{ asset('public/frontend/assets/css/style.css') }}" rel="stylesheet">
    <!-- Home SLider CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/home-main.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- Page loader Start -->
    {{-- <div id="pageloader">
        <div class="loader-item">
            <div class="loader">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>
    </div> --}}
    <!-- Page loader End -->

    <!-- Header Start -->
    <header class="header-style-fullwidth">
        <div class="top-bar-right d-flex align-items-center text-md-left">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col d-flex align-items-center contact-info">
                        <div>
                            <i data-feather="phone"></i> <a href="tel:+8801626001500">+8801626001500</a>
                        </div>
                        <div>
                            <i data-feather="mail"></i> <a
                                href="mailto:info@ictbanglabd.com">info@ictbanglabd.com.com</a>
                        </div>
                        <div>
                            <i data-feather="clock"></i> Mon-Fri / 9:00 AM - 19:00 PM
                        </div>
                    </div>

                    <div class="col-md-auto">
                        <div class="social-icons">
                            <a href="#"><i class="icofont-facebook"></i></a>
                            <a href="#"><i class="icofont-twitter"></i></a>
                            <a href="#"><i class="icofont-instagram"></i></a>
                            <a href="#"><i class="icofont-behance"></i></a>
                            <a href="#"><i class="icofont-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation Start -->
        <nav class="navbar navbar-expand-lg header-fullpage">
            <div class="container text-nowrap">
                <div class="d-flex align-items-center w-100 col p-0 logo-brand">
                    <a class="navbar-brand rounded-bottom light-bg" href="index.html">
                        <img src="{{ asset('public/frontend/assets/images/logo_white.svg') }}" alt="">
                    </a>
                </div>
                <!-- Topbar Buttons Start -->
                <div class="d-inline-flex request-btn order-lg-last col-auto p-0 align-items-center">
                    <a class="btn-outline-primary btn ml-3" href="#" id="search_home"><i data-feather="search"></i></a>

                    <a class="nav-link btn btn-default ml-3 donate-btn" href="donation-page.html">Donate</a>

                    <!-- Toggle Button Start -->
                    <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Toggle Button End -->
                </div>
                <!-- Topbar Buttons End -->

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" id="dropdown03"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home <i
                                    class="icofont-rounded-down"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <li><a class="dropdown-item" href="index.html">Home Layout 1</a></li>
                                <li><a class="dropdown-item" href="index-2.html">Home Layout 2</a></li>
                                <li><a class="dropdown-item" href="index-3.html">Home Layout 3</a></li>
                                <li class="dropdown dropdown-submenu">
                                    <a class="dropdown-toggle-mob dropdown-item dropdown-submenu" href="#"
                                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Third Level Menu <i
                                            class="icofont-rounded-right float-right"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="#" class="dropdown-item">Action</a></li>
                                        <li><a href="#" class="dropdown-item">Another action</a></li>
                                        <li><a href="#" class="dropdown-item">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about-us.html">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Causes <i
                                    class="icofont-rounded-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="causes-list.html">Causes List</a></li>
                                <li><a class="dropdown-item" href="causes-single.html">Causes Single</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Pages <i
                                    class="icofont-rounded-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="volunteers.html">Volunteers</a></li>
                                <li><a class="dropdown-item" href="become-volunteers.html">Become Volunteers</a></li>
                                <li><a class="dropdown-item" href="donation-page.html">Donation Page</a></li>
                                <li><a class="dropdown-item" href="shortcodes-element.html">Shortcode Elements</a></li>
                                <li><a class="dropdown-item" href="typography.html">Typography</a></li>
                                <li><a class="dropdown-item" href="our-faqs.html">Our Faq's</a></li>
                                <li><a class="dropdown-item" href="404-page.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Events <i
                                    class="icofont-rounded-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="events-list.html">Events List</a></li>
                                <li><a class="dropdown-item" href="events-alternate.html">Events Alternate</a></li>
                                <li><a class="dropdown-item" href="events-single.html">Events Single</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-rounded-down"></i></a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="blog-standard.html">Blog Standard</a></li>
                                <li><a class="dropdown-item" href="blog-grid.html">Blog Grid</a></li>
                                <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html">Contact</a>
                        </li>

                    </ul>
                    <!-- Main Navigation End -->
                </div>
            </div>
        </nav>
        <!-- Main Navigation End -->
    </header>
    <!-- Header Start -->

    @yield('content')

    <!-- Main Footer Start -->
    <footer class="wide-tb-70 pb-0 mb-spacer-md footer-second">
        <div class="container bg-effect pos-rel">
            <div class="row">
                <!-- Column First -->
                <div class="col-lg-4 col-md-12">
                    <div class="logo-footer">
                        <img src="{{ asset('public/frontend/assets/images/logo_white.svg') }}" alt="">
                    </div>
                    <p>This is Photoshop’s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet</p>

                    <div class="footer-widget-contact">
                        <ul class="list-unstyled">
                            <li>
                                <div><i data-feather="map-pin"></i> </div>
                                <div>Envato Pty Ltd, 13/2 Elizabeth St Melbourne VIC 3000, Australia</div>
                            </li>
                            <li>
                                <div><i data-feather="phone"></i> </div>
                                <div><a href="tel:+1234567899">+1234567899</a></div>
                            </li>
                            <li>
                                <div><i data-feather="mail"></i> </div>
                                <div><a href="mailto:info@hoperaise.com">info@hoperaise.com</a></div>
                            </li>
                            <li>
                                <div><i data-feather="clock"></i> </div>
                                <div>Mon-Fri / 9:00 AM - 19:00 PM</div>
                            </li>
                        </ul>
                    </div>

                    <div class="social-icons">
                        <ul class="list-unstyled list-group list-group-horizontal">
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont-instagram"></i></a></li>
                            <li><a href="#"><i class="icofont-behance"></i></a></li>
                            <li><a href="#"><i class="icofont-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Column First -->

                <!-- Column Second -->
                <div class="col-lg-7 offset-lg-1 col-md-12">
                    <div class="footer-subscribe">
                        <h3>Newsletter</h3>
                        <h2>Get Update Every Week</h2>
                        <div class="input-wrap">
                            <input type="text" name="name" placeholder="Enter Your Email">
                            <button type="submit" class="btn btn-secondary">Subscribe now</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <h3>Our Photostream</h3>
                            <ul id="basicuse" class="photo-thumbs"></ul>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget-menu">
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="icofont-simple-right"></i> <span>About Us</span></a></li>
                                    <li><a href="#"><i class="icofont-simple-right"></i> <span>Our History</span></a>
                                    </li>
                                    <li><a href="#"><i class="icofont-simple-right"></i> <span>Our Services</span></a>
                                    </li>
                                    <li><a href="#"><i class="icofont-simple-right"></i> <span>Meet Doctors</span></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="give-us-call">
                                <i data-feather="phone"></i>
                                <h4>Give us a call</h4>
                                <h3><a href="tel:+1234567899">+1234567899</a></h3>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Column Second -->
            </div>
        </div>

        <div class="copyright-wrap">
            <div class="container pos-rel">
                <div class="row text-md-start text-center">
                    <div class="col-sm-12 col-md-auto copyright-text">
                        © Copyright <span class="txt-blue">Gracious</span> 2020. | Created by <a
                            href="https://themeforest.net/user/mannatstudio" rel="nofollow">MannatStudio</a>
                    </div>
                    <div class="col-sm-12 col-md-auto ml-md-auto text-md-right text-center copyright-links">
                        <a href="#">Terms & Condition</a> | <a href="#">Privacy Policy</a> | <a href="#">Legal</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Main Footer End -->

    <!-- Search Popup Start -->
    <div class="overlay overlay-hugeinc">
        <form class="form-inline mt-2 mt-md-0">
            <div class="form-inner">
                <div class="form-inner-div d-inline-flex align-items-center no-gutters">
                    <div class="col-auto">
                        <i class="icofont-search"></i>
                    </div>
                    <div class="col">
                        <input class="form-control w-100 p-0" type="text" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="col-auto">
                        <a href="#" class="overlay-close link-oragne"><i class="icofont-close-line"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Search Popup End -->

    <!-- Back To Top Start -->
    <a id="mkdf-back-to-top" href="#" class="off"><i data-feather="corner-right-up"></i></a>
    <!-- Back To Top End -->

    <!-- Jquery Library JS -->
    <script src="{{ asset('public/frontend/assets/library/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('public/frontend/assets/library/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Feather Icon JS -->
    <script src="{{ asset('public/frontend/assets/library/feather-icons/feather.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('public/frontend/assets/library/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!-- Select2 Dropdown JS -->
    <script src="{{ asset('public/frontend/assets/library/select2/js/select2.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('public/frontend/assets/library/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- jflickrfeed Images JS -->
    <script src="{{ asset('public/frontend/assets/library/jflickrfeed/jflickrfeed.min.js') }}"></script>
    <!-- Way Points JS -->
    <script src="{{ asset('public/frontend/assets/library/jquery-waypoints/jquery.waypoints.min.js') }}"></script>
    <!-- Count Down JS -->
    <script src="{{ asset('public/frontend/assets/library/countdown/jquery.countdown.min.js') }}"></script>
    <!-- Appear JS -->
    <script src="{{ asset('public/frontend/assets/library/jquery-appear/jquery.appear.js') }}"></script>
    <!-- Jquery Easing JS -->
    <script src="{{ asset('public/frontend/assets/library/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Counter JS -->
    <script src="{{ asset('public/frontend/assets/library/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <!-- Form Validation JS -->
    <script src="{{ asset('public/frontend/assets/library/jquery-validate/jquery.validate.min.js') }}"></script>
    <!-- Theme Custom -->
    <script src="{{ asset('public/frontend/assets/js/site-custom.js') }}"></script>

    <!-- Home Slider (Only For Home pages) -->
    <script src="{{ asset('public/frontend/assets/js/home-slider.js') }}"></script>
</body>

</html>
