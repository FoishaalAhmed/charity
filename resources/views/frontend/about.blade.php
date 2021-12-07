@extends('layouts.app')

@section('title', 'About Us')
@section('content')
    @if ($about)
        <!--Point Section-->
        <section class="point-section">
            <div class="auto-container">
                <div class="container imgg">
                    <img src="{{ asset($about->photo) }}" alt="" srcset="" style="width: 100%">
                </div>
                <div class="inner-container">
                    <div class="sec-title">
                        <h2>Welcome to Econs</h2>
                    </div>
                    <div class="text">
                        {!! $about->content !!}
                    </div>
                </div>
            </div>
        </section>
        <!--End Point Section-->
    @endif
@endsection
