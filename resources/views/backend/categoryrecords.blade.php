@extends('layouts.backend.app')


@section('title')
<title>Categories List</title>
@endsection

@section('css')
<style>
    .catplace {
        border-radius: 16px;
        background-color: black;
        text-align: center;


    }

    .catplace a {
        color: whitesmoke;
    }

    .notfulldetails {
        border-radius: 16px;
        background-color: red;
        text-align: center;
        color: whitesmoke;
    }
</style>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ucfirst($cat->category_name)}}</h4>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-10"></div>
            <div class="col-2">
                <a href="{{route('addNewCategoryRecord',['cat'=>$cat->id])}}"
                    class="btn btn-sm btn-outline-danger">+Add</a>
            </div>
        </div>


        <div class="col-12  mt-5">
            <div class="row">
                @forelse ($userdetails as $key=>$val )
                <div class="col-lg-3 col-sm-12 card mt-5 m-2">
                    <div class="mt-3">
                        @if($cat->id=='8' || $cat->id=='6')
                        <img src="{{asset('company_logo')}}/{{$val->company_image}}" alt="user_image" width="100%"
                            height="300px">
                        @else
                        <img src="{{asset('profile_pics')}}/{{$val->profile_pic}}" alt="user_image" width="100%"
                            height="300px">
                        @endif
                    </div>
                    <div class="mt-3">
                        <p>Name : <span>{{$val->name}}</span></p>
                        <p>Email : <span>{{$val->email}}</span></p>
                        <p>Contact No : <span>{{$val->phone_no}}</span></p>
                    </div>
                    @if(Auth::user()->role==0)

                    <div>
                        @if($val->status!='')
                        @if($val->status ==0)
                        <p class="catplace"><a
                                href="{{route('approveCategoryRecords',['id'=>$val->user_id,'status'=>'1'])}}">Approve</a>
                        </p>
                        @else
                        <p class="catplace">
                            <a
                                href="{{route('approveCategoryRecords',['id'=>$val->user_id,'status'=>'0'])}}">Unpprove</a>
                        </p>
                        @endif
                        @else
                        <p class="notfulldetails">
                            <span>Details are not fill yet.</span>
                        </p>
                        @endif
                    </div>
                    @endif
                </div>
                @empty
                <div class="col-12 text-center ">
                    <div class="col-3 card mt-5 text-center">
                        <div class="mt-3">
                            <h3 class="text-danger">No Data Found.</h3>
                        </div>

                    </div>

                </div>
                @endforelse

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $('.deletecategory').on('click',function(){
        var id = $(this).data('id');
        $.ajax({
            url:'{{route('deleteCategorieList')}}',
            type:'GET',
            data:{
                id:id
            },
            success:function(data){
               $('#remove'+id).hide();
            }
        });
    });
  
</script>
@endsection