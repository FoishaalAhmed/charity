@extends('layouts.app')

@section('title', "$page->name")
@section('content')
    <!--Point Section-->
    <section class="point-section">
        <div class="auto-container">
            <div class="container imgg">
                <img src="{{ asset($page->photo) }}" alt="" srcset="" style="width: 100%">
            </div>
            <div class="inner-container">
                <div class="sec-title">
                    <h2>{{ ucwords($page->name) }}</h2>
                </div>
                <div class="text">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
    <!--End Point Section-->
@endsection
