@extends('layouts.app')

@section('title', "$event->title")
@section('content')
    <br />
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Causes Single-->
                <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="causes-single">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset($event->photo) }}" alt="" />
                            </div>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h3>{{ $event->title }}</h3>
                                </div>
                            </div>
                            <div class="text">
                                {!! $event->description !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar default-sidebar">

                        <!--Category Blog-->
                        @if ($serviceCategories->isNotEmpty())
                            <div class="sidebar-widget categories-blog">
                                <div class="sidebar-title">
                                    <h2>Service Categories</h2>
                                </div>
                                <div class="inner-box">
                                    <ul>
                                        @foreach ($serviceCategories as $item)
                                            <li><a
                                                    href="{{ route('causes', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}">{{ $item->name }}
                                                    <span>{{ $item->total }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <!-- Popular Posts -->
                        @if ($causes->isNotEmpty())
                            <div class="sidebar-widget popular-posts">
                                <div class="sidebar-title">
                                    <h2>Update Service</h2>
                                </div>
                                <div class="inner-box">
                                    @foreach ($causes as $item)
                                        <article class="post">
                                            <figure class="post-thumb"><a
                                                    href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                                        src="{{ asset($item->photo) }}" alt=""></a></figure>
                                            <div class="text"><a
                                                    href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </aside>
                </div>

            </div>
        </div>
    </div>

    <!--Clients Section-->
    <section class="clients-section" style="background-image:url(images/background/1.jpg)">
        <div class="auto-container">

            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure>
                    </li>
                </ul>
            </div>

        </div>
    </section>
    <!--End Clients Section-->
@endsection
