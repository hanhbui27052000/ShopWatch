@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Thêm Nhân Viên</title>
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Cập Nhật Nhân Viên</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <!-- form add staff -->
    <div class="row">
        <div class="col-md-6">
            <form action="/shopwatch.com/admin/staff/update-staff/{{$getUser->id}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputMaNV">Mã NV</label>
                        <input type="text" class="form-control" name="maNVEdit" value="{{$getUser->id}}"
                            placeholder="Mã NV" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">Họ Và Tên</label>
                        <input type="text" class="form-control" name="nameEdit" value="{{$getUser->name}}"
                            placeholder="Họ Và Tên" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNgaySinh">Ngày Sinh</label>
                        <input type="date" class="form-control" name="dateOfBirthEdit"
                            value="{{$getUser->date_of_birth}}" required>
                    </div>
                    <div class=" form-group col-md-6">
                        <label for="inputGioiTinh">Giới Tính</label>
                        <select name="genderEdit" class="form-control">
                            @if($getUser->gender == 1)
                            <option value="1" selected>Nam</option>
                            <option value="0">Nữ</option>
                            @else
                            <option value="1">Nam</option>
                            <option value="0" selected>Nữ</option>
                            @endif
                        </select>
                    </div>
                </div>
                <label for="inputImage">Hình Ảnh</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm_staff" data-input="thumbnail" data-preview="holder" class="btn btn-danger">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" value="{{$getUser->image}}" name="imageEdit">
                </div>
                <img id="holder" src="{{$getUser->image}}" style="margin-top:15px;max-height:100px;">
                <div class="form-group">
                    <label for="inputChucVu">Chức Vụ</label>
                    <select name="roleEdit" class="form-control">
                        @if($getUser->user_id == 2)
                        <option value="2" selected>Thu Ngân</option>
                        <option value="3">Nhân Viên Bán Hàng</option>
                        @else
                        <option value="2">Thu Ngân</option>
                        <option value="3" selected>Nhân Viên Bán Hàng</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Địa Chỉ</label>
                    <input type="text" class="form-control" name="addressEdit" value="{{$getUser->address}}"
                        placeholder="Địa Chỉ" required>
                </div>
                <div class="form-group">
                    <label for="inputDienThoai">Số Điện Thoại</label>
                    <input type="number" class="form-control" name="phoneNumberEdit" value="{{$getUser->phone_number}}"
                        placeholder="Điện Thoại" required>
                </div>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-check-circle-o"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection