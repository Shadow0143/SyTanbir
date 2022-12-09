@extends('layouts.backend.app')


@section('title')
<title>Dashboard</title>
@endsection


@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Hello, {{Auth::user()->name}}!</h4>
                                    <marquee behavior="" direction="" class="text-danger">You can add new categories in
                                        menu section.
                                    </marquee>
                                </div>

                            </div>
                            <!-- end card header -->
                            <div class="row col-lg-12 col-sm-3 mt-5 w-5">

                                @forelse($category as $key => $val)
                                <div class="col-lg-3 col-sm-12   card m-3 text-center">
                                    <h3 class="m-5"><a
                                            href="{{route('categoryRecords',['id'=>$val->id])}}">{{$val->category_name}}</a>
                                    </h3>
                                </div>
                                @empty

                                @endforelse

                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!-- end .h-100-->
            </div>
            <!-- end col -->
        </div>

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection