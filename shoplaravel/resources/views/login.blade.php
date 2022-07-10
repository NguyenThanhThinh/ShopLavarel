<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"
          integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="login-wrap">
    <div class="login-html">
        @if (Session::has('error'))
            <p class="text-danger" style="color: red">
                <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                {{ Session::get('error') }}
            </p>
        @endif
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng nhập</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form method="post" action="/">
                    @csrf
                    <div class="group">
                        <label for="email" class="label">Email</label>
                        <input id="email" type="text" name="email" class="input" value="{{ old('email') }}">
                    </div>
                    @if($errors->has('email'))
                        <p class="text-danger" style="color: red">{{ $errors->first('email') }}</p>
                    @endif
                    <div class="group">
                        <label for="password" class="label">Mật khẩu</label>
                        <input id="password" type="password" name="password" class="input" data-type="password" value="{{old('password')}}">
                    </div>
                    @if($errors->has('password'))
                        <p class="text-danger" style="color: red">{{ $errors->first('password') }}</p>
                    @endif
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Ghi nhớ tài khoản</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Đăng nhập">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include("layouts.message")
</body>
</html>
