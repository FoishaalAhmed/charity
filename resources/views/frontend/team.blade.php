@extends('layouts.app')
@section('title', 'Teams')
@section('content')
    <!--Team Section Two-->
    <br />
    <br />
    <section class="team-section-two">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Team Block Two-->
                @foreach ($teams as $item)
                    <div class="team-block-two col-md-3 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset($item->photo) }}" alt="" />
                                <div class="overlay-box">
                                    <div class="content">
                                        <h3>{{ $item->name }}</h3>
                                        <div class="designation">{{ $item->position }}</div>
                                        <ul class="social-icon-two">
                                            <li><a href="{{ $item->facebook }}"><i class="fab fa-facebook-square"></i></a>
                                            </li>
                                            <li><a href="{{ $item->twitter }}"><i class="fab fa-twitter-square"></i></a>
                                            </li>
                                            <li><a href="{{ $item->instagram }}"><i
                                                        class="fab fa-instagram-square"></i></a></li>
                                            <li><a href="{{ route('teams.detail', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}"><i class="fas fa-info-circle"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--Clients Section-->
    <section class="clients-section" style="background-image:url({{ asset('public/frontend/images/background/1.jpg') }})">
        <div class="auto-container">

            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    @foreach ($partners as $item)
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset($item->logo) }}" alt="" style="width: 250px; height: 130px;"></a></figure>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>
    <!--End Clients Section-->

@endsection
