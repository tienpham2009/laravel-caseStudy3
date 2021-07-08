<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Brian2694\Toastr\Toastr;
use Brian2694\Toastr\ToastrServiceProvider;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $remember = $request->has('remember');
        $email = $request->email;
        $password = $request->password;
        $data = [
            'email' => $email,
            'password' => $password
        ];

        if (!Auth::attempt($data, $remember)) {
            session()->flash('login-error', 'Tài khoản hoặc mật khẩu không chính xác');
            return redirect()->route('auth.showFormLogin');
        }
        return redirect()->route('index');


    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $name = $request->name;
        $password = $request->password;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->province . ',' . $request->district . ',' . $request->ward;
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'address' => $address,
            'phone' => $phone,
        ];
        $check = $this->create($data);
        if ($check) {
            Session::flash('message', 'Đăng ký thành công');
        }
        return redirect()->route('auth.showFormLogin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
