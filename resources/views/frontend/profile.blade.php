@extends('layouts.frontend.app')


@section('title')
<title>Profile </title>
@endsection

@section('css')
<style>
    .forfemail {
        display: none !important;
    }
</style>
@endsection

@section('content')

<section class="page-banner">
    <div class="image-layer" style="background-image:url({{asset('frontend/images/background/banner-image-4.jpg')}});">
    </div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Profile</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">My Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--Contact Section-->
<section class="contact-section-two">
    <div class="auto-container clearfix">
        <div class="row clearfix">


            <div class="form-col col-lg-12 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="form-box default-form contact-form-two wow fadeInRight" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <h3>My Profile</h3>
                        <div style="margin-bottom: 50px;display: flex;justify-content: center;" id="picture"></div>

                        <form action="{{route('submitProfile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div style="margin-bottom: 50px;display: flex;justify-content: center;">
                                <div class="field-label" style="margin-right: 20px;
                                font-weight: 600;">Upload Profile Picture:</div>
                                <input type="file" id="filetag" name='image'>

                            </div>

                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">name</div>
                                    <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="Name">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">email</div>
                                    <input type="text" name="email" value="{{Auth::user()->email}}" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">phone</div>
                                    <input type="text" name="phone" value="{{Auth::user()->phone_no}}"
                                        placeholder="Phone">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Birthday</div>
                                    <div class="field-inner">

                                        <input id="arrival-date2" class="date-picker1" type="date" name="birthday"
                                            @if(!empty($userDetail->dob))
                                        value="{{$userDetail->dob}}" @endif min="" placeholder="" min="">
                                        <label for="arrival-date"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Gender</div>
                                    <select name="gender" class="form-select gender"
                                        aria-label="Default select example">
                                        <option value="">Select Gender</option>
                                        <option value="male" @if(!empty($userDetail->gender)) {{ $userDetail->gender ==
                                            'male' ? 'selected' : '' }}
                                            @endif>Male</option>
                                        <option value="female" @if(!empty($userDetail->gender)) {{ $userDetail->gender
                                            == 'female' ? 'selected' : '' }}
                                            @endif>Female</option>
                                        <option value="none" @if(!empty($userDetail->gender)) {{ $userDetail->gender ==
                                            'none' ? 'selected' : '' }}
                                            @endif>None</option>
                                    </select>
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Category</div>
                                    <input type="text" name="category" value="{{$cat->category_name}}"
                                        placeholder="Phone" readonly>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Eye color</div>
                                    <input type="text" name="eye" @if(!empty($userDetail->eye_color))
                                    value="{{$userDetail->eye_color}}" @endif placeholder="Eye Color">
                                </div>

                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Hair color</div>
                                    <input type="text" name="hair" @if(!empty($userDetail->hair_color))
                                    value="{{$userDetail->hair_color}}" @endif placeholder="Hair Color">
                                </div>
                            </div>
                            <div class="form-group row forfemail">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Bust</div>
                                    <input type="text" name="bust" @if(!empty($userDetail->bust))
                                    value="{{$userDetail->bust}}" @endif placeholder="Bust">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Hip</div>
                                    <input type="text" name="hip" @if(!empty($userDetail->hip))
                                    value="{{$userDetail->hip}}" @endif placeholder="Hip">
                                </div>
                            </div>
                            <div class="form-group row forfemail">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Waist</div>
                                    <input type="text" name="waist" @if(!empty($userDetail->waist))
                                    value="{{$userDetail->waist}}" @endif placeholder="Waist">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Dress</div>
                                    <input type="text" name="dress" @if(!empty($userDetail->dress))
                                    value="{{$userDetail->dress}}" @endif placeholder="Dress">
                                </div>
                            </div>
                            <div class="form-group row forfemail">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Shoes</div>
                                    <input type="text" name="shoes" @if(!empty($userDetail->shoes))
                                    value="{{$userDetail->shoes}}" @endif placeholder="Shoes">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Tatoos</div>
                                    <input type="text" name="tatoos" @if(!empty($userDetail->tatoo))
                                    value="{{$userDetail->tatoo}}" @endif placeholder="Tatooa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Chest</div>
                                    <input type="text" name="chest" @if(!empty($userDetail->chest))
                                    value="{{$userDetail->chest}}" @endif placeholder="Chest">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Height</div>
                                    <input type="text" name="height" @if(!empty($userDetail->height))
                                    value="{{$userDetail->height}}" @endif placeholder="Height">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Facebook (If Any)</div>
                                    <input type="text" name="fb" @if(!empty($userDetail->fb))
                                    value="{{$userDetail->fb}}" @endif placeholder="Facebook">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Instagram (If Any)</div>
                                    <input type="text" name="instagram" @if(!empty($userDetail->insta))
                                    value="{{$userDetail->insta}}" @endif placeholder="Instagram">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Twitter (If Any)</div>
                                    <input type="text" name="twitter" @if(!empty($userDetail->twitter))
                                    value="{{$userDetail->twitter}}" @endif placeholder="Twitter">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Experience (If Any)</div>
                                    <input type="text" name="experience" @if(!empty($userDetail->experience))
                                    value="{{$userDetail->experience}}" @endif placeholder="Experience">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">City</div>
                                    <input type="text" name="city" @if(!empty($userDetail->city))
                                    value="{{$userDetail->city}}" @endif placeholder="City">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">State</div>
                                    <input type="text" name="state" @if(!empty($userDetail->state))
                                    value="{{$userDetail->state}}" @endif placeholder="State">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Country</div>
                                    <input type="text" name="country" @if(!empty($userDetail->country))
                                    value="{{$userDetail->country}}" @endif placeholder="Country">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Pin / Zip code</div>
                                    <input type="text" name="pin" @if(!empty($userDetail->zip_code))
                                    value="{{$userDetail->zip_code}}" @endif placeholder="Pin" maxlength="6">
                                </div>
                            </div>

                            @if($cat->category_name =='business')
                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Organisation Name</div>
                                    <input type="text" name="organisation_name"
                                        @if(!empty($userDetail->organization_name))
                                    value="{{$userDetail->organization_name}}" @endif
                                    placeholder="Organisation Name">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Organisation Establish Date</div>
                                    <input type="date" name="organisation_est_date"
                                        @if(!empty($userDetail->organization_est_date))
                                    value="{{$userDetail->organization_est_date}}" @endif
                                    placeholder="Organisation Establish Date">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Type of Company</div>
                                    <input type="text" name="company_type" @if(!empty($userDetail->company_type))
                                    value="{{$userDetail->company_type}}" @endif placeholder="Company Type">
                                </div>
                                <div class="field-inner col-lg-6 col-md-12 col-sm-12">
                                    <div class="field-label">Company Image</div>
                                    <input type="file" name="company_img" value="" placeholder="Company Image">
                                </div>
                            </div>

                            @endif

                            <div class="form-group row">
                                <div class="field-inner col-lg-12 col-md-12 col-sm-12">
                                    <div class="field-label">About Your Self</div>
                                    <textarea name="aboutme" id="editor" cols="30" rows="10"> @if(!empty($userDetail->your_self))
                                        {{$userDetail->your_self}} @endif </textarea>
                                </div>

                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one" id="profile-save"><span
                                        class="btn-title custom">Save</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</section>




@endsection

@section('js')

<script>
    $( document ).ready(function() {
        $('.forfemail').css('display','none');

    });

    $('.gender').on('change',function(){
        var value = $(this).val();
        if(value=='female'){
            $('.forfemail').css('display','block');
        }else{
            $('.forfemail').css('display','none');
        }
    });
</script>
@endsection