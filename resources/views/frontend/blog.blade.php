@extends('layouts.app')

@section('title', 'Blogs')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Blogs</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Blog Post Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row">
                    <!-- Blog Wrap -->
                    @foreach ($blogs as $item)
                        <div class="col-md-6 col-lg-4 col-sm-12 mb-0">
                            <div class="post-wrap">
                                <div class="post-img">
                                    <a
                                        href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"><img
                                            src="{{ asset($item->photo) }}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <div class="post-date">{{ date('d M, Y', strtotime($item->date)) }}</div>
                                    <h3 class="post-title"><a
                                            href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}">{{ $item->title }}</a>
                                    </h3>
                                    <div class="text-md-right">
                                        <a href="{{ route('blogs.show', [$item->id, strtolower(str_replace(' ', '-', $item->title))]) }}"
                                            class="read-more-line"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Blog Wrap -->
                </div>

                <div class="theme-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $blogs->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Blog Post End -->

    </main>
@endsection
