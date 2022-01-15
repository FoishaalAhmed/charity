@extends('layouts.app')

@section('title', 'Client references')
@section('content')
    <br /> <br />
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
                                        class="left-icon la la-quote-left"></span>{{ Str::limit(strip_tags($item->message), 70) }}<span
                                        class="right-icon la la-quote-right"></span></div>
                                <h3>{{ $item->name }}</h3>
                                <div class="designation">{{ $item->position }}</div>
                                <div class="designation">
                                    <a href="{{ route('references.show', [$item->id, strtolower(str_replace(' ', '-', $item->name))]) }}" class="theme-btn btn-style-two">Detail</a>
                                </div>
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
