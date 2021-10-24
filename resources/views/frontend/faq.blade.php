@extends('layouts.app')

@section('title', 'FAQS')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Your FAQ’s</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Frequently Asked Questions</li>
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
                        <h1 class="heading-main">
                            <small>Ask Anything WIth Us</small>
                            Frequently Asked Questions
                        </h1>

                        <div class="theme-collapse">
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
                    {{-- <div class="col-lg-4 col-md-5">
                        <div class="faqs-sidebar pos-rel">
                            <div class="bg-overlay blue opacity-80"></div>
                            <form>
                                <h3 class="h3-sm fw-5 txt-white mb-3">Have any Question?</h3>
                                <div class="form-group">
                                    <label for="name"><strong>Full Name</strong></label>
                                    <input type="text" class="form-control form-light" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Email Address</strong></label>
                                    <input type="email" class="form-control form-light" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="msg"><strong>How can help you?</strong></label>
                                    <textarea class="form-control form-light" rows="5" id="msg"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default mt-3">Ask It Now</button>
                            </form>
                        </div>
                    </div> --}}
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
