@extends('layouts.backend.app')


@section('title')
<title>Sub Admin List</title>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Sub Admin </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Sub Admin </li>
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
                                <h5 class="card-title mb-0">Sub Admin List </h5>
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
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Admin Phone No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subadmin as $key => $val)
                                <tr id="remove{{$val->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{ucfirst($val->name)}}</td>
                                    <td>{{$val->email}}</td>
                                    <td>{{$val->phone_no}}</td>

                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">

                                                <li><a class="dropdown-item edit-item-btn editsubadmin" title="Edit"
                                                        data-id="{{$val->id}}"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li>
                                                    <a href="javaScript:void(0);"
                                                        class="dropdown-item remove-item-btn delete_btn" title="Delete"
                                                        data-id="{{$val->id}}">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-danger text-center">No subadmin added yet.</td>
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
                <h5 class="modal-title" id="exampleModalLabel"><span class="modaltitle"></span> Sub Admin</h5>
                <button type="button" class=" close closeaddmodal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('submitSubAdmin')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <input type="hidden" name="id" id="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Phone No.</label>
                        <input type="number" name="phone" id="phone_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
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
    $('.editsubadmin').on('click',function(){
        var id = $(this).data('id');
        $.ajax({
            url:'{{route('editSubAdmin')}}',
            type:'GET',
            data:{
                id:id
            },
            success:function(data){
                $('.modaltitle').html('Edit');
                $('#name').val(data.name);
                $('#id').val(data.id);
                $('#email').val(data.email);
                $('#phone_no').val(data.phone_no);
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
                text: "You won't delete this sub admin !",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteSubAdmin')}}",
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