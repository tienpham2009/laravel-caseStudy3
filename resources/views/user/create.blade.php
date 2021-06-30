@extends('master')
@section('content')
    <div class="shop-box-inner">
        <div class="container">
            <div class="card">
                <div class="card-header display-4">
                    Thêm trái cây mới
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <form method="post" enctype="multipart/form-data" action="{{ route('Product.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tên trái cây</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ old('name') }}">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Đơn vị tính</label>
                                    <input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}">
                                </div>
                                @error('unit')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Xuất xứ</label>
                                    <input type="text" class="form-control @error('origin') is-invalid @enderror" name="origin"  value="{{ old('origin') }}" >
                                </div>
                                @error('origin')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Hạn sử dụng (ngày)</label>
                                    <input type="text" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date"  value="{{ old('expiry_date') }}" >
                                </div>
                                @error('expiry_date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Số lượng</label>
                                    <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"   value="{{ old('amount') }}">
                                </div>
                                @error('amount')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Đơn giá</label>
                                    <input type="text" class="form-control @error('unit_price') is-invalid @enderror" name="unit_price"  value="{{ old('unit_price') }}" >
                                </div>
                                @error('unit_price')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Mô tả</label>
                                    <textarea class="form-control @error('describe') is-invalid @enderror" rows="5" name="describe">
                                       {{ old('describe') }}
                                    </textarea>
                                </div>
                                @error('describe')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Hình ảnh</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"  value="{{ old('image') }}">
                                </div>
                                @error('image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-6">
                            <diV >
                                <img src="{{ asset('storage/images/banner-fruit.jpg') }}" alt="">
                            </diV>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
