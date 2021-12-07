@extends('layouts.app')

@section('title', 'Client references')
@section('content')
    <!--Testimonial Page Section-->
    <section class="testimonial-page-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Testimonial Block Two-->
                @foreach ($testimonials as $item)
                    <div class="testimonial-block-two col-md-6 col-sm-12 col-xs-12">
                        <div class="inner-box">
                            <div class="content">
                                <div class="text"><span
                                        class="left-icon la la-quote-left"></span>{!! $item->message !!}<span
                                        class="right-icon la la-quote-right"></span></div>
                                <h3>{{ $item->name }}</h3>
                                <div class="designation">{{ $item->position }}</div>
                            </div>
                            <div class="image">
                                <img src="{{ asset($item->photo) }}" alt="" />
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--Styled Pagination-->
                <div class="styled-pagination">
                    {{ $testimonials->links('includes.pagination') }}
                </div>
                <!--End Styled Pagination-->
            </div>
        </div>
    </section>
    <!--End Team Section-->

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
