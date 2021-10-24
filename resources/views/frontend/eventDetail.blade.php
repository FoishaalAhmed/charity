@extends('layouts.app')

@section('title', "$event->title")
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Events Single</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('events') }}">Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
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
                    <small>Help Us Now</small>
                    {{ $event->title }}
                </h1>

                <div class="events-single-img">
                    <img src="{{ asset($event->photo) }}" alt="" style="width: 1100px; height: 520px;">
                </div>
            </div>


            <div class="event-single-wrap">
                <div class="container pos-rel">
                    <div class="row">
                        <div class="col-lg-3 order-lg-last">
                            <div class="event-single-listing pattern-green">
                                <h3>Event Info</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <div><i data-feather="calendar"></i> </div>
                                        <div>{{ date('d M, Y', strtotime($event->date)) }}</div>
                                    </li>
                                    <li>
                                        <div><i data-feather="clock"></i> </div>
                                        <div>{{ date('h:i A', strtotime($event->time)) }}</div>
                                    </li>
                                    <li>
                                        <div><i data-feather="map-pin"></i> </div>
                                        <div>{{ $event->center }}</div>
                                    </li>
                                </ul>
                            </div>

                            <div class="event-single-listing pattern-orange">
                                <h3>Organizer</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <div><i data-feather="user"></i> </div>
                                        <div>Econ International</div>
                                    </li>
                                    <li>
                                        <div><i data-feather="phone"></i> </div>
                                        <div><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="mail"></i> </div>
                                        <div><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="globe"></i> </div>
                                        <div><a href="www.econ.com">www.econ.com</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="event-single-info">
                                <div class="map-wrap">
                                    <iframe src="{{ $event->map }}"></iframe>
                                </div>

                                {!! $event->detail !!}
                            </div>
                        </div>

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
