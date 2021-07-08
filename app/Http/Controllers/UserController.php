<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showProfile($id)
    {
        $user=User::findOrFail($id);
        return view('user.edit_profile',compact('user'));
    }
    public function changePassword($id,Request $request){
        $user=User::findOrFail($id);
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('index');
    }
    public function editProfile($id,Request $request){;
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->address=$request->province.','.$request->district.','.$request->ward;
        $user->save();
        return redirect()->route('index');
    }
}
