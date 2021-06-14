@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Cập Nhật Nhà Cung Cấp</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Cập Nhật Nhà Cung Cấp</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <!-- form add staff -->
    <div class="row">
        <div class="col-md-6">
            <form action="/shopwatch.com/admin/supplier/update-supplier/{{$getSupplierById->id}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTaxCode">Mã Số Thuế</label>
                        <input type="text" class="form-control" name="taxCodeEdit"
                            value="{{$getSupplierById->tax_code}}" placeholder="Mã Số Thuế">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSupplierName">Tên Nhà Cung Cấp</label>
                        <input type="text" class="form-control" name="supplierNameEdit"
                            value="{{$getSupplierById->supplier_name}}" placeholder="Tên Nhà Cung Cấp" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGender">Giới Tính</label>
                        <select name="genderEdit" class="form-control">
                            @if($getSupplierById->gender == 1)
                            <option value="1" selected>Nam</option>
                            <option value="0">Nữ</option>
                            @else
                            <option value="1">Nam</option>
                            <option value="0" selected>Nữ</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDateOfBirth">Ngày Sinh</label>
                        <input type="date" class="form-control" name="dateOfBirthEdit"
                            value="{{$getSupplierById->date_of_birth}}">
                    </div>
                    <label for="inputImage">Hình Ảnh</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm_staff" data-input="thumbnail" data-preview="holder" class="btn btn-danger">
                                Chọn ảnh <i class="fas fa-image"></i>
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="imageEdit"
                            value="{{$getSupplierById->image}}">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$getSupplierById->image}}">
                </div>
                <div class="form-group">
                    <label for="inputPhoneNumber">Số ĐT</label>
                    <input type="number" class="form-control" name="phoneNumberEdit"
                        value="{{$getSupplierById->phone_number}}" placeholder="Số ĐT">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Địa Chỉ</label>
                    <input type="text" class="form-control" name="addressEdit" value="{{$getSupplierById->address}}"
                        placeholder="Địa Chỉ">
                </div>
                <div class="form-group">
                    <label for="inputNote">Ghi Chú</label>
                    <textarea type="text" class="form-control" name="noteEdit" value="{{$getSupplierById->note}}"
                        placeholder="Ghi Chú"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection