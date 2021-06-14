@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Nhà Cung Cấp</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Danh Sách Nhà Cung Cấp</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a class="btn btn-primary" href="{{asset('/shopwatch.com/admin/supplier/add-supplier')}}"
                style="float:right;">Thêm
                Nhà Cung Cấp <i class="fa fa-user-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th hidden>STT</th>
                            <th>Mã NCC</th>
                            <th>Họ Tên</th>
                            <th>Image</th>
                            <th>Tổng Giao Dịch</th>
                            <th>Dư nợ</th>
                            <th>Ghi Chú</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suppliers as $key => $supplier)
                        <tr>
                            <td hidden>{{$key+1}}</td>
                            <td>{{$supplier->supplier_code}}</td>
                            <td>{{$supplier->supplier_name}}</td>
                            <td>
                                <img src="{{$supplier->image}}" style="width: 60px;">
                            </td>
                            <td>{{$supplier->total_money}}</td>
                            <td>{{$supplier->owed_money}}</td>
                            <td>{{$supplier->note}}</td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal_supplier"
                                    onclick="viewSupplierById({{$supplier->id}})"><i class="fa fa-eye"></i></button>
                                <a class="btn btn-primary"
                                    href="{{asset('/shopwatch.com/admin/supplier/edit-supplier')}}/{{$supplier->id}}"><i
                                        class="fa fa-edit"></i></a>
                                <a class="btn btn-danger"
                                    href="{{asset('/shopwatch.com/admin/supplier/delete-supplier')}}/{{$supplier->id}}"><i
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

<!-- modal supplier -->
<div class="modal fade" id="modal_supplier" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Chi tiết</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Lịch sử giao dịch</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">Sổ nợ</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="supplier_modal">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã Chứng Từ</th>
                                    <th>Ngày Nhập</th>
                                    <th>Người Tạo</th>
                                    <th>Tổng Cộng</th>
                                    <th>Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody id="importgoods_modal">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection