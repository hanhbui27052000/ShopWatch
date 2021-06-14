<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Product;
class BillSellController extends Controller
{
    public function index()
	{
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $bills = Bill::where('categories_id',1)->orderBy('bills.id','desc')->get();
        $today = date("Y-m-d");   
        $yesterday = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 1), date("Y")));
        $seven_day_ago = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 7), date("Y")));
        $this_month = date("Y-m");
        $last_month =  date("Y-m",mktime(0, 0, 0, (date("m") - 1), date("d"), date("Y")));
        
        return view('view_admin.bill.bill_sell.index',compact('bills','today','yesterday','seven_day_ago','this_month','last_month'));
        
    }

    public function viewBillByIdOrder($id_order)
	{
  
        $data = Bill::join('orders','bills.order_id','orders.id')->where('bills.order_id',$id_order)->first();
        echo json_encode($data);
        
    }

    public function viewBillProductByIdOrder($id_order)
	{
        $data = Product::join('product_order','products.id','=','product_order.product_id')
        ->join('images','products.id','=','images.product_id')
        ->select('products.product_name','images.image','product_order.amount_of as amount_of_product','products.price',
        'product_order.total_discount','product_order.total_money as total_money_bill')->where('product_order.order_id',$id_order)
        ->where('images.status',0)->orderBy('product_order.id','asc')->paginate();
           
        echo json_encode($data);
    }

    public function searchBill(Request $request)
	{
        $data = Bill::where('categories_id',1)->where('bills.voucher_code','like','%'.$request->keyword.'%')->orderBy('bills.id','desc')->paginate();
        echo json_encode($data);
    }

    public function purchaseForm(Request $request)
	{
        $data = Bill::where('categories_id',1)->where('bills.type',$request->purchase_form)->orderBy('bills.id','desc')->paginate();
        echo json_encode($data);
    }

    public function statusBill(Request $request)
	{
        $data = Bill::where('categories_id',1)->where('bills.status',$request->status_bill)->orderBy('bills.id','desc')->paginate();
        echo json_encode($data);
    }

    public function getAllBill()
	{
        $data = Bill::where('categories_id',1)->orderBy('bills.id','desc')->paginate();
        echo json_encode($data);
    }

    public function getBillByDateTime(Request $request)
	{
        $data = Bill::where('categories_id',1)->where('bills.datetime','like','%'.$request->datetime.'%')->orderBy('bills.id','desc')->paginate();
        echo json_encode($data);
    }

    public function filterByDate(Request $request)
	{
        $inputDate1 = str_replace( substr( $request->inputDate1,  10, 1), " ", $request->inputDate1 );
        $inputDate2 = str_replace( substr( $request->inputDate2,  10, 1), " ", $request->inputDate2 );
        $data = Bill::where('categories_id',1)->whereBetween('datetime',[$inputDate1,$inputDate2])->orderBy('bills.id','desc')->paginate();
        echo json_encode($data);
    }

    public function deleteBillSell(Request $request)
	{ 
        Bill::destroy($request->id_bill_sell);
        echo json_encode('xóa phiếu hóa đơn thành công!');
    }
}