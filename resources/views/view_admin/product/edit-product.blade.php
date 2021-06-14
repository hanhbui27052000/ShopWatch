@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Cập Nhật Sản Phẩm</title>
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Cập Nhật Sản Phẩm</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <!-- form add staff -->
    <div class="row">
        <div class="col-md-6">
            <form action="{{asset('/shopwatch.com/admin/product/update-product')}}/{{$getProductByID->id_product}}"
                method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Số Hiệu Sản Phẩm</label>
                        <input type="text" class="form-control" name="productNumberEdit"
                            value="{{$getProductByID->product_number}}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name="productNameEdit"
                            value="{{$getProductByID->product_name}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGioiTinh">Thương Hiệu Sản Phẩm</label>
                        <select name="brandEdit" class="form-control">
                            @foreach($brands as $key => $brand)
                            @if($getProductByID->brand_id == $brand->id)
                            <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                            @else
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmai">Giá Vốn</label>
                        <input type="number" class="form-control" name="costPriceEdit"
                            value="{{$getProductByID->cost_prices}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Giá Bán</label>
                        <input type="number" class="form-control" name="priceEdit" id="price"
                            value="{{$getProductByID->price}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Giảm Giá</label>
                        <select name="distCountEdit" class="form-control">
                            @if($getProductByID->discount == 0)
                            <option value="0" selected>Không giảm</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="20">20%</option>
                            <option value="50">50%</option>
                            @elseif($getProductByID->discount == 5)
                            <option value="0">Không giảm</option>
                            <option value="5" selected>5%</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="20">20%</option>
                            <option value="50">50%</option>
                            @elseif($getProductByID->discount == 10)
                            <option value="0">Không giảm</option>
                            <option value="5">5%</option>
                            <option value="10" selected>10%</option>
                            <option value="15">15%</option>
                            <option value="20">20%</option>
                            <option value="50">50%</option>
                            @elseif($getProductByID->discount == 15)
                            <option value="0">Không giảm</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="15" selected>15%</option>
                            <option value="20">20%</option>
                            <option value="50">50%</option>
                            @elseif($getProductByID->discount == 20)
                            <option value="0">Không giảm</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="20" selected>20%</option>
                            <option value="50">50%</option>
                            @else
                            <option value="0">Không giảm</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="20">20%</option>
                            <option value="50" selected>50%</option>
                            @endif
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
                    <input id="thumbnail" class="form-control" type="text" name="imageEdit"
                        value="{{$getProductByID->image_product}}" required>
                </div>
                <img id="holder" src="{{$getProductByID->image_product}}" style="margin-top:15px;max-height:100px;">
                <div class="form-group">
                    <label for="inputAddress">Trạng Thái</label>
                    <select name="statusEdit" class="form-control">
                        @if($getProductByID->status_product == 0)
                        <option value="0" selected>Hiện</option>
                        <option value="1">Ẩn</option>
                        @else
                        <option value="0">Hiện</option>
                        <option value="1" selected>Ẩn</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Content</label>
                    <textarea name="" id="contentEdit" class="form-control" rows="3"
                        value="{{$getProductByID->content}}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection