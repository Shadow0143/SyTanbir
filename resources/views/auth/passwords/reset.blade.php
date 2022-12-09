<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Change Password</title>
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
                            <form method="POST" action="{{ route('password.update') }}">
                                <img src="{{asset('logins/images/image-1.png')}}" alt="" class="image-1">

                                @csrf
                                <div class="card-header">
                                    <h3>
                                        {{ __('Reset Password') }}
                                    </h3>
                                </div>

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="row mb-3">


                                    <div class="form-holder">
                                        <span class="lnr lnr-envelope"></span>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-holder">
                                    <span class="lnr lnr-lock"></span>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-holder">
                                    <span class="lnr lnr-lock"></span>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
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