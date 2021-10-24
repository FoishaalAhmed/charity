@extends('layouts.app')

@section('title', 'Econ')

@section('content')
    <!-- Banner Start -->
    <section class="main-banner home-style-second">
        <div class="slides-wrap">
            <div class="owl-carousel owl-theme">
                <!--/owl-slide-->
                @foreach ($sliders as $item)
                    <div class="owl-slide d-flex align-items-center cover"
                        style="background-image: url({{ asset($item->photo) }});">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start no-gutters">
                                <div class="col-10 col-md-6 static">
                                    <div class="owl-slide-text">
                                        <h3 class="owl-slide-animated owl-slide-title">{{ $item->title_one }}</h3>
                                        <h1 class="owl-slide-animated owl-slide-subtitle">
                                            {{ $item->title_two }}
                                        </h1>
                                        <div class="owl-slide-animated owl-slide-cta">
                                            <a class="btn btn-default mr-3" href="{{ route('donations') }}" role="button">Join Us
                                                Now</a>
                                            <a class="slider-link popup-video"
                                                href="http://player.vimeo.com/video/{{ $item->video }}">Watch the video <i
                                                    class="charity-play_button"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--/owl-slide-->
            </div>

        </div>
    </section>
    <!-- Banner Start -->

    <!-- Main Body Content Start -->
    <main id="body-content" class="body-non-overflow">

        <!-- Donation Style Start -->
        <section class="bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 order-lg-last">
                        <div class="home-second-donation-form">
                            <div class="funds-committed">
                                <div class="gift-icon">
                                    <i class="charity-gift_box"></i>
                                </div>
                                <small>Total Funds Committed</small>
                                <span class="counter">{{ $fundAmount }}</span>

                            </div>
                            @include('includes.error')
                            @if (session()->has('message'))
                                <div class="alert alert-success"> {{ session('message') }} </div>
                            @endif
                            <form class="form-style" action="{{ route('donations.store') }}" method="post">
                                @csrf
                                <h3 class="h3-sm fw-7 txt-white mb-3">Easy Donation</h3>
                                <div class="form-group">
                                    <label for="name"><strong>First Name</strong></label>
                                    <input type="text" name="first_name" class="form-control form-light" id="name"
                                        placeholder="e.g John">
                                </div>
                                <div class="form-group">
                                    <label for="name"><strong>Last Name</strong></label>
                                    <input type="text" name="last_name" class="form-control form-light" id="name"
                                        placeholder="e.g Doe">
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Email Address</strong></label>
                                    <input type="email" class="form-control form-light" id="email"
                                        placeholder="e.g example@sitename.com" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="state"><strong>Select Causes</strong></label>
                                    <select class="theme-combo home-charity" id="state" name="cause_id"
                                        style="height: 400px">
                                        <option>Select Causes</option>
                                        @foreach ($allCauses as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div><label for="customRadioInline1"><strong>Amount</strong></label></div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="amount"
                                            class="custom-control-input" value="10">
                                        <label class="custom-control-label" for="customRadioInline1">$10</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="amount"
                                            class="custom-control-input" value="20">
                                        <label class="custom-control-label" for="customRadioInline2">$20</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline3" name="amount"
                                            class="custom-control-input" value="50">
                                        <label class="custom-control-label" for="customRadioInline3">$50</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline4" name="amount"
                                            class="custom-control-input" value="100">
                                        <label class="custom-control-label" for="customRadioInline4">$100</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline5" name="amount"
                                            class="custom-control-input" value="500">
                                        <label class="custom-control-label" for="customRadioInline5">$500</label>
                                    </div>

                                    <div class="mt-3">
                                        <input type="text" class="form-control form-light" id="custom"
                                            placeholder="Custom Amount" name="custom_amount">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <div><label for="paymentForm"><strong>Payment Method</strong></label></div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="paymentForm" name="paymentForm"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="paymentForm">Test Donation</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="paymentForm2" name="paymentForm"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="paymentForm2">Offline Donation</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="paymentForm3" name="paymentForm"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="paymentForm3">Credit Card</label>
                                    </div>
                                </div> --}}
                                <button type="submit" class="btn btn-default mt-3 btn-block">Donate now</button>
                            </form>

                        </div>
                    </div>

                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-none d-md-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    <div class="col-lg-7 col-md-12">
                        <div>
                            @if ($page1 != null)
                                <h1 class="heading-main">
                                    <small>Welcome To Raise Hope</small>
                                    {{ $page1->name }}
                                </h1>
                                <p>{!! $page1->content !!}</p>
                            @endif

                            <div class="row my-5 home-second-welcome">
                                <!-- Map Icons Start -->
                                <div class="col-sm-6 mb-md-0">
                                    <div class="icon-box-1">
                                        <i class="charity-volunteer_people"></i>
                                        <div class="text">
                                            <h3>{{ $volunteerCount }} <br> <span>Volunteers</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Map Icons Start -->

                                <!-- Map Icons Start -->
                                <div class="col-sm-6">
                                    <div class="icon-box-1">
                                        <i class="charity-donate_money"></i>
                                        <div class="text">
                                            <h3>{{ $donarCount }} <br> <span>Trusted Funds</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Map Icons Start -->
                            </div>

                            <a href="{{ route('volunteers.become') }}" class="btn btn-outline-default">Become a Volunteer</a>
                        </div>
                    </div>

                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-none d-md-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->


                </div>
            </div>
        </section>
        <!-- Donation Style Start -->

        <!-- Welcome Home Style Start -->
        <section class="wide-tb-100 pb-5 bg-green">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <h1 class="heading-main">
                            <small>Welcome To Raise Hope</small>
                            Small Actions Lead To Big changes
                        </h1>
                        <p>{{ $about_text->value }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="wide-tb-100 pt-0 welcome-broke-grid green pb-5">

            <div class="container">
                <div class="welcome-icon"><i class="charity-love_hearts"></i></div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <!-- Icon Boxes Image Style -->
                        <div class="icon-box-with-img">
                            <div class="img">
                                <a href="#"><img
                                        src="{{ asset('public/frontend/assets/images/causes/causes_img_1.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="text">
                                <h3>Help For Education</h3>
                                <p>A wonderful serenity has taken possession of my entire soul</p>
                                <div class="text-md-right">
                                    <a href="#" class="read-more-line"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Icon Boxes Image Style -->
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <!-- Icon Boxes Image Style -->
                        <div class="icon-box-with-img">
                            <div class="img">
                                <a href="#"><img
                                        src="{{ asset('public/frontend/assets/images/causes/causes_img_4.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="text">
                                <h3>Help For Humanity</h3>
                                <p>A wonderful serenity has taken possession of my entire soul</p>
                                <div class="text-md-right">
                                    <a href="#" class="read-more-line"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Icon Boxes Image Style -->
                    </div>

                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-none d-md-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <!-- Icon Boxes Image Style -->
                        <div class="icon-box-with-img">
                            <div class="img">
                                <a href="#"><img
                                        src="{{ asset('public/frontend/assets/images/causes/causes_img_3.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="text">
                                <h3>Help For Water</h3>
                                <p>A wonderful serenity has taken possession of my entire soul</p>
                                <div class="text-md-right">
                                    <a href="#" class="read-more-line"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Icon Boxes Image Style -->
                    </div>


                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <!-- Icon Boxes Image Style -->
                        <div class="icon-box-with-img">
                            <div class="img">
                                <a href="#"><img
                                        src="{{ asset('public/frontend/assets/images/causes/causes_img_5.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="text">
                                <h3>Help For Food</h3>
                                <p>A wonderful serenity has taken possession of my entire soul</p>
                                <div class="text-md-right">
                                    <a href="#" class="read-more-line"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Icon Boxes Image Style -->
                    </div>

                </div>
            </div>
        </section>
        <!-- Welcome Home Style Start -->

        <!-- Counter Style 2 -->
        <section class="wide-tb-100 p-0">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-4 col-md-6">
                        <div class="counter-style-box small-box">
                            <div class="counter-txt"><span class="counter">{{ $eventCount }}</span>+</div>
                            <div>Featured<br> Campaign</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-4 col-md-6">
                        <div class="counter-style-box small-box">
                            <div class="counter-txt"><span class="counter">{{ $volunteerCount }}</span>+
                            </div>
                            <div>Dedicated<br> Volunteers</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-4 col-md-6">
                        <div class="counter-style-box small-box">
                            <div class="counter-txt"><span class="counter">{{ $donarCount }}</span>+</div>
                            <div>People Helped<br> Happily</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->
                </div>
            </div>
        </section>
        <!-- Counter Style 2 -->

        <!-- Causes Grid Start -->
        <section class="wide-tb-100">
            <div class="container">

                <div class="row justify-content-between align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <h1 class="heading-main">
                            <small>Help Us Now</small>
                            More Recent Causes
                        </h1>
                    </div>
                    <div class="col-lg-8 col-md-6 text-md-right btn-team">
                        <a href="{{ route('causes') }}" class="btn btn-outline-dark">View All Causes</a>
                    </div>
                </div>

                <div class="owl-carousel owl-theme" id="home-second-causes">

                    <!-- Causes Wrap -->
                    @foreach ($causes as $item)
                        <div class="item">
                            <div class="causes-wrap">
                                <div class="img-wrap">
                                    <a
                                        href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                            src="{{ asset($item->photo) }}" alt=""></a>
                                    <div class="raised-progress">
                                        <div class="skillbar-wrap">
                                            <div class="clearfix">
                                                ৳{{ $item->donations_sum_amount }} raised of ৳{{ $item->amount }}
                                            </div>
                                            @php
                                                $percent = ($item->donations_sum_amount / $item->amount) * 100;
                                            @endphp
                                            <div class="skillbar" data-percent="{{ $percent }}%">
                                                <div class="skillbar-percent">{{ $percent }}%</div>
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="content-wrap">
                                    <h3><a
                                            href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                    </h3>
                                    <p>{!! Str::limit($item->description, 120) !!}</p>
                                    <div class="btn-wrap">
                                        <a class="btn-primary btn"
                                            href="{{ route('donations.cause', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">Donate
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Causes Wrap -->
                </div>
            </div>
        </section>
        <!-- Causes Grid Start -->


        <!-- Callout Style Start -->
        <section class="wide-tb-100 bg-scroll bg-img-1 pos-rel callout-style-1">
            <div class="bg-overlay black opacity-50"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="heading-main light-mode orange">
                            <small>Help Other People</small>
                            @if ($help != null)
                                {{ $help->value }}
                            @else
                                {{ 'We Dream to Create A Bright Future Of The Underprivileged Children' }}
                            @endif
                        </h1>
                        <a href="{{ route('donations') }}" class="btn btn-default">Donate Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout Style End -->

        <!-- Images Gallery Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row img-gallery">
                    <div class="col-lg-4">
                        <h1 class="heading-main mb-lg-0">
                            <small>Images Gallery</small>
                            Project We Have Done
                        </h1>
                    </div>
                    @foreach ($events as $item)
                        <div class="col-lg-4 col-md-6">
                            <!-- Gallery Item -->
                            <div class="img-gallery-item">
                                <a href="{{ asset($item->photo) }}" title="{{ $item->title }}">
                                    <div class="gallery-content">
                                        <h3>{{ $item->title }}</h3>
                                        <div class="img-open">
                                            <i data-feather="plus-circle"></i>
                                        </div>
                                    </div>
                                    <img src="{{ asset($item->photo) }}" alt="" style="width: 330px; height:275px;">
                                </a>
                            </div>
                            <!-- Gallery Item -->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Images Gallery Style End -->

        <!-- About Us Style Start -->
        @if ($page2 != null)
            <section class="wide-tb-100 bg-white shadow">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="text-center">
                                <img src="{{ asset($page2->photo) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <h1 class="heading-main">
                                <small>About Us</small>
                                {{ $page2->name }}
                            </h1>

                            <p>{!! Str::limit($page2->content, 200) !!}</p>

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
                                <a class="btn btn-default mr-3" href="{{ route('volunteers.become') }}">Join Now</a>
                                <div class="about-phone">
                                    <i data-feather="phone-call"></i>
                                    Conatct Us <br> {{ $contact->phone }}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- About Us Style Start -->

        <!-- Event Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row justify-content-between align-items-end">
                    <div class="col-lg-6 col-md-8">
                        <h1 class="heading-main">
                            <small>Join Us</small>
                            Reach Out & Help In Our Latest Events
                        </h1>
                    </div>

                </div>

                <div class="owl-carousel owl-theme" id="home-second-events">

                    <!-- Events Alternate Wrap -->
                    @foreach ($events as $item)
                        <div class="item">
                            <div class="event-wrap-alternate">
                                <!-- Event Wrap -->
                                <div class="img-wrap">
                                    <div class="date-box">
                                        {{ date('d', strtotime($item->date)) }}
                                        <span>{{ date('M', strtotime($item->date)) }}</span>
                                    </div>
                                    <a
                                        href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                            src="{{ asset($item->photo) }}" alt=""></a>
                                    <div class="content-wrap">
                                        <h3><a
                                                href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                        </h3>
                                        <div class="event-details">
                                            <div><i data-feather="clock"></i> {{ date('h:i A', strtotime($item->time)) }}
                                            </div>
                                            <div><i data-feather="map-pin"></i> {{ $item->center }}</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Event Wrap -->
                            </div>
                        </div>
                    @endforeach
                    <!-- Events Alternate Wrap -->
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('events') }}" class="btn btn-outline-dark">View All Events</a>
                </div>
            </div>
        </section>
        <!-- Event Style End -->

        <!-- Team Member Style Start -->
        <section class="wide-tb-100 team-bg bg-green mb-spacer-md">
            <div class="container">
                <div class="row justify-content-between align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <h1 class="heading-main">
                            <small>Volunteer Member</small>
                            Our Expert Volunteer
                        </h1>
                    </div>
                    <div class="col-lg-8 col-md-6 text-md-right btn-team">
                        <a href="{{ route('volunteers') }}" class="btn btn-outline-dark">View All Members</a>
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
                                    {{-- <a href="javascript:" class="read-more-line"><span>Read More</span></a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Team Column One -->
                </div>
            </div>
        </section>
        <!-- Team Member Style End -->

        <!-- Testimonials Style Start -->
        <section class="wide-tb-100 pattern-green pb-0 home-second-testimonials-wrap">
            <div class="container">
                <h1 class="heading-main light-mode green">
                    <small>Our Testimonials</small>
                    What People Say
                </h1>
                <div class="owl-carousel owl-theme nav-light" id="home-second-testimonials">

                    <!-- Client Testimonials Alternate Slider Item -->
                    @foreach ($testimonials as $item)
                        <div class="item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-md-11 mx-auto">
                                        <div class="client-testimonial-alternate">
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Testimonials Style End -->

        <!-- Blog Style Start -->
        <section class="wide-tb-100 pb-0 home-blog-post-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 col-9">
                        <h1 class="heading-main">
                            <small>News & Blogs</small>
                            Some Of Our Recent Stories & News Blog
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="home-second-blog-post">

                            <!-- Blog Post Slider Item -->
                            @foreach ($blogs as $item)
                                <div class="item">
                                    <div class="post-wrap">
                                        <div class="post-img">
                                            <a
                                                href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                                    src="{{ asset($item->photo) }}" alt=""></a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-date">{{ date('d, M, Y', strtotime($item->date)) }}
                                            </div>
                                            <h3 class="post-title"><a
                                                    href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                            </h3>
                                            <div class="text-md-right">
                                                <a href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"
                                                    class="read-more-line"><span>Read
                                                        More</span></a>
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
        <!-- Blog Style End -->

        <!-- Google Map Style Start -->
        <section class="wide-tb-100 pb-0">
            <div class="map-frame">
                <iframe src="{{ $contact->map }}"></iframe>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Callout Section Side Image -->
                    <div class="col-sm-12">
                        <div class="callout-style-side-img d-lg-flex align-items-center top-broken-grid">
                            <div class="img-callout">
                                <img src="{{ asset('public/frontend/assets/images/callout_side_img.jpg') }}" alt="">
                            </div>
                            <div class="text-callout">
                                <div class="d-sm-flex align-items-center">
                                    <div class="heading">
                                        <h2>
                                            @if ($donation_text != null)
                                                {{ $donation_text->value }}
                                            @else
                                                {{ 'Let Us Come Together To Make A Difference' }}
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="icon">
                                        <a href="{{ route('donations') }}" class="btn btn-default">Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Callout Section Side Image -->
                </div>
            </div>
        </section>
        <!-- Google Map Style End -->

        <!-- Our Partners Start -->
        <section class="wide-tb-100 pt-5">
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
