@extends('master')
@section('content')
    <div class="cart-box-main">
        <div class="container">
            <div class="col-sm-12 col-lg-12" style="padding: 0px">
                <div class="title-left">
                    <h3>Thông tin nhận hàng</h3>
                </div>
                <h4>Tên người nhận: <span>{{ $customerInfo["name"] }}</span></h4>
                <h4>Số điện thoại người nhận: <span>{{$customerInfo["phone"]}}</span></h4>
                <h4>Địa chỉ nhận hàng: <span>{{ $customerInfo["address"] }}</span></h4>
                <h4>Ghi chú: <span>{{ $customerInfo["note"] }}</span></h4>
            </div>
            <div class="row">

                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Phương thức giao hàng</h3>
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input"
                                               checked="checked" type="radio">
                                        <label class="custom-control-label" for="shippingOption1">Vận chuyển tiêu chuẩn
                                            </label> <span class="float-right font-weight-bold">Miễn phí</span>
                                    </div>
                                    <div class="ml-4 mb-2 small">(3-7 ngày)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption2" name="shipping-option" class="custom-control-input"
                                               type="radio">
                                        <label class="custom-control-label" for="shippingOption2">Giao hàng nhanh
                                            </label> <span class="float-right font-weight-bold">$10</span>
                                    </div>
                                    <div class="ml-4 mb-2 small">(2-4 ngày)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption3" name="shipping-option" class="custom-control-input"
                                               type="radio">
                                        <label class="custom-control-label" for="shippingOption3">
                                            Hỏa tốc
                                        </label> <span class="float-right font-weight-bold">$20</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Giỏ hàng của bạn</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @if(session()->has(auth()->id().'cart'))
                                        @foreach(session()->get(auth()->id().'cart')->items as $key => $cart )
                                            <div class="media mb-2 border-bottom">
                                                <div class="media-body"><a href="">{{ $cart['item']->name }}</a>
                                                    <div class="small text-muted">Đơn giá:
                                                        $ {{ $cart["item"]->unit_price }} <span class="mx-2">|</span>
                                                        Số lượng: {{ $cart["quantity"] }} <span class="mx-2">|</span>
                                                        Tổng tiền: $ {{ $cart["price"] }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Đơn hàng của bạn</h3>
                            </div>
                            <div class="d-flex">
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"> $
                                    @if(session()->has(auth()->id().'cart'))
                                        <span
                                            id="sub-total">{{ session()->get(auth()->id().'cart')->totalPrice }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex">
                                <h4>Giảm giá</h4>
                                <div class="ml-auto font-weight-bold"> $ </div>
                            </div>
                            <hr class="my-1">
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> Miễn phí</div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"> $ @if(session()->has(auth()->id().'cart'))
                                        <span
                                            id="sub-total">{{ session()->get(auth()->id().'cart')->totalPrice }}</span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                        </div>
                    <div class="col-12 d-flex shopping-box">
                        <form action="{{ route('payment') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $customerInfo["name"] }}" name="name">
                            <input type="hidden" value="{{ $customerInfo["phone"] }}" name="phone">
                            <input type="hidden" value="{{ $customerInfo["address"] }}" name="address">
                            <input type="hidden" value="{{ $customerInfo["note"] }}" name="note">
                            <button type="submit" class="ml-auto btn hvr-hover">Place Order</button>
                        </form>
                    </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



