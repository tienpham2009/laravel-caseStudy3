@extends('master')
@section('content')
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <div class="table-main table-responsive">
                        <table class="table" id="cart">
                            <thead>
                            <tr>
                                <th><button class="btn btn-cart" id="select-all">Chọn tất cả</button></th>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(session()->has('cart'))
                                @foreach(session()->get('cart')->items as $key => $cart )
                                    <tr id="delete-{{ $key }}">
                                        <td><input class="select" type="checkbox" value="{{ $key }}" name="checkbox[]"></td>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid"
                                                     src="{{ asset('storage/productImage/'. $cart['item']->image) }}"
                                                     alt=""/>
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                {{ $cart['item']->name }}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p id="unit_price-{{$key}}">{{ $cart['item']->unit_price }}</p>
                                        </td>
                                        <td class="">
                                            <button id="" onclick="increment({{$key}})" class="btn hvr" style="background-color: rgb(176, 180, 53)">+</button>
                                            <input type="number"  size="2"
                                                                        value="{{ $cart['quantity'] }}" min="0"
                                                                        step="1"
                                                                        id="amount-{{$key}}"
                                                                        class="text-center ">
                                            <button id="reduction-{{$key}}" onclick="reduction({{$key}})" class="btn hvr" style="background-color: rgb(176, 180, 53)">-</button>
                                        </td>
                                        <td class="total-pr">
                                            <p id="price-{{$key}}">{{ $cart['price'] }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        Bạn chưa mua sản phẩm nào
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-4 col-sm-4">
                    <div class="update-box">
                        <a href="{{ route('index') }}" type="button" class="btn hvr-hover">Quay Lại</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4" >
                    <div class="update-box float-right">
{{--                        <button type="button" id="delete-cart" class="btn hvr-hover">Xóa</button>--}}
                        <button type="button" class="btn btn hvr-hover" data-toggle="modal" data-target="#exampleModal">Xóa</button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm khỏi giỏ hàng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="content" style="color: red">Bạn chắc chắn muốn xóa ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" id="delete-cart" class="btn btn-danger">Đồng ý</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4" >
                    <div class="update-box float-right">
                        <a href="" type="button" class="btn hvr-hover">Cập nhập giỏ hàng</a>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130</div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40</div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10</div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2</div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free</div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ 388</div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.html"
                                                           class="ml-auto btn hvr-hover">Checkout</a></div>
            </div>

        </div>
    </div>
@endsection
