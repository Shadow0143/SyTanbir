@extends('layouts.backend.app')


@section('title')
<title>Add New Categories </title>
@endsection

@section('css')

@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-12 cl-sm-3 text-center">
            <h3>{{$cat->category_name}}</h3>
        </div>


        <div class="row col-12">
            <div class="col-10"></div>
            <div class="col-2">
                <a href="javaScript:void(0);" class="btn btn-sm btn-outline-danger" onclick="history.back()">Back</a>
            </div>
        </div>


        <div class="col-12">
            <form action="{{route('submitNewCategoryRecord')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="category" value="{{$cat->id}}">
                <div class="row">
                    @if($cat->category_name =='Business' || $cat->category_name =='Education' )

                    @endif


                    @if($cat->category_name == 'Business' || $cat->category_name == 'Education')

                    <div class="col-lg-12 col-sm-3">
                        <h3> @if($cat->category_name == 'Business' ) Business @else Education @endif Info</h3>
                        <hr>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="organization_name">Organization Name</label>
                            <input type="text" value="" name="organization_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="organization_est_date">Organization Establish Date</label>
                            <input type="date" value="" name="organization_est_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="company_type">@if($cat->category_name == 'Business' ) Company @else Education
                                @endif Type</label>
                            <input type="text" value="" name="company_type" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="company_image">@if($cat->category_name == 'Business' ) Company @else Education
                                @endif Image</label>
                            <input type="file" value="" name="company_image" class="form-control">
                        </div>
                    </div>

                    @else
                    <div class="col-lg-12 col-sm-3">
                        <h3>User Info <span class="text-danger">*</span></h3>
                        <hr>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" value="" name="user_name" class="form-control" @if($cat->category_name
                            =='Business' || $cat->category_name =='Education' ) required @endif>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="email" value="" name="user_email" class="form-control" @if($cat->category_name
                            =='Business' || $cat->category_name =='Education' ) required @endif>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="user_profile">User profile image</label>
                            <input type="file" value="" name="user_profile" class="form-control" @if($cat->category_name
                            =='Business' || $cat->category_name =='Education' ) required @endif>
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-3">
                        <h3>User Personal Info</h3>
                        <hr>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="phone_no"> Phone no.</label>
                            <input type="number" value="" name="phone_no" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" value="" name="dob" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Please Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="eye">Eye Colour</label>
                            <input type="text" value="" name="eye" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="hair">Hair colour</label>
                            <input type="text" value="" name="hair" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="bust">Bust</label>
                            <input type="text" value="" name="bust" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="hip">Hip</label>
                            <input type="text" value="" name="hip" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="waist">Waist</label>
                            <input type="text" value="" name="waist" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="dress">Dress</label>
                            <input type="text" value="" name="dress" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="shoes">Shoes</label>
                            <input type="text" value="" name="shoes" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tatoo">Tatoo</label>
                            <input type="text" value="" name="tatoo" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="chest">Chest</label>
                            <input type="text" value="" name="chest" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="height">Height</label>
                            <input type="text" value="" name="height" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="fb">Facebook</label>
                            <input type="text" value="" name="fb" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="insta">instagram</label>
                            <input type="text" value="" name="insta" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" value="" name="twitter" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" value="" name="experience" class="form-control">
                        </div>
                    </div>

                    @endif

                    <div class="col-lg-12 col-sm-3">
                        <h3>Location Info</h3>
                        <hr>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" value="" name="city" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" value="" name="state" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" value="" name="country" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="pin">Pin / Zip Code</label>
                            <input type="text" value="" name="pin" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-3">
                        <h3>About</h3>
                        <hr>
                    </div>

                    <div class="col-lg-12 col-sm-3">
                        <div class="form-group">
                            <label for="description">Descriptions</label>
                            <textarea name="description" id="editor" cols="30" rows="10"
                                class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-3">
                        <h3>Extra Images</h3>
                        <hr>
                    </div>
                    <div class="col-lg-12 col-sm-3">
                        <div class="form-group">
                            <label for="extraImage">Extra Images</label>

                            <input type="file" name="extraImage[]" id="" class="form-control" multiple>

                        </div>
                    </div>


                    <div class="col-lg-12 col-sm-3 text-center mt-5">
                        <button type="submit" class="btn btn-lg btn-outline-dark">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#editor' ) )
.then( editor => {
        console.log( editor );
} )
.catch( error => {
        console.error( error );
} );
</script>
@endsection