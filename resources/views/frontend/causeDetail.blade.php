@extends('layouts.app')

@section('header')
    <meta property="og:url"
        content="{{ route('blogs.show', [$cause->id, strtolower(str_replace(' ', '-', $cause->title))]) }}" />
    <meta property="og:description"
        content="Econ Bangladesh working in Bangladesh for compacting human development, disaster management of Bangladesh. They are also participating in their activities around human rights, social justice, and other social supporting works." />
    <meta name="author" content="Econ Bangladesh :: ইকন বাংলাদেশ">
    <meta property="fb:app_id" content="1312338905884313">
    <meta property="og:site_name" content="Econ Bangladesh :: ইকন বাংলাদেশ">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $cause->title }}" />
    <meta property="og:description" content="{{ $cause->description }}" />

    <meta property="og:image" content="{{ asset($cause->photo) }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="keywords" content="Econ Bangladesh, non-governmental organization, non-profit organization, private voluntary organization, non-governmental development organization
        government-organized NGO, civil society, community-based organization, people's organization, grassroots organizationorganization of the community, democracy
        education, enterprise development, environment
        health, housing, human rights, infrastructure, political franchise
        poverty alleviation, professionals, women, youth, community, 
        religion, volunteers, students, charity, civil society, empowerment
        grassroots, independence, morality, social capital, sustainability, ইকন বাংলাদেশ">

    <meta name="description" content="{{ $cause->description }}">

    {{-- <meta name="tags" content="{{ $news->tags }}"> --}}

    <meta property="og:locale" content="en_US">
@endsection

@section('title', "$cause->title")
@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=1312338905884313&autoLogAppEvents=1"
        nonce="kpMAW9kq"></script>
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>{{ $cause->title }}</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('causes') }}">Services</a></li>
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
                                    {{-- <span class="tag-single">{{ $category->name }}</span> --}}
                                    <img src="{{ asset($cause->photo) }}" alt="">
                                </div>

                                {{-- <div class="content-wrap-single">
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
                            <a class="btn-outline-default btn" href="{{ route('donations.cause', [$cause->id, strtolower(str_replace(' ', '-', $cause->title))]) }}">Donate Now</a>
                        </div>
                    </div>
                </div> --}}

                                <div class="content-wrap-single border-top">

                                    {!! $cause->description !!}
                                </div>

                                <div class="share-this-wrap">
                                    <div class="addthis_inline_share_toolbox"></div>
                                </div>

                            </div>
                            <!-- Causes Single Wrap -->

                            <!-- Leave a Reply -->
                            <h1 class="heading-main mb-4">
                                <small>Leave a Reply</small>
                            </h1>

                            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="10">
                            </div>


                        </div>

                    </div>
                    <div class="col-lg-3 col-md-12">
                        <aside class="row sidebar-widgets">
                            <!-- Sidebar Primary Start -->
                            <div class="sidebar-primary col-lg-12 col-md-6">
                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Recent Services</h3>

                                    <!-- Causes Wrap -->
                                    @foreach ($causes as $item)
                                        <div class="causes-wrap">
                                            <div class="img-wrap">
                                                <a
                                                    href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                                        src="{{ asset($item->photo) }}" alt=""></a>
                                                {{-- <div class="raised-progress">
                                            <div class="skillbar-wrap">
                                                <div class="clearfix">
                                                    <span
                                                        class="txt-orange">৳{{ $item->donations_sum_amount }}</span>
                                                    raised of <span class="txt-green">৳{{ $item->amount }}</span> 
                                                </div>
                                            </div>
                                        </div> --}}
                                            </div>

                                            <div class="content-wrap">
                                                <h3><a
                                                        href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                                </h3>
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
                            {{-- <div class="sidebar-secondary col-lg-12 col-md-6">

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
                    </div> --}}
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
