@extends('layouts.app')

@section('title', 'Contact')
@section('content')

    <br /> <br />

    <!--Contact Info Section-->
    <section class="info-contact-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Info Column-->
                <div class="info-column col-md-4 col-sm-6 col-xs-12">
                    <div class="inner">
                        <div class="icon-box">
                            <span class="icon flaticon-world"></span>
                        </div>
                        <h3>Address</h3>
                        <div class="text">{{ $contact->address }}</div>
                    </div>
                </div>

                <!--Info Column-->
                <div class="info-column col-md-4 col-sm-6 col-xs-12">
                    <div class="inner">
                        <div class="icon-box">
                            <span class="icon flaticon-technology-1"></span>
                        </div>
                        <h3>Phone</h3>
                        <div class="text">{{ $contact->phone }}</div>
                    </div>
                </div>

                <!--Info Column-->
                <div class="info-column col-md-4 col-sm-6 col-xs-12">
                    <div class="inner">
                        <div class="icon-box">
                            <span class="icon flaticon-symbol"></span>
                        </div>
                        <h3>Email</h3>
                        <div class="text">{{ $contact->email }}</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Contact Info Section-->

    <!--Contact Form Section-->
    <div class="contact-form-section">
        <div class="auto-container">
            <h2>Get in Touch</h2>
            <div class="text">if you want to get more info, ping us now.</div>

            <!--Contact Form-->
            <div class="contact-form">
                <div id="sucessmessage"> </div>
                <form method="post" action="http://html.efforttech.com/html/charitypoint/sendemail.php" id="contact-form">
                    @csrf
                    <div class="row clearfix">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" id="name" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input type="text" name="phone" id="phone" placeholder="Subject" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input type="text" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea name="message" id="comment" placeholder="Message"></textarea>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" class="theme-btn btn-style-two">Send Now</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

    <!--Map Section-->
    <section class="map-section">
        <!--Map Outer-->
        <div class="map-outer">
            <!--Map Canvas-->
            <div class="map-canvas" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap"
                data-hue="#ffc400" data-title="Envato" data-icon-path="images/icons/map-marker.png"
                data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
            </div>
        </div>
    </section>
    <!--End Map Section-->

    <!--Clients Section-->
    <section class="clients-section" style="background-image:url({{ asset('public/frontend/images/background/1.jpg') }})">
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
