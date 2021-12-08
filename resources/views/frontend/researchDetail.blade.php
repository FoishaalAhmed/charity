@extends('layouts.app')

@section('title', "$research->title")
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
                                <img src="{{ asset($research->photo) }}" alt="" />
                            </div>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h3>{{ $research->title }}</h3>
                                </div>
                            </div>
                            <div class="text">
                                {!! $research->detail !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar default-sidebar">

                        <!-- Popular Posts -->
                        @if ($researchTeams->isNotEmpty())
                            <div class="sidebar-widget popular-posts">
                                <div class="sidebar-title">
                                    <h2>Researcher</h2>
                                </div>
                                <div class="inner-box">
                                    @foreach ($researchTeams as $item)
                                        <article class="post">
                                            <figure class="post-thumb"><a
                                                    href="{{ route('research.researcher', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}"><img
                                                        src="{{ asset($item->photo) }}" alt=""></a></figure>
                                            <div class="text">
                                                <a
                                                    href="{{ route('research.researcher', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}">{{ $item->name }}</a>
                                                <a
                                                    href="{{ route('research.researcher', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}">{{ $item->position }}</a>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($partnerResearches->isNotEmpty())
                            <div class="sidebar-widget popular-posts">
                                <div class="sidebar-title">
                                    <h2>Partner</h2>
                                </div>
                                <div class="inner-box">
                                    @foreach ($partnerResearches as $item)
                                        <article class="post">
                                            <figure class="post-thumb"><a
                                                    href="{{ route('research.partner', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}"><img
                                                        src="{{ asset($item->logo) }}" alt=""></a></figure>
                                            <div class="text">
                                                <a
                                                    href="{{ route('research.partner', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}">{{ $item->name }}</a>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($publications->isNotEmpty())
                            <div class="sidebar-widget popular-posts">
                                <div class="sidebar-title">
                                    <h2>Publication</h2>
                                </div>
                                <div class="inner-box">
                                    @foreach ($publications as $item)
                                        <article class="post">
                                            <figure class="post-thumb"><a
                                                    href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                                        src="{{ asset($item->photo) }}" alt=""></a></figure>
                                            <div class="text">
                                                <a
                                                    href="{{ route('events.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
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
