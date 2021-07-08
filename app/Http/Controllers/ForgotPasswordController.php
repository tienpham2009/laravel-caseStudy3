<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('forgot_password');
    }

    public function submitForgetPasswordForm(ForgetPasswordRequest $request)
    {
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->from(env('MAIL_USERNAME'));
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        Session::flash('message', "We have e-mailed your password reset link!");
        return redirect()->route('auth.showForgetPassword');
    }

    public function showResetPasswordForm($token)
    {
        return view('reset_password', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();


        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        Session::flash('message', 'Your password has been changed!');
        return redirect()->route('auth.showFormLogin');
    }
}
