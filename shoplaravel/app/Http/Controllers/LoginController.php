<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $rules = ['email' => 'required|email', 'password' => 'required|min:6'];
        $messages = [
            'email.required' => 'Email không được phép để trống!',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Password không được phép để trống!',
            'password.min' => 'Password phải chứa ít nhất 6 kí tự!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('home');
            } else {
                Session::flash('error', 'Bạn đăng nhập sai tài khoản hoặc mật khẩu!');
                return redirect()->back();
            }
        }
    }

    public function changePassword(Request $request)
    {
        return view('changepassword');
    }

    public function updateChangePassword(Request $request)
    {
        $rules = [
            'oldPassword' => 'required|max:64',
            'newPassword' => 'required|max:64',
            'new_confirm_password' => 'required|max:64|same:newPassword',
        ];

        $messages = [
            'oldPassword.required' => 'Mật khẩu hiện tại không được để trống',
            'newPassword.required' => 'Mật khẩu mới không được để trống',
            'new_confirm_password.required' => 'Xác nhận mật khẩu mới không được để trống',
            'new_confirm_password.same' => 'Xác nhận mật khẩu không khớp',
            'oldPassword.max' => 'Mật khẩu  không quá 64 ký tự',
            'newPassword.max' => 'Mật khẩu  không quá 64 ký tự',
            'new_confirm_password.max' => 'Mật khẩu  không quá 64 ký tự',

        ];
        if (!empty($request->input('rule1'))) {
            $rules['newPassword'] = 'min:8|max:64';
            $messages['newPassword.min'] = 'Mật khẩu phải từ 8 ký tự';
            $messages['newPassword.max'] = 'Mật khẩu phải không quá 64 ký tự';
        }
        if (!empty($request->input('rule2'))) {

            $rules['newPassword'] = $rules['newPassword'] . '|regex:/[A-Za-z]/';
            $messages['newPassword.regex'] = 'Mật khẩu phải có ích nhất một chữ cái';
        }
        if (!empty($request->input('rule3'))) {

            $rules['newPassword'] = $rules['newPassword'] . '|regex:/[0-9]/';
            $messages['newPassword.regex'] = 'Mật khẩu phải có ích nhất một chữ số';
        }
        if (!empty($request->input('rule4'))) {

            $rules['newPassword'] = $rules['newPassword'] . '|regex:/[!@#$%^&*-_+=]/';
            $messages['newPassword.regex'] = 'Mật khẩu phải có ích nhất một ký tự đặc biệt';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = Auth::user();
            if (!Hash::check($request->oldPassword, $user->password)) {
                Session::flash('error', 'Mật khẩu hiện tại không tồn tại');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user->password = Hash::make($request->newPassword);

            $user->save();
            Session::flash('success', 'Cập nhật thành công');
            return redirect()->route('changePassword');
        }

    }
}
