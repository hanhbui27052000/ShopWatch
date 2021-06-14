<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Categories;
use App\Supplier;
use Auth;
class VotesCollectController extends Controller
{
    public function index() 
    {   
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $votes_collects = Bill::join('categories','categories.id','=','bills.categories_id')
        ->select('bills.id as id_votes_collect','bills.voucher_code','bills.payer','categories.categories','bills.datetime','bills.total_money','bills.categories_id')
        ->orderBy('bills.id','desc')->get();
        $categories = Categories::where('status',0)->get();
        $today = date("Y-m-d");   
        $yesterday = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 1), date("Y")));
        $seven_day_ago = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 7), date("Y")));
        $this_month = date("Y-m");
        $last_month =  date("Y-m",mktime(0, 0, 0, (date("m") - 1), date("d"), date("Y")));        
        return view('view_admin.bill.votes_collect.index',compact('votes_collects','categories','today','yesterday','seven_day_ago','this_month','last_month'));
    }

    public function ViewVotesCollectByIdBill($id_votes_collect) 
    {   
        $data = Bill::join('categories','categories.id','=','bills.categories_id')
        ->select('bills.id as id_votes_collect','bills.voucher_code','bills.datetime','bills.payer',
        'bills.total_money','bills.staff_create','bills.categories_id','categories.categories','bills.note')
        ->where('bills.id',$id_votes_collect)
        ->first();
        echo json_encode($data);
    }

    public function searchVotesCollect(Request $request) 
    {  
        $data = Bill::join('categories','categories.id','=','bills.categories_id')
        ->select('bills.id as id_votes_collect','bills.voucher_code','bills.payer','categories.categories','bills.datetime','bills.total_money','bills.categories_id')
        ->where('bills.voucher_code','like','%'.$request->keyword.'%')
        ->orderBy('bills.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function getAllVotesCollect() 
    {  
        $data = Bill::join('categories','categories.id','=','bills.categories_id')
        ->select('bills.id as id_votes_collect','bills.voucher_code','bills.datetime','bills.payer',
        'bills.total_money','bills.categories_id','categories.categories')
        ->orderBy('bills.id','desc')->paginate();
        echo json_encode($data);
    }

    public function getVotesCollectByDateTime(Request $request)
	{
        $data = Bill::join('categories','categories.id','=','bills.categories_id')
        ->select('bills.id as id_votes_collect','bills.voucher_code','bills.datetime','bills.payer',
        'bills.total_money','bills.categories_id','categories.categories')
        ->where('bills.datetime','like','%'.$request->datetime.'%')
        ->orderBy('bills.id','desc')
        ->paginate();
        echo json_encode($data);
    }
    
    public function filterByDate(Request $request)
	{
        $inputDate1 = str_replace( substr( $request->inputDate1,  10, 1), " ", $request->inputDate1 );
        $inputDate2 = str_replace( substr( $request->inputDate2,  10, 1), " ", $request->inputDate2 );
        $data = Bill::join('categories','categories.id','=','bills.categories_id')
        ->select('bills.id as id_votes_collect','bills.voucher_code','bills.datetime','bills.payer',
        'bills.total_money','bills.categories_id','categories.categories')
        ->whereBetween('datetime',[$inputDate1,$inputDate2])
        ->orderBy('bills.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function categoriesVotesCollect(Request $request)
	{
        $data = Bill::join('categories','categories.id','=','bills.categories_id')
        ->select('bills.id as id_votes_collect','bills.voucher_code','bills.datetime','bills.payer',
        'bills.total_money','bills.categories_id','categories.categories')
        ->where('bills.categories_id',$request->categories_votes_collect)
        ->orderBy('bills.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function getCategoriesVotesCollect()
	{
        $data = Categories::where('status',0)->where('categories.id','!=',1)->paginate();
        echo json_encode($data);
    }

    public function getDateTimeVotesCollect()
	{
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $data = str_replace( substr( date("Y-m-d H:i:s"),  10, 1), "T", date("Y-m-d H:i:s") );
        echo json_encode($data);
    }

    public function searchSupplier(Request $request)
	{
        $data = Supplier::where('suppliers.supplier_code','like','%'.$request->keyword.'%')
        ->orWhere('suppliers.supplier_name','like','%'.$request->keyword.'%')
        ->paginate();
        echo json_encode($data);
    }

    public function chooseSupplier(Request $request)
	{
        $data = Supplier::where('suppliers.id',$request->id_supplier)->first();
        echo json_encode($data);
        
    }

    public function addCategories(Request $request)
	{
        $OBJ_Categories = new Categories();
        $OBJ_Categories->categories = $request->categories;
        $OBJ_Categories->status = 0;
        $OBJ_Categories->save();
        echo json_encode('thêm hạng mục phiếu thu thành công!');
    }

    public function addVotesCollect(Request $request)
	{ 
        $getNameSupplier = Supplier::find($request->id_supplier);
        $getVotesCollect = Bill::orderBy('bills.id','desc')->first();
        $OBJ_VotesCollect = new Bill();
        $OBJ_VotesCollect->voucher_code = str_replace( substr( $getVotesCollect->voucher_code,  4, 10), substr( $getVotesCollect->voucher_code,  4, 10)+1, $getVotesCollect->voucher_code );
        $OBJ_VotesCollect->datetime = str_replace( substr( $request->datetime,  10, 1), " ", $request->datetime );
        $OBJ_VotesCollect->staff_create = Auth::user()->name;
        $OBJ_VotesCollect->payer = $getNameSupplier->supplier_name;
        $OBJ_VotesCollect->total_money = $request->total_money;
        $OBJ_VotesCollect->categories_id = $request->categories;
        $OBJ_VotesCollect->note = $request->note;
        $OBJ_VotesCollect->save();
        echo json_encode('thêm mới phiếu thu thành công!');
    }

    public function editVotesCollect($id_votes_collect)
	{ 
        $data = Bill::join('categories','categories.id','=','bills.categories_id')
        ->select('bills.id as id_votes_collect','bills.datetime','bills.payer',
        'bills.total_money','bills.categories_id','categories.categories')
        ->where('bills.id',$id_votes_collect)
        ->first();
        echo json_encode($data);
    }

    public function updateVotesCollect(Request $request)
	{ 
        $OBJ_VotesCollect = Bill::find($request->id_votes_collect);
        $OBJ_VotesCollect->datetime = str_replace( substr( $request->datetime,  10, 1), " ", $request->datetime );
        $OBJ_VotesCollect->total_money = $request->total_money;
        $OBJ_VotesCollect->note = $request->note;
        $OBJ_VotesCollect->save();
        echo json_encode('cập nhật phiếu thu thành công!');
    }

    public function deleteVotesCollect(Request $request)
	{ 
        Bill::destroy($request->id_votes_collect);
        echo json_encode('xóa phiếu thu thành công!');
    }
    
}