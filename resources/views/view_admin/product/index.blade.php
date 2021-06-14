@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Sản Phẩm</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Danh Sách Sản Phẩm</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Danh Sách Sản Phẩm
            <a class="btn btn-primary" href="{{asset('/shopwatch.com/admin/product/add-product')}}"
                style="float:right;">Thêm
                Sản Phẩm <i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th hidden>STT</th>
                            <th>Số Hiệu SP</th>
                            <th>Tên SP</th>
                            <th>Thương Hiệu</th>
                            <th>SL</th>
                            <th>Hình Ảnh</th>
                            <th>Giá Vốn</th>
                            <th>Giá Bán</th>
                            <th>Giảm Giá</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td hidden>{{$key+1}}</td>
                            <td>{{$product->product_code}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->amount_of}}</td>
                            <td><img src="{{$product->image_product}}" style="width: 60px;"></td>
                            <td>{{$product->cost_prices}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                @if($product->discount == 0)
                                <p>0</p>
                                @else
                                <p>-{{$product->discount}}%</p>
                                @endif
                            </td>
                            <td>
                                @if($product->status_product == 0)
                                <p class="text-primary">Hiện</p>
                                @else
                                <p class="text-danger">Ẩn</p>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning"
                                    href="{{asset('/shopwatch.com/admin/product/description')}}/{{$product->id_product}}"><i
                                        class="fa fa-university"></i></a>
                                <a class="btn btn-primary"
                                    href="{{asset('/shopwatch.com/admin/product/edit-product')}}/{{$product->id_product}}"><i
                                        class="fa fa-edit "></i></a>
                                <a class="btn btn-danger"
                                    href="{{asset('/shopwatch.com/admin/product/delete-product')}}/{{$product->id_product}}"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection