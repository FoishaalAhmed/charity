@extends('layouts.app')

@section('title', 'Search')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Explore Search</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Explore Search</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        @if ($causes->isNotEmpty())
            <!-- Causes Grid Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <h1 class="heading-main">
                        <small>Help Us Now</small>
                        More Recent Services
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
                                        {{-- <div class="raised-progress">
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
                                        </div> --}}
                                    </div>

                                    <div class="content-wrap">
                                        <h3><a
                                                href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                        </h3>
                                        <p>{!! Str::limit($item->description, 120) !!}</p>
                                        <div class="btn-wrap">
                                            <a class="btn-primary btn"
                                                href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">Read
                                                More</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- Causes Wrap -->
                            </div>
                        @endforeach
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
        @endif
        <!-- Causes Grid Start -->
        @if ($blogs->isNotEmpty())
            <!-- Blog Post Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row">
                        <!-- Blog Wrap -->
                        @foreach ($blogs as $item)
                            <div class="col-md-6 col-lg-4 col-sm-12 mb-0">
                                <div class="post-wrap">
                                    <div class="post-img">
                                        <a
                                            href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                                src="{{ asset($item->photo) }}" alt=""></a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-date">{{ date('d M, Y', strtotime($item->date)) }}</div>
                                        <h3 class="post-title"><a
                                                href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                        </h3>
                                        <div class="text-md-right">
                                            <a href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"
                                                class="read-more-line"><span>Read More</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Blog Wrap -->
                    </div>

                    <div class="theme-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $blogs->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
            <!-- Blog Post End -->
        @endif
        @if ($events->isNotEmpty())
            <!-- Event Alternate Style Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-sm-1">
                        @foreach ($events as $item)
                            <div class="col mb-5">
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
                                                <div><i data-feather="clock"></i>
                                                    {{ date('h:i A', strtotime($item->time)) }}
                                                </div>
                                                <div><i data-feather="map-pin"></i> {{ $item->center }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Event Wrap -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="theme-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $events->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
            <!-- Event Alternate Style Start -->
        @endif

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
                                        <img src="{{ asset($item->logo) }}" alt="" style="height: 100px">
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
