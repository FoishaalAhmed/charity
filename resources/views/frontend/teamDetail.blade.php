@extends('layouts.app')

@section('title', 'Team Detail')
@section('content')
    
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
                <!--Content Side / Causes Single-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="causes-single">
                    	<div class="inner-box">
                            <div class="image">
                            	<img src="{{ asset($team->photo) }}" alt="" />
                            </div>
                            <div class="clearfix">
                            	<div class="pull-left">
                                	<h3>Cause Description</h3>
                                </div>
                                <div class="pull-right collect-box">
                                	<div class="collection">We need to collect <span class="theme_color">8,600,00</span></div>
                                </div>
                            </div>
                            <div class="text">
                            	<p>Het standaard stuk van Lorum Ipsum wat sinds de 16e eeuw wordt gebruikt is hieronder, voor wie er interesse in heeft, weergegeven. Secties 1.10.32 en 1.10.33 van "de Finibus Bonorum et Malorum" door Cicero zijn ook weergegeven in hun exacte originele vorm, vergezeld van engelse versies van de 1914 vertaling door H. Rackham.</p>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                            </div>
                            <div class="two-column">
                            	<div class="row clearfix">
                                    <div class="image-column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="image">
                                            <img src="images/resource/causes-1.jpg" alt=""/>
                                        </div>
                                    </div>
                                    <div class="content-column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <h3>Cause Some importent point </h3>
                                        <ul class="list-style-four">
                                        	<li>100 volunteers needed for this charity activity.</li>
                                            <li>We aggregate in the city center at 8:00 pm.</li>
                                            <li>Everyone will get items a to start to 2 directions.</li>
                                            <li>We will go to the place where homeless usually stay.</li>
                                            <li>Every group has a leader and a secretary to note for help from nonprofits organization or NGOs.</li>
                                        </ul>
                                        <div class="note"><span>NOTE:</span> Everyone ensure safety and punctuality.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comment Form -->
                    <div class="comment-form">
                        <div class="group-title"><h2>Leave Your Comments</h2></div>
                        <!--Comment Form-->
                        <form method="post" action="http://html.efforttech.com/html/charitypoint/blog.html">
                            <div class="row clearfix">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="username" placeholder="Name" required>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                    <textarea name="message" placeholder="Your Comments"></textarea>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group text-right">
                                    <button class="theme-btn btn-style-two" type="submit" name="submit-form">Post Comment</button>
                                </div>
                                
                            </div>
                        </form>
                            
                    </div>
                    <!--End Comment Form --> 
                    
                </div>
            </div>
        </div>
    </div>
@endsection
