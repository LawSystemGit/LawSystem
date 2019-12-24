<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/bootstrap.min.css')}}">
    <script src="{{asset('lawSystem/assets/js/jquery.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Welcome back!</h3>
                            <form action="{{route('postLogin')}}" method="POST" id="logForm">

                                @csrf

                                <div class="form-label-group">
                                    <input type="email" name="email" id="inputEmail" class="form-control"
                                           placeholder="Email address">
                                    <label for="inputEmail">Email address</label>

                                    @if ($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-label-group">
                                    <input type="password" name="password" id="inputPassword" class="form-control"
                                           placeholder="Password">
                                    <label for="inputPassword">Password</label>

                                    @if ($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                    type="submit">Sign In
                                </button>
                                <div class="text-center">If you have an account?
                                    <a class="small" href="{{route('registration')}}">Sign
                                        Up</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.notification')
</body>
</html>
