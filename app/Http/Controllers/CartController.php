<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;
use function GuzzleHttp\Psr7\_caseless_remove;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::id();
        $product = Product::findOrFail($id);
        if (session()->has($user_id.'cart')) {
            $oldCart = session()->get($user_id.'cart');
        } else {
            $oldCart = null;
        }

        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        session()->put($user_id.'cart', $cart);
        session()->flash('success', 'Thêm vào giỏ hàng thành công');
        $carts = \session()->get($user_id.'cart');
        return response()->json($carts);
    }

    public function show()
    {
        return view('user.cart.show-cart');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::id();
        if (\session()->has($user_id.'cart')) {
            $oldCart = \session()->get($user_id.'cart');
            if (count($oldCart->items) > 0) {
                $carts = new Cart($oldCart);
                $carts->delete($id);
                \session()->put($user_id.'cart', $carts);
                \session()->flash('delete-success', 'Xóa giỏ hàng thành công');
            } else {
                \session()->flash('delete_error', 'Bạn chưa mua sản phẩm nào');
            }
        } else {
            \session()->flash('delete_error', 'Bạn chưa mua sản phẩm nào');
        }
    }

    public function update(Request $request)
    {
        $id = $request->key;
        $user_id = Auth::id();
        $amount = $request->amount;
        if (\session()->has($user_id.'cart')) {
            $oldCart = \session()->get($user_id.'cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->update($id, $amount);
                \session()->put($user_id.'cart', $cart);
            } else {
                \session()->flash('cart', 'Bạn chưa có sản phẩm nào');
            }
        } else {
            \session()->flash('cart', 'Bạn chưa có sản phẩm nào');
        }
        $casts = \session()->get($user_id.'cart');
        return response()->json($casts);
    }
}
