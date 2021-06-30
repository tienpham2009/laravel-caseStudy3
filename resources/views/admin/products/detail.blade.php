@extends('admin.master')
@section('content')
    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"><img class="d-block w-100"
                                                                   src="{{ asset('storage/productImage/'.$product->image) }}"
                                                                   alt="First slide"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $product->name }}</h2>
                        <h5>{{ $product->unit_price }} VND</h5>
                        <h4>Mô tả:</h4>
                        <p>{{ $product->describe }}</p>
                        <h4>Đơn vị tính:</h4>
                        <p>{{ $product->unit }}</p>
                        <h4>Xuất xứ</h4>
                        <p>{{ $product->origin }}</p>
                        <h4>Ngày nhập kho:</h4>
                        <p>{{ $product->input_date }}</p>
                        <h4>Ngày hết hạn:</h4>
                        <p>{{ $product->expiration_date	 }}</p>
                        <h4>Số lượng ({{ $product->unit }}):</h4>
                        <p>{{ $product->amount }}</p>
                    </div>
                    <div class="row">
                        <div class="carousel-inner col-3">
                            <a class="btn btn-primary" href="{{ route('Product.edit' , $product->id) }}">Cập Nhập</a>
                        </div>
                        <div class="carousel-inner col-6">
                            <a class="btn btn-success" href="{{ route('Product.show') }}">Quay lại</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
