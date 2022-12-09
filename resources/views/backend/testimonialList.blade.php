@extends('layouts.backend.app')

@section('title')
<title>
    Testimonials List
</title>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Testimonial </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Testimonial </li>
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
                                <h5 class="card-title mb-0">Testimonial List </h5>
                            </div>
                            <div class="col-2 text-right">
                                <a href="{{route('addTestimonial')}}" class="btn btn-outline-success add-btn"><i
                                        class="ri-add-line align-bottom me-1"></i> Add Testimonial</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>User Name</th>
                                    <th>Designation </th>
                                    <th>User Says</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($cms as $key => $val)
                                <tr id="removeRow{{$val->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$val->user_name}}</td>
                                    <td>{{$val->user_designation}}</td>
                                    <td>{!! substr($val->user_say ,0,50)!!}</td>
                                    <td>
                                        @if($val->status ==1)
                                        <span class="badge badge-soft-success">Active</span>
                                        @else
                                        <span class="badge badge-soft-danger">Inctive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{asset('testimonial')}}/{{$val->image}}"
                                                        class="dropdown-item" target="_blank"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                        View User image</a></li>
                                                @if(Auth::user()->role==0)

                                                <li><a class="dropdown-item edit-item-btn"
                                                        href="{{route('editTestimonial',['id'=>$val->id])}}"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li>
                                                    <a href="javaScript:void(0);"
                                                        class="dropdown-item remove-item-btn delete_btn"
                                                        data-id="{{$val->id}}">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
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
                text: "You won't delete this testimonial!",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteTestimonial')}}",
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