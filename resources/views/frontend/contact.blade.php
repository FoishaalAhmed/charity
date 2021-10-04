@extends('layouts.app')

@section('title', 'Contact')
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Contact Us</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Contact Us Style Start -->
        <section class="wide-tb-100 pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-12">
                        <h1 class="heading-main">
                            <small>Get In Touch</small>
                            Contact With Us
                        </h1>

                        <p>{{ $contact_us->value }}</p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-8 col-md-12 order-lg-last">
                        <div class="contact-wrap">
                            <div class="contact-icon-xl">
                                <i class="charity-love_hearts"></i>
                            </div>
                            <div id="sucessmessage"> </div>
                            <form action="#" method="post" id="contact-form" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Your Email">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="number" name="phone" id="phone" class="form-control"
                                                placeholder="Phone Number">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" name="subject" id="subject" class="form-control"
                                                placeholder="Subject">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-0">
                                        <div class="form-group">
                                            <textarea name="message" id="comment" class="form-control" rows="6"
                                                placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary text-nowrap">Send Message</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4 bg-orange mb-4">
                            <i data-feather="map-pin"></i>
                            <h3>Our Address</h3>
                            <div>{{ $contact->address }}</div>
                        </div>
                        <!-- Icon Boxes Style -->

                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4 bg-green mb-4">
                            <i data-feather="phone"></i>
                            <h3>Phone Number</h3>
                            <div>{{ $contact->phone }}</div>
                        </div>
                        <!-- Icon Boxes Style -->

                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4 bg-gray mb-4">
                            <i data-feather="mail"></i>
                            <h3>Email Address</h3>
                            <div><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
                        </div>
                        <!-- Icon Boxes Style -->
                    </div>

                </div>
            </div>
        </section>

        <section class="wide-tb-100">
            <div class="map-frame">
                <iframe src="{{ $contact->map }}"></iframe>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Callout Section Side Image -->
                    <div class="col-sm-12">
                        <div class="callout-style-side-img d-lg-flex align-items-center top-broken-grid">
                            <div class="img-callout">
                                <img src="{{ asset('public/frontend/assets/images/callout_side_img.jpg') }}" alt="">
                            </div>
                            <div class="text-callout">
                                <div class="d-md-flex align-items-center">

                                    <div class="heading">
                                        <h2>
                                            @if ($donation_text != null)
                                                {{ $donation_text->value }}
                                            @else
                                                {{ 'Let Us Come Together To Make A Difference' }}
                                            @endif
                                        </h2>
                                    </div>
                                    <div class="icon">
                                        <a href="donation-page.html" class="btn btn-default">Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Callout Section Side Image -->
                </div>
            </div>
        </section>
        <!-- Contact Us Style Start -->




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

            $('#contact-form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({

                    url: "{{ route('send.query') }}",
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
                            $('#contact-form')[0].reset();
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
