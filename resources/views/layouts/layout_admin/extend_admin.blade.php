<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>yield('title')</title>
    <link href="{{asset('admin/dist/css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/dist/css/sell_product.css')}}" rel="stylesheet" />
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
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{asset('/shopwatch.com/admin')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Trang Chủ
                        </a>
                        @can('act-sell')
                        <a class="nav-link" href="{{asset('/shopwatch.com/admin/sell')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-desktop"></i></div>
                            Màn Hình Thu Ngân
                        </a>
                        @endcan
                        @can('act-product')
                        <div class="sb-sidenav-menu-heading">Sản Phẩm</div>
                        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-cubes"></i></div>
                            Quản Lí Sản Phẩm
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @can('act-product')
                                <a class="nav-link" href="{{asset('/shopwatch.com/admin/product/')}}">Danh Sách Sản
                                    Phẩm</a>
                                @endcan
                                @can('act-brand')
                                <a class="nav-link" href="{{asset('/shopwatch.com/admin/brand/')}}">Thương Hiệu</a>
                                @endcan
                                <a class="nav-link" href="{{asset('/shopwatch.com/admin/brand/')}}">Giảm Giá</a>
                            </nav>
                        </div>
                        @endcan
                        @can('act-supplier')
                        <div class="sb-sidenav-menu-heading">Nhà Cung Cấp</div>
                        <a class="nav-link" href="{{asset('/shopwatch.com/admin/supplier/')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                            Nhà Cung Cấp
                        </a>
                        @endcan
                        @can('act-order')
                        <div class="sb-sidenav-menu-heading">Đơn Hàng</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Quản Lí Đơn Hàng
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse"
                                    data-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    DS Đơn Hàng
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Đơn Hàng Mới</a>
                                        <a class="nav-link" href="register.html">Đã Xác Nhận</a>
                                    </nav>
                                </div>
                                <a class="nav-link" href="password.html">Đơn Hàng Trả</a>
                            </nav>
                        </div>
                        @endcan
                        @can('act-staff')
                        <div class="sb-sidenav-menu-heading">Quản Lí Nhân Viên</div>
                        <a class="nav-link" href="{{asset('/shopwatch.com/admin/staff/')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                            Danh Sách Nhân Viên
                        </a>
                        @endcan
                        @can('act-bill_sell')
                        <div class="sb-sidenav-menu-heading">Hóa Đơn</div>
                        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseBill"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Quản Lí Hóa Đơn
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseBill" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @can('act-bill_sell')
                                <a class="nav-link" href="{{asset('/shopwatch.com/admin/bill_sell')}}">Hóa Đơn Bán
                                    Hàng</a>
                                @endcan
                                @can('act-votes_collect')
                                <a class="nav-link" href="{{asset('/shopwatch.com/admin/votes_collect')}}">Phiếu Thu</a>
                                @endcan
                                @can('act-votes_pay')
                                <a class="nav-link" href="{{asset('/shopwatch.com/admin/votes_pay')}}">Phiếu Chi</a>
                                @endcan
                            </nav>
                        </div>
                        @endcan
                        @can('act-warehouse')
                        <div class="sb-sidenav-menu-heading">Quản Lí Kho</div>
                        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseWareHouse"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Quản Lí Kho
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseWareHouse" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{asset('/shopwatch.com/admin/warehouse/import_goods')}}">Nhập
                                    Hàng</a>
                                <a class="nav-link" href="">Trả Hàng</a>
                                <a class="nav-link" href="">Tồn Kho</a>
                            </nav>
                        </div>
                        @endcan
                        @can('act-report')
                        <div class="sb-sidenav-menu-heading">Báo Cáo</div>
                        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseReport"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Báo Cáo
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseReport" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{asset('')}}">Tổng kết cuối ngày</a>
                                <a class="nav-link" href="{{asset('')}}">Báo cáo bán hàng</a>
                                <a class="nav-link" href="{{asset('')}}">Báo cáo trả hàng</a>
                                <a class="nav-link" href="{{asset('')}}">Báo cáo nhập hàng</a>
                            </nav>
                        </div>
                        @endcan
                        @can('act-funds')
                        <div class="sb-sidenav-menu-heading">Sổ Quỹ</div>
                        <a class="nav-link" href="{{asset('')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-money"></i></div>
                            Sổ Quỹ
                        </a>
                        @endcan
                        <div class="sb-sidenav-menu-heading">WEB</div>
                        <a class="nav-link" href="{{asset('/shopwatch.com')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            View Web
                        </a>
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
                @yield('content')
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
    <script src="{{ asset('js/jquery/jquery-3.6.0.js') }}"></script>
    <script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('admin/dist/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin/dist/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/dist/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="{{asset('admin/dist/assets/demo/chart-pie-demo.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin/dist/assets/demo/datatables-demo.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('admin/dist/js/supplier.js')}}"></script>
    <script src="{{asset('admin/dist/js/product.js')}}"></script>
    <script src="{{asset('admin/dist/js/brand.js')}}"></script>
    <script src="{{asset('admin/dist/js/staff.js')}}"></script>
    <script src="{{asset('admin/dist/js/sell-product.js')}}"></script>
</body>

</html>