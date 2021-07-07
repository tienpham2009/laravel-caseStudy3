@extends('master')
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
{{--                        <h4>Ngày nhập kho:</h4>--}}
{{--                        <p>{{ $product->input_date }}</p>--}}
{{--                        <h4>Ngày hết hạn:</h4>--}}
{{--                        <p>{{ $product->expiration_date	 }}</p>--}}
{{--                        <h4>Số lượng ({{ $product->unit }}):</h4>--}}
{{--                        <p>{{ $product->amount }}</p>--}}
                    </div>
                    <div class="row">
                        <div class="carousel-inner col-3">
                            <a class="cart add-cart  @if(auth()->check()){{ "side-menu "}}@endif btn hvr-hover" @if(!auth()->check()) href="{{  route('auth.showFormLogin') }}"  @endif id="{{ $product->id }}">Add to Cart</a>
                        </div>
                        <div class="carousel-inner col-6">
                            <a class="btn hvr-hover" href="{{ route('index') }}">Quay lại</a>
                        </div>
                    </div>

                </div>
            </div>

            {{--            <div class="row my-5">--}}
            {{--                <div class="card card-outline-secondary my-4">--}}
            {{--                    <div class="card-header">--}}
            {{--                        <h2>Product Reviews</h2>--}}
            {{--                    </div>--}}
            {{--                    <div class="card-body">--}}
            {{--                        <div class="media mb-3">--}}
            {{--                            <div class="mr-2">--}}
            {{--                                <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">--}}
            {{--                            </div>--}}
            {{--                            <div class="media-body">--}}
            {{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
            {{--                                <small class="text-muted">Posted by Anonymous on 3/1/18</small>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <hr>--}}
            {{--                        <div class="media mb-3">--}}
            {{--                            <div class="mr-2">--}}
            {{--                                <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">--}}
            {{--                            </div>--}}
            {{--                            <div class="media-body">--}}
            {{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
            {{--                                <small class="text-muted">Posted by Anonymous on 3/1/18</small>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <hr>--}}
            {{--                        <div class="media mb-3">--}}
            {{--                            <div class="mr-2">--}}
            {{--                                <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">--}}
            {{--                            </div>--}}
            {{--                            <div class="media-body">--}}
            {{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
            {{--                                <small class="text-muted">Posted by Anonymous on 3/1/18</small>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <hr>--}}
            {{--                        <a href="#" class="btn hvr-hover">Leave a Review</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div class="row my-5">--}}
            {{--                <div class="col-lg-12">--}}
            {{--                    <div class="title-all text-center">--}}
            {{--                        <h1>Featured Products</h1>--}}
            {{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>--}}
            {{--                    </div>--}}
            {{--                    <div class="featured-products-box owl-carousel owl-theme">--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="item">--}}
            {{--                            <div class="products-single fix">--}}
            {{--                                <div class="box-img-hover">--}}
            {{--                                    <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">--}}
            {{--                                    <div class="mask-icon">--}}
            {{--                                        <ul>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>--}}
            {{--                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>--}}
            {{--                                        </ul>--}}
            {{--                                        <a class="cart" href="#">Add to Cart</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="why-text">--}}
            {{--                                    <h4>Lorem ipsum dolor sit amet</h4>--}}
            {{--                                    <h5> $9.79</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>
    </div>
    <!-- End Cart -->
@endsection
