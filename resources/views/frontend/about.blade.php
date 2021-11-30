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
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <img src="{{ asset($about->photo) }}" alt="">
                        <p>{!! $about->content !!}</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Style Start -->

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
                            <small></small>
                            Our World Wide Partner
                        </h1>
                    </div>
                    <div class="col-sm-12">
                        <div class="owl-carousel owl-theme" id="home-clients">

                            <!-- Client Logo -->
                            @foreach ($partners as $item)
                                <div class="item">
                                    <div class="clients-logo">
                                        <img src="{{ asset($item->logo) }}" alt="" style="height: 100px;">
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
