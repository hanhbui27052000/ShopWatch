@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Thêm Sản Phẩm</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Thêm Sản Phẩm</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <!-- form add staff -->
    <div class="row">
        <div class="col-md-6">
            <form action="/shopwatch.com/admin/product/add-product" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Số Hiệu Sản Phẩm</label>
                        <input type="text" class="form-control" name="productNumber" placeholder="Số Hiệu Sản Phẩm"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name="productName" placeholder="Tên Sản Phẩm" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGioiTinh">Thương Hiệu Sản Phẩm</label>
                        <select name="brand" class="form-control">
                            @foreach($brands as $key => $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmai">Giá Vốn</label>
                        <input type="number" class="form-control" name="costPrice" placeholder="Giá Vốn" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Giá Bán</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Giá Bán"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Giảm Giá</label>
                        <select name="distCount" class="form-control">
                            <option value="0">Không giảm</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="20">20%</option>
                            <option value="50">50%</option>
                        </select>
                    </div>
                </div>
                <label for="inputImage">Hình Ảnh</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm_product" data-input="thumbnail" data-preview="holder" class="btn btn-danger">
                            Chọn ảnh <i class="fas fa-image"></i>
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="image" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Trạng Thái</label>
                    <select name="status" class="form-control">
                        <option value="0">Hiện</option>
                        <option value="1">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Content</label>
                    <textarea name="" id="content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection