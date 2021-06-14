<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Watch : Nhập Hàng</title>
    <link href="{{asset('admin/dist/css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/dist/css/index_import_goods.css')}}" rel="stylesheet" />
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
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Tìm Kiếm</div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" id="searchImportGoods" type="text"
                                    placeholder="Mã chứng từ">
                            </div>
                        </div>
                        <div class="sb-sidenav-menu-heading">Lọc Theo Trạng Thái</div>
                        <div class="panel-filter-body">
                            <div class="form-group">
                                <div class="form-check" style="padding-left: 0px;">
                                    <select id="status" style="width: 92%;">
                                        <option value="0">Đang xử lý</option>
                                        <option value="1">Hoàn thành</option>
                                        <option value="2">Đã hủy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="sb-sidenav-menu-heading">Lọc Theo Ngày</div>
                        <div class="panel-filter-body">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Toàn Thời Gian
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" onclick="getImportGoodsByDateTime('{{$today}}')">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Hôm Nay
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios3" onclick="getImportGoodsByDateTime('{{$yesterday}}')">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Hôm Qua
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios4" onclick="getImportGoodsByDateTime('{{$seven_day_ago}}')">
                                    <label class="form-check-label" for="exampleRadios4">
                                        7 Ngày Trước
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios5" onclick="getImportGoodsByDateTime('{{$this_month}}')">
                                    <label class="form-check-label" for="exampleRadios5">
                                        Tháng Này
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios6" onclick="getImportGoodsByDateTime('{{$last_month}}')">
                                    <label class="form-check-label" for="exampleRadios6">
                                        Tháng Trước
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios7" value="">
                                    <label class="form-check-label" for="exampleRadios7">
                                        Lựa Chọn Khác
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="form_filter" hidden>
                            <div class="form-check">
                                <input class="form-check-input" id="inputDate1" type="datetime-local"
                                    style="width: 93%;">
                                <input class="form-check-input" id="inputDate2" type="datetime-local"
                                    style="margin-top: 37px;width: 93%;">
                            </div>
                            <div class="form-group">
                                <button class="btn-filter" onclick="filterByDate()">
                                    <i class="fa fa-filter"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h3 class="mt-4">Nhập Hàng</h3>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <a class="btn btn-primary"
                                href="{{asset('/shopwatch.com/admin/warehouse/import_goods/add-import-goods')}}"
                                style="float:right;"><i class="fa fa-plus"></i> Thêm
                                Mới Phiếu Nhập Hàng</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th hidden>STT</th>
                                            <th>Mã Chứng Từ</th>
                                            <th>Nhà Cung Cấp</th>
                                            <th>Ngày Nhập</th>
                                            <th>Tổng Tiền</th>
                                            <th>Tổng Thanh Toán</th>
                                            <th>Trạng Thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_import_goods">
                                        @foreach($import_goods as $key => $import_good)
                                        <tr>
                                            <td hidden>{{$key+1}}</td>
                                            <td>{{$import_good->voucher_code}}</td>
                                            <td>{{$import_good->supplier_name}}</td>
                                            <td>{{$import_good->datetime}}</td>
                                            <td>{{$import_good->total_money_import_goods}}</td>
                                            <td>{{$import_good->total_payment}}</td>
                                            @if($import_good->status == 0)
                                            <td><span class="label_status1">Đang xử lý</span>
                                            </td>
                                            @elseif($import_good->status == 1)
                                            <td><span class="label_status2">Hoàn thành</span></td>
                                            @else
                                            <td><span class="label_status3">Đã hủy</span></td>
                                            @endif
                                            <td>
                                                <a class="btn btn-warning" data-toggle="modal"
                                                    data-target="#modal_import_goods"
                                                    onclick="viewDetailImportGoods('{{$import_good->id_import_goods}}')"><i
                                                        class="fa fa-eye"></i></a>
                                                <a class="btn btn-primary" href=""><i class="fa fa-print"></i></a>
                                                <a class="btn btn-primary"
                                                    href="{{asset('/shopwatch.com/admin/warehouse/import_goods/edit-import-goods')}}/{{$import_good->id_import_goods}}"><i
                                                        class="fa fa-edit"></i></a>
                                                @if($import_good->status != 2)
                                                <a class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalCancelImporGoods"
                                                    onclick="getProductImportByIdImportGoods('{{$import_good->id_import_goods}}','{{$import_good->voucher_code}}','{{$import_good->supplier_id}}','{{$import_good->status}}')"><i
                                                        class="fa fa-times"></i></a>
                                                @endif
                                                @if($import_good->status == 2)
                                                <a class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalDeleteImporGoods"
                                                    onclick="getIdImportGoods('{{$import_good->id_import_goods}}','{{$import_good->voucher_code}}')"><i
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
                    <a href="{{asset('/shopwatch.com/admin')}}">
                        <i class="fas fa-arrow-left mr-2"></i> Thoát</a>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- modal bill -->
    <div class="modal fade" id="modal_import_goods" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Chi tiết</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Sản phẩm nhập</a>
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
                                <tbody id="import_goods_modal">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th hidden>STT</th>
                                        <th>Tên SP</th>
                                        <th>Image</th>
                                        <th>SL Nhập</th>
                                        <th>Giá Nhập</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody id="list_product_modal">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal cancel-->
    <div class="modal fade" id="modalCancelImporGoods" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <p>Bạn có chắc chắn muốn hủy phiếu nhập hàng <span id="voucher_code" style="font-weight: bold;">
                        </span>
                        không?</p>
                    <p id="id_import_good" hidden></p>
                    <p id="id_supplier" hidden></p>
                    <p id="status_import_good" hidden></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="CancelImportGoods()"
                        data-dismiss="modal">Đồng
                        ý</button>
                </div>
            </div>
        </div>
    </div>

    <!-- table list Product hidden -->
    <div class="row-table row" hidden>
        <div class="table-responsive">
            <table class="table" id="tableProductImportGoods" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID SP</th>
                        <th>SL</th>
                    </tr>
                </thead>
                <tbody id="list_Product_Import_Goods">

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal delete-->
    <div class="modal fade" id="modalDeleteImporGoods" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <p>Bạn có chắc chắn muốn xóa phiếu nhập hàng <span id="voucher_code_delete"
                            style="font-weight: bold;">
                        </span>
                        không?</p>
                    <p id="id_import_good_delete" hidden></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="deleteImportGoods()"
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin/dist/assets/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('admin/dist/js/index-import-goods.js')}}"></script>
</body>

</html>