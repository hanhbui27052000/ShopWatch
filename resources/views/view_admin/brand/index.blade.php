@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Thương Hiệu</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Danh Sách Thương Hiệu</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" style="float:right;">Thêm
                Thương Hiệu <i class="fa fa-plus"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Thương Hiệu</th>
                            <th>Tên Thương Hiệu</th>
                            <th>Image</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $key => $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>
                                <img src="{{$brand->image}}" style="width: 50px;">
                            </td>
                            <td>
                                @if($brand->status == 1)
                                <p class="text-primary">Hiện</p>
                                @else
                                <p class="text-danger">Ẩn</p>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#editModal"
                                    onclick="getBrandById('{{$brand->id}}')"><i class="fa fa-edit "></i></button>
                                <a href="{{asset('/shopwatch.com/admin/brand/delete-brand/')}}/{{$brand->id}}"
                                    class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- modal add brand -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/shopwatch.com/admin/brand/add-brand" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Thương Hiệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Thương Hiệu:</label>
                        <input type="text" class="form-control" name="brand_name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Hình Ảnh:</label>
                        <div class="input-group">
                            <input id="thumbnail" class="form-control" type="text" name="brand_image" required>
                            <button type="button" class="btn btn-danger" id="btn-add" data-input="thumbnail"
                                data-preview="holder"><i class="fas fa-image"></i>
                                Browse</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Trạng Thái:</label>
                        <select class="form-control" name="brand_status">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--end modal add -->
<!-- modal edit brand -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" id="edit_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Thương Hiệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Thương Hiệu:</label>
                        <input type="text" class="form-control" name="brand_name_edit" id="brand_name_edit" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Hình Ảnh:</label>
                        <div class="input-group">
                            <input id="thumbnail" class="form-control brand_image_edit" type="text"
                                name="brand_image_edit" required>
                            <button type="button" class="btn btn-danger" id="btn-edit" data-input="thumbnail"
                                data-preview="holder"><i class="fas fa-image"></i>
                                Browse</button>
                        </div>
                    </div>
                    <img id="img_edit" src="" style="margin-top:15px;max-height:50px;">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Trạng Thái:</label>
                        <select class="form-control" name="brand_status_edit" id="brand_status_edit">

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--end modal edit -->
@endsection