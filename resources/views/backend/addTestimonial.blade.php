@extends('layouts.backend.app')

@section('title')
<title>
    Add Testimonials
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
                                <h5 class="card-title mb-0">Add Testimonial </h5>
                            </div>
                            <div class="col-2">
                                <a href="{{route('testimonialList')}}" class="btn btn-outline-danger">Back</a>
                            </div>

                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{route('submitTestimonial')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    @if(!empty($cms->id))
                                    <input type="hidden" name="id" id="id" value="{{$cms->id}}" readable>
                                    @endif
                                    <label for="name">User Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" @if(!empty($cms))
                                        value="{{$cms->user_name}}" @endif>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror

                                </div>
                                <div class="col-6">
                                    <label for="designation">Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" id="designation"
                                        class="form-control @error('designation') is-invalid @enderror"
                                        @if(!empty($cms)) value="{{$cms->user_designation}}" @endif>
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class=" col-12 mt-3">
                                        <label for="user_image">User Image <span class="text-danger">*</span></label>
                                        <input type="file" name="user_image" id="user_image"
                                            class="form-control @error('user_image') is-invalid @enderror">
                                        @error('user_image')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    @if(!empty($cms))
                                    <div class="col-12 mt-3">
                                        <label for="status">Status</label>
                                        <select name="changestatus" id="changestatus" class="form-control">
                                            <option value="1" {{$cms->status == '1' ? 'selected' : ''}}>Active
                                            </option>
                                            <option value="0" {{$cms->status == '0' ? 'selected' : ''}}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-12 mt-3">
                                    <label for="user_say">What user say ? <span class="text-danger">*</span></label>
                                    <textarea name="user_say" id="editor" cols="30" rows="10"
                                        class="form-control snow-editor ckeditor-classic @error('user_say') is-invalid @enderror"> @if(!empty($cms)) {!! $cms->user_say!!} @endif</textarea>
                                    @error('user_say')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-12 text-center mt-5">
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </div>
                            </div>
                        </form>
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