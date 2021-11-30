@extends('layouts.app')

@section('title', 'Client references')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Client references</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Client references</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">
        <!-- Testimonials Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main">
                    <small>Our Client references</small> What People Say
                </h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="home-client-testimonials">

                            <!-- Client Testimonials Slider Item -->
                            @foreach ($testimonials as $item)
                                <div class="item">
                                    <div class="client-testimonial">
                                        <i class="charity-quotes"></i>
                                        <div class="client-testimonial-icon pb-5">
                                            <img src="{{ asset($item->photo) }}" alt="">
                                            <div class="text">
                                                <div class="name">{{ $item->name }}</div>
                                                <div class="post">{{ $item->position }}</div>
                                            </div>
                                        </div>

                                        <div class="client-inner-content pb-3">

                                            <p>{!! $item->message !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Client Testimonials Slider Item -->

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
