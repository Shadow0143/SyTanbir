@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | Blog</title>
@endsection


@section('css')
<style>
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
    <div class="image-layer" style="background-image:url({{asset('frontend/images/background/banner-image-6.jpg')}});">
    </div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Blogs</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<div class="sidebar-page-container">
    <div class="circles-two">
        <div class="c-1"></div>
        <div class="c-2"></div>
    </div>
    <span class="dotted-pattern dotted-pattern-5"></span>
    <span class="tri-pattern tri-pattern-8"></span>

    <div class="auto-container">
        <div class="row clearfix">



            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="search text-center">
                    <input type="text" name="searchkeyword" id="searchkeyword" placeholder="Search">
                    <a href="javaScript:void(0);" class="searchbtn"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
                <div class="blog-content" id="my-blog">

                    @forelse ($blogs as $key=>$val )
                    <a href="{{route('blogsDetails',['id'=>$val->id])}}">
                        <div class="card m-5">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{asset('blogs')}}/{{$val->image}}" alt="error" width="200px"
                                        height="200px" class="m-3">
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
                    </a>
                    @empty
                    <div class="col-12 text-center ">
                        <h3 class="text-danger">No Data Found.</h3>
                    </div>
                    @endforelse
                </div>

                <div class="pagination-box">
                    <ul class="styled-pagination">
                        {{-- <li>
                            {{$blogs->links()}}
                        </li> --}}

                        {{-- <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#" class="next"><span class="fa fa-angle-right"></span></a></li> --}}
                    </ul>
                </div>

            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar blog-sidebar">
                    <div class="sidebar-widget archives wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Categories</h4>
                            </div>
                            <ul>
                                <li><a class="custom" onclick="window.location.reload()">All</a></li>
                                @foreach ($category as $key=>$val)
                                <li><a class="blogfilter" data-filter="{{$val->id}}">{{$val->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </aside>
            </div>

        </div>
    </div>
</div>

@endsection


@section('js')

<script>
    $('.blogfilter').on('click',function(){
        var filter = $(this).data('filter');
        $.ajax({
            url:'{{route('blogsFilter')}}',
            type:'GET',
            data:{
                category_id:filter,
            },
            success:function(data){
                $('#my-blog').html(data);
            }
        });
    });
</script>


<script>
    $('.searchbtn').on('click',function(){
        var keyword = $('#searchkeyword').val();
        $.ajax({
            url:'{{route('blogSearch')}}',
            type:'GET',
            data:{
                title:keyword,
            },
            success:function(data){
                $('#my-blog').html(data);
            }
        });
    });
</script>
@endsection