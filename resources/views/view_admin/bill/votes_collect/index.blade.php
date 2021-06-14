<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Watch : Phiếu Thu</title>
    <link href="{{asset('admin/dist/css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/dist/css/votes_collect.css')}}" rel="stylesheet" />
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
                                <input class="form-check-input" id="searchVotesCollect" type="text"
                                    placeholder="Mã chứng từ">
                            </div>
                        </div>
                        <div class="sb-sidenav-menu-heading">Lọc Theo Hạng Mục</div>
                        <div class="panel-filter-body">
                            <div class="form-group">
                                <div class="form-check" style="padding-left: 0px;">
                                    <select id="categories" style="width: 92%;">
                                        @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">
                                            {{$categorie->categories}}</option>
                                        @endforeach
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
                                        id="exampleRadios2" onclick="getVotesCollectByDateTime('{{$today}}')">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Hôm Nay
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios3" onclick="getVotesCollectByDateTime('{{$yesterday}}')">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Hôm Qua
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios4" onclick="getVotesCollectByDateTime('{{$seven_day_ago}}')">
                                    <label class="form-check-label" for="exampleRadios4">
                                        7 Ngày Trước
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios5" onclick="getVotesCollectByDateTime('{{$this_month}}')">
                                    <label class="form-check-label" for="exampleRadios5">
                                        Tháng Này
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios6" onclick="getVotesCollectByDateTime('{{$last_month}}')">
                                    <label class="form-check-label" for="exampleRadios6">
                                        Tháng Trước
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios7" value="{{$last_month}}">
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
                    <h3 class="mt-4">Phiếu Thu</h3>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <a class="btn btn-primary" onclick="getDataVotesCollect()" data-toggle="modal"
                                data-target="#modalAddVotesCollect" style="float:right;">Thêm
                                Mới Phiếu Thu <i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th hidden>STT</th>
                                            <th>Mã Chứng Từ</th>
                                            <th>Người Nộp</th>
                                            <th>Hạng Mục Thu</th>
                                            <th>Ngày Giao Dịch</th>
                                            <th>Giá Trị</th>
                                            <th>Lí Do</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_votes_collect">
                                        @foreach($votes_collects as $key => $votes_collect)
                                        <tr>
                                            <td hidden>{{$key+1}}</td>
                                            <td>
                                                {{str_replace( substr( $votes_collect->voucher_code,  0, 3), 'PT', $votes_collect->voucher_code )}}
                                            </td>
                                            <td>{{$votes_collect->payer}}</td>
                                            <td>{{$votes_collect->categories}}</td>
                                            <td>{{$votes_collect->datetime}}</td>
                                            <td>{{$votes_collect->total_money}}</td>
                                            <td>
                                                @if($votes_collect->categories_id == 1)
                                                Phiếu thanh toán cho chứng từ
                                                {{$votes_collect->voucher_code}}
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-warning" data-toggle="modal"
                                                    data-target="#modalViewVotesCollect"
                                                    onclick="ViewVotesCollectByIdBill('{{$votes_collect->id_votes_collect}}')"><i
                                                        class="fa fa-eye"></i></a>
                                                <a class="btn btn-primary"><i class="fa fa-print"></i></a>
                                                @if($votes_collect->categories_id != 1)
                                                <a class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modalEditVotesCollect"
                                                    onclick="EditVotesCollect('{{$votes_collect->id_votes_collect}}')"><i
                                                        class="fa fa-edit"></i></a>
                                                @endif
                                                @if($votes_collect->categories_id != 1)
                                                <a class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalDeleteVotesCollect"
                                                    onclick="getIdVotesCollect('{{$votes_collect->id_votes_collect}}','{{$votes_collect->voucher_code}}')"><i
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

    <!-- modal votes collect -->
    <div class="modal fade" id="modalViewVotesCollect" role="dialog">
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
                                <tbody id="votes_collect_modal">

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

    <!-- modal add votes collect -->
    <div class="modal fade" id="modalAddVotesCollect" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="">THÊM MỚI PHIẾU THU</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <form>
                        <div class="form-row" style="margin-top: 40px;">
                            <div class="form-group col-md-6">
                                <label for="inputCategories" style="margin-bottom: 0px;">Hạng Mục Phiếu Thu <i
                                        class="fa fa-plus" style="color:#0072BC;" data-toggle="modal"
                                        data-target="#categoriesModal"></i>
                                    <label style="color:#0072BC;">(Thêm
                                        mới)</label>
                                </label>
                                <select id="categories_votes_collect" class="form-control">

                                </select>
                            </div>
                            <div class="form-group col-md-6" style="margin-bottom: 0px;">
                                <label for="inputPayer">Người Nộp</label>
                                <input type="text" class="form-control" id="searchSupplier"
                                    placeholder="Nhập mã hoặc tên nhà cung cấp để tìm kiếm">
                                <div id="listSupplier" style="position: absolute; background: #FFFFFF; z-index: 1000;">

                                </div>
                                <i class="fa fa-times" id="supplier_remove" style="color:#0072BC;"></i>
                                <label id="supplier">Không xác định</label>
                                <span id="supplierId" hidden></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputGioiTinh">Ngày Giao Dịch</label>
                                <input type="datetime-local" class="form-control" id="datetime_votes_collect">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmai">Giá Trị</label>
                                <input type="number" class="form-control" id="totalMoney" placeholder="Giá trị"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Ghi Chú</label>
                            <textarea id="note" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="addVotesCollect()"> <i
                                    class="fa fa-save"></i>
                                Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i
                                    class="fa fa-share"></i> Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal add votes collect -->

    <!-- modal edit votes collect -->
    <div class="modal fade" id="modalEditVotesCollect" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="">CẬP NHẬT PHIẾU THU</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <form>
                        <div class="form-row" style="margin-top: 40px;">
                            <div class="form-group col-md-6" hidden>
                                <label for="inputCategories">ID</label>
                                <input type="text" class="form-control" id="id_votes_collect_edit">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCategories">Hạng Mục Phiếu Thu</label>
                                <input type="text" class="form-control" id="categories_votes_collect_edit" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPayer">Người Nộp</label>
                                <input type="text" class="form-control" id="payerEdit" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputGioiTinh">Ngày Giao Dịch</label>
                                <input type="datetime-local" class="form-control" id="datetime_votes_collect_edit">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmai">Giá Trị</label>
                                <input type="number" class="form-control" id="totalMoneyEdit" placeholder="Giá trị"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Ghi Chú</label>
                            <textarea id="noteEdit" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="updateVotesCollect()"> <i
                                    class="fa fa-save"></i>
                                Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i
                                    class="fa fa-share"></i> Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit votes collect -->

    <!-- Modal add categories votes collect-->
    <div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">HẠNG MỤC PHIẾU THU</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputAddress">Hạng Mục Phiếu Thu</label>
                        <input id="dataCategories" class="form-control" rows="3"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="addCategories()"
                        data-dismiss="modal">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal delete-->
    <div class="modal fade" id="modalDeleteVotesCollect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <p>Bạn có chắc chắn muốn xóa phiếu thu <span id="voucher_code_delete" style="font-weight: bold;">
                        </span>
                        không?</p>
                    <p id="id_votes_collect_delete" hidden></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="deleteVotesCollect()"
                        data-dismiss="modal">Đồng
                        ý</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery/jquery-3.6.0.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('admin/dist/js/scripts.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin/dist/assets/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('admin/dist/js/votes-collect.js')}}"></script>
</body>

</html>