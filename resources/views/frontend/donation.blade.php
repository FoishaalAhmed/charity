@extends('layouts.app')

@section('title', 'Donation')
@section('content')
    <!--Donate Section-->
    <section class="donate-now">
        <div class="auto-container">
            <div class="default-form">
                @include('includes.error')
                @if (session()->has('message'))
                    <div class="alert alert-success"> {{ session('message') }} </div>
                @endif
                <form method="post" action="{{ route('donations.store') }}">
                    @csrf
                    <div class="row clearfix">

                        <!--Left Column-->
                        <div class="left-column col-md-6 col-sm-12 col-xs-12">
                            <div class="default-title">
                                <h3>DONATION DETAILS</h3>
                            </div>
                            <div class="row clearfix">

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">How much would you like to donate?</div>
                                    <div class="select-amount clearfix">
                                        <div class="select-box"><input type="radio" name="amount" id="radio-one"><label
                                                for="radio-one">$10</label></div>
                                        <div class="select-box"><input type="radio" name="amount" id="radio-two"><label
                                                for="radio-two">$20</label></div>
                                        <div class="select-box"><input type="radio" name="amount" id="radio-three"
                                                checked><label for="radio-three">$50</label></div>
                                        <div class="select-box"><input type="radio" name="amount" id="radio-four"><label
                                                for="radio-four">$100</label></div>
                                        <div class="input-box"><input type="text" name="custom_amount" value=""
                                                placeholder="Enter Your Amount"></div>
                                    </div>
                                </div>

                                {{-- <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Would you like to make a regular donation?</div>
                                    <select class="custom-select-box">
                                        <option>One Time</option>
                                        <option>Two Times</option>
                                        <option>Three Times</option>
                                        <option>Four Times</option>
                                        <option>Five Times</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Card Number</div>
                                    <input type="text" name="field-name" value="" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">MM/YY</div>
                                    <input type="text" name="field-name" value="" placeholder="" required>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">CVC</div>
                                    <input type="text" name="field-name" value="" placeholder="" required>
                                </div> --}}

                            </div>

                        </div>

                        <!--Right Column-->
                        <div class="right-column col-md-6 col-sm-12 col-xs-12">
                            <div class="default-title">
                                <h3>DONOR DETAILS</h3>
                            </div>
                            <div class="row clearfix">

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">First Name *</div>
                                    <input type="text" name="first_name" value="" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Last Name</div>
                                    <input type="text" name="last_name" value="" placeholder="">
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email *</div>
                                    <input type="email" name="email" value="" placeholder="" required>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Zip</div>
                                    <input type="text" name="zip" value="" placeholder="">
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="theme-btn btn-style-one">Submit Donation</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </section>
    <!--End Donate Section-->

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
