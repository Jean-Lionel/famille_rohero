<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Famille Rohero</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">

                                           <input id="email" type="email" class="form-control  form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address...">

                                           @error('email')
                                           <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror


                                    </div>
                                    <div class="form-group">
                                       <input id="password" type="password" class="form-control-user form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                       @error('password')
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                       <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    
                                </div>
                            </div>
                           
                              <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                </button>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Login with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">


                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

</div>

<!-- Bootstrap core JavaScript-->

</body>

</html>