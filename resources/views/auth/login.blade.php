<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>login</title>
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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Login</h3>

                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Email">
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <p style="color: red">{{ $message }}</p>
                </span>
                @enderror
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <p style="color: red">{{ $message }}</p>
                </span>
                @enderror
                <button type="submit">
                    <span>Login</span>
                </button>
                <p style="margin: 8px">Don't have and Account ? <span><a href="{{route('newRegister')}}">Click
                            here</a></span></p>
                <p>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </p>
            </form>
            <img src="{{asset('logins/images/image-2.png')}}" alt="" class="image-2">
        </div>

    </div>

    <script src="{{asset('logins/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('logins/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>