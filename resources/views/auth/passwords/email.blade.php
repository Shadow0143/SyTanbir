<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Confirm Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{asset('logins/fonts/linearicons/style.css')}}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('logins/css/style.css')}}">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">

                            <form method="POST" action="{{ route('password.email') }}">
                                <img src="{{asset('logins/images/image-1.png')}}" alt="" class="image-1">
                                @csrf
                                <div class="">
                                    <h3>
                                        {{ __('Reset Password') }}
                                    </h3>
                                </div>

                                <div class="row mb-3">



                                    <div class="form-holder">
                                        <span class="lnr lnr-envelope"></span>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Email">
                                    </div>
                                    @error('email')
                                    <span style="color:red;margin-top:5px;">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    @if (session('status'))
                                    <div style="color:green;margin-top:5px;">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                                <img src="{{asset('logins/images/image-2.png')}}" alt="" class="image-2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('logins/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('logins/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>