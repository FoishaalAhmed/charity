@extends('layouts.app')

@section('title', 'About Us')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>About Us</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- About Us Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="text-center">
                            <img src="{{ asset($about->photo) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <h1 class="heading-main">
                            <small>About Us</small>
                            {{ $about->name }}
                        </h1>

                        <p>{!! $about->content !!}</p>

                        <div class="icon-box-1 my-4">
                            <i class="charity-volunteer_people"></i>
                            <div class="text">
                                <h3>Work As An Intern</h3>
                                <p>
                                    @if ($intern != null)
                                        {{ $intern->value }}
                                    @else
                                        {{ 'Sed quia consequuntur agni dolores eos qui ratoluptatem sequi nesciun porquis' }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <a class="btn btn-default mr-3" href="become-volunteers.html">Join Now</a>
                            <div class="about-phone">
                                <i data-feather="phone-call"></i>
                                Conatct Us <br> {{ $contact->phone }}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Style Start -->

        <!-- Get to Know Us Style Start -->
        <section class="wide-tb-100 bg-white mb-spacer-md">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <h1 class="heading-main">
                            <small>Get to Know Us</small>
                            Let Us Come Together To Make a Difference
                        </h1>

                        <p>{{ $about_text->value }}</p>

                        <!-- Animated Skillbars Start -->
                        <div class="skillbar-wrap">
                            <div class="clearfix">
                                Food Help
                            </div>
                            <div class="skillbar" data-percent="67%">
                                <div class="skillbar-percent">67%</div>
                                <div class="skillbar-bar"></div>
                            </div>
                        </div>
                        <!-- Animated Skillbars Start -->

                        <!-- Animated Skillbars Start -->
                        <div class="skillbar-wrap">
                            <div class="clearfix">
                                Medical Help
                            </div>
                            <div class="skillbar" data-percent="85%">
                                <div class="skillbar-percent">85%</div>
                                <div class="skillbar-bar"></div>
                            </div>
                        </div>
                        <!-- Animated Skillbars Start -->
                    </div>

                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    <div class="col-lg-7 col-md-12">
                        <!-- Theme Tabbing Style -->
                        <ul class="nav nav-pills theme-tabbing mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-mission-tab" data-toggle="pill" href="#pills-mission"
                                    role="tab" aria-controls="pills-mission" aria-selected="true">Mission</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-vision-tab" data-toggle="pill" href="#pills-vision"
                                    role="tab" aria-controls="pills-vision" aria-selected="false">Our Vision</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history"
                                    role="tab" aria-controls="pills-history" aria-selected="false">Our History</a>
                            </li>
                        </ul>
                        <div class="tab-content theme-tabbing" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-mission" role="tabpanel"
                                aria-labelledby="pills-mission-tab">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="about-img-small">
                                            <img src="{{ asset($mission->photo) }}" class="about-us-2" alt="">
                                            <div class="since-year">
                                                <span>Since</span>
                                                {{ $since->value }}
                                                <span class="text-right">Years</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">
                                            {!! $mission->content !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-vision" role="tabpanel"
                                aria-labelledby="pills-vision-tab">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="about-img-small">
                                            <img src="{{ asset($vision->photo) }}" class="about-us-2" alt="">
                                            <div class="since-year">
                                                <span>Since</span>
                                                {{ $since->value }}
                                                <span class="text-right">Years</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">
                                            {!! $vision->content !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-history" role="tabpanel"
                                aria-labelledby="pills-history-tab">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="about-img-small">
                                            <img src="{{ asset($history->photo) }}" class="about-us-2" alt="">
                                            <div class="since-year">
                                                <span>Since</span>
                                                {{ $since->value }}
                                                <span class="text-right">Years</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">
                                            {!! $history->content !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Theme Tabbing Style -->

                    </div>
                </div>
            </div>
        </section>
        <!-- Get to Know Us Style End -->

        <!-- Team Member Style Start -->
        <section class="wide-tb-100 team-bg mb-spacer-md">
            <div class="container">
                <div class="row justify-content-between align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <h1 class="heading-main">
                            <small>Team Member</small>
                            Our Expert Volunteer
                        </h1>
                    </div>
                    <div class="col-lg-8 col-md-6 text-md-right btn-team">
                        <a href="volunteers.html" class="btn btn-outline-dark">View All Members</a>
                    </div>
                </div>

                <div class="row">
                    <!-- Team Column One -->
                    @foreach ($volunteers as $item)
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="team-section-wrap mb-0">
                                <div class="img green">
                                    <div class="social-icons">
                                        <a href="{{ $item->facebook }}"><i class="icofont-facebook"></i></a>
                                        <a href="{{ $item->twitter }}"><i class="icofont-twitter"></i></a>
                                        <a href="{{ $item->instagram }}"><i class="icofont-instagram"></i></a>
                                    </div>
                                    <img src="{{ asset($item->photo) }}" alt="" class="rounded-circle">
                                </div>
                                <h4>{{ $item->name }}</h4>
                                <h5>Volunteer</h5>
                                <div class="text-md-right">
                                    <a href="javascript:" class="read-more-line"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Team Column One -->
                </div>
            </div>
        </section>
        <!-- Team Member Style End -->

        <!-- Faq's Style Start -->
        <section class="wide-tb-100 pattern-orange pt-0 mb-spacer-md">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">

                        <div class="faqs-wrap pos-rel">
                            <div class="bg-overlay blue opacity-80"></div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-12">
                                    <h1 class="heading-main light-mode">
                                        <small>Have Questions</small>
                                        Frequently Asked Questions
                                    </h1>
                                    <p>{{ $question_text->value }}</p>
                                    {{-- <a class="btn btn-default" href="our-faqs.html">Ask It Now</a> --}}
                                </div>

                                <!-- Spacer For Medium -->
                                <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>
                                <!-- Spacer For Medium -->

                                <div class="col-12 col-lg-6 col-md-12">
                                    <div class="theme-collapse light">
                                        <!-- Toggle Links 1 -->
                                        @foreach ($faqs as $key => $item)
                                            <div class="toggle @if ($key == 0) {{ 'arrow-down' }} @endif">
                                                <span class="icon">
                                                    <i class="icofont-plus"></i>
                                                </span> {{ $item->question }}
                                            </div>
                                            <!-- Toggle Links 1 -->

                                            <!-- Toggle Content 1 -->
                                            <div class="collapse @if ($key == 0) {{ 'show' }} @endif ">
                                                <div class="content">
                                                    {{ $item->answer }}
                                                </div>
                                            </div>
                                            <!-- Toggle Content 1 -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex align-items-center">
                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">
                            <div class="counter-txt"><span class="counter">{{ $eventCount }}</span>+</div>
                            <div>Featured Campaign</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">
                            <div class="counter-txt"><span class="counter">{{ $fundAmount }}</span>+</div>
                            <div>Money Raised</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">
                            <div class="counter-txt"><span class="counter">{{ $volunteerCount }}</span>+
                            </div>
                            <div>Dedicated Volunteers</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">
                            <div class="counter-txt"><span class="counter">{{ $donarCount }}</span>+</div>
                            <div>People Helped Happily</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->
                </div>
            </div>
        </section>
        <!-- Faq's Style End -->

        <!-- Testimonials Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main">
                    <small>Our Testimonials</small>
                    What People Say
                </h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="home-client-testimonials">

                            <!-- Client Testimonials Slider Item -->
                            @foreach ($testimonials as $item)
                                <div class="item">
                                    <div class="client-testimonial">
                                        <div class="client-inner-content">
                                            <i class="charity-quotes"></i>
                                            <p>{!! $item->message !!}</p>
                                        </div>
                                        <div class="client-testimonial-icon">
                                            <img src="{{ asset($item->photo) }}" alt="">
                                            <div class="text">
                                                <div class="name">{{ $item->name }}</div>
                                                <div class="post">{{ $item->position }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials Style End -->

        <!-- Callout Style Start -->
        <section class="wide-tb-150 bg-scroll bg-img-6 pos-rel callout-style-1">
            <div class="bg-overlay blue opacity-80"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="heading-main light-mode">
                            <small>Help Other People</small>
                            @if ($help != null)
                                {{ $help->value }}
                            @else
                                {{ 'We Dream to Create A Bright Future Of The Underprivileged Children' }}
                            @endif
                        </h1>
                    </div>
                    <div class="col-sm-12 text-md-right">
                        <a href="{{ route('donations') }}" class="btn btn-default">Donate Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout Style End -->

        <!-- Our Partners Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h1 class="heading-main">
                            <small>Global Providers</small>
                            Our World Wide Partner
                        </h1>
                    </div>
                    <div class="col-sm-12">
                        <div class="owl-carousel owl-theme" id="home-clients">

                            <!-- Client Logo -->
                            @foreach ($partners as $item)
                                <div class="item">
                                    <div class="clients-logo">
                                        <img src="{{ asset($item->logo) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                            <!-- Client Logo -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Partners End -->


    </main>
@endsection
