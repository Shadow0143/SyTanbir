@forelse ($gallary as $key=>$val)
<div class="card m-3">
    <div class="row col-12">
        <div class="col-8">
            <img src="{{asset('gallary')}}/{{$val->gallary}}" alt="{{$val->gallary}}" class="m-2">
        </div>
        <div class="col-2">
            <p>Category : {{$val->category_name}}</p>
            <p>By : {{$val->name}}</p>
            <p>Uploaded at : {{date('d M, Y',strtotime($val->created_at))}}</p>
        </div>
    </div>
</div>
@empty
<div class="card m-3 text-center col-md-12">
    <h4 class="text-danger">No data foud.</h4>
</div>
@endforelse