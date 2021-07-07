<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class BillController extends Controller
{
    const UNPAID = 0;
    const PAID = 1;
    public function showBill(Request $request)
    {

        $province = $request->province;
        $district = $request->district;
        $ward = $request->ward;
        $address = $request->address;
        $note = $request->note;
        $customerInfo = [
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $province . " , " . $district . " , " . $ward . " , " . $address,
            "note" => $note
        ];

        return view('user.bill', compact('customerInfo'));
    }

    public function payment(Request $request)
    {
        DB::beginTransaction();
        try {
            $customerName = $request->name;
            $customerPhone = $request->phone;
            $customerAddress = $request->address;
            $customerNote = $request->note;
            $order_date = date('Y-m-d H:i:s');
            $status = self::UNPAID;
            $user_id = Auth::id();

            $carts = session()->get(Auth::id().'cart');

            $order = new Order();
            $order->order_date = $order_date;
            $order->status = $status;
            $order->user_id = $user_id;
            $order->customerName = $customerName;
            $order->customerPhone = $customerPhone;
            $order->customerAddress = $customerAddress;
            $order->customerNote = $customerNote;
            $order->totalPrice = $carts->totalPrice;
            $order->totalQuantity = $carts->totalQuantity;

            $order->save();
            session()->put('order_id' , $order->id);


            $items = $carts->items;
            foreach ($items as $key => $item) {
                $order_detail = new OrderDetail();
                $order_detail->product_id = $item["item"]->id;
                $order_detail->order_id = $order->id;
                $order_detail->quantity = $item["quantity"];
                $order_detail->price = $item["price"];

                $order_detail->save();
            }
            session()->forget(Auth::id().'cart');
            DB::commit();
        }catch (Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }
        return redirect()->route('bill');
    }

    public function bill()
    {
        $order_id = session()->get('order_id');
        $order = Order::findOrFail($order_id);

        return view('user.payment' , compact('order'));
    }


}
