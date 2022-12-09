@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | My Blogs</title>
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
                <h1>My Blogs</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">My Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-10"></div>
    <div class="col-2 mt-2">
        <a href="{{route('addMyBlogs')}}" class="btn btn-outline-dark add-btn mt-2"><i
                class="ri-add-line align-bottom me-1"></i> Add Blogs</a>
    </div>
</div>


<div class="content-side col-lg-12 col-md-12 col-sm-12">
    <div class="blog-content" id="my-blog">

        @forelse ($blogs as $key=>$val )
        <div class="card m-5 col-lg-6" id="removeRow{{$val->id}}">
            <div class="row">
                <div class="col-4">
                    <img src="{{asset('blogs')}}/{{$val->image}}" alt="error" width="200px" height="200px" class="m-3">
                </div>
                <div class="col-4 mt-3">
                    <strong>{{ucfirst($val->title)}}</strong>
                    <p>{{ucfirst($val->sub_title)}}</p>
                    <p>
                        By : {{ucfirst($val->name)}}
                        <br>
                        {{date('d M, Y',strtotime($val->created_at))}}
                    </p>
                    <p>
                        @if($val->status=='1')
                        <span class="text-success">Approved</span>
                        @else
                        <span class="text-danger">Unapprove</span>
                        @endif
                    </p>
                </div>
                <div class="col4 mt-3">
                    <a href="{{route('editMyBlogs',['id'=>$val->id])}}">Edit</a>&nbsp; / &nbsp;
                    <a href="javaScript:void(0);" class="delete_btn" data-id="{{$val->id}}"> Delete</a>
                </div>

            </div>
        </div>

        @empty

        <div class="m-5 text-center">
            <div class="row">
                <div class="col-12 text-center card">
                    <h3 class="text-dark m-2">No Blog Added.</h3>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>


@endsection


@section('js')

<script>
    $('.delete_btn').on('click',function(){
            var test_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't delete this blog!",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteMyBlogs')}}",
                        data: { id: test_id },
                        success: function(data) {
                            swal({
                                title: 'Success',
                                text: "Deleted",
                                icon: 'success',
                                buttons: true,
                                buttonsStyling: false,
                                reverseButtons: true
                            });
                            $('#removeRow'+test_id).hide();
                        }
                    });
                }
            });
        });
          
</script>
@endsection