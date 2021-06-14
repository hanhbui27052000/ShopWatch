@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Thêm Nhà Cung Cấp</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Thêm Nhà Cung Cấp</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <!-- form add staff -->
    <div class="row">
        <div class="col-md-6">
            <form action="/shopwatch.com/admin/supplier/add-supplier" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTaxCode">Mã Số Thuế</label>
                        <input type="text" class="form-control" name="taxCode" placeholder="Mã Số Thuế">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSupplierName">Tên Nhà Cung Cấp</label>
                        <input type="text" class="form-control" name="supplierName" placeholder="Tên Nhà Cung Cấp"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGender">Giới Tính</label>
                        <select name="gender" class="form-control">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDateOfBirth">Ngày Sinh</label>
                        <input type="date" class="form-control" name="dateOfBirth">
                    </div>
                    <label for="inputImage">Hình Ảnh</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm_staff" data-input="thumbnail" data-preview="holder" class="btn btn-danger">
                                Chọn ảnh <i class="fas fa-image"></i>
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="image">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                </div>
                <div class="form-group">
                    <label for="inputPhoneNumber">Số ĐT</label>
                    <input type="number" class="form-control" name="phoneNumber" placeholder="Số ĐT">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Địa Chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="Địa Chỉ">
                </div>
                <div class="form-group">
                    <label for="inputNote">Ghi Chú</label>
                    <textarea type="text" class="form-control" name="note" placeholder="Ghi Chú"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection