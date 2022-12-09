@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | Gallary</title>
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
                <h1>Gallery</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--Gallery Section-->
<section class="gallery-section-two">
    <div class="auto-container">
        <!--Mixit Galery-->
        <div class="mixit-gallery filter-gallery">
            <div class="filters clearfix">
                <li class="filter active" data-role="button" data-filter="all" onclick="window.location.reload()">
                    All</li>
                @foreach ($category as $key=>$val)
                <li class="gallaryfilter" data-role="button" data-filter="{{$val->id}}"
                    onclick="filterSelection(event,'artist')">
                    {{$val->category_name}}</li>
                @endforeach
            </div>

            <div class="filter-list row clearfix" id="my-gallery">
                @forelse ($gallary as $key=>$val)
                <div class="card m-3">
                    <div class="row col-12">
                        <div class="col-8">
                            @if($val->glary_type=='image')
                            <img src="{{asset('gallary')}}/{{$val->gallary}}" alt="{{$val->gallary}}" class="m-2">
                            @else
                            <video width="320" height="240" controls class="m-3">
                                <source src="{{asset('gallary')}}/{{$val->gallary}}" type="video/mp4">
                            </video>
                            @endif
                        </div>
                        <div class="col-2">
                            <p>Category : {{$val->category_name}}</p>
                            <p>By : {{$val->name}}</p>
                            <p>Uploaded at : {{date('d M, Y',strtotime($val->created_at))}}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="card m-3 text-center col-md-12">
                    <h4 class="text-danger">No data foud.</h4>
                </div>
                @endforelse

            </div>
        </div>

    </div>
</section>

@endsection


@section('js')

<script>
    $('.gallaryfilter').on('click',function(){
        var filter = $(this).data('filter');
        $.ajax({
            url:'{{route('gallaryFilter')}}',
            type:'GET',
            data:{
                category_id:filter,
            },
            success:function(data){
                $('#my-gallery').html(data);
            }
        });
    });
</script>
@endsection