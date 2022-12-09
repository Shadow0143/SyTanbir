@forelse ($blogs as $key=>$val )
<div class="card m-5">
    <div class="row">
        <div class="col-6">
            <img src="{{asset('blogs')}}/{{$val->image}}" alt="error" width="200px" height="200px" class="m-3">
        </div>
        <div class="col-6 mt-3">
            <strong>{{ucfirst($val->title)}}</strong>
            <p>{{ucfirst($val->sub_title)}}</p>
            <p>
                By : {{ucfirst($val->name)}}
                <br>
                {{date('d M, Y',strtotime($val->created_at))}}
            </p>
        </div>

    </div>
</div>

@empty

<div class="card m-5 text-center">
    <h3 class="text-danger">No data found.</h3>
</div>
@endforelse