@extends('layouts.backend.app')

@section('title')
<title>
    Leads List
</title>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Leads </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Leads </li>
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
                                <h5 class="card-title mb-0">Leads List </h5>
                            </div>

                        </div>

                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>CategEmailory</th>
                                    @if(Auth::user()->role==0)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($leads as $key => $val)
                                <tr id="removeRow{{$val->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$val->leads}}</td>
                                    @if(Auth::user()->role==0)
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
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
                                    <td class="text-center" colspan="3"> No blogs added yet </td>
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



@endsection

@section('js')
<script>
    $('.delete_btn').on('click',function(){
            var test_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't delete this lead!",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteLeads')}}",
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