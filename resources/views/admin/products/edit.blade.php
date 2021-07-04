@extends('admin.master')
@section('content')
    <div class="shop-box-inner">
        <div class="container">
            <div class="card">
                <div class="card-header display-4">
                    Cập nhập lại hàng
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <form method="post" enctype="multipart/form-data"
                                  action="{{ route('Product.update' , $product->id)}}">
                                @csrf
                                <div class="form-group">
                                    <img style="width: 500px ; height: 400px" src="{{ asset('storage/productImage/' . $product->image) }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tên trái cây</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ $product->name }}">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Đơn vị tính</label>
                                    <input type="text" class="form-control @error('unit') is-invalid @enderror"
                                           name="unit" value="{{ $product->unit  }}">
                                </div>
                                @error('unit')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Xuất xứ</label>
                                    <input type="text" class="form-control @error('origin') is-invalid @enderror"
                                           name="origin" value="{{ $product->origin }}">
                                </div>
                                @error('origin')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Ngày sản xuất</label>
                                    <input type="date" class="form-control @error('input_date') is-invalid @enderror"
                                           name="input_date" value="{{ old('input_date') }}">
                                </div>
                                @error('input_date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Hạn sử dụng (ngày)</label>
                                    <input type="text" class="form-control @error('expiry_date') is-invalid @enderror"
                                           name="expiry_date" value="{{ old('expiry_date') }}">
                                </div>
                                @error('expiry_date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Danh mục</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Số lượng</label>
                                    <input type="text" class="form-control @error('amount') is-invalid @enderror"
                                           name="amount" value="{{ $product->amount }}">
                                </div>
                                @error('amount')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Đơn giá</label>
                                    <input type="text" class="form-control @error('unit_price') is-invalid @enderror"
                                           name="unit_price" value="{{ $product->unit_price}}">
                                </div>
                                @error('unit_price')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Mô tả</label>
                                    <textarea class="form-control @error('describe') is-invalid @enderror" rows="5"
                                              name="describe">
                                       {{ $product->describe}}
                                    </textarea>
                                </div>
                                @error('describe')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Hình ảnh</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           name="image" value="{{ $product->image }}">
                                </div>
                                @error('image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="row">
                                    <div class="form-group col-3">
                                        <button type="submit" class="btn btn-primary">Cập nhập</button>
                                    </div>
                                    <div class="form-group col-6">
                                        <a href="{{ route('Product.show') }}" type="submit" class="btn btn-success">Quay
                                            Lại</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-6">
                            <diV>
                                <img src="{{ asset('storage/images/banner-fruit.jpg') }}" alt="">
                            </diV>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
