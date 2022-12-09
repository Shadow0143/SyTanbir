@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | My Gallary</title>
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
                <h1>My Gallery</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">My Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<div class="row">
    <div class="col-10"></div>
    <div class="col-2 mt-5">
        @if($remain >0)
        <a href="javaScript:void(0);" class="addbtn">+Add Gallary <span class="text-danger">({{$remain}})</span></a>
        @endif
    </div>
</div>

<!--Gallery Section-->
<section class="gallery-section-two">
    <div class="auto-container">
        <!--Mixit Galery-->
        <div class="mixit-gallery filter-gallery">
            <div class="filters clearfix">

            </div>

            <div class="filter-list row clearfix" id="my-gallery">
                @foreach ($mygallary as $key=>$val)
                <div class="card mt-3" id="remove{{$val->id}}">
                    <div class="row m-2">
                        <div class="col-6 ">
                            <a href="{{asset('gallary')}}/{{$val->gallary}}" target="_blank">
                                <img src="{{asset('gallary')}}/{{$val->gallary}}" alt="{{$val->gallary}}" class="m-3">
                            </a>
                        </div>
                        <div class="col-3 mt-2">
                            <p>Category: {{$val->category_name}}</p>
                            <p>
                                @if($val->status==0)
                                <span class="text-danger">Unapproved</span>
                                @else
                                <span class="text-success">Approved</span>
                                @endif

                            </p>
                        </div>
                        <div class="col-3">
                            <a href="javaScript:void(0);" class="deletegalary" data-id="{{$val->id}}">Delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</section>




@endsection

<div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="margin-top: 100px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span class="modaltitle"></span> Gallary</h5>
                <button type="button" class=" close closeaddmodal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('submitMyGallary')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label for="category">Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Please Select Category</option>
                            @foreach ($category as $key=>$val )
                            <option value="{{$val->id}}">{{$val->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="image">Images <span class="text-danger">*</span></label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-outline-dark">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    $('.addbtn').on('click',function(){
        $('.modaltitle').html('Add');
        $('#addModal').modal('show');
    });
    
    $('.closeaddmodal').on('click',function(){
        $('#addModal').modal('hide');
    });
</script>

<script>
    $('.deletegalary').on('click',function(){
            var test_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't delete this image !",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteMyGallary')}}",
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
                            $('#remove'+test_id).hide();
                        }
                    });
                }
            });
        });
          
</script>
@endsection