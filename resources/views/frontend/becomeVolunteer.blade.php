@extends('layouts.app')

@section('title', 'Become A Volunteer')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Join As Volunteer</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Join As Volunteer</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Joining Process Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="text-center">
                            <img src="{{ asset('public/frontend/assets/images/about_img.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <h1 class="heading-main">
                            <small>Joining Process</small>
                            Requirements For A Volunteer
                        </h1>

                        {!! $volunteer->content !!}

                        <div class="d-flex">
                            <a class="nav-link btn btn-default mr-3" href="#">Join Now</a>
                            <div class="about-phone">
                                <i data-feather="phone-call"></i>
                                Conatct Us <br> {{ $contact->phone }}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- Joining Process End -->

        <!-- Faq's Style Start -->
        <section class="wide-tb-100 map-bg bg-navy-blue pt-0">
            <div class="container">
                <div class="pos-rel become-volunteers bg-orange">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-6 col-md-12">
                            <div class="inner-form">
                                <h1 class="heading-main light-mode">
                                    <small>Become A Volunteer</small>
                                    <div id="sucessmessage"> </div>
                                </h1>
                                <div class="form">
                                    <form action="{{ route('became.volunteer') }}" method="POST" id="volunteer-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="fullname"><strong>Full Name</strong></label>
                                            <input type="text" class="form-control form-light" id="fullname" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"><strong>Email Address</strong></label>
                                            <input type="email" class="form-control form-light" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone"><strong>Phone Number</strong></label>
                                            <input type="tel" class="form-control form-light" id="phone" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="refrence"><strong>Refrence Contact</strong></label>
                                            <input type="tel" class="form-control form-light" id="refrence"
                                                name="reference">
                                        </div>
                                        <div class="form-group">
                                            <label for="msg"><strong>Your Comments</strong></label>
                                            <textarea class="form-control form-light" rows="5" id="msg"
                                                name="comment"></textarea>
                                            <input type="hidden" class="form-control form-light" id="status" name="status"
                                                value="0">
                                        </div>
                                        <button type="submit" class="btn btn-outline-light mt-3">Send Request</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-lg-6 col-md-12 volunteers-img-bg">

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h1 class="heading-main light-mode">
                                <small>Help Other People</small>
                                @if ($help != null)
                                    {{ $help->value }}
                                @else
                                    {{ 'We Dream to Create A Bright Future Of The Underprivileged Children' }}
                                @endif
                            </h1>
                        </div>
                        <div class="col-sm-12 text-md-right">
                            <a href="{{ route('donations') }}" class="btn btn-primary">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Faq's Style End -->

        <!-- Our Partners Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h1 class="heading-main">
                            <small>Global Providers</small>
                            Our World Wide Partner
                        </h1>
                    </div>
                    <div class="col-sm-12">
                        <div class="owl-carousel owl-theme" id="home-clients">

                            <!-- Client Logo -->
                            @foreach ($partners as $item)
                                <div class="item">
                                    <div class="clients-logo">
                                        <img src="{{ asset($item->logo) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                            <!-- Client Logo -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Partners End -->


    </main>
@endsection

@section('footer')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            });

            $('#volunteer-form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({

                    url: "{{ route('became.volunteer') }}",
                    method: 'POST',
                    data: formData,
                    dataType: 'json',

                    success: function(data) {
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[
                                    count] + '</div>';
                            }

                            $('#sucessmessage').html(error_html);
                        } else {

                            $('#sucessmessage').html(data.success);
                            $('#volunteer-form')[0].reset();
                        }

                    },

                    error: function(error) {

                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
