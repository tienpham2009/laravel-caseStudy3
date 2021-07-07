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
                                <th><input type="checkbox" id="checkAll"><span>  Chọn tất cả</span></th>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(session()->has(auth()->id().'cart'))
                                @foreach(session()->get(auth()->id().'cart')->items as $key => $cart )
                                    <tr id="delete-{{ $key }}">
                                        <td><input class="select" type="checkbox" value="{{ $key }}" name="checkbox[]">
                                        </td>
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
                                        <td>
                                            <button id="" data-id="{{ $key }}" onclick="increment({{$key}})"
                                                    class="btn hvr" style="background-color: rgb(176, 180, 53)">+
                                            </button>
                                            <input type="number" size="2"
                                                   value="{{ $cart['quantity'] }}" min="0"
                                                   step="1"
                                                   id="amount-{{$key}}"
                                                   class="text-center ">
                                            <button id="" onclick="reduction({{$key}})" class="btn hvr"
                                                    style="background-color: rgb(176, 180, 53)">-
                                            </button>
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
                <div class="col-lg-4 col-sm-4">
                    <div class="update-box float-right">
                        {{--                        <button type="button" id="delete-cart" class="btn hvr-hover">Xóa</button>--}}
                        <button type="button" class="btn btn hvr-hover" data-toggle="modal" data-target="#exampleModal">
                            Xóa
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" id="delete-cart" class="btn btn-danger">Đồng ý</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
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
                            <div class="ml-auto font-weight-bold"> $
                                @if(session()->has(auth()->id().'cart'))
                                    <span id="sub-total">{{ session()->get(auth()->id().'cart')->totalPrice }}</span>
                                @endif
                            </div>
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
                            <div class="ml-auto h5"> $
                                @if(session()->has(auth()->id().'cart'))
                                    <span id="grand-total">{{ session()->get(auth()->id().'cart')->totalPrice }}</span>
                                @endif</div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box">
                    <button
                        data-toggle="modal" data-target="#modalLoginForm"
                        class="ml-auto btn hvr-hover">Checkout
                    </button>
                </div>
            </div>


        </div>
    </div>

    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('showBill') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Nhập thông tin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body row">
                        <div class="md-form col-6">
                            <input type="text" id="defaultForm-email" class="form-control validate" name="name"
                                   placeholder="name">
                        </div>

                        <div class="md-form col-6">
                            <input type="text" id="defaultForm-pass" class="form-control validate" name="phone"
                                   placeholder="phone">
                        </div>
                        <div class="md-form col-4">
                            <select class="form-control" name="province" id="province">
                            </select>
                        </div>
                        <div class="md-form col-4">
                            <select class="form-control" name="district" id="district">
                                <option value="">Quận/Huyện</option>
                            </select>
                        </div>
                        <div class="md-form col-4">
                            <select class="form-control" name="ward" id="ward">
                                <option value="">Phường/Xã</option>
                            </select>
                        </div>
                        <div class="md-form col-12">
                            <input type="text" id="defaultForm-email" class="form-control validate" name="address"
                                   placeholder="Địa chỉ cụ thể">
                        </div>
                        <div class="md-form col-12">
                            <textarea class="form-control" rows="5"></textarea>
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Ghi chú</label>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class=" btn btn-default" data-dismiss="modal">Trở lại</button>
                        <button type="submit" class="btn btn-default">Hoàn thành</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
