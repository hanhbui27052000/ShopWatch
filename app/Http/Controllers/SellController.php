<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Order;
use App\Product_Order;
use App\Bill;
use App\Votes_Collect;
use Auth;
class SellController extends Controller
{
    public function index()
	{
        $products = Product::join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_name','images.image',
        'products.amount_of','products.price','products.discount')
        ->orderBy('products.id','asc')->where('images.status',0)->get();
        
        return view('view_admin.sell.index',compact('products'));
        
    }

    public function indexAllProduct()
	{
        $data = Product::join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_name','images.image',
        'products.amount_of','products.price','products.discount')
        ->orderBy('products.id','asc')->where('images.status',0)->paginate();
        
        echo json_encode($data);
        
    }

    public function indexAllBrand()
	{
        $data = Brand::where('brands.status',1)->paginate();
        
        echo json_encode($data);
        
    }

    public function indexAllProductByIDBrand($id_brand)
	{
        $data = Product::join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_name','images.image',
        'products.amount_of','products.price','products.discount')
        ->orderBy('products.id','asc')
        ->where('products.brand_id',$id_brand)->where('products.status',0)->paginate();
        
        echo json_encode($data);
        
    }

    public function indexAllProductSortHighToLow()
	{
        $data = Product::join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_name','images.image',
        'products.amount_of','products.price','products.discount')
        ->orderBy('products.price','desc')->where('images.status',0)->paginate();
        
        echo json_encode($data);
        
    }

    public function indexAllProductSortLowToHigh()
	{
        $data = Product::join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_name','images.image',
        'products.amount_of','products.price','products.discount')
        ->orderBy('products.price','asc')->where('images.status',0)->paginate();
        
        echo json_encode($data);
        
    }

    public function indexAllProductSearch(Request $request)
	{
        $data = Product::join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_name','images.image',
        'products.amount_of','products.price','products.discount')
        ->orderBy('products.price','asc')->where('products.product_name','like','%'.$request->keyword.'%')->where('images.status',0)->paginate();
        
        echo json_encode($data);
        
    }

    public function getProductByID($id_product)
	{
        $data = Product::join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_name','images.image',
        'products.amount_of','products.price','products.discount')
        ->where('products.id',$id_product)->where('images.status',0)->first();
        
        echo json_encode($data);
        
    }

    public function saveOrder()
	{
        //add table order
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $OBJ_Order = new Order();
        $OBJ_Order->datetime = date("Y-m-d H:i:s");
        $OBJ_Order->status = 0;
        $OBJ_Order->save();

        echo json_encode("save order thành công!");
        
    }

    public function saveProductOrder(Request $request)
	{
        //add table product_order
        $getIdOrder = Order::select('orders.id')->orderBy('orders.id','desc')->first();
        $OBJ_Product_Order = new Product_Order();
        $OBJ_Product_Order->product_id = $request->product_id;
        $OBJ_Product_Order->amount_of = $request->amount_of;
        $OBJ_Product_Order->total_discount = $request->total_discount;
        $OBJ_Product_Order->total_money = $request->total_price;
        $OBJ_Product_Order->order_id = $getIdOrder->id;
        $OBJ_Product_Order->save();
        
        echo json_encode("save product order thành công!");
        
    }

    public function saveBill(Request $request)
	{
        //add table product_order
        $getBill = Bill::orderBy('bills.id','desc')->first();
        
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $getIdOrder = Order::select('orders.id')->orderBy('orders.id','desc')->first();
        $OBJ_Bill = new Bill();
        $OBJ_Bill->voucher_code = str_replace( substr( $getBill->voucher_code,  4, 10), substr( $getBill->voucher_code,  4, 10)+1, $getBill->voucher_code );
        $OBJ_Bill->datetime = date("Y-m-d H:i:s");
        $OBJ_Bill->staff_create = Auth::user()->name;
        $OBJ_Bill->customer_name = $request->customer_name;
        $OBJ_Bill->phone_number = $request->phone_number;
        $OBJ_Bill->order_id = $getIdOrder->id;
        $OBJ_Bill->total_money = $request->total_price;
        $OBJ_Bill->customer_pay = $request->customer_pay;
        $OBJ_Bill->return = $request->return;
        $OBJ_Bill->type = 0;
        $OBJ_Bill->status = 1;
        $OBJ_Bill->categories_id = 1;
        $OBJ_Bill->save();
        
        echo json_encode("save bill thành công!");
        
    }

    public function checkAmountOfProduct(Request $request)
	{
        //add table product_order
        $checkAmountOfProduct = Product::find($request->product_id);
        $checkAmountOfProduct->amount_of = ($checkAmountOfProduct->amount_of) - ($request->amount_of);
        $checkAmountOfProduct->save();
        
        echo json_encode("check sl product thành công!");
        
    }

}