@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | Category Detail</title>
@endsection
@section('css')



@endsection

@section('content')

<!-- Banner Section -->
<section class="page-banner ext-banner">
    @if(!empty($userdetails->profile_pic))
    <div class="image-layer" style="background-image:url({{asset('profile_pics')}}/{{$userdetails->profile_pic}});">
    </div>
    @endif
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">

            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--Room Single Section-->
<section class="room-single">
    <div class="circles-two">
        <div class="c-1"></div>
        <div class="c-2"></div>
    </div>
    <span class="dotted-pattern dotted-pattern-3"></span>
    <span class="tri-pattern tri-pattern-3"></span>
    <div class="auto-container">
        <div class="upper-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" id="model-data"></div>

        <div class="details-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" id="model-data1">
            <div class="details-inner">
                <h3>Model Details</h3>

                <div class="text"> @if(!empty($userdetails->your_self)) {!! $userdetails->your_self !!} @endif</div>
                <ul class="info clearfix">
                    <p><span class="icon flaticon-wifi"></span> Name:
                        @if(!empty($userdetails->name)){{ucfirst($userdetails->name)}}@endif</p>
                    <p><span class="icon flaticon-tv"></span> Born: @if(!empty($userdetails->dob)){{date('M d,
                        Y',strtotime($userdetails->dob))}}@endif</p>


                </ul>
            </div>
        </div>
        <div class="details-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" id="model-data2">
            <div class="details-inner">
                <h3>Address Information</h3>
                <ul class="info clearfix">
                    <li><span class="icon flaticon-tv"></span> City:
                        @if(!empty($userdetails->city)){{$userdetails->city}}@endif</li>
                    <li><span class="icon flaticon-wifi"></span> State:
                        @if(!empty($userdetails->state)){{$userdetails->state}}@endif</li>
                    <li><span class="icon flaticon-coffee-cup"></span> Country:
                        @if(!empty($userdetails->country)){{$userdetails->country}}@endif</li>
                </ul>
            </div>
        </div>

        <div class="details-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" id="model-data2">
            <div class="details-inner">
                <h3>Images</h3>
                <ul class="info clearfix">
                    @forelse($allImages as $key => $val)
                    {{-- <div class="row col-12"> --}}
                        <li>
                            <img src="{{asset('extraImages')}}/{{$val->Image_name}}" alt="extra-image">
                        </li>
                        {{--
                    </div> --}}
                    @empty
                    <div class="row ml-2">
                        <p class="text-danger">No Image.</p>
                    </div>
                    @endforelse

                </ul>
            </div>
        </div>

        <!-- <div class="lower-box">
            <div class="row clearfix">
                <div class="image-block col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <figure class="image"><a href="images/background/bg-9.jpg" class="lightbox-image"><img src="images/background/bg-9.jpg" alt="" title=""></a></figure>
                </div>
                <div class="image-block col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <figure class="image"><a href="" class="lightbox-image"><img src="images/background/bg-9.jpg" alt="" title=""></a></figure>
                </div>
            </div>
        </div> -->
    </div>
</section>



@endsection


@section('js')


@endsection