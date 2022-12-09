@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | Contact</title>
@endsection

@section('content')

<!-- Banner Section -->
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{asset('frontend/images/background/banner-image-4.jpg')}});">
    </div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Stay Touch with SyTanbir</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--Contact Section-->
<section class="contact-section-two">
    <div class="auto-container clearfix">
        <div class="row clearfix">

            <div class="info-col col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="u-text">Lorem ipsum dolor sit consectetur adipisicing elit sed do eiusmod tempor
                        incididunt labore dolore.</div>

                    <div class="info">
                        <div class="info-block">
                            <div class="block-inner">
                                <div class="icon-box wow zoomInStable" data-wow-delay="0ms" data-wow-duration="2000ms">
                                    <i class="fa-solid fa-address-book"></i>
                                </div>
                                <h4>Address</h4>
                                <div class="text">Memari, Bardhaman, West Bengal 713146</div>
                            </div>
                        </div>
                        <div class="info-block">
                            <div class="block-inner">
                                <div class="icon-box wow zoomInStable" data-wow-delay="300ms"
                                    data-wow-duration="2000ms"><i class="fa-solid fa-phone"></i></div>
                                <h4>Phone Number</h4>
                                <div class="text">
                                    <a href="tel:(+91) 9474910681">(+91) 9474910681</a>

                                </div>
                            </div>
                        </div>
                        <div class="info-block">
                            <div class="block-inner">
                                <div class="icon-box wow zoomInStable" data-wow-delay="600ms"
                                    data-wow-duration="2000ms"><i class="fa-solid fa-envelope"></i></div>
                                <h4>Email Address</h4>
                                <div class="text">
                                    <a href="mailto:sytanbir1316@gmail.com">sytanbir1316@gmail.com</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-col col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="form-box default-form contact-form-two wow fadeInRight" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <h3>Have Any Question?</h3>
                        <div class="text">Please complete the details below and then click on Submit and we’ll be in
                            contact</div>
                        <form method="post" action="{{route('submitContactUs')}}" id="contact-form">
                            @csrf
                            <div class="form-group">
                                <div class="field-inner">
                                    <input type="text" name="fastname" value="" placeholder="First name" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field-inner">
                                    <input type="text" name="lastname" value="" placeholder="Last name" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field-inner">
                                    <input type="email" name="email" value="" placeholder="Email" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field-inner">
                                    <input type="text" name="phone" value="" placeholder="Phone" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field-inner">
                                    <textarea name="message" placeholder="Message" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="theme-btn btn-style-one"><span
                                        class="btn-title custom">Send
                                        Message</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!--Map Section-->
<div class="map-section">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29451.529305934993!2d88.27289511202355!3d22.674615398326935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f883136af99429%3A0x163626908f6682f7!2sDankuni%20Housing!5e0!3m2!1sen!2sin!4v1660466522001!5m2!1sen!2sin"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>


@endsection


@section('js')
<!--Google Map-->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHJe2MPH8B-gLzZu5QI0Alc73nvkLuuqQ"></script>
<script src="{{asset('frontend/js/map-script.js')}}"></script>
<script src="{{asset('frontend/js/indexpage.js')}}"></script> --}}
<!-- <script src="js/indexpage.js"></script> -->


@endsection