@extends('master')
@section('content')
    <div class="container">
        <div class="col-sm-6 col-lg-6 mb-3">
            <div class="col-md-12 col-lg-12">
                <div class="order-box">

                    <div class="title-left">
                        <h3>Hóa Đơn của ban: </h3>
                    </div>
                    <div class="d-flex">
                        <div class="font-weight-bold">Product</div>
                        <div class="ml-auto font-weight-bold">Total</div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Tổng tiền</h4>
                        <div class="ml-auto font-weight-bold"> $
                            <span>{{ $order->totalPrice }}</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <h4>Tổng sản phẩm đã mua</h4>
                        <div class="ml-auto font-weight-bold"><span>{{ $order->totalQuantity }}</span></div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Coupon Discount</h4>
                        <div class="ml-auto font-weight-bold"> $ 0</div>
                    </div>
                    <div class="d-flex">
                        <h4>Tax</h4>
                        <div class="ml-auto font-weight-bold"> $ 0</div>
                    </div>
                    <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div class="ml-auto font-weight-bold"> Free</div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5"> $
                                <span
                                    id="sub-total">{{ $order->totalPrice }}</span>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex shopping-box">
                    <a type="" href="{{ route('index') }}" class="ml-auto btn hvr-hover">Quay Lại</a>
            </div>
        </div>
    </div>
@endsection
