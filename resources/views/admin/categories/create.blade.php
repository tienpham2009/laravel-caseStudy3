@extends('admin.categories.master')
@section('content')
    <div class="shop-box-inner">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Thêm thể loại
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <form method="post" action="{{ route('Category.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tên danh mục</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
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
