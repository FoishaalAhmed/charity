@extends('layouts.app')

@section('title', 'Econs')

@section('content')
    <!--Main Slider-->
    @if ($sliders)
        <section class="main-slider">

            <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
                <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                    <ul>
                        <li data-description="Slide Description" data-easein="default" data-easeout="default"
                            data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1=""
                            data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                            data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                            data-slotamount="default" data-thumb="{{ asset($sliders[0]->photo) }}"
                            data-title="Slide Title" data-transition="parallaxvertical">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                src="{{ asset($sliders[0]->photo) }}">

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['700','700','600','450']"
                                data-whitespace="normal" data-hoffset="['0','0','0','0']"
                                data-voffset="['-60','-70','-80','-60']" data-x="['right','right','right','right']"
                                data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;text-transform:left;">
                                <h1>{{ $sliders[0]->title_one }}</h1>
                            </div>

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['700','700','600','450']"
                                data-whitespace="normal" data-hoffset="['0','0','0','0']"
                                data-voffset="['50','40','20','20']" data-x="['right','right','right','right']"
                                data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;text-transform:left;">
                                <div class="text">{{ $sliders[0]->title_two }}
                                </div>
                            </div>
                        </li>

                        <li data-description="Slide Description" data-easein="default" data-easeout="default"
                            data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1=""
                            data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                            data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                            data-slotamount="default" data-thumb="{{ asset($sliders[0]->photo) }}"
                            data-title="Slide Title" data-transition="parallaxvertical">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                src="{{ asset($sliders[0]->photo) }}">

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['700','700','600','450']"
                                data-whitespace="normal" data-hoffset="['0','0','0','0']"
                                data-voffset="['-60','-70','-80','-60']" data-x="['right','right','right','right']"
                                data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;text-transform:left;">
                                <h1>{{ $sliders[0]->title_one }}</h1>
                            </div>

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                data-type="text" data-height="none" data-width="['700','700','600','450']"
                                data-whitespace="normal" data-hoffset="['0','0','0','0']"
                                data-voffset="['50','40','20','20']" data-x="['right','right','right','right']"
                                data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                style="z-index: 7; white-space: nowrap;text-transform:left;">
                                <div class="text">{{ $sliders[0]->title_two }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    @endif
    <!--End Main Slider-->

    <!--Services Section-->
    <section class="services-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Services Block-->
                @if ($page1)
                    <div class="services-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="upper-box">
                                <div class="icon-box"><i class="fas fa-history"></i></div>
                                <h3><a href="{{ route('pages', 'history') }}">{{ ucfirst($page1->name) }}</a></h3>
                            </div>
                            <div class="text">{{ Str::limit(strip_tags($page1->content), 70) }}</div>
                            <a href="{{ route('pages', 'history') }}" class="theme-btn btn-style-two">Read More</a>
                        </div>
                    </div>
                @endif

                <!--Services Block-->
                @if ($page2)
                    <div class="services-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="upper-box">
                                <div class="icon-box"><i class="fas fa-eye"></i></div>
                                <h3><a href="{{ route('pages', 'vision') }}">{{ ucfirst($page2->name) }}</a></h3>
                            </div>
                            <div class="text">{{ Str::limit(strip_tags($page2->content), 70) }}</div>
                            <a href="{{ route('pages', 'vision') }}" class="theme-btn btn-style-two">Read More</a>
                        </div>
                    </div>
                @endif

                <!--Services Block-->
                @if ($page3)
                    <div class="services-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="upper-box">
                                <div class="icon-box"><i class="fas fa-bullseye"></i></div>
                                <h3><a href="{{ route('pages', 'mission') }}">{{ ucfirst($page3->name) }}</a></h3>
                            </div>
                            <div class="text">{{ Str::limit(strip_tags($page3->content), 70) }}</div>
                            <a href="{{ route('pages', 'mission') }}" class="theme-btn btn-style-two">Read More</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!--End Services Section-->

    <!--Welcome Section-->
    @if ($page4)
        <section class="welcome-section no-padd-top">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>Welcome to Econs</h2>
                </div>
                <div class="row clearfix">
                    <!--Video Column-->
                    <div class="video-column col-md-6 col-sm-12 col-xs-12">
                        <!--Video Box-->
                        <div class="video-box">
                            <figure class="image">
                                <img src="{{ asset($page4->photo) }}" alt="">
                            </figure>
                        </div>
                    </div>
                    <!--Content Column-->
                    <div class="content-column col-md-6 col-sm-12 col-xs-12">
                        <div class="inner-column">
                            <div class="text">
                                {{ Str::limit(strip_tags($page4->content),535
                                ) }}
                            </div>
                            <a href="{{ route('about') }}" class="theme-btn btn-style-three">Read More About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--End Welcome Section-->
@endsection
