@extends('layouts.app')

@section('title', "$cause->title")
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>{{ $cause->title }}</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('causes') }}">Causes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $cause->title }}</li>
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
                    <div class="col-lg-9 col-md-12">
                        <div class="sidebar-spacer">

                            <h1 class="heading-main">
                                <small>Help Us Now</small>
                                {{ $cause->title }}
                            </h1>
                            <!-- Causes Single Wrap -->
                            <div class="causes-wrap single">
                                <div class="img-wrap">
                                    <span class="tag-single">{{ $category->name }}</span>
                                    <img src="{{ $cause->photo }}" alt="">
                                </div>

                                <div class="content-wrap-single">
                                    <div class="featured-cause-timer">
                                        <h3><strong class="txt-orange">৳{{ $donations_sum_amount }}</strong> pledged
                                            of <strong class="txt-blue">৳{{ $cause->amount }}</strong></h3>
                                        @php
                                            $percent = ($donations_sum_amount / $cause->amount) * 100;
                                        @endphp
                                        <div class="skillbar" data-percent="{{ $percent }}%">
                                            <div class="skillbar-percent">
                                                <h3><strong>{{ $percent }}%</strong></h3>
                                            </div>
                                            <div class="skillbar-bar"></div>
                                        </div>
                                        <div class="d-md-flex align-items-end justify-content-between">
                                            <ul id="featured-cause" class="list-unstyled list-inline w-50 countdown"
                                                data-count="{{ $cause->last_date }}">
                                                <li class="list-inline-item"><span
                                                        class="">%d</span>
                                                    <div class="
                                                        days_text">Days
                                        </div>
                                        </li>
                                        <li class="list-inline-item"><span
                                                class="">%h</span>
                                                    <div class="
                                                hours_text">Hours
                                    </div>
                                    </li>
                                    <li class="list-inline-item"><span
                                            class="">%m</span>
                                                    <div class="
                                            minutes_text">Minutes
                                </div>
                                </li>
                                <li class="list-inline-item"><span
                                        class="">%s</span>
                                                    <div class="
                                        seconds_text">Seconds
                            </div>
                            </li>
                            </ul>
                            <a class="btn-outline-default btn" href="donation-page.html">Donate Now</a>
                        </div>
                    </div>
                </div>

                <div class="content-wrap-single border-top">

                    {!! $cause->description !!}
                </div>

                <div class="share-this-wrap">
                    <div class="share-line">
                        <div class="pr-4">
                            <strong>Share This</strong>
                        </div>
                        <div class="pl-4">
                            <ul class="list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="icofont-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="icofont-behance"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="icofont-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Causes Single Wrap -->

            <!-- Leave a Reply -->
            <h1 class="heading-main mb-4">
                <small>Leave a Reply</small>
            </h1>

            <form class="comment-form">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Your Comments"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-0">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="col-md-6 mb-0">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                        </div>
                    </div>
                </div>
                <div class="d-md-flex justify-content-between align-items-center mt-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Save my name, email, and
                            website in this browser for the next
                            time I comment.</label>
                    </div>
                    <button type="submit" class="btn btn-default text-nowrap">Post Comment</button>
                </div>

            </form>
            <!-- Leave a Reply -->
            </div>

            </div>
            <div class="col-lg-3 col-md-12">
                <aside class="row sidebar-widgets">
                    <!-- Sidebar Primary Start -->
                    <div class="sidebar-primary col-lg-12 col-md-6">
                        <!-- Widget Wrap -->
                        <div class="widget-wrap">
                            <h3 class="widget-title">Recent Causes</h3>

                            <!-- Causes Wrap -->
                            @foreach ($causes as $item)
                                <div class="causes-wrap">
                                    <div class="img-wrap">
                                        <a
                                            href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                                src="{{ asset($item->photo) }}" alt=""></a>
                                        <div class="raised-progress">
                                            <div class="skillbar-wrap">
                                                <div class="clearfix">
                                                    <span
                                                        class="txt-orange">৳{{ $item->donations_sum_amount }}</span>
                                                    raised of <span class="txt-green">৳{{ $item->amount }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-wrap">
                                        <h3><a
                                                href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">Supply
                                                Water For Good Health</a></h3>
                                        <div class="text-md-right">
                                            <a href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"
                                                class="read-more-line"><span>Read
                                                    More</span></a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                            <!-- Causes Wrap -->
                        </div>
                        <!-- Widget Wrap -->
                    </div>
                    <!-- Sidebar Primary End -->

                    <!-- Sidebar Secondary Start -->
                    <div class="sidebar-secondary col-lg-12 col-md-6">

                        <!-- Widget Wrap -->
                        <div class="widget-wrap">
                            <h3 class="widget-title">Categories</h3>
                            <div class="blog-list-categories">
                                <ul class="list-unstyled icons-listing theme-orange mb-0">
                                    @foreach ($categories as $item)
                                        <li><a
                                                href="{{ route('causes.category', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Widget Wrap -->
                    </div>
                    <!-- Sidebar Secondary End -->
                </aside>
            </div>
            </div>
            </div>
        </section>
        <!-- About Us Style Start -->

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
                        <a href="#" class="btn btn-default">Donate Now</a>
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
