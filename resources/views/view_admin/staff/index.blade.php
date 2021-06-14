@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Nhân Viên</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Danh Sách Nhân Viên</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a class="btn btn-primary" href="{{asset('/shopwatch.com/admin/staff/add-staff')}}"
                style="float:right;">Thêm Nhân Viên <i class="fa fa-user-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã NV</th>
                            <th>Họ Tên</th>
                            <th>Ngày Sinh</th>
                            <th>Giới Tính</th>
                            <th>Chức vụ</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Địa Chỉ</th>
                            <th>Điện Thoại</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->date_of_birth}}</td>
                            <td>
                                @if($user->gender == 1)
                                Nam
                                @else
                                Nữ
                                @endif
                            </td>
                            @if ($user->slug == 'admin')
                            <td><i class="fas fa-crown"> Admin</i></td>
                            @elseif ($user->slug == 'cashier')
                            <td><i class="fas fa-money-bill-alt"> Thu ngân</i></td>
                            @else
                            <td><i class="fas fa-user"> Bán hàng</i></td>
                            @endif
                            <td>{{$user->email}}</td>
                            <td>
                                <img src="{{$user->image}}" style="width: 60px;">
                            </td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>
                                @if($user->slug == 'admin')
                                @else
                                <a class="btn btn-primary"
                                    href="{{asset('/shopwatch.com/admin/staff/edit-staff')}}/{{$user->id}}"><i
                                        class="fa fa-edit "></i></a>
                                <a class="btn btn-danger"
                                    href="{{asset('/shopwatch.com/admin/staff/delete-staff')}}/{{$user->id}}"><i
                                        class="far fa-trash-alt"></i></a>
                                @endif
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