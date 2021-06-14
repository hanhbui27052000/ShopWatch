@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Thêm Nhân Viên</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Thêm Nhân Viên</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <!-- form add staff -->
    <div class="row">
        <div class="col-md-6">
            <form action="/shopwatch.com/admin/staff/add-staff" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Họ Và Tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Họ Và Tên" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNgaySinh">Ngày Sinh</label>
                        <input type="date" class="form-control" name="date_of_birth" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGioiTinh">Giới Tính</label>
                        <select name="gender" class="form-control">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmai">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Password Enter</label>
                        <input type="password" class="form-control" name="passwordEnter" id="passwordEnter"
                            placeholder="Password Enter" required>
                    </div>
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
                <div class="form-group">
                    <label for="inputChucVu">Chức Vụ</label>
                    <select name="role" id="role" class="form-control">
                        <option value="2">Thu Ngân</option>
                        <option value="3">Nhân Viên Bán Hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Địa Chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="Địa Chỉ" required>
                </div>
                <div class="form-group">
                    <label for="inputDienThoai">Số Điện Thoại</label>
                    <input type="number" class="form-control" name="phone_number" placeholder="Số Điện Thoại" required>
                </div>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection