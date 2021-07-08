<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{route('auth.register')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Full name" value="{{old('name')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3 text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3 text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{old('phone')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3 text-danger">
                    @error('phone')
                    {{ $message }}
                    @enderror
                </div>
                <div class="row">
                    <div class="col-4">
                        <select class="form-control" name="province" id="province">
                        </select>
                    </div>
                    <div class=" col-4">
                        <select class="form-control" name="district" id="district">
                            <option value="">Quận/Huyện</option>
                        </select>
                    </div>
                    <div class=" col-4">
                        <select class="form-control" name="ward" id="ward">
                            <option value="">Phường/Xã</option>
                        </select>
                    </div>
                </div>

                @if($errors->has('province')||$errors->has('district')||$errors->has('ward'))
                    <div class="input-group text-danger">
                        This field can't be empty
                    </div>
                @endif


                <div class="input-group mb-3 text-danger">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3 text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                           placeholder="Password Confirmation">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{route('auth.google')}}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div>

            <a href="{{route('auth.showFormLogin')}}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
<script src="{{asset('js/my/cart.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
