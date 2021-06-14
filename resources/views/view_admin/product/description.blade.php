@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Mô Tả Sản Phẩm</title>
@section('content')

<div class="container-fluid">
    <h1 class="mt-4">Mô Tả Sản Phẩm: {{$OBJ_Description_Product->product_name}}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about
            DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <!-- form add staff -->
    <div class="row">
        <div class="col-md-6">
            <form
                action="{{asset('/shopwatch.com/admin/product/description')}}/{{$OBJ_Description_Product->product_id}}"
                method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputOrigin">Xuất Xứ</label>
                        <input type="text" class="form-control" name="origin"
                            value="{{$OBJ_Description_Product->origin}}" placeholder="Xuất Xứ" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">Thời Gian Bảo Hành</label>
                        <input type="text" class="form-control" name="guarantee"
                            value="{{$OBJ_Description_Product->guarantee}}" placeholder="Thời Gian Bảo Hành" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGioiTinh">Màu Dây</label>
                        <input type="text" class="form-control" name="wireColor"
                            value="{{$OBJ_Description_Product->wire_color}}" placeholder="Màu Dây" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmai">Vật Liệu Dây</label>
                        <input type="text" class="form-control" name="wireMaterial"
                            value="{{$OBJ_Description_Product->wire_material}}" placeholder="Vật Liệu Dây" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Độ Dài Dây</label>
                        <input type="text" class="form-control" name="wireLength"
                            value="{{$OBJ_Description_Product->wire_length}}" placeholder="Độ Dài Dây" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">Độ Dày Dây</label>
                        <input type="text" class="form-control" name="wireThickness"
                            value="{{$OBJ_Description_Product->wire_thickness}}" placeholder="Độ Dày Dây" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">Màu Vỏ</label>
                        <input type="text" class="form-control" name="shellColor"
                            value="{{$OBJ_Description_Product->shell_color}}" placeholder="Màu Vỏ" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">Đường Kính Mặt Số</label>
                        <input type="text" class="form-control" name="shellDiameter"
                            value="{{$OBJ_Description_Product->shell_diameter}}" placeholder="Đường Kính Mặt Số"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmai">Loại Kính</label>
                        <input type="text" class="form-control" name="glassType"
                            value="{{$OBJ_Description_Product->glass_type}}" placeholder="Loại Kính" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Chống Nước</label>
                        <input type="text" class="form-control" name="waterProof"
                            value="{{$OBJ_Description_Product->water_proof}}" placeholder="Chống Nước" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Nơi Sản Xuất</label>
                        <input type="text" class="form-control" name="whereProduction"
                            value="{{$OBJ_Description_Product->where_production}}" placeholder="Nơi Sản Xuất" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
                <!-- <button type="submit" class="btn btn-primary">Thêm Mô Tả <i class="fa fa-plus"></i></button> -->
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#lfm').filemanager('image');
</script>

<!-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script> -->
<!-- <script src="{{asset('ckfinder/ckfinder.js')}}"></script> -->
<!-- <script>
CKEDITOR.replace('content');
</script> -->
@endsection