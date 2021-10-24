@extends('layouts.app')

@section('title', 'Teams')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Our Team</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Team</li>
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
                <h1 class="heading-main">
                    <small>Team Member</small>
                    Our Expert Members
                </h1>
                <div class="row">

                    <!-- Team Column One -->
                    @foreach ($teams as $item)
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
                                <h5>{{ $item->position }}</h5>
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
        <!-- About Us Style Start -->

        <!-- Team Member Style Start -->
        <section class="wide-tb-100 mb-spacer-md pb-0">
            <div class="container">
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
                            <div class="counter-txt"><span class="counter">{{ $volunteerCount }}</span>+</div>
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
