<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function login(Request $request)
    {
        $remember= $request->has('remember');
        $email = $request->email;
        $password = $request->password;
        $data = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($data,$remember)) {
            return redirect()->route('user.dashboard');
        }
        session()->flash('login-error', 'Tài khoản hoặc mật khẩu không chính xác');
        return redirect()->route('auth.showFormLogin');
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
        ]);
    }

    public function register(Request $request)
    {
        $name =$request->name;
        $password =$request->password;
        $email=$request->email;
        $address =$request->address;
        $data = [
            'name'=>$name,
            'email' => $email,
            'password' => $password,
            'address'=>$address,
        ];
        $check=$this->create($data);
        if ($check){
            Session::flash('register-success','Đăng ký thành công');
        }
        return redirect()->route('auth.showFormLogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.showFormLogin');
    }
}