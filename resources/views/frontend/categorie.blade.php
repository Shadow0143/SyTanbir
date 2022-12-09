@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | Catgorie</title>
@endsection
@section('css')

<style>
    .catplace {
        border-radius: 16px;
        background-color: lightseagreen;
        text-align: center;
        color: whitesmoke;

    }

    #searchkeyword {
        border-bottom: 1px solid black;
    }

    .searchbtn {
        height: 20px;
        width: 20px;
    }

    ::placeholder {
        padding-left: 20px;
        color: red;
    }
</style>

@endsection

@section('content')

<!-- Banner Section -->
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{asset('frontend/images/background/banner-image-2.jpg')}});">
    </div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Categories</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">Models</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--models Section-->
<section class="gallery-section-two">
    <div class="auto-container">
        <!--Mixit Galery-->
        <div class="mixit-gallery filter-gallery">
            <div class="filters clearfix">
                <li class="filter active" data-role="button" data-filter="all" onclick="window.location.reload()">
                    All</li>
                @foreach ($category as $val)
                <li class="filter " data-role="button">
                    <a href="javaScript:void(0);" class="categoryfilter" data-filter="{{$val->id}}">
                        {{ucfirst($val->category_name)}}</a>
                </li>
                @endforeach

            </div>

            <div class="search text-center">
                <input type="text" name="searchkeyword" id="searchkeyword" placeholder="Search">
                <a href="javaScript:void(0);" class="searchbtn"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>

            <div class="row clearfix" id="my-models">
                <div class="col-12  mt-5" id="resultfilter">
                    <div class="row">
                        @forelse ($userdetails as $key=>$val )
                        <div class="col-lg-3 col-sm-12 card mt-5 m-2">
                            <div class="mt-3">
                                <img src="{{asset('profile_pics')}}/{{$val->profile_pic}}" alt="user_image" width="100%"
                                    height="20px">
                            </div>
                            <div class="mt-3">
                                <p>Name : <span>{{ucfirst($val->name)}}</span></p>
                                <p>Email : <span>{{$val->email}}</span></p>
                                <p>Contact No : <span>{{$val->phone_no}}</span></p>
                                <p class="catplace"><span>{{ucfirst($val->category->category_name)}}</span></p>
                                <p>

                                    <a href="{{route('categorieDetails',['id'=>$val->id])}}">
                                        Know More
                                    </a>
                                </p>
                            </div>
                            <div>

                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center ">
                            <h3 class="text-danger">No Data Found.</h3>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection


@section('js')

<script>
    $('.categoryfilter').on('click',function(){
        var filter = $(this).data('filter');
        $.ajax({
            url:'{{route('categorieFilter')}}',
            type:'GET',
            data:{
                category_id:filter,
            },
            success:function(data){
                $('#resultfilter').html(data);
            }
        });
    });

    $('.searchbtn').on('click',function(){
        var keyword = $('#searchkeyword').val();
        $.ajax({
            url:'{{route('categorieSearch')}}',
            type:'GET',
            data:{
                name:keyword,
            },
            success:function(data){
                $('#resultfilter').html(data);
            }
        });
    });
</script>
@endsection