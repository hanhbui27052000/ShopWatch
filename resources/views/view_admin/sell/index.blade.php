@extends('layouts.layout_admin.extend_admin')
@section('title')
<title>Shop Watch : Màn Hình Thu Ngân</title>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="mt-4">Màn Hình Thu Ngân</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" id="btn-all">Tất Cả</button>
                        <button type="button" class="btn btn-primary" id="btn-brand">Thương Hiệu</button>
                        <button class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sắp Xếp
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <button class="dropdown-item" id="high_to_low">Giá cao đến thấp</button>
                            <button class="dropdown-item" id="low_to_high">Giá thấp đến cao</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tìm Kiếm">
                    </div>
                </div>
                <div class="shop-items">
                    <div class="container-fluid">
                        <div class="row" id="listProduct">
                            @foreach($products as $key => $product)
                            <div class="col-md-2 col-sm-6">
                                <div class="item">
                                    <img class="img-responsive" src="{{$product->image}}" alt="">
                                    <div class="item-dtls">
                                        <h6 class="productName">{{$product->product_name}}</h6>
                                        @if($product->discount > 0)
                                        <p class="priceDiscount">
                                            {{$product->price-($product->price*$product->discount/100)}}đ</p>
                                        <div>
                                            <p class="productPrice">
                                                {{$product->price}}đ</p>
                                            <p class="discount">
                                                -{{$product->discount}}%
                                            </p>
                                        </div>
                                        @else
                                        <p class="price">
                                            {{$product->price}}đ</p>
                                        @endif
                                        <p>SL: {{$product->amount_of}}</p>
                                    </div>
                                    <div class="ecom bg-lblue">
                                        <a class="btn"
                                            onclick="getProductById('{{$product->id_product}}','{{$product->amount_of}}','{{$product->product_name}}');">Add
                                            to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <section class="pt-5 pb-5">
                    <div class="row w-100">
                        <div class="col-lg-12 col-md-12 col-12">
                            <table id="tableOder" class="table table-condensed table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width:60%">Product</th>
                                        <th style="width:12%">Price</th>
                                        <th style="width:10%">Quantity</th>
                                        <th style="width:16%"></th>
                                    </tr>
                                </thead>
                                <tbody id="listProductOder">

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-7 float-right">
                                    <div>
                                        <h6 style="display: inline-block;color:#C60000;">Tên Khách Hàng:</h6>
                                        <input type="text" id="nameCustomer" style="display: inline-block;">
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <h6 style="display: inline-block;color:#C60000;">Số điện thoại:</h6>
                                        <input type="number" id="numberPhone"
                                            style="display: inline-block;margin-left: 6%;">
                                    </div>
                                </div>
                                <div class="col-md-5 float-right">
                                    <div>
                                        <h6 style="display: inline-block;color:#C60000;">Tổng Tiền:</h6>
                                        <p id="totalPrice" style="display: inline-block;">0</p>đ
                                    </div>
                                    <div style="margin-bottom: 14px;">
                                        <h6 style="display: inline-block;color:#C60000;">Khách Đưa:</h6>
                                        <input id="customer_sent" style="display: inline-block;width: 116px;">
                                    </div>
                                    <div>
                                        <h6 style="display: inline-block;color:#C60000;">Trả Lại:</h6>
                                        <p id="return" style="display: inline-block;">0</p>đ
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex align-items-center">
                        <div class="col-sm-6 order-md-2 text-right">
                            <button class="btn btn-primary mb-4 btn-lg pl-5 pr-5" id="payment" onclick="payment()"
                                disabled>Thanh
                                Toán</button>
                        </div>
                        <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                            <a href="{{asset('/shopwatch.com/admin/bill_sell')}}">
                                <i class="fas fa-arrow-left mr-2"></i> Quản Lí Hóa Đơn</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection