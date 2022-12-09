@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | About</title>
@endsection

@section('content')
<!-- Banner Section -->
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{asset('frontend/images/background/banner-image-1.jpg')}});">
    </div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>About Us</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--Featured Section-->
<section class="featured-section-four about-page">
    <span class="dotted-pattern dotted-pattern-11"></span>
    <div class="circles-two">
        <div class="c-1"></div>
        <div class="c-2"></div>
    </div>
    <div class="auto-container">
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <h2>Know <br>About Us</h2>
                        <h6>Today we are the worlds largest Celebrity Information portal</h6>
                    </div>
                    <div class="text">Today we are the worlds largest Celebrity Information portal
                        SyTanbir is an Information website, you can get all information that you want, Actor, Actress,
                        Model, Dancer, Sports, Tollywood, Sandalwood, Public Figure, Personality, Business what ever you
                        want. Its a Genuine Website and we'll provide you genuine and True information Abour your
                        Favorite Actor, Actress or Your Business.</div>
                    <!-- <ul class="features">
                        <li>Enim ad minim veniam quis nostrud.</li>
                        <li>Minim veniam quis nostrud.</li>
                    </ul> -->
                    <div class="signature"><img src="{{asset('frontend/images/resource/signature-1.png')}}" alt=""
                            title=""></div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <span class="dotted-pattern dotted-pattern-10"></span>
                    <div class="image-box clearfix">
                        <figure class="image wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><img
                                src="{{asset('frontend/images/resource/featured-image-12.jpg')}}" alt="" title="">
                        </figure>
                        <figure class="image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms"><img
                                src="{{asset('frontend/images/resource/featured-image-13.jpg')}}" alt="" title="">
                        </figure>
                        <figure class="image wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms"><img
                                src="{{asset('frontend/images/resource/featured-image-14.jpg')}}" alt="" title="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Facts Section-->
<section class="facts-section-two alternate">
    <div class="circles">
        <div class="c-1"></div>
        <div class="c-2"></div>
    </div>
    <div class="auto-container">
        <div class="sec-title">
            <h2> Our<br>Mission</h2>
            <div class="lower-text">Our Mission is to make a portal where our visitors can get all the required
                information about any of the celebrities worldwide we provide all the information including there latest
                posts,latest portfolio,recent activities there lifestyles and everything.....</div>
        </div>
        <!--Facts Column-->
        <div class="facts-box">
            <div class="row clearfix">
                <div class="fact-block col-lg-4 col-md-6 col-sm-12">
                    <div class="fact-inner">
                        <div class="fact-count wow zoomInStable" data-wow-delay="0ms" data-wow-duration="2000ms">
                            <div class="count-box counted"><span class="count-text" data-stop="25"
                                    data-speed="2000">25</span>+</div>
                        </div>
                        <h4>Years Exp.</h4>
                        <!-- <div class="text">Excepteur sint occaecat cupidatat.</div> -->
                    </div>
                </div>
                <div class="fact-block col-lg-4 col-md-6 col-sm-12">
                    <div class="fact-inner">
                        <div class="fact-count wow zoomInStable" data-wow-delay="300ms" data-wow-duration="2000ms">
                            <div class="count-box counted"><span class="count-text" data-stop="712"
                                    data-speed="5000">712</span></div>
                        </div>
                        <h4>Project Done</h4>
                        <!-- <div class="text">Excepteur sint occaecat cupidatat.</div> -->
                    </div>
                </div>
                <div class="fact-block col-lg-4 col-md-6 col-sm-12">
                    <div class="fact-inner">
                        <div class="fact-count wow zoomInStable" data-wow-delay="600ms" data-wow-duration="2000ms">
                            <div class="count-box counted"><span class="count-text" data-stop="310"
                                    data-speed="4000">310</span></div>
                        </div>
                        <h4>Awards Win</h4>
                        <!-- <div class="text">Excepteur sint occaecat cupidatat.</div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!--Why Section-->
<section class="history-section">
    <span class="dotted-pattern dotted-pattern-6"></span>
    <span class="tri-pattern tri-pattern-5"></span>
    <div class="circles">
        <div class="c-1"></div>
        <div class="c-2"></div>
    </div>
    <div class="auto-container">
        <div class="sec-title centered">
            <h2>Our Vision</h2>
            <div class="lower-text">We want to look all of our users with full of the information of there favourite
                celebrities so that they can follow there idol and can make them as there path shower...</div>
        </div>
        <div class="h-container">
            <!--Block-->
            <div class="history-block">
                <div class="row clearfix">
                    <div class="content-col col-lg-6 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image-box">
                                <div class="image"><img
                                        src="{{asset('frontend/images/resource/featured-image-18.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3>Be Our Next Client</h3>
                                <div class="text">If you want to promote your business then join us and make your
                                    business worldwide famous</div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-col col-lg-6 col-md-6 col-sm-12">

                    </div>
                </div>
            </div>
            <!--Block-->
            <div class="history-block alternate">
                <div class="row clearfix">
                    <div class="content-col col-lg-6 col-md-6 col-sm-12">
                        <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image-box">
                                <div class="image"><img
                                        src="{{asset('frontend/images/resource/featured-image-19.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3>2002 The Beginning</h3>
                                <div class="text">Our Mission is to make a portal where our visitors can get all the
                                    required information about any of the celebrities worldwide we provide all the
                                    information including there latest posts,latest portfolio,recent activities there
                                    lifestyles and everything.....</div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-col col-lg-6 col-md-6 col-sm-12">

                    </div>
                </div>
            </div>
            <!--Block-->
            <div class="history-block">
                <div class="row clearfix">
                    <div class="content-col col-lg-6 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image-box">
                                <div class="image"><img
                                        src="{{asset('frontend/images/resource/featured-image-20.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3>2011 The Mid-Term</h3>
                                <div class="text">Our Mission is to make a portal where our visitors can get all the
                                    required information about any of the celebrities worldwide we provide all the
                                    information including there latest posts,latest portfolio,recent activities there
                                    lifestyles and everything......</div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-col col-lg-6 col-md-6 col-sm-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@section('js')


@endsection