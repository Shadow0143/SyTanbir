<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{asset('logins/fonts/linearicons/style.css')}}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('logins/css/style.css')}}">
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="{{asset('logins/images/image-1.png')}}" alt="" class="image-1">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h3>New Account?</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <Select class="form-control" name="User_category" required>
                        <option value="">Choose Your Category</option>
                        @foreach ($category as $key=>$val )
                        <option value="{{$val->id}}">{{$val->category_name}}</option>
                        @endforeach
                    </Select>


                </div>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="User Name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <button type="submit">
                    <span>Register</span>
                </button>
                <p style="margin: 8px">Already have an account ? <span><a href="{{route('login')}}">Click
                            here</a></span></p>
            </form>
            <img src="{{asset('logins/images/image-2.png')}}" alt="" class="image-2">
        </div>

    </div>

    <script src="{{asset('logins/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('logins/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>