@extends('layouts.layout_web.extend_web')
@section('title')
<title>Shop Watch : Trang Chủ</title>

@section('slide')
<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="https://cdn.tgdd.vn/2020/11/banner/1200-350-1200x350-33.png"
                                class="girl img-responsive" alt="" />
                        </div>
                        <div class="item">
                            <img src="https://cdn.tgdd.vn/2020/12/banner/1200-350(2)-1200x350.png"
                                class="girl img-responsive" alt="" />
                        </div>
                        <div class="item">
                            <img src="https://cdn.tgdd.vn/2020/12/banner/oppo-watch-1200-350-1200x350.png"
                                class="girl img-responsive" alt="" />
                        </div>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->
@endsection

@section('sidebar_left')
<div class="col-sm-3">
    <div class="left-sidebar">
        <div class="brands_products">
            <!--brands_products-->
            <h2>THƯƠNG HIỆU</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach($amount_of_product_brands as $amount_of_product_brand)
                    <li><a href="#"> <span
                                class="pull-right">({{$amount_of_product_brand->amount_of_product}})</span>{{$amount_of_product_brand->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--/brands_products-->

        <div class="price-range">
            <!--price-range-->
            <h2>PHẠM VI GIÁ</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5"
                    data-slider-value="[250,450]" id="sl2"><br />
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div>
        <!--/price-range-->

        <div class="shipping text-center">
            <!--shipping-->
            <img src="images/home/shipping.jpg" alt="" />
        </div>
        <!--/shipping-->

    </div>
</div>
@endsection

@section('content')

<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">SẢN PHẨM BÁN CHẠY</h2>
        @foreach($fastest_selling_products as $fastest_selling_product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{$fastest_selling_product->image}}" alt="" />
                        @if($fastest_selling_product->discount>0)
                        <span>@convert($fastest_selling_product->price)đ</span>
                        <h4>@convert($fastest_selling_product->price-($fastest_selling_product->price*$fastest_selling_product->discount/100))đ
                        </h4>
                        <b>(-{{$fastest_selling_product->discount}}%)</b>
                        @else
                        <h4>@convert($fastest_selling_product->price)đ</h4>
                        @endif
                        <p>{{$fastest_selling_product->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                            cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>@convert($fastest_selling_product->price-($fastest_selling_product->price*$fastest_selling_product->discount/100))đ
                            </h2>
                            <p>{{$fastest_selling_product->product_name}}</p>
                            <a href="{{asset('/shopwatch.com/product_detail')}}" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--features_items-->
    <h2 class="title text-center">SẢN PHẨM BÁN CHẠY NHẤT CỦA CÁC THƯƠNG HIỆU</h2>
    <div class="category-tab">
        <!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @foreach($brands as $brand)
                @if($brand->id == 1)
                <li class="active"><a href="#{{$brand->name}}" data-toggle="tab">{{$brand->name}}</a></li>
                @else
                <li><a href="#blazers" data-toggle="tab">{{$brand->name}}</a></li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="Citizen">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="https://cdn3.dhht.vn/wp-content/uploads/2018/10/86_BI5006-81P-399x399.jpg"
                                    alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/category-tab-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend3.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend3.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">THƯƠNG HIỆU NỔI TIẾNG</h2>
        @foreach($brands as $brand)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{$brand->image}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--features_items-->


    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">SẢN PHẨM MỚI NHẤT</h2>
        @foreach($fastest_selling_products as $fastest_selling_product)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{$fastest_selling_product->image}}" alt="" />
                        @if($fastest_selling_product->discount>0)
                        <span>@convert($fastest_selling_product->price)đ</span>
                        <h4>@convert($fastest_selling_product->price-($fastest_selling_product->price*$fastest_selling_product->discount/100))đ
                        </h4>
                        <b>(-{{$fastest_selling_product->discount}}%)</b>
                        @else
                        <h4>@convert($fastest_selling_product->price)đ</h4>
                        @endif
                        <p>{{$fastest_selling_product->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                            cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>@convert($fastest_selling_product->price-($fastest_selling_product->price*$fastest_selling_product->discount/100))đ
                            </h2>
                            <p>{{$fastest_selling_product->product_name}}</p>
                            <a href="{{asset('/shopwatch.com/product_detail')}}" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--features_items-->
</div>
@endsection