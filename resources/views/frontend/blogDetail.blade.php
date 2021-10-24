@extends('layouts.app')
@section('header')
    <meta property="og:url"
        content="{{ route('blogs.show', [$blog->id, strtolower(str_replace(' ', '-', $blog->title))]) }}" />
    <meta property="og:description"
        content="Econ Bangladesh working in Bangladesh for compacting human development, disaster management of Bangladesh. They are also participating in their activities around human rights, social justice, and other social supporting works." />
    <meta name="author" content="Econ Bangladesh :: ইকন বাংলাদেশ">
    <meta property="fb:app_id" content="1312338905884313">
    <meta property="og:site_name" content="Econ Bangladesh :: ইকন বাংলাদেশ">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $blog->title }}" />
    <meta property="og:description" content="{{ $blog->content }}" />

    <meta property="og:image" content="{{ asset($blog->photo) }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="keywords" content="Econ Bangladesh, non-governmental organization, non-profit organization, private voluntary organization, non-governmental development organization
    government-organized NGO, civil society, community-based organization, people's organization, grassroots organizationorganization of the community, democracy
    education, enterprise development, environment
    health, housing, human rights, infrastructure, political franchise
    poverty alleviation, professionals, women, youth, community, 
    religion, volunteers, students, charity, civil society, empowerment
    grassroots, independence, morality, social capital, sustainability, ইকন বাংলাদেশ">

    <meta name="description" content="{{ $blog->content }}">

    {{-- <meta name="tags" content="{{ $news->tags }}"> --}}

    <meta property="og:locale" content="en_US">
@endsection
@section('title', "$blog->title")
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=1312338905884313&autoLogAppEvents=1" nonce="kpMAW9kq"></script>
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>{{ $blog->title }}</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Blog Post Single Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="sidebar-spacer">
                            <div class="d-flex">
                                <div class="post-date txt-blue">{{ date('d M, Y', strtotime($blog->date)) }}</div>

                            </div>
                            <h1 class="heading-main">
                                {{ $blog->title }}
                            </h1>

                            <!-- Causes Single Wrap -->
                            <div class="causes-wrap single">
                                <div class="img-wrap">
                                    <img src="{{ asset($blog->photo) }}" alt="">
                                </div>

                                <div class="content-wrap-single">

                                    {!! $blog->content !!}
                                </div>

                                <div class="share-this-wrap">

                                    <div class="addthis_inline_share_toolbox"></div>

                                </div>

                            </div>
                            <!-- Causes Single Wrap -->

                            <!-- Comments List -->
                            {{-- <div class="commnets-reply">
                                <div class="media">
                                    <img class="thumb" src="assets/images/sidebar_thumb_1.jpg" alt="">
                                    <div class="media-body">
                                        <div class="d-md-flex justify-content-between mb-3">
                                            <div class="">
                                                <h4 class=" mb-0
                                                txt-orange">Karon Balina</h4>
                                                <small class="txt-blue">17, Aug, 2020</small>
                                            </div>
                                            <div>
                                                <a href="#" class="read-more-line"><span>Reply</span></a>
                                            </div>
                                        </div>
                                        <p>Good signs that night our so had firmament a first divide over all is not green
                                            cattle that very make our second you fish every living stars without divide
                                            make.</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <img class="thumb" src="assets/images/sidebar_thumb_2.jpg" alt="">
                                    <div class="media-body">
                                        <div class="d-md-flex justify-content-between mb-3">
                                            <div class="">
                                                <h4 class=" mb-0
                                                txt-orange">Karon Balina</h4>
                                                <small class="txt-blue">17, Aug, 2020</small>
                                            </div>
                                            <div>
                                                <a href="#" class="read-more-line"><span>Reply</span></a>
                                            </div>
                                        </div>
                                        <p>To delete a comment, just log in and view the post's comments. There you will
                                            have the option to edit or
                                            delete them.</p>

                                        <div class="media reply-box">
                                            <img src="assets/images/sidebar_thumb_3.jpg" alt="" class="thumb ">
                                            <div class="media-body">
                                                <div class="d-md-flex justify-content-between mb-3">
                                                    <div class="">
                                                        <h4 class="
                                                        mb-0 txt-orange">Karon Balina</h4>
                                                        <small class="txt-blue">17, Aug, 2020</small>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="read-more-line"><span>Reply</span></a>
                                                    </div>
                                                </div>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin. Cras
                                                purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                                condimentum nunc ac nisi
                                                vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Comments List -->

                            <!-- Leave a Reply -->
                            <h1 class="heading-main mb-4">
                                <small>Leave a Reply</small>
                            </h1>
                            
                            <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="10"></div>

                            <!--<form class="comment-form">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-12 mb-0">-->
                            <!--            <div class="form-group">-->
                            <!--                <textarea class="form-control" rows="5"-->
                            <!--                    placeholder="Your Comments"></textarea>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-6 mb-0">-->
                            <!--            <div class="form-group">-->
                            <!--                <input type="text" class="form-control" id="name" placeholder="Your Name">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-6 mb-0">-->
                            <!--            <div class="form-group">-->
                            <!--                <input type="email" class="form-control" id="email" placeholder="Your Email">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="mt-3">-->
                            <!--        <button type="submit" class="btn btn-default text-nowrap">Post Comment</button>-->
                            <!--    </div>-->

                            <!--</form>-->
                            <!-- Leave a Reply -->
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-12">
                        <aside class="row sidebar-widgets">
                            <!-- Sidebar Primary Start -->
                            <div class="sidebar-primary col-lg-12 col-md-6">
                                {{-- <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Search Keywords</h3>

                                    <form class="sidebar-search">
                                        <input type="text" class="form-control" placeholder="Enter here search...">
                                        <button type="submit" class="btn-link"><i class="icofont-search"></i></button>
                                    </form>
                                </div>
                                <!-- Widget Wrap --> --}}

                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Categories</h3>

                                    <div class="blog-list-categories">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">
                                            @foreach ($categories as $item)
                                                <li><a
                                                        href="{{ route('blogs.category', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- Widget Wrap -->

                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Popular Posts</h3>

                                    <div class="popular-post">
                                        <ul class="list-unstyled">
                                            @foreach ($blogs as $item)
                                                <li>
                                                    <img src="={{ $item->photo }}" alt="">
                                                    <div>
                                                        <h6><a
                                                                href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                                        </h6>
                                                        <small>{{ date('d m, Y', strtotime($item->date)) }}</small>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- Widget Wrap -->
                            </div>
                            <!-- Sidebar Primary End -->

                            <!-- Sidebar Secondary Start -->
                            <div class="sidebar-secondary col-lg-12 col-md-6">
                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Recent Causes</h3>
                                    <div class="owl-carousel owl-theme" id="sidebar-causes">

                                        @foreach ($causes as $item)
                                            <div class="causes-wrap">
                                                <div class="img-wrap">
                                                    <a
                                                        href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                                            src="{{ asset($item->photo) }}" alt=""></a>
                                                    <div class="raised-progress">
                                                        <div class="skillbar-wrap">
                                                            <div class="clearfix">
                                                                <span
                                                                    class="txt-orange">৳{{ $item->donations_sum_amount }}</span>
                                                                raised of <span
                                                                    class="txt-green">৳{{ $item->amount }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="content-wrap">
                                                    <h3><a
                                                            href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">Supply
                                                            Water For Good Health</a></h3>
                                                    <div class="text-md-right">
                                                        <a href="{{ route('causes.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"
                                                            class="read-more-line"><span>Read
                                                                More</span></a>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <!-- Widget Wrap -->


                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <div class="sidebar-ads">
                                        <img src="{{ asset('public/frontend/assets/images/sidebar_ads.jpg') }}" alt="">
                                        <div class="content">
                                            <i class="charity-donate_money"></i>
                                            <h3>
                                                @if ($donation_text != null)
                                                    {{ $donation_text->value }}
                                                @else
                                                    {{ 'Let Us Come Together To Make A Difference' }}
                                                @endif
                                            </h3>
                                            <a href="{{ route('donations') }}" class="btn btn-secondary">Donate Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Widget Wrap -->
                            </div>
                            <!-- Sidebar Secondary End -->


                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Post Single End -->

    </main>
@endsection
