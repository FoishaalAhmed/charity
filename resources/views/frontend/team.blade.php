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
    <!-- Main Body Content Start -->
    <main id="body-content">
        <!-- About Us Style Start -->
        <div class="container">
            <h1 class="heading-main">
                <!-- my work start -->
                <section class="">
                    <div class="container">
                        <div class="ourteam">
                            <i class=" fas fa-user-friends text-dark"></i>
                            <h1>OUR EXPERT VOLUNTEER</h1>
                            <h4>T E A M &nbsp; M E M B E R</h4>
                        </div>
                    </div>
                </section>
                <!--    my card design -->
                <!--EXPERT VOLUNTEER  card start-->
                <section>
                    <div class="carddesign  mt-5 ">
                        <hr class="hrrclass">
                    </div>
                    <div class="row mt-5">
                        @foreach ($teams as $item)
                            <div class="col-lg-3 ">
                                <div class="card  text-light ">
                                    <img class="card-img-top " src="{{ asset($item->photo) }}" alt="image">
                                    <div class="card-body">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <h5>{{ $item->name }}</h5>
                                    <h6>{{ $item->position }}</h6>
                                </div>
                                <div class="card-text2">
                                    <h6> {!! $item->detail !!}
                                    </h6>
                                    <div id="demo{{ $item->id }}" class="collapse">
                                        <h6>{!! $item->more_detail !!}
                                        </h6>
                                    </div>
                                    <a href="#demo{{ $item->id }}" data-toggle="collapse"
                                        style="font-size: 0.8rem;color:#D59B2D;" ;>Read More..</a>
                                </div>
                                <div class="card-icon">
                                    <a href="{{ $item->facebook }}"> <i class="fab fa-facebook-f "></i>&nbsp;</a>&nbsp;
                                    <a href="{{ $item->twitter }}"> <i
                                            class="far fa-twitter "></i>&nbsp;</i>&nbsp;</a>&nbsp;
                                    <a href="{{ $item->instagram }}"> <i
                                            class="fab fa-instagram "></i></i>&nbsp;</a>&nbsp;
                                </div>
                                <!-- 2n EXPERT VOLUNTEER -->
                            </div>
                        @endforeach
                    </div>
                </section>
        </div>
        <!-- card end-->
        <!-- my work adviser start -->
        {{-- <section>
            <section class="fu">
                <section id="future" class="text-center">
                    <div class="container">
                        <div class="text">
                            <i class="adviser-icon fas fa-award"></i>
                            <h4>ECONS ADVISER</h4>
                            <p>Y O U &nbsp; W I L L&nbsp; B E &nbsp; M O V I N G&nbsp; I N&nbsp; T H E&nbsp; R I G H
                                T&nbsp; D I R E C T I O N &nbsp;W I T H&nbsp; T H E M</p>
                        </div>
                        <!-- col-1 -->
                        <div class="row">
                            <div class="col-lg-3 d-block d-lg-flex">
                                <div class="features-coll ">
                                </div>
                            </div>
                            <!-- col-2 -->
                            @foreach ($advisors as $item)
                                
                            
                            <div class="col-lg-3 d-block d-lg-flex">
                                <div class="features-coll ">
                                    <div class=" mb-6 m-lg-0">
                                        <img class=" card-img-top "
                                            src="{{ asset($item->photo) }}"
                                            alt=" ">
                                        <div class="card-textt">
                                            <h5>{{ $item->name }}</h5>
                                            <h6>ADVISER</h6>
                                        </div>
                                        <div class="card-text22 text-left text-dark">
                                            <h6>{!! $item->detail !!} </h6>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- col-3 -->
                            <!-- col-4 -->
                            <div class="col-lg-3 d-block d-lg-flex">
                                <div class="features-col1">
                                </div>
                            </div>
                        </div>
                        <!--col end-->
                    </div>
                    </div>
                    </div>
                    </div>
                </section>
            </section>
        </section> --}}

        <section>
            <section class="fu">
                <section id="future" class="text-center">
                    <div class="container">
                        <div class="text">
                            <i class="adviser-icon fas fa-award"></i>
                            <h4>OUR ADVISER</h4>
                            <p>Y O U &nbsp; W I L L&nbsp; B E &nbsp; M O V I N G&nbsp; I N&nbsp; T H E&nbsp; R I G H
                                T&nbsp; D I R E C T I O N &nbsp;W I T H&nbsp; T H E M</p>
                        </div>
                        <!-- col-1 -->
                        <div class="row">
                            <div class="col-lg-3 d-block d-lg-flex">
                                <div class="features-coll ">
                                </div>
                            </div>
                            <!-- col-2 -->
                            @foreach ($advisors as $item)
                                <div class="col-lg-3 d-block d-lg-flex">
                                    <div class="features-coll ">
                                        <div class=" mb-6 m-lg-0">
                                            <img class=" card-img-top " src="{{ asset($item->photo) }}" alt=" ">
                                            <div class="card-textt">
                                                <h5>{{ $item->name }}</h5>
                                                <h6>ADVISER</h6>
                                            </div>
                                            <div class="card-text22 text-left text-dark" style="line-height: .5">
                                                @php
                                                    $details = $item->details->toArray();
                                                    $firstFive = array_slice($details, 0, 5);
                                                    $rest = array_slice($details, 5);
                                                @endphp
                                                @foreach ($firstFive as $value)
                                                    <p>→ {{ $value['detail'] }}
                                                    </p>
                                                @endforeach
                                                <div id="demo<?= $item->id ?>" class="collapse ">
                                                    @foreach ($rest as  $value2)
                                                        <p>→ {{ $value2['detail'] }} </p>
                                                    @endforeach
                                                </div>
                                                <a href="#demo<?= $item->id ?>" data-toggle="collapse"
                                                    style="font-size: 0.8rem;color:white " ;>Read More..</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- col-3 -->
                            <div class="col-lg-3 d-block d-lg-flex">
                                <div class="features-col1">
                                </div>
                            </div>
                        </div>
                        <!--col end-->
                    </div>
                    </div>
                    </div>
                    </div>
                </section>
            </section>
        </section>
        <!-- my work adviser end -->
        <!--  my work expert start -->
        <section>
            <section class="work text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <i class="expert-icon fas fa-award"></i>
                        <h1>EXTERNAL EXPERT POOL</h1>
                        <h6> E N C O U R A G I N G &nbsp; P A S S I O N ,&nbsp; I N S P I R I N G &nbsp; I N N O V A T I O N
                        </h6>
                        <div class="container workss">
                            <h4>{{ $expert_text->value }}
                            </h4>
                        </div>
                        <!--  <button class="btn btn-lg btn-success mr-3 " onclick="window.open('https:')" class="request-callback">Get stand now</button> -->
                    </div>
                </div>
            </section>
        </section>
        <!--  my work expert end -->
        <!-- my work extra adviser panel start -->
        <section>
            <section class="extra-advisor">
                <section id="future" class="text-center">
                    <div class="container">
                        <!-- col-1 -->
                        <div class="row">
                            @foreach ($experts as $item)
                                <div class="col-lg-6 d-block d-lg-flex">
                                    <div class="features-col  ">
                                        <div class=" mb-6 m-lg-0">
                                            <!--  <img class=" card-img-top " src="" alt=" "> -->
                                            <div class="card-textt2 ">
                                                <h5>{{ $item->name }}</h5>
                                                <h6 style="color:#363B3E;">{{ $item->position }}</h6>
                                            </div>
                                            <div class="card-text22 text-left text-dark">
                                                <h6 style="color:#363B3E;">
                                                    <span
                                                        style="font-weight:bolder;font-size: 0.4ream; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                                                        Education :</span>
                                                    {!! $item->education !!}
                                                    <span style="font-weight:bolder;"> Areas of Expertise :</span>
                                                    {!! $item->area !!}
                                                </h6>
                                            </div>
                                            <a href=" # " class=" stretched-link "></a>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                    </div>
                </section>
            </section>
        </section>
        <!-- my work extra adviser panel end -->
        <!-- my work end -->
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
                            <div class="counter-txt"><span class="counter">{{ $volunteerCount }}</span>+
                            </div>
                            <div>Dedicated Teams</div>
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
                            <small>Global Providers</small> Our World Wide Partner
                        </h1>
                    </div>
                    <div class="col-sm-12">
                        <div class="owl-carousel owl-theme" id="home-clients">
                            <!-- Client Logo -->
                            @foreach ($partners as $item)
                                <div class="item">
                                    <div class="clients-logo">
                                        <img src="{{ asset($item->logo) }}" alt="" style="width: 165px; height: 135px;">
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
