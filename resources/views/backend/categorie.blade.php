@extends('layouts.backend.app')


@section('title')
<title>Categories List</title>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Category </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Category </li>
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
                                <h5 class="card-title mb-0">Category List </h5>
                            </div>
                            <div class="col-2 text-right">
                                <a href="javaScript:void(0);" class="btn btn-sm btn-outline-danger addbtn">+ ADD</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Category Name</th>
                                    @if(Auth::user()->role==0)

                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($category as $key => $val)
                                <tr id="remove{{$val->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{ucfirst($val->category_name)}}</td>
                                    @if(Auth::user()->role==0)

                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">

                                                <li><a class="dropdown-item edit-item-btn editCategory" title="Edit"
                                                        data-id="{{$val->id}}"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li>
                                                    <a href="javaScript:void(0);"
                                                        class="dropdown-item remove-item-btn delete_btn deletecategory"
                                                        title="Delete" data-id="{{$val->id}}">
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
                                    <td colspan="3" class="text-danger">No data.</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                        {{-- {{$cms->links()}} --}}
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
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
                <h5 class="modal-title" id="exampleModalLabel"><span class="modaltitle"></span> Category</h5>
                <button type="button" class=" close closeaddmodal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('submitCategory')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Category Name</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control" required>
                        <input type="hidden" name="cat_id" id="cat_id" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
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
    $('.addbtn').on('click',function(){
        $('.modaltitle').html('Add');
        $('#addModal').modal('show');
    });
    $('.editCategory').on('click',function(){
        var id = $(this).data('id');
        $.ajax({
            url:'{{route('editCategorieList')}}',
            type:'GET',
            data:{
                id:id
            },
            success:function(data){
                $('.modaltitle').html('Edit');
                $('#cat_name').val(data.category_name);
                $('#cat_id').val(data.id);
                $('#addModal').modal('show');
            }
        });
    });

    
    $('.closeaddmodal').on('click',function(){
        $('#addModal').modal('hide');
    });
</script>

<script>
    $('.deletecategory').on('click',function(){
            var test_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't delete this category !",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteCategorieList')}}",
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