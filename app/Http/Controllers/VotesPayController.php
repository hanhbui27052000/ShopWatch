<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImportGoods;
use App\Categories;
use App\Supplier;
use Auth;
class VotesPayController extends Controller
{
    public function index(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $votes_pays = ImportGoods::join('categories','categories.id','=','import_goods.categories_id')
        ->join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_votes_pay','import_goods.voucher_code','suppliers.supplier_name','categories.categories',
        'import_goods.datetime','import_goods.total_money as total_money_votes_pay','import_goods.categories_id')
        ->orderBy('import_goods.id','desc')
        ->get();
        $categories = Categories::where('status',1)->get();
        $today = date("Y-m-d");   
        $yesterday = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 1), date("Y")));
        $seven_day_ago = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 7), date("Y")));
        $this_month = date("Y-m");
        $last_month =  date("Y-m",mktime(0, 0, 0, (date("m") - 1), date("d"), date("Y")));        
        return view('view_admin.bill.votes_pay.index',compact('votes_pays','categories','today','yesterday','seven_day_ago','this_month','last_month'));
    }

    public function ViewVotesPayByIdVotesPay($id_votes_pay) 
    {   
        $data = ImportGoods::join('categories','categories.id','=','import_goods.categories_id')
        ->join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_votes_pay','import_goods.voucher_code','import_goods.datetime','suppliers.supplier_name',
        'import_goods.total_money as total_money_votes_pay','import_goods.import_staff','import_goods.categories_id','categories.categories','import_goods.note')
        ->where('import_goods.id',$id_votes_pay)
        ->first();
        echo json_encode($data);
    }

    public function searchVotesPay(Request $request) 
    {  
        $data = ImportGoods::join('categories','categories.id','=','import_goods.categories_id')
        ->join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_votes_pay','import_goods.voucher_code','suppliers.supplier_name','categories.categories',
        'import_goods.datetime','import_goods.total_money as total_money_votes_pay','import_goods.categories_id')
        ->where('import_goods.voucher_code','like','%'.$request->keyword.'%')
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function categoriesVotesPay(Request $request)
	{
        $data = ImportGoods::join('categories','categories.id','=','import_goods.categories_id')
        ->join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_votes_pay','import_goods.voucher_code','suppliers.supplier_name','categories.categories',
        'import_goods.datetime','import_goods.total_money as total_money_votes_pay','import_goods.categories_id')
        ->where('import_goods.categories_id',$request->categories_votes_pay)
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function getAllVotesPay() 
    {  
        $data = ImportGoods::join('categories','categories.id','=','import_goods.categories_id')
        ->join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_votes_pay','import_goods.voucher_code','suppliers.supplier_name','categories.categories',
        'import_goods.datetime','import_goods.total_money as total_money_votes_pay','import_goods.categories_id')
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function getVotesPayByDateTime(Request $request)
	{
        $data = ImportGoods::join('categories','categories.id','=','import_goods.categories_id')
        ->join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_votes_pay','import_goods.voucher_code','suppliers.supplier_name','categories.categories',
        'import_goods.datetime','import_goods.total_money as total_money_votes_pay','import_goods.categories_id')
        ->where('import_goods.datetime','like','%'.$request->datetime.'%')
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function filterByDate(Request $request)
	{
        $inputDate1 = str_replace( substr( $request->inputDate1,  10, 1), " ", $request->inputDate1 );
        $inputDate2 = str_replace( substr( $request->inputDate2,  10, 1), " ", $request->inputDate2 );
        $data = ImportGoods::join('categories','categories.id','=','import_goods.categories_id')
        ->join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_votes_pay','import_goods.voucher_code','suppliers.supplier_name','categories.categories',
        'import_goods.datetime','import_goods.total_money as total_money_votes_pay','import_goods.categories_id')
        ->whereBetween('datetime',[$inputDate1,$inputDate2])
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function getCategoriesVotesPay()
	{
        $data = Categories::where('status',1)->where('categories.id','!=',4)->paginate();
        echo json_encode($data);
    }

    public function getDateTimeVotesPay()
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
        $OBJ_Categories->status = 1;
        $OBJ_Categories->save();
        echo json_encode('thêm hạng mục phiếu chi thành công!');
    }

    public function addVotesPay(Request $request)
	{ 
        $getVotesPay = ImportGoods::orderBy('import_goods.id','desc')->first();
        $OBJ_VotesPay = new ImportGoods();
        $OBJ_VotesPay->voucher_code = str_replace( substr( $getVotesPay->voucher_code,  3, 10), substr( $getVotesPay->voucher_code,  3, 10)+1, $getVotesPay->voucher_code );
        $OBJ_VotesPay->datetime = str_replace( substr( $request->datetime,  10, 1), " ", $request->datetime );
        $OBJ_VotesPay->supplier_id = $request->id_supplier;
        $OBJ_VotesPay->import_staff = Auth::user()->name;
        $OBJ_VotesPay->total_money = $request->total_money;
        $OBJ_VotesPay->categories_id = $request->categories;
        $OBJ_VotesPay->note = $request->note;
        $OBJ_VotesPay->save();

        $OBJ_Supplier = Supplier::find($request->id_supplier);
        $OBJ_Supplier->total_money = ($OBJ_Supplier->total_money) + ($request->total_money);
        $OBJ_Supplier->save();
        echo json_encode('thêm mới phiếu chi thành công!');
    }

    public function editVotesPay($id_votes_pay)
	{ 
        $data = ImportGoods::join('categories','categories.id','=','import_goods.categories_id')
        ->join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_votes_pay','suppliers.supplier_name','categories.categories',
        'import_goods.datetime','import_goods.total_money as total_money_votes_pay','import_goods.categories_id','import_goods.datetime')
        ->where('import_goods.id',$id_votes_pay)
        ->first();
        echo json_encode($data);
    }

    public function updateVotesPay(Request $request)
	{ 
        $OBJ_VotesPay = ImportGoods::find($request->id_votes_pay);

        $OBJ_Supplier = Supplier::find($OBJ_VotesPay->supplier_id);
        $OBJ_Supplier->total_money = ($OBJ_Supplier->total_money) -($OBJ_VotesPay->total_money) + ($request->total_money);
        $OBJ_Supplier->save();

        $OBJ_VotesPay->datetime = str_replace( substr( $request->datetime,  10, 1), " ", $request->datetime );
        $OBJ_VotesPay->total_money = $request->total_money;
        $OBJ_VotesPay->note = $request->note;
        $OBJ_VotesPay->save();
        echo json_encode('cập nhật phiếu chi thành công!');
    }

    public function deleteVotesPay(Request $request)
	{ 
        $OBJ_VotesPay = ImportGoods::find($request->id_votes_pay);
        $OBJ_Supplier = Supplier::find($OBJ_VotesPay->supplier_id);
        $OBJ_Supplier->total_money = ($OBJ_Supplier->total_money) -($OBJ_VotesPay->total_money);
        $OBJ_Supplier->save();
        ImportGoods::destroy($request->id_votes_pay);
        echo json_encode('xóa phiếu chi thành công!');
    }
}