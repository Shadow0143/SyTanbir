@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | Home</title>
@endsection

@section('content')

<!-- Banner Section -->
<section class="banner-section banner-one">
    <div class="banner-bottom-pattern"></div>

    <div class="banner-carousel owl-theme owl-carousel">
        <!-- Slide Item -->
        <div class="slide-item">
            <div class="image-layer" style="background-image: url({{asset('frontend/images/main-slider/1.jpg')}});">
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <h1>India’s leading <br>celebrity information website</h1>
                            <!-- <div class="text">Amet consectetur adipisicing elit sed do eiusmod tempor incididunt adipisicing</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item">
            <div class="image-layer" style="background-image: url({{asset('frontend/images/main-slider/2.jpg')}});">
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <h1>India’s leading <br>celebrity information website</h1>
                            <!-- <div class="text">Amet consectetur adipisicing elit sed do eiusmod tempor incididunt adipisicing</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item">
            <div class="image-layer" style="background-image: url({{asset('frontend/images/main-slider/3.jpg')}});">
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <h1>India’s leading <br>celebrity information website</h1>
                            <!-- <div class="text">Amet consectetur adipisicing elit sed do eiusmod tempor incididunt adipisicing</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--End Banner Section -->

<!--About Section-->
<section class="about-section">
    <div class="pattern-bottom"></div>
    <span class="dotted-pattern dotted-pattern-1"></span>
    <span class="tri-pattern tri-pattern-1"></span>
    <div class="auto-container">
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <h2>Know <br> About Us</h2>
                    </div>
                    <div class="text">Today we are the worlds largest Celebrity Information portal
                        SyTanbir is an Information website, you can get all information that you want, Actor,
                        Actress, Model, Dancer, Sports, Tollywood, Sandalwood, Public Figure, Personality,
                        Business what ever you want. Its a Genuine Website and we'll provide you genuine and
                        True information Abour your Favorite Actor, Actress or Your Business.</div>
                    <div class="link-box">
                        <a href="about.html" class="theme-btn btn-style-one"><span class="btn-title custom custom">Read
                                More</span></a>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image-box">
                        <span class="dotted-pattern dotted-pattern-2"></span>
                        <figure class="image"><img src="{{asset('frontend/images/resource/featured-image-6.jpg')}}"
                                alt="" title="">
                        </figure>
                        <div class="cap"><span class="txt">100 <br>Awards Win<br></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Facts Section-->
<section class="facts-section">
    <span class="dotted-pattern dotted-pattern-3"></span>
    <div class="left-bottom-image"><img src="{{asset('frontend/images/resource/award.png')}}" alt="" title="">
    </div>
    <div class="auto-container">
        <div class="row clearfix">
            <!--Title Column-->
            <div class="title-column col-xl-7 col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <h2>Our<br>Mission</h2>
                        <div class="lower-text">Our Mission is to make a portal where our visitors can get all
                            the required information about any of the celebrities worldwide we provide all the
                            information including there latest posts,latest portfolio,recent activities there
                            lifestyles and everything.....
                        </div>
                    </div>
                    <!-- <div class="sec-title">
                        <h2>Our<br>Vision</h2>
                        <div class="lower-text">We want to look all of our users with full of the information of there favourite celebrities so that they can follow there idol and can make them as there path shower...
                        </div>
                    </div> -->

                </div>
            </div>
            <!--Facts Column-->
            <div class="facts-column col-xl-5 col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="facts">
                        <div class="fact-block">
                            <div class="fact-inner">
                                <div class="fact-count wow zoomInStable" data-wow-delay="0ms"
                                    data-wow-duration="2000ms">
                                    <div class="count-box"><span class="count-text" data-stop="1000"
                                            data-speed="2000">50</span>+</div>
                                </div>
                                <h4>Active Users</h4>
                                <!-- <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div> -->
                            </div>
                        </div>
                        <div class="fact-block">
                            <div class="fact-inner">
                                <div class="fact-count wow zoomInStable" data-wow-delay="0ms"
                                    data-wow-duration="2000ms">
                                    <div class="count-box"><span class="count-text" data-stop="712"
                                            data-speed="5000">0</span></div>
                                </div>
                                <h4>Uploaded Post</h4>
                                <!-- <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div> -->
                            </div>
                        </div>
                        <div class="fact-block">
                            <div class="fact-inner">
                                <div class="fact-count wow zoomInStable" data-wow-delay="0ms"
                                    data-wow-duration="2000ms">
                                    <div class="count-box"><span class="count-text" data-stop="3110"
                                            data-speed="4000">0</span></div>
                                </div>
                                <h4>Total visitors</h4>
                                <!-- <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div> -->
                            </div>
                        </div>
                        <div class="fact-block">
                            <div class="fact-inner">
                                <div class="fact-count wow zoomInStable" data-wow-delay="0ms"
                                    data-wow-duration="2000ms">
                                    <div class="count-box"><span class="count-text" data-stop="210"
                                            data-speed="4000">0</span></div>
                                </div>
                                <h4>Reviews</h4>
                                <!-- <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="dashed-separator">
    <div class="auto-container"><span></span></div>
</div>



<!--Testimonials Section-->
<section class="testimonials-section">
    <span class="dotted-pattern dotted-pattern-3"></span>
    <span class="tri-pattern tri-pattern-2"></span>
    <div class="auto-container">
        <div class="sec-title centered">
            <h2>What People Say?</h2>
            <!-- <div class="lower-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</div> -->
        </div>

        <div class="carousel-box">
            <div class="testimonial-carousel owl-theme owl-carousel">
                @foreach ($testimonial as $key=>$val )
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">{!! $val->user_say !!}</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('testimonial')}}/{{$val->image}}" alt=""></div>
                            <div class="name">{{$val->user_name}}</div>
                            <div class="designation">{{$val->user_designation}}</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

<!--News Section-->
<section class="news-section">
    <div class="pattern-top"></div>
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <h2>Our Blogs</h2>
                <div class="row">
                    @forelse ($blogs as $key=>$val )
                    <div class="card m-5">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{asset('blogs')}}/{{$val->image}}" alt="error" width="200px" height="200px"
                                    class="m-3">
                            </div>
                            <div class="col-6 mt-3">
                                <strong>{{ucfirst($val->title)}}</strong>
                                <p>{{ucfirst($val->sub_title)}}</p>
                                <p>
                                    By : {{ucfirst($val->name)}}
                                    <br>
                                    {{date('d M, Y',strtotime($val->created_at))}}
                                </p>
                            </div>

                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center ">
                        <h6 class="text-danger">No Data Found.</h6>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="link-box">
                <a href="{{route('blogs')}}" class="theme-btn btn-style-one"><span class="btn-title custom custom">View
                        All Blogs</span></a>
            </div>
        </div>
        <div class="row clearfix" id="my-blog"></div>
    </div>

</section>

<section class="news-section" style="padding: 0px 0px;">
    <div class="pattern-top"></div>
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <h2>Categories</h2>
                <div class="row">
                    @forelse ($userdetails as $key=>$val )
                    <div class="col-lg-6 col-sm-12 card ">
                        <div class="mt-3">
                            <img src="{{asset('profile_pics')}}/{{$val->profile_pic}}" alt="user_image" width="100%"
                                height="300px">
                        </div>
                        <div class="mt-3">
                            <p>By : <span>{{ucfirst($val->name)}}</span></p>
                            <p class="catplace"><span>{{ucfirst($val->category->category_name)}}</span></p>
                        </div>
                        <div>

                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center ">
                        <h6 class="text-danger">No Data Found.</h6>
                    </div>
                    @endforelse

                </div>
            </div>
            <div class="link-box">
                <a href="{{route('categorie')}}" class="theme-btn btn-style-one"><span
                        class="btn-title custom custom">View
                        All Categories</span></a>
            </div>
        </div>

        <div class="row clearfix" id="my-models">
            <!--News Block-->
        </div>
    </div>
</section>


@endsection


@section('js')


@endsection