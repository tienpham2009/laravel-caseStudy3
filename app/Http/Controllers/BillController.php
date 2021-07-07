<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{
    public function showBill(Request $request){

        $province = $request->province;
        $district = $request->district;
        $ward = $request->ward;
        $address = $request->address;
        $customerInfo = [
            "name"=>$request->name,
            "phone"=>$request->phone,
            "address"=>$province." , ".$district." , ".$ward." , ".$address
        ];

        return view('user.bill' , compact('customerInfo'));

    }
}
