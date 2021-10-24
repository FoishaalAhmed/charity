@extends('layouts.app')

@section('title', "$page->title")
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>{{ $page->title }}</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
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
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="text-center">
                            <img src="{{ asset($page->photo) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <h1 class="heading-main">
                            <small>{{ $page->name }}</small>

                        </h1>

                        <p>{!! $page->content !!}</p>

                        <div class="d-flex">
                            <a class="btn btn-default mr-3" href="{{ route('volunteers.become') }}">Join Now</a>
                            <div class="about-phone">
                                <i data-feather="phone-call"></i>
                                Conatct Us <br> {{ $contact->phone }}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Style Start -->
    </main>
@endsection
