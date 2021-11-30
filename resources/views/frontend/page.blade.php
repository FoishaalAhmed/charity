@extends('layouts.app')

@section('title', "$page->name")
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>{{ $page->name }}</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">
            <!-- About Us Style Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="text-center">

                                <img src="{{ asset($page->photo) }}" alt="" style="width: 1110px">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <h1 class="heading-main">
                                {{ ucwords($page->name) }}
                            </h1>

                            <p>{!! $page->content !!}</p>
                        </div>
                    </div>
                </div>
            </section>
        <!-- About Us Style Start -->
    </main>
@endsection
