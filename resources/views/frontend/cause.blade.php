@extends('layouts.app')

@section('title', 'Causes')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Explore Causes</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Explore Causes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Causes Grid Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main">
                    <small>Help Us Now</small>
                    More Recent Causes
                </h1>
                <div class="row">
                    @foreach ($causes as $item)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <!-- Causes Wrap -->
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
                                            href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">Donate
                                            Now</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Causes Wrap -->
                        </div>
                    @endforeach
                    <div class="col-md-8"></div>
                    <div class="col-md-4">

                    </div>
                </div>
                <div class="theme-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $causes->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Causes Grid Start -->

        <!-- Featured Cause Start -->
        {{-- <section class="wide-tb-150 bg-white featured-heart-icon-hidden">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="featured-causes-img">
                            <img src="assets/images/causes/featured_cause.jpg" alt="">
                            <div class="featured-cause-timer">
                                <h3><strong class="txt-orange">$75,864</strong> pledged of <strong
                                        class="txt-blue">$100,000</strong></h3>
                                <div class="skillbar" data-percent="70%">
                                    <div class="skillbar-bar"></div>
                                </div>
                                <ul id="featured-cause" class="list-unstyled list-inline">
                                    <li class="list-inline-item"><span class="days">00</span>
                                        <div class="days_text">Days</div>
                                    </li>
                                    <li class="list-inline-item"><span class="hours">00</span>
                                        <div class="hours_text">Hours</div>
                                    </li>
                                    <li class="list-inline-item"><span class="minutes">00</span>
                                        <div class="minutes_text">Minutes</div>
                                    </li>
                                    <li class="list-inline-item"><span class="seconds">00</span>
                                        <div class="seconds_text">Seconds</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="featured-content">
                            <div class="featured-heart-icon"><i class="charity-hearts"></i></div>
                            <h1 class="heading-main">
                                <small>Featured Cause</small>
                                Emergency Relief Donations for a Mighty Cause
                            </h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s</p>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <a href="donation-page.html" class="btn btn-default">Donate Now</a>
                                <div class="share-on-text">
                                    <strong>Share On</strong> <a href="#"><img src="assets/images/facebook.svg" alt=""></a>
                                    <a href="#"><img src="assets/images/instagram.svg" alt=""></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Featured Cause End -->

        <!-- Faq's Style Start -->
        <section class="wide-tb-100 feautred-faqs pb-0">
            <div class="container">
                <div class="pos-rel faqs-wrap">
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
