@extends('layouts.backend.app')

@section('title')
<title>
    Add Notice
</title>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Notice </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Add Notice </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-10">
                                        <h5 class="card-title mb-0">Notice List </h5>
                                    </div>
                                    <div class="col-2 text-right">
                                        <a href="javaScript:void(0);" class="btn btn-outline-success add-btn addbtn"><i
                                                class="ri-add-line align-bottom me-1"></i> Add Notice</a>
                                    </div>
                                </div>

                            </div>


                            <div class="card-body">
                                <table id="example"
                                    class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SR No.</th>
                                            <th>Notice</th>
                                            @if(Auth::user()->role==0)
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse($notice as $key => $val)
                                        <tr id="removeRow{{$val->id}}">
                                            <td>{{$key+1}}</td>

                                            <td>{!! $val->notice!!}</td>
                                            @if(Auth::user()->role==0)

                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">

                                                        {{-- <li><a class="dropdown-item edit-item-btn editNotice"
                                                                href="javaScript:void(0);" data-id="{{$val->id}}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted "></i>
                                                                Edit</a></li> --}}
                                                        <li>
                                                            <a href="javaScript:void(0);"
                                                                class="dropdown-item remove-item-btn delete_btn"
                                                                data-id="{{$val->id}}">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
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
                                            <td class="text-center" colspan="6"> No testimonial added yet </td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>

            </div>
        </div>
        <!-- end page title -->


        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>



<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span class="modaltitle"></span> Notice</h5>
                <button type="button" class=" close closeaddmodal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('submitNotice')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Notice</label>
                        <textarea name="notice" id="editor" cols="30" rows="10" class="form-control"></textarea>
                        <input type="hidden" name="id" id="id" value="">

                    </div>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $('.addbtn').on('click',function(){
        $('.modaltitle').html('Add');
        $('#addModal').modal('show');
    });
    $('.editNotice').on('click',function(){
        var id = $(this).data('id');
        $.ajax({
            url:'{{route('editNotice')}}',
            type:'GET',
            data:{
                id:id
            },
            success:function(data){
                $('.modaltitle').html('Edit');
                $('#editor').ClassicEditor.replace(data.notice);
                $('#id').val(data.id);
                $('#addModal').modal('show');
            }
        });
    });
    $('.closeaddmodal').on('click',function(){
        $('#addModal').modal('hide');
    });
</script>


<script>
    $('.delete_btn').on('click',function(){
            var test_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't delete this notice!",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteNotice')}}",
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