@extends('layouts.app')

@section('title', 'Testimonial Detail')
@section('content')
    <br /> <br />
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="volunter-single">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <!--Image Column-->
                                <div class="image-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="image">
                                        <img src="{{ asset($testimonial->photo) }}" alt="" />
                                    </div>
                                </div>
                                <div class="content-column col-md-8 col-sm-8 col-xs-12">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <div class="designation">{{ $testimonial->position }}</div>
                                    <div class="text">
                                        {!! $testimonial->message !!}
                                    </div>
                                </div>
                            </div>
                            <!--Volunter Share Options-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Clients Section-->
    <section class="clients-section" style="background-image:url({{ asset('public/frontend/images/background/1.jpg') }})">
        <div class="auto-container">

            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    @foreach ($partners as $item)
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="{{ asset($item->logo) }}" alt=""
                                        style="width: 250px; height: 130px;"></a></figure>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>
    <!--End Clients Section-->
@endsection
