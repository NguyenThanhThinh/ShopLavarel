<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login (Request $request)
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
}
