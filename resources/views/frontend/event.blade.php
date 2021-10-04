@extends('layouts.app')

@section('title', 'Events')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Our Events</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Events</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

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

        <!-- Callout Style Start -->
        <section class="wide-tb-150 bg-scroll bg-img-6 pos-rel callout-style-1">
            <div class="bg-overlay blue opacity-70"></div>
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
                    <div class="col-sm-12">
                        <a href="donation-page.html" class="btn btn-primary">Donate Now</a>
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
