@extends('admin.products.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách thể loại</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="filter-container p-0 row">
                                    <table class="table" id="show-products">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col" style="text-align: center">Tên</th>
                                            <th></th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @forelse($categories as $key => $category)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $category->name  }}</td>
                                                <td>
                                                    <a type="submit" class="btn btn-primary"
                                                       href="{{ route('Category.edit' , $category->id) }}">Sửa</a>
                                                    <a type="submit" class="btn btn-primary" onclick="return confirm('Bạn chắc chắn muốn xóa ?')"
                                                       href="{{ route('Category.delete' , $category->id) }}">Xóa</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="filtr-item col-sm-2">
                                                <p>Chưa có thể loại nào</p>
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
        </div><!-- /.container-fluid -->
    </section>
@endsection
