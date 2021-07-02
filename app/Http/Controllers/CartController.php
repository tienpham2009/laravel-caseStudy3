<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use function GuzzleHttp\Psr7\_caseless_remove;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        if (session()->has('cart')) {
            $oldCart = session()->get('cart');
        } else {
            $oldCart = null;
        }

        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        session()->put('cart', $cart);
        session()->flash('success', 'Thêm vào giỏ hàng thành công');

        $carts = \session()->get('cart');
        return response()->json($carts);
    }

    public function show()
    {
        return view('user.cart.show-cart');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (\session()->has('cart')) {
            $oldCart = \session()->get('cart');
            if (count($oldCart->items) > 0) {
                $carts = new Cart($oldCart);
                $carts->delete($id);
                \session()->put('cart', $carts);
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
        $amount = $request->amount;
        if (\session()->has('cart')) {
            $oldCart = \session()->get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->update($id, $amount);
                \session()->put('cart', $cart);
            } else {
                \session()->flash('cart', 'Bạn chưa có sản phẩm nào');
            }
        } else {
            \session()->flash('cart', 'Bạn chưa có sản phẩm nào');
        }
        $casts = \session()->get('cart');
        return response()->json($casts);
    }
}
