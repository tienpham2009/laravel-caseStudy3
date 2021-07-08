@extends('admin.products.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách sản phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="btn-group w-100 mb-2">
                                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all">Tất
                                        cả
                                        sản phẩm</a>
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
                                            <button class="btn btn-danger" type="submit" id="delete-product">
                                                Xóa sản phẩm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="filter-container p-0 row">
                                    <table class="table" id="show-products">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col"><input type="checkbox" id="select-all"> Chọn tất cả</th>
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
                                            <tr id="delete-product-{{$product->id}}">
                                                <td><input type="checkbox" class="select" value="{{$product->id}}"
                                                           name="checkbox[]"></td>
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
                                                    <a type="submit" class="btn btn-primary"
                                                       href="{{ route('Product.edit' , $product->id) }}">Sửa</a>
                                                    <a type="submit" class="btn btn-success"
                                                       href="{{ route('Product.detail' , $product->id) }}">Chi tiết</a>
                                                </td>
                                            </tr>

                                        @empty
                                            <div class="filtr-item col-sm-2">
                                                <p>Chưa có sản phẩm nào</p>
                                            </div>
                                        @endforelse

                                        </tbody>

                                    </table>
                                    {{ $products->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
