<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Stylesheets -->
    <link href="{{ asset('public/frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/plugins/revolution/css/settings.css') }}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION SETTINGS STYLES -->
    <link href="{{ asset('public/frontend/plugins/revolution/css/layers.css') }}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link href="{{ asset('public/frontend/plugins/revolution/css/navigation.css') }}" rel="stylesheet"
        type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
    <link href="{{ asset('public/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/responsive.css') }}" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{ asset('public/frontend/css/color-switcher-design.css') }}" rel="stylesheet">
    <!--Color Themes-->
    <link id="theme-color-file" href="{{ asset('public/frontend/css/color-themes/default-theme.css') }}"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/logo.jpg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('public/frontend/images/logo.jpg') }}" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader"></div> --}}

        <!-- Main Header-->
        <header class="main-header" style="">

            <!-- Main Box -->
            <div class="main-box">
                <div class="auto-container">
                    <div class="outer-container clearfix">
                        <!--Logo Box-->
                        <div class="logo-box">
                            <div class="logo">
                                <a href="{{ URL::to('/') }}"><img
                                        src="{{ asset('public/frontend/images/logo.jpg') }}"
                                        style="height: 80; width: 80px;" alt=""></a>
                            </div>
                        </div>

                        <!--Btn Outer-->
                        <div class="btn-outer">
                            <a href="{{ route('donations') }}" class="theme-btn btn-style-one">Donate</a>
                        </div>

                        <!--Nav Outer-->
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class=""><a href="{{ URL::to('/') }}">Home</a>
                                        </li>
                                        <li class="dropdown"><a href="#">About Us</a>
                                            <ul>
                                                <li><a href="{{ route('about') }}">About Us</a></li>
                                                <li><a href="{{ route('pages', 'mission') }}">Our Mission</a></li>
                                                <li><a href="{{ route('pages', 'vision') }}">Our vision</a></li>
                                                <li><a href="{{ route('pages', 'history') }}">Our History</a></li>
                                                <li class="dropdown"><a href="#">People</a>
                                                    <ul>
                                                        <li><a
                                                                href="{{ route('teams', ['category' => 'Management']) }}">Management</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('teams', ['category' => 'Field Stuff']) }}">Filed
                                                                Staff</a></li>

                                                        <li><a
                                                                href="{{ route('teams', ['category' => 'Researcher']) }}">Researcher</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('teams', ['category' => 'Advisors']) }}">Advisor</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Services</a>
                                            <ul>
                                                @foreach ($services as $item)
                                                    <li><a
                                                            href="{{ route('causes.show', [$item->id, strtolower(str_replace([' ', '/'], '-', $item->title))]) }}">{{ $item->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Research</a>
                                            <ul>
                                                <li><a href="{{ route('research', 'past-studies') }}">Past
                                                        Studies</a></li>
                                                <li><a href="{{ route('research', 'ongoing-activities') }}">ongoing
                                                        Studies</a></li>

                                            </ul>
                                        </li>
                                        <li><a href="{{ route('blogs') }}">Publication</a>
                                        </li>
                                        <li><a href="{{ route('references') }}">Referances</a>
                                        </li>
                                        <li><a href="{{ route('contacts') }}">Contact</a></li>
                                        <li><a href="{{ route('events') }}">Events & News</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->

                            <!--Search Box-->
                            {{-- <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                            class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="post"
                                                    action="http://html.efforttech.com/html/charitypoint/blog.html">
                                                    <div class="form-group">
                                                        <input type="search" name="field-name" value=""
                                                            placeholder="Search Here" required>
                                                        <button type="submit" class="search-btn"><span
                                                                class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}

                        </div>
                        <!--Nav Outer End-->
                    </div>
                </div>
            </div>
        </header>
        <!--End Main Header -->
        @section('content')

        @show
        <!--Main Footer-->
        <footer class="main-footer">
            <div class="auto-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                            <div class="footer-widget">
                                <div class="logo">
                                    <a href="{{ URL::to('/') }}"><img
                                            src="{{ asset('public/frontend/images/logo.jpg') }}" alt=""
                                            style="width: 240px; height: 85px;" /></a>
                                </div>
                                <div class="text">@if ($footer_text) {!! $footer_text->value !!} @endif<br /><br /></div>
                                <ul class="list-style-two">
                                    <li><span class="icon flaticon-location-pin"></span>{{ $contact->address }}</li>
                                    <li><span class="icon flaticon-technology-1"></span>{{ $contact->phone }}</li>
                                    <li><span class="icon flaticon-symbol"></span>{{ $contact->email }}</li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                            <div class="footer-widget info-widget">
                                <h2>USE FULL LINKS</h2>
                                <div class="row clearfix">
                                    <div class="column col-md-6 col-sm-6 col-xs-12">
                                        <ul class="footer-list">
                                            <li><a href="{{ route('about') }}">About Us</a></li>
                                            <li><a href="{{ route('pages', 'mission') }}">Our Mission</a></li>
                                            <li><a href="{{ route('pages', 'vission') }}">Our Vission</a></li>
                                            <li><a href="{{ route('pages', 'history') }}">Our History</a></li>
                                        </ul>
                                    </div>
                                    <div class="column col-md-6 col-sm-6 col-xs-12">
                                        <ul class="footer-list">
                                            <li><a href="{{ route('events') }}">Event&News</a></li>
                                            <li><a href="#">Events</a></li>
                                            <li><a href="{{ route('references') }}">Reference</a></li>
                                            <li><a href="{{ route('contacts') }}">Contact us </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-md-4 col-sm-12 col-xs-12">
                            <div class="footer-widget news-widget">
                                <h2>Latest Events & News</h2>

                                @foreach ($footerEvents as $item)
                                    <article class="post">
                                        <figure class="post-thumb"><a
                                                href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                                    src="{{ asset($item->photo) }}" alt=""></a></figure>
                                        <div class="text"><a
                                                href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                        </div>
                                    </article>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="column col-md-6 col-sm-8 col-xs-12">
                            <div class="copyright">Copyright &copy; {{ date('Y') }} ECONS. All rights reserved</div>
                        </div>
                        <div class="social-column col-md-6 col-sm-4 col-xs-12">
                            <ul class="social-icon-one style-two">
                                <li><a href="{{ $contact->facebook }}"><span class="fab fa-facebook"></span></a></li>
                                <li><a href="{{ $contact->twitter }}"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="{{ $contact->instagram }}"><span class="fab fa-instagram"></span></a></li>
                                <li><a href="{{ $contact->youtube }}"><span class="fab fa-youtube"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>



    <script src="{{ asset('public/frontend/js/jquery.js') }}"></script>
    <!--Revolution Slider-->
    <script src="{{ asset('public/frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}">
    </script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}">
    </script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}">
    </script>
    <script
        src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}">
    </script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}">
    </script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script src="{{ asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}">
    </script>
    <script src="{{ asset('public/frontend/js/main-slider-script.js') }}"></script>

    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/isotope.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.fancybox-media.js') }}"></script>
    <script src="{{ asset('public/frontend/js/owl.js') }}"></script>
    <script src="{{ asset('public/frontend/js/wow.js') }}"></script>
    <script src="{{ asset('public/frontend/js/appear.js') }}"></script>
    <script src="{{ asset('public/frontend/js/script.js') }}"></script>
    <!--Google Map APi Key-->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
    <script src="{{ asset('public/frontend/js/map-script.js') }}"></script>
    <!--End Google Map APi-->

    @section('footer')

    @show

</body>

<!-- Mirrored from html.efforttech.com/html/charitypoint/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Dec 2021 09:50:56 GMT -->

</html>
