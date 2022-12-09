<div class="row">
    @forelse ($userdetails as $key=>$val )
    <div class="col-lg-3 col-sm-12 card mt-5 m-2">
        <div class="mt-3">
            <img src="{{asset('profile_pics')}}/{{$val->profile_pic}}" alt="user_image" width="100%" height="300px">
        </div>
        <div class="mt-3">
            <p>Name : <span>{{ucfirst($val->name)}}</span></p>
            <p>Email : <span>{{$val->email}}</span></p>
            <p>Contact No : <span>{{$val->phone_no}}</span></p>
            <p class="catplace"><span>{{ucfirst($val->category->category_name)}}</span></p>
        </div>
        <div>

        </div>
    </div>
    @empty
    <div class="col-12 text-center ">
        <h3 class="text-danger">No Data Found.</h3>
    </div>
    @endforelse

</div>