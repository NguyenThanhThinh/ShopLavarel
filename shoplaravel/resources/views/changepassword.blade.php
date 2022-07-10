@extends('layouts.home')
@section('css-changpassword')
    <link rel="stylesheet" href="{{ asset('css/agent.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"
          integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thay đổi mật khẩu</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('updateChangePassword')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="oldPassword">Mật khẩu hiện tại <span><i
                                class="fa far fa-star"></i></span></label>
                    <div class="col-sm-5 input-group">
                        <input id="oldPassword" type="password" name="oldPassword" class="form-control"
                               value="{{old('oldPassword')}}">
                        <div class="input-group-append">
                        <span class="input-group-text" toggle="#password-field">
                          <i class="fa fa-fw fa-eye field-icon" id="toggle__oldPassword"></i>
                        </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        @error('oldPassword')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="newPassword">Mật khẩu mới <span><i
                                class="fa far fa-star"></i></span></label>
                    <div class="col-sm-5 input-group">
                        <input id="newPassword" type="password" name="newPassword" class="form-control"
                               value="{{old('newPassword')}}">
                        <div class="input-group-append">
                        <span class="input-group-text" toggle="#password-field">
                          <i class="fa fa-fw fa-eye field-icon" id="toggle__newPassword"></i>
                        </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        @error('newPassword')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="name"></label>
                    <div class="col-sm-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rule1" value="rule1"
                                   {{ old('rule1') == 'rule1' ? 'checked' : '' }} id="rule1">
                            <label class="form-check-label" for="rule1">
                                Sử dụng 8 đến 64 ký tự
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rule2" value="rule2" value="rule1"
                                   {{ old('rule2') == 'rule2' ? 'checked' : '' }} id="rule2">
                            <label class="form-check-label" for="rule2">
                                Bao gồm ích nhất một chữ cái
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="rule3" type="checkbox" value="rule3" value="rule3"
                                   {{ old('rule3') == 'rule3' ? 'checked' : '' }} id="rule3">
                            <label class="form-check-label" for="rule3">
                                Bao gồm ích nhất một chữ số
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rule4" value="rule4" value="rule4"
                                   {{ old('rule4') == 'rule4' ? 'checked' : '' }} id="rule4">
                            <label class="form-check-label" for="rule4">
                                Bao gồm ích nhất một ký tự đặc biệt
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="defaultCheck1">
                                Ký tự đặc biệt <strong>!@#$%^&*-_+=</strong>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        @error('name')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="new_confirm_password">Xác nhận mật khẩu mới <span><i
                                class="fa far fa-star"></i></span></label>
                    <div class="col-sm-5 input-group">
                        <input id="new_confirm_password" type="password" name="new_confirm_password"
                               class="form-control" value="{{old('new_confirm_password')}}">
                        <div class="input-group-append">
                        <span class="input-group-text" toggle="#password-field">
                          <i class="fa fa-fw fa-eye field-icon" id="toggle__confirmPassword"></i>
                        </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        @error('new_confirm_password')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-danger float-left  border-radius-5" href="{{route('home')}}"
                   style="margin-right: 5px">
                    Hủy
                </a>
                <button type="submit" class="btn btn-primary  border-radius-5">Lưu</button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/change-password.js') }}">
    </script>
    <script>
        var changePassword = new handlerChangePassword();
        changePassword.initialize();
    </script>
@endsection


