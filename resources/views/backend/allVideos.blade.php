@extends('layouts.backend.app')

@section('title')
<title>
    Video List
</title>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Video </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Videos </li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="card-title mb-0">Videos List </h5>
                            </div>
                            <div class="col-2 text-right">
                                <a href="javaScript:void(0);" class="btn btn-outline-success add-btn addbtn"><i
                                        class="ri-add-line align-bottom me-1"></i> Add Videos</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Category</th>
                                    <th>Video</th>
                                    <th>Status</th>
                                    @if(Auth::user()->role==0)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($gallary as $key => $val)
                                <tr id="removeRow{{$val->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$val->category_name}}</td>
                                    <td>
                                        <a href="{{asset('gallary')}}/{{$val->gallary}}" target="_blank">
                                            View
                                        </a>
                                    </td>
                                    <td>
                                        @if($val->status ==1)
                                        <span class="badge badge-soft-success">Active</span>
                                        @else
                                        <span class="badge badge-soft-danger">Inctive</span>
                                        @endif
                                    </td>
                                    @if(Auth::user()->role==0)

                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    @if($val->status ==1)
                                                    <a class="dropdown-item edit-item-btn"
                                                        href="{{route('allGallaryApprove',['id'=>$val->id,'status'=>'0'])}}"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Unapprove</a>
                                                    @else
                                                    <a class="dropdown-item edit-item-btn"
                                                        href="{{route('allGallaryApprove',['id'=>$val->id,'status'=>'1'])}}"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Approve</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="javaScript:void(0);"
                                                        class="dropdown-item remove-item-btn delete_btn"
                                                        data-id="{{$val->id}}">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6"> No Images added yet </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>


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
                        <label for="image">Videos <span class="text-danger">*</span></label>
                        <input type="file" name="image" id="video" class="form-control" required
                            accept="video/mp4,video/x-m4v,video/*">
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


@endsection

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
                alert(sizes);
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
    $('.delete_btn').on('click', function() {
    var test_id = $(this).data('id');
    swal({
        title: 'Are you sure?',
        text: "You won't delete this video!",
        icon: 'warning',
        buttons: true,
        buttonsStyling: false,
        reverseButtons: true
    }).then((confirm) => {
        if (confirm) {
            $.ajax({
                type: "GET",
                url: "{{route('deleteMyGallary')}}",
                data: {
                    id: test_id
                },
                success: function(data) {
                    swal({
                        title: 'Success',
                        text: "Deleted",
                        icon: 'success',
                        buttons: true,
                        buttonsStyling: false,
                        reverseButtons: true
                    });
                    $('#removeRow' + test_id).hide();
                }
            });
        }
    });
});
</script>
@endsection