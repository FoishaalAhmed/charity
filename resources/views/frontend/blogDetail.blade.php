@extends('layouts.app')

@section('title', "$blog->title")
@section('content')
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
                                    <div class="share-line">
                                        <div class="pr-4">
                                            <strong>Share This</strong>
                                        </div>
                                        <div class="pl-4">
                                            <ul class="list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="icofont-facebook"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icofont-twitter"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="icofont-instagram"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icofont-behance"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="icofont-youtube-play"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
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

                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-md-12 mb-0">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5"
                                                placeholder="Your Comments"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-default text-nowrap">Post Comment</button>
                                </div>

                            </form>
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
                                            <a href="donation-page.html" class="btn btn-secondary">Donate Now</a>
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
