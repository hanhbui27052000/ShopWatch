<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Watch : Cập Nhật Phiếu Nhập Hàng</title>
    <link href="{{asset('admin/dist/css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/dist/css/crud_import_goods.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">SHOP WATCH</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
                    {{Auth::user()->name}}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }} " onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container-fluid" id="page-wrapper">
        <div class="row">
            <div class=" col-md-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="content-header-table">
                            <div class="col-lg-12">
                                <div class="pull-left">
                                    <h4>CẬP NHẬT PHIẾU NHẬP HÀNG : {{$get_Import_Goods->voucher_code}}</h4>
                                    <p id="id_import_good" hidden>{{$get_Import_Goods->id_import_goods}}</p>
                                    <p id="status_import_good" hidden>{{$get_Import_Goods->status}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="searchpanel">
                            <div class="input-search form-group col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="searchProduct"
                                        placeholder="Nhập tên hoặc mã sp để tìm kiếm ">
                                </div>
                                <div class="dropdown-menu" id="listProduct"
                                    style="position: absolute; background: #FFFFFF; z-index: 1000;">
                                </div>
                            </div>
                            <div class="form-button form-group col-md-7 text-right">
                                <a class="btn btn-primary" href="{{asset('/shopwatch.com/admin/product/add-product')}}"
                                    type="button">
                                    <i class="fa fa-plus-circle"> Hàng Hóa</i>
                                </a>
                                <a class="btn btn-primary" type="button">
                                    <i class="fa fa-cloud"> Import</i>
                                </a>
                            </div>
                        </div>
                        <div class="row-table row">
                            <div class="table-responsive">
                                <table class="table" id="tableImportGoods" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th hidden></th>
                                            <th>Mã SP</th>
                                            <th>Image</th>
                                            <th>Tên Hàng Hóa</th>
                                            <th>SL</th>
                                            <th>Giá Nhập</th>
                                            <th>Thành Tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_Product">
                                        @foreach($get_Product_Imports as $key => $get_Product_Import)
                                        <tr data-id="{{$get_Product_Import->id_product}}">
                                            <td id="id_product" hidden>{{$get_Product_Import->id_product}}</td>
                                            <td>{{$get_Product_Import->product_code}}</td>
                                            <td><img src="{{$get_Product_Import->image}}" style="width:50px;"></td>
                                            <td>{{$get_Product_Import->product_name}}</td>
                                            <td>
                                                <input id="amount_of" type="number"
                                                    value="{{$get_Product_Import->amount_of_product_import}}"
                                                    style="width: 100px;">
                                            </td>
                                            <td>
                                                <input id="import_price" type="number"
                                                    value="{{$get_Product_Import->import_price}}" style="width: 100px;">
                                            </td>
                                            <td id="into_money">{{$get_Product_Import->total_money}}</td>
                                            <td>
                                                <button class="btn btn-danger"
                                                    onclick="removeProduct('{{$get_Product_Import->id_product}}')"><i
                                                        class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form col-md-3">
                <div class="row" id="content-header-form">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            <h4 style="text-align: center;">Form Chi Tiết</h4>
                        </div>
                    </div>
                </div>
                <form>
                    <div class="form-group">
                        <label for="inputSupplierSearch">Tên Nhà Cung Cấp</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchSupplier"
                                value="{{$get_Import_Goods->supplier_name}}" disabled>
                            <span id="supplierId" hidden>{{$get_Import_Goods->supplier_id}}</span>
                            <a class="btn btn-primary" href="{{asset('/shopwatch.com/admin/supplier/add-supplier')}}"
                                style="border: none;">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDateTime">Ngày Nhập</label>
                        <div class="input-group">
                            <input type="datetime-local" class="form-control" id="datetime"
                                value="{{str_replace( substr( $get_Import_Goods->datetime,  10, 1), 'T', $get_Import_Goods->datetime )}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p style="font-weight: bold;">Trạng Thái</p>
                        </div>
                        <div class="col-md-3">
                            @if($get_Import_Goods->status == 0)
                            <span class="label label-primary" id="status">Đang xử lý</span>
                            @elseif($get_Import_Goods->status == 1)
                            <span class="label label-primary" id="status">Hoàn thành</span>
                            @else
                            <span class="label label-primary" id="status">Đã hủy</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p style="font-weight: bold;">Tổng Số Lượng</p>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-primary" id="totalAmountOf">{{$total_Amount_Of}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p style="font-weight: bold;">Chiết Khấu</p>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" class="form-control" id="discount"
                                    value="{{$get_Import_Goods->discount*100/$get_Import_Goods->total_money_import_goods}}">
                                <p style="margin-top: 6px;font-weight: bold;">(%)</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p style="font-weight: bold;">VAT</p>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" class="form-control" id="vat"
                                    value="{{$get_Import_Goods->VAT*100/$get_Import_Goods->total_money_import_goods}}">
                                <p style="margin-top: 6px;font-weight: bold;">(%)</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p style="font-weight: bold;">Tổng Cộng</p>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-primary"
                                id="total_money">{{$get_Import_Goods->total_money_import_goods}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p style="font-weight: bold;">Tổng Thanh Toán</p>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-primary"
                                id="total_payment">{{$get_Import_Goods->total_payment}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <p style="font-weight: bold;">Trả Trước</p>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="number" id="prepayment" class="form-control"
                                    value="{{$get_Import_Goods->prepayment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 44px;">
                        <div class="col-md-9">
                            <p style="font-weight: bold;">Còn Nợ</p>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-primary"
                                id="owedMoney">{{$get_Import_Goods->owed_money_import_goods}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            @if($get_Import_Goods->status == 0)
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modalConfirm"> <i class="fa fa-thumbs-up"></i> Hoàn
                                Thành</button>
                            @endif
                        </div>
                        <div class="col-md-5">
                            <a class="btn btn-warning" href=""><i class="fa
                                fa-backward" aria-hidden="true"></i> Thoát</a>
                            <button type="button" class="btn btn-primary"
                                onclick="saveEditImportGoods('{{$get_Import_Goods->status}}','{{$get_Import_Goods->id_import_goods}}')"><i
                                    class="fa fa-save"></i> Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal confirm-->
    <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác Nhận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hệ thống sẽ cập nhật tồn kho ngay khi hoàn thành chứng từ. Bạn có chắc chắn muốn hoàn thành chứng từ
                    này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary"
                        onclick="confirmEditImportGoods('{{$get_Import_Goods->id_import_goods}}')"
                        data-dismiss="modal">Đồng
                        ý</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery/jquery-3.6.0.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('admin/dist/js/scripts.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('admin/dist/assets/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('admin/dist/js/edit-import-goods.js')}}"></script>
</body>

</html>