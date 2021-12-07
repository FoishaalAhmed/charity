@extends('layouts.app')

@section('title', 'Events')
@section('content')
    <br /> <br />
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="events-list">

                        <!--Event Block Three-->
                        @foreach ($events as $item)
                            <div class="event-block-three">
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="image-column col-md-5 col-sm-4 col-xs-12">
                                            <div class="image">
                                                <img src="{{ asset($item->photo) }}" alt="" />
                                                <a href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"
                                                    class="overlay-box"><span class="icon flaticon-unlink"></span></a>
                                            </div>
                                        </div>
                                        <div class="content-column col-md-7 col-sm-8 col-xs-12">
                                            <div class="inner-column">
                                                <div class="post-info">{{ date('h:i A', strtotime($item->time)) }},
                                                    {{ date('d M, Y', strtotime($item->date)) }} / <span
                                                        class="theme_color">{{ $item->center }}</span></div>
                                                <h3><a
                                                        href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                                </h3>
                                                <div class="text">{!! Str::limit($item->detail, 200) !!}</div>
                                                <div class="btns-box">
                                                    <a href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"
                                                        class="theme-btn btn-style-four">More
                                                        Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--Styled Pagination-->
                        <div class="styled-pagination">
                            {{ $events->links('includes.pagination') }}
                        </div>
                        <!--End Styled Pagination-->

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
                        <div class="sidebar-widget popular-posts">
                            <div class="inner-box">
                                @if ($causes->isNotEmpty())
                                    <div class="sidebar-widget popular-posts">
                                        <div class="sidebar-title">
                                            <h2>Update Services</h2>
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
                            </div>
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </div>


    <!--Clients Section-->
    <section class="clients-section"
        style="background-image:url({{ asset('public/frontend/images/background/1.jpg') }})">
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
