@extends('layouts.frontend.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{asset('frontend/images/background/banner-image-1.jpg')}});">
    </div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>New Notice</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">New Notice</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="content-side col-lg-12 col-md-12 col-sm-12">
    <div class="blog-content" id="my-blog">

        @forelse ($notice as $key=>$val )
        <div class="card m-5 col-lg-6" id="removeRow{{$val->id}}">
            <div class="row">

                <div class="col-6 mt-3">
                    <strong>{!! ucfirst($val->notice) !!}</strong>
                    <p>
                        {{date('d M, Y',strtotime($val->created_at))}}
                    </p>
                </div>

                @if($val->read == 'read')
                <div class="col-6 mt-3">

                    <a class="text-success"> Allready read</a>
                </div>
                @else
                <div class="col-6 mt-3">
                    <a href="{{route('readNotifications',['id'=>$val->id])}}" class="mark_as_read text-danger"> Mark as
                        read</a>
                </div>
                @endif

            </div>
        </div>

        @empty

        <div class="m-5 text-center">
            <div class="row">
                <div class="col-12 text-center card">
                    <h3 class="text-dark m-2">No new notification.</h3>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>

@endsection

@section('js')

@endsection