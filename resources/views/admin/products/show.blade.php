@extends('admin.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('Product.delete') }}" method="get">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách sản phẩm</h4>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="btn-group w-100 mb-2">
                                        <a class="btn btn-info active" href="javascript:void(0)" data-filter="all">Tất
                                            cả
                                            sản phẩm</a>
                                        <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1
                                            (WHITE) </a>
                                        <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Category 2
                                            (BLACK) </a>
                                        <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Category 3
                                            (COLORED) </a>
                                        <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> Category 4
                                            (COLORED, BLACK) </a>
                                    </div>
                                    <div class="mb-2">
                                        <div>
                                            <select class="custom-select" style="width: auto;" data-sortOrder>
                                                <option value="index"> Sort by Position</option>
                                                <option value="sortData"> Sort by Custom Data</option>
                                            </select>
                                            <div class="btn-group">
                                                <a class="btn btn-default" href="javascript:void(0)" data-sortAsc>
                                                    Ascending </a>
                                                <a class="btn btn-default" href="javascript:void(0)" data-sortDesc>
                                                    Descending </a>
                                                <button class="btn btn-danger" type="submit">
                                                    Xóa sản phẩm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="filter-container p-0 row">
                                        <table class="table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">xuất sứ</th>
                                                <th scope="col">Danh mục</th>
                                                <th scope="col">Ngày nhập kho</th>
                                                <th scope="col">Ngày hết hạn</th>
                                                <th scope="col">Đơn giá (VND)</th>
                                                <th scope="col">Đơn vị</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($products as $key => $product)
                                                <tr>
                                                    <td><input type="checkbox" value="{{$product->id}}" name="data[]"></td>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $product->name  }}</td>
                                                    <td>{{ $product->origin  }}</td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>{{ $product->input_date  }}</td>
                                                    <td>{{ $product->expiration_date  }}</td>
                                                    <td>{{ $product->unit_price  }}</td>
                                                    <td>{{ $product->unit  }}</td>
                                                    <td>{{ $product->amount  }}</td>
                                                    <td>
                                                        <a type="submit" class="btn btn-primary" href="{{ route('Product.edit' , $product->id) }}">Sửa</a>
                                                        <a type="submit" class="btn btn-success" href="{{ route('Product.detail' , $product->id) }}">Chi tiết</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="filtr-item col-sm-2">
                                                    <p>Chưa có sản phẩm nào</p>
                                                </div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <script src="{{ asset('js/my/cart.js') }}"></script>
@endsection
