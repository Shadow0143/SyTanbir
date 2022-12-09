@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | My Videos</title>
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
                <h1>My Videos</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="active">My Videos</li>
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
        <a href="javaScript:void(0);" class="addbtn">+Add Videos <span class="text-danger">({{$remain}})</span></a>
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
                @forelse ($mygallary as $key=>$val)
                <div class="card mt-3" id="remove{{$val->id}}">
                    <div class="row m-2">
                        <div class="col-6 ">

                            <video width="320" height="240" controls class="m-3">
                                <source src="{{asset('gallary')}}/{{$val->gallary}}" type="video/mp4">

                            </video>
                        </div>
                        <div class="col-3 mt-2 m-5">
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
                @empty
                <div class="col-12 text-center">
                    <h3 class="text-danger">No video found</h3>
                </div>
                @endforelse
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
                <h5 class="modal-title" id="exampleModalLabel"><span class="modaltitle"></span> Video</h5>
                <button type="button" class=" close closeaddmodal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('submitMyVideo')}}" method="post" enctype="multipart/form-data">
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
                        <label for="image">Video <span class="text-danger">*</span></label>
                        <input type="file" name="image" id="video"
                            class="form-control @error('image') is-invalid @enderror" required
                            accept="video/mp4,video/x-m4v,video/*">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <p style="color: red">{{ $message }}</p>
                        </span>
                        @enderror
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
    $(document).ready(function() {
          
       $('#video').on("change", function(event) {
        
            var _size = this.files[0].size;
            var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
            i=0;while(_size>900){_size/=1024;i++;}
            var sizes = Math.round(_size*100)/100;
            var exactSize = (Math.round(_size*100)/100)+' '+fSExt[i];
                console.log('FILE SIZE = ',exactSize);
                if(sizes>5){
                    alert('You are uploading '+ exactSize +', please select video less then 5 MB');
                    $('#video').val('');
                }
        });
    });
</script>


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
                text: "You won't delete this video !",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteMyVideo')}}",
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