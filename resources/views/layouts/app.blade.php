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
    @section('header')
    @endsection
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

    <!-- Jquery Library JS -->
    <script src="{{ asset('public/frontend/assets/library/jquery/jquery.min.js') }}"></script>

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
                            <i data-feather="phone"></i> <a
                                href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                        </div>
                        <div>
                            <i data-feather="mail"></i> <a
                                href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </div>
                        <div>
                            <i data-feather="clock"></i> {{ $working_hour->value }}
                        </div>
                    </div>

                    <div class="col-md-auto">
                        <div class="social-icons">
                            <a href="{{ $contact->facebook }}"><i class="icofont-facebook"></i></a>
                            <a href="{{ $contact->twitter }}"><i class="icofont-twitter"></i></a>
                            <a href="{{ $contact->instagram }}"><i class="icofont-instagram"></i></a>
                            <a href="{{ $contact->youtube }}"><i class="icofont-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation Start -->
        <nav class="navbar navbar-expand-lg header-fullpage">
            <div class="container text-nowrap">
                <div class="d-flex align-items-center w-100 col p-0 logo-brand">
                    <a class="navbar-brand rounded-bottom light-bg" href="{{ URL::to('/') }}">
                        <img src="{{ asset('public/images/logo.jpg') }}" alt="" style="width: 100px">
                    </a>
                </div>
                <!-- Topbar Buttons Start -->
                <div class="d-inline-flex request-btn order-lg-last col-auto p-0 align-items-center">
                    <a class="btn-outline-primary btn ml-3" href="#" id="search_home"><i data-feather="search"></i></a>

                    <!--<a class="nav-link btn btn-default ml-3 donate-btn" href="{{ route('donations') }}">Donate</a>-->

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
                            <a class="nav-link" href="{{ URL::to('/') }}" id="dropdown03" aria-haspopup="true"
                                aria-expanded="false">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About <i
                                    class="icofont-rounded-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('about') }}">About Us</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('pages', 'mission') }}">Our Mission</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('pages', 'vision') }}">Our Vision</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('pages', 'history') }}">Our History</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('causes') }}" aria-haspopup="true"
                                aria-expanded="false">Services</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="{{ URL::to('/') }}" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Research Studies <i
                                    class="icofont-rounded-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('research', 'completed-studies') }}">Completed Studies</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('research', 'ongoing-activities') }}">Ongoing Activities</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="{{ route('blogs') }}" aria-haspopup="true"
                                aria-expanded="false">Publication</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="{{ route('references') }}" aria-haspopup="true"
                                aria-expanded="false">Client References</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Teams <i
                                    class="icofont-rounded-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('teams', ['category' => 'Management']) }}">Management Teams</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('teams',['category' => 'Researcher']) }}">Researcher Teams</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('teams', ['category' => 'Advisors']) }}">Advisor Teams</a></li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="{{ route('teams') }}" aria-haspopup="true"
                                aria-expanded="false">Teams</a>
                        </li> --}}
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="{{ URL::to('/') }}" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">More Info <i
                                    class="icofont-rounded-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('teams') }}">Teams</a></li>
                                <li><a class="dropdown-item" href="{{ route('volunteers') }}">Volunteers</a></li>
                                <li><a class="dropdown-item" href="{{ route('volunteers.become') }}">Become
                                        Volunteers</a></li>
                                <li><a class="dropdown-item" href="{{ route('donations') }}">Donation</a></li>
                                <li><a class="dropdown-item" href="{{ route('faqs') }}">Our Faq's</a></li>
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacts') }}">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('events') }}" aria-haspopup="true"
                                aria-expanded="false">Events & News</a>
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
                    <p>
                        @if ($footer_text != null)
                            {{ $footer_text->value }}
                        @else
                            {{ 'This is Photoshop’s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet' }}
                        @endif
                    </p>

                    <div class="footer-widget-contact">
                        <ul class="list-unstyled">
                            <li>
                                <div><i data-feather="map-pin"></i> </div>
                                <div>{{ $contact->address }}</div>
                            </li>
                            <li>
                                <div><i data-feather="phone"></i> </div>
                                <div><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></div>
                            </li>
                            <li>
                                <div><i data-feather="mail"></i> </div>
                                <div><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
                            </li>
                            <li>
                                <div><i data-feather="clock"></i> </div>
                                <div>{{ $working_hour->value }}</div>
                            </li>
                        </ul>
                    </div>

                    <div class="social-icons">
                        <ul class="list-unstyled list-group list-group-horizontal">
                            <li><a href="{{ $contact->facebook }}"><i class="icofont-facebook"></i></a></li>
                            <li><a href="{{ $contact->twitter }}"><i class="icofont-twitter"></i></a></li>
                            <li><a href="{{ $contact->instagram }}"><i class="icofont-instagram"></i></a></li>
                            <li><a href="{{ $contact->youtube }}"><i class="icofont-youtube-play"></i></a></li>
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
                                    <li><a href="{{ route('about') }}"><i class="icofont-simple-right"></i> <span>About Us</span></a></li>
                                    <li><a href="{{ route('pages', 'history') }}"><i class="icofont-simple-right"></i> <span>Our History</span></a>
                                    </li>
                                    <li><a href="{{ route('pages', 'vision') }}"><i class="icofont-simple-right"></i> <span>Our Vision</span></a>
                                    </li>
                                    <li><a href="{{ route('pages', 'mission') }}"><i class="icofont-simple-right"></i> <span>Our Mission</span></a>
                                    </li>
                                    <li><a href="{{ route('causes') }}"><i class="icofont-simple-right"></i> <span>Our Services</span></a>
                                    </li>
                                    
                                </ul>
                            </div>

                            <div class="give-us-call">
                                <i data-feather="phone"></i>
                                <h4>Give us a call</h4>
                                <h3><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></h3>
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
                        © Copyright <span class="txt-blue">Econs Bangladesh</span> 2021. | Created by <a
                            href="https://ictbanglabd.com/contact" rel="nofollow">ICTBANGLABD</a>
                    </div>
                    <div class="col-sm-12 col-md-auto ml-md-auto text-md-right text-center copyright-links">
                        <a href="{{ route('pages', 'terms-condition') }}">Terms & Condition</a> | <a
                            href="{{ route('pages', 'privacy-policy') }}">Privacy Policy</a> | <a
                            href="{{ route('pages', 'legal') }}">Legal</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Main Footer End -->

    <!-- Search Popup Start -->
    <div class="overlay overlay-hugeinc">
        <form class="form-inline mt-2 mt-md-0" method="get" action="{{ route('search') }}">
            @csrf
            <div class="form-inner">
                <div class="form-inner-div d-inline-flex align-items-center no-gutters">
                    <div class="col-auto">
                        <i class="icofont-search"></i>
                    </div>
                    <div class="col">
                        <input class="form-control w-100 p-0" type="text" placeholder="Search" aria-label="Search"
                            name="search">
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
    <!-- Theme Custom -->
    <script src="{{ asset('public/frontend/assets/js/site-custom.js') }}"></script>

    <!-- Home Slider (Only For Home pages) -->
    <script src="{{ asset('public/frontend/assets/js/home-slider.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/countdown.js') }}"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61652da90564a690"></script>

    @section('footer')

    @show

</body>

</html>
