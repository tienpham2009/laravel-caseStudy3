@extends('master')
@section('content')
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{ asset('storage/images/banner-01.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>Tien Trai Cay</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends
                                to see any changes in performance over time.</p>
                            {{--                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>--}}
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('storage/images/banner-02.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Tien Trai Cay</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends
                                to see any changes in performance over time.</p>
                            {{--                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>--}}
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('storage/images/banner-03.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Tien Trai Cay</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends
                                to see any changes in performance over time.</p>
                            {{--                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>--}}
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control"
                                            data-placeholder="$ USD">
                                        <option data-display="Select">Nothing</option>
                                        <option value="1">Popularity</option>
                                        <option value="2">High Price → High Price</option>
                                        <option value="3">Low Price → High Price</option>
                                        <option value="4">Best Selling</option>
                                    </select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i
                                                class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i
                                                class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row filter-data">
                                        @forelse($products as $product)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover image-product">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img
                                                            src="{{ asset('storage/productImage/'. $product->image ) }}"
                                                            class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                       data-placement="right"
                                                                       title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                       data-placement="right"
                                                                       title="Compare"><i
                                                                            class="fas fa-sync-alt"></i></a>
                                                                </li>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                       data-placement="right"
                                                                       title="Add to Wishlist"><i
                                                                            class="far fa-heart"></i></a>
                                                                </li>
                                                            </ul>
                                                            <button class="cart add-cart @if(auth()->check()){{ "side-menu "}}@endif my-3"
                                                                    id="{{ $product->id }}"
                                                                    data-toggle="@if(!auth()->check()){{ "modal" }}@endif"
                                                                    data-target="@if(!auth()->check()){{ "#modalLRForm " }}@endif">
                                                                Add to Cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="why-text">
                                                        <h4><a href="{{ route('detailProduct' , $product->id) }}"
                                                               class="">{{ $product->name }}</a></h4>
                                                        <h5>{{ $product->unit_price }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <p>Không có sản phẩm</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Danh mục</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree"
                                 id="list-group-men" data-children=".sub-men">
                                <li>
                                    <p id="show-all" class="list-group-item list-group-item-action filter">Tất cả danh
                                        mục
                                    </p>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <p onclick="filterCate({{$category->id}})"
                                           class="list-group-item list-group-item-action filter">{{ $category->name }}
                                            ({{$category->countProduct($category->id)}})</p>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly
                                           style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit" id="filter-price">Filter</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('modal')
    <!--Modal: Login / Register Form-->
    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i
                                    class="fas fa-user mr-1"></i>
                                Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i
                                    class="fas fa-user-plus mr-1"></i>
                                Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel9" role="tab"><i
                                    class="fas fa-user-plus mr-1"></i>
                                Forgot Password </a>
                        </li>
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                            <!--Body-->
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="modal-body mb-1">
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input type="email" id="modalLRInput10"
                                               class="form-control form-control-sm validate" name="email">
                                        <label data-error="wrong" data-success="right" for="modalLRInput10">Your
                                            email</label>
                                    </div>

                                    <div class="md-form form-sm mb-4">
                                        <i class="fas fa-lock prefix"></i>
                                        <input type="password" id="modalLRInput11"
                                               class="form-control form-control-sm validate" name="password">
                                        <label data-error="wrong" data-success="right" for="modalLRInput11">Your
                                            password</label>
                                    </div>
                                    <div class="text-center mt-2">
                                        <button class="btn btn-info" type="submit">Log in <i class="fas fa-sign-in ml-1"></i></button>
                                    </div>
                                </div>
                            </form>
                            <!--Footer-->
                            {{--                            <div class="modal-footer">--}}
                            {{--                                <div class="options text-center text-md-right mt-1">--}}
                            {{--                                    <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>--}}
                            {{--                                    <p>Forgot <a data-toggle="tab" href="#panel9" role="tab" class="blue-text">Password?</a></p>--}}
                            {{--                                </div>--}}
                            {{--                                <button type="button" class="btn btn-outline-info waves-effect ml-auto"--}}
                            {{--                                        data-dismiss="modal">Close--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}

                        </div>
                        <!--/.Panel 7-->

                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">

                            <!--Body-->
                            <div class="modal-body">
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" id="modalLRInput12"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput12">Your
                                        email</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput13"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput13">Your
                                        password</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput14"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat
                                        password</label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button class="btn btn-info">Sign up <i class="fas fa-sign-in ml-1"></i></button>
                                </div>

                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div class="options text-right">
                                    <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a>
                                    </p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                                        data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                        <!--/.Panel 8-->
                        <!--/.Panel 9-->
                        <div class="tab-pane fade" id="panel9" role="tabpanel">

                            <!--Body-->
                            <div class="modal-body">
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" id="modalLRInput12"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput12">Your
                                        email</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput13"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput13">Your
                                        password</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput14"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat
                                        password</label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button class="btn btn-info">Sign up <i class="fas fa-sign-in ml-1"></i></button>
                                </div>

                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div class="options text-right">
                                    <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a>
                                    </p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                                        data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                        <!--/.Panel 9-->

                    </div>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login / Register Form-->
@endsection
