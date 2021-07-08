@extends('admin.products.master')
@section('content')
    <div class="shop-box-inner">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Cập nhập thể loại
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <form method="post"
                                  action="{{ route('Category.update' , $category->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tên thể loại</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ $category->name }}">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="row">
                                        <div class="form-group col-3">
                                            <button type="submit" class="btn btn-primary">Cập nhập</button>
                                        </div>
                                        <div class="form-group col-6">
                                            <a href="{{ route('Category.show') }}" type="submit"
                                               class="btn btn-success">Quay
                                                Lại</a>
                                        </div>
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
