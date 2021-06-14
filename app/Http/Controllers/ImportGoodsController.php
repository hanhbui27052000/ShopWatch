<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Product;
use App\ImportGoods;
use App\Product_Import;
use Auth;
class ImportGoodsController extends Controller
{
    public function index()
	{
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $import_goods = ImportGoods::join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_import_goods','import_goods.voucher_code','import_goods.supplier_id','suppliers.supplier_name','import_goods.datetime',
        'import_goods.total_money as total_money_import_goods','import_goods.total_payment','import_goods.status')
        ->where('import_goods.categories_id',4)
        ->orderBy('import_goods.id','desc')
        ->get();
        $today = date("Y-m-d");   
        $yesterday = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 1), date("Y")));
        $seven_day_ago = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 7), date("Y")));
        $this_month = date("Y-m");
        $last_month =  date("Y-m",mktime(0, 0, 0, (date("m") - 1), date("d"), date("Y")));
        return view('view_admin.warehouse.import_goods.index',compact('import_goods','today','yesterday','seven_day_ago','this_month','last_month'));
    }

    public function viewDetailImportGoods($id_import_goods)
	{
        $data = ImportGoods::join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.voucher_code','suppliers.supplier_name','import_goods.datetime','import_goods.import_staff',
        'import_goods.discount','import_goods.VAT','import_goods.total_money as total_money_import_goods','import_goods.total_payment',
        'import_goods.prepayment','import_goods.owed_money as owed_money_import_goods','import_goods.categories_id','import_goods.status')
        ->where('import_goods.id',$id_import_goods)
        ->first();
        echo json_encode($data);
    }

    public function viewProductImportGoods($id_import_goods)
	{
        $data = Product::join('product_import','products.id','=','product_import.product_id')
        ->join('images','products.id','=','images.product_id')
        ->select('products.product_name','images.image','product_import.amount_of as amount_of_product_import','product_import.import_price',
        'product_import.total_money')
        ->where('product_import.import_good_id',$id_import_goods)
        ->where('images.status',0)
        ->orderBy('product_import.id','asc')
        ->paginate();
           
        echo json_encode($data);
    }

    public function searchImportGoods(Request $request)
	{
        $data = ImportGoods::join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_import_goods','import_goods.voucher_code','import_goods.supplier_id','suppliers.supplier_name','import_goods.datetime',
        'import_goods.total_money as total_money_import_goods','import_goods.total_payment','import_goods.categories_id','import_goods.status')
        ->where('import_goods.categories_id',4)
        ->where('import_goods.voucher_code','like','%'.$request->keyword.'%')
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function statusImportGoods(Request $request)
	{
        $data = ImportGoods::join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_import_goods','import_goods.voucher_code','import_goods.supplier_id','suppliers.supplier_name','import_goods.datetime',
        'import_goods.total_money as total_money_import_goods','import_goods.total_payment','import_goods.categories_id','import_goods.status')
        ->where('import_goods.categories_id',4)
        ->where('import_goods.status',$request->status_import_goods)
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function getAllImportGoods()
	{
        $data = ImportGoods::join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_import_goods','import_goods.voucher_code','import_goods.supplier_id','suppliers.supplier_name','import_goods.datetime',
        'import_goods.total_money as total_money_import_goods','import_goods.total_payment','import_goods.categories_id','import_goods.status')
        ->where('import_goods.categories_id',4)
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function getImportGoodsByDateTime(Request $request)
	{
        $data = ImportGoods::join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_import_goods','import_goods.voucher_code','import_goods.supplier_id','suppliers.supplier_name','import_goods.datetime',
        'import_goods.total_money as total_money_import_goods','import_goods.total_payment','import_goods.categories_id','import_goods.status')
        ->where('import_goods.categories_id',4)
        ->where('import_goods.datetime','like','%'.$request->datetime.'%')
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function filterByDate(Request $request)
	{
        $inputDate1 = str_replace( substr( $request->inputDate1,  10, 1), " ", $request->inputDate1 );
        $inputDate2 = str_replace( substr( $request->inputDate2,  10, 1), " ", $request->inputDate2 );
        $data = ImportGoods::join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_import_goods','import_goods.voucher_code','import_goods.supplier_id','suppliers.supplier_name','import_goods.datetime',
        'import_goods.total_money as total_money_import_goods','import_goods.total_payment','import_goods.categories_id','import_goods.status')
        ->where('import_goods.categories_id',4)
        ->whereBetween('import_goods.datetime',[$inputDate1,$inputDate2])
        ->orderBy('import_goods.id','desc')
        ->paginate();
        echo json_encode($data);
    }

    public function formAdd_ImportGoods()
	{
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $datetime = str_replace( substr( date("Y-m-d H:i:s"),  10, 1), "T", date("Y-m-d H:i:s") );
        return view('view_admin.warehouse.import_goods.add-import-goods',compact('datetime'));
        
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

    public function searchProduct(Request $request)
	{
        $data = Product::join('images','products.id','=','images.product_id')
        ->where('products.product_code','like','%'.$request->keyword.'%')
        ->orWhere('products.product_name','like','%'.$request->keyword.'%')
        ->paginate();
        echo json_encode($data);
        
    }

    public function addProduct_ImportGoods($id_product)
	{
        $data = Product::join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_code','products.product_name','images.image',
        'products.amount_of','products.cost_prices')
        ->where('products.id',$id_product)
        ->first();
        echo json_encode($data);
    }

    public function saveImportGoods(Request $request)
	{
        $getImportGoods = ImportGoods::orderBy('import_goods.id','desc')->first();
        $OBJ_ImportGoods = new ImportGoods();
        $OBJ_ImportGoods->voucher_code = str_replace( substr( $getImportGoods->voucher_code,  3, 10), substr( $getImportGoods->voucher_code,  3, 10)+1, $getImportGoods->voucher_code );
        $OBJ_ImportGoods->datetime = str_replace( substr( $request->datetime,  10, 1), " ", $request->datetime );
        $OBJ_ImportGoods->supplier_id = $request->supplier_id;
        $OBJ_ImportGoods->import_staff = Auth::user()->name;
        $OBJ_ImportGoods->discount = (($request->total_money)*($request->discount)/100);
        $OBJ_ImportGoods->VAT = (($request->total_money)*($request->vat)/100);
        $OBJ_ImportGoods->total_money = $request->total_money;
        $OBJ_ImportGoods->total_payment = $request->total_payment;
        $OBJ_ImportGoods->prepayment = $request->prepayment;
        $OBJ_ImportGoods->owed_money = $request->owed_money;
        $OBJ_ImportGoods->categories_id = 4;
        $OBJ_ImportGoods->status = 0;
        $OBJ_ImportGoods->save();
        echo json_encode('save import goods thành công!');
    }

    public function saveProductImport(Request $request)
	{
        $getIdImportGoods = ImportGoods::select('import_goods.id')->orderBy('import_goods.id','desc')->first();
        $OBJ_Product_Import = new Product_Import();
        $OBJ_Product_Import->product_id = $request->product_id;
        $OBJ_Product_Import->amount_of = $request->amount_of;
        $OBJ_Product_Import->import_price = $request->import_price;
        $OBJ_Product_Import->total_money = $request->total_money;
        $OBJ_Product_Import->import_good_id = $getIdImportGoods->id;
        $OBJ_Product_Import->save();
        echo json_encode('save product import thành công!');
    }

    public function confirmImportGoods(Request $request)
	{
        $getImportGoods = ImportGoods::orderBy('import_goods.id','desc')->first();
        $OBJ_ImportGoods = new ImportGoods();
        $OBJ_ImportGoods->voucher_code = str_replace( substr( $getImportGoods->voucher_code,  3, 10), substr( $getImportGoods->voucher_code,  3, 10)+1, $getImportGoods->voucher_code );
        $OBJ_ImportGoods->datetime = str_replace( substr( $request->datetime,  10, 1), " ", $request->datetime );
        $OBJ_ImportGoods->supplier_id = $request->supplier_id;
        $OBJ_ImportGoods->import_staff = Auth::user()->name;
        $OBJ_ImportGoods->discount = (($request->total_money)*($request->discount)/100);
        $OBJ_ImportGoods->VAT = (($request->total_money)*($request->vat)/100);
        $OBJ_ImportGoods->total_money = $request->total_money;
        $OBJ_ImportGoods->total_payment = $request->total_payment;
        $OBJ_ImportGoods->prepayment = $request->prepayment;
        $OBJ_ImportGoods->owed_money = $request->owed_money;
        $OBJ_ImportGoods->categories_id = 4;
        $OBJ_ImportGoods->status = 1;
        $OBJ_ImportGoods->save();
        echo json_encode('save import goods thành công!');
    }

    public function updateProduct(Request $request)
	{
        $OBJ_Product = Product::find($request->product_id);
        $OBJ_Product->amount_of = ($OBJ_Product->amount_of)+($request->amount_of);
        $OBJ_Product->cost_prices = $request->cost_prices;
        $OBJ_Product->save();
        echo json_encode('update product thành công!');
    }

    public function updateSupplier(Request $request)
	{ 
        $OBJ_Supplier = Supplier::find($request->supplier_id);
        $OBJ_Supplier->total_money = ($OBJ_Supplier->total_money)+($request->total_payment);
        $OBJ_Supplier->owed_money = ($OBJ_Supplier->owed_money)+($request->owed_money);
        $OBJ_Supplier->save();
        echo json_encode('update supplier thành công!');
    }

    public function formEdit_ImportGoods($id_import_goods)
	{
    
        $get_Product_Imports = Product::join('product_import','products.id','=','product_import.product_id')
        ->join('images','products.id','=','images.product_id')
        ->select('products.id as id_product','products.product_code','products.product_name','images.image','product_import.amount_of as amount_of_product_import','product_import.import_price',
        'product_import.total_money')
        ->where('product_import.import_good_id',$id_import_goods)
        ->where('images.status',0)
        ->orderBy('product_import.id','asc')
        ->get();

        $get_Import_Goods = ImportGoods::join('suppliers','suppliers.id','=','import_goods.supplier_id')
        ->select('import_goods.id as id_import_goods','import_goods.voucher_code','import_goods.supplier_id','suppliers.supplier_name',
        'import_goods.datetime','import_goods.discount','import_goods.VAT','import_goods.total_money as total_money_import_goods',
        'import_goods.total_payment','import_goods.prepayment','import_goods.owed_money as owed_money_import_goods','import_goods.status')
        ->where('import_goods.id',$id_import_goods)
        ->first();

        $total_Amount_Of = Product_Import::where('product_import.import_good_id',$id_import_goods)->sum('amount_of');
        
        return view('view_admin.warehouse.import_goods.edit-import-goods',compact('get_Product_Imports','get_Import_Goods','total_Amount_Of'));
        
    }

    public function updateAmountOfProductAfterRemoveProduct(Request $request)
	{
        $count_Product_Import = Product_Import::where('product_import.import_good_id',$request->id_import_goods)
        ->where('product_import.product_id',$request->product_id)
        ->count();
        $OBJ_Product = Product::find($request->product_id);
        if($count_Product_Import == 1 && $request->status == 1){
            $OBJ_Product_Import = Product_Import::select('product_import.amount_of')
            ->where('product_import.import_good_id',$request->id_import_goods)
            ->where('product_import.product_id',$request->product_id)
            ->first();
            $OBJ_Product->amount_of = ($OBJ_Product->amount_of) - ($OBJ_Product_Import->amount_of); 
            $OBJ_Product->save();
            Product_Import::where('product_import.import_good_id',$request->id_import_goods)->where('product_import.product_id',$request->product_id)->delete();
        }
        echo json_encode('update amount of product thành công!');
    }

    public function saveEditImportGoods(Request $request)
	{
        $OBJ_ImportGoods = ImportGoods::find($request->id_import_goods);
        $OBJ_ImportGoods->datetime = str_replace( substr( $request->datetime,  10, 1), " ", $request->datetime );
        $OBJ_ImportGoods->supplier_id = $request->supplier_id;
        $OBJ_ImportGoods->import_staff = Auth::user()->name;
        $OBJ_ImportGoods->discount = (($request->total_money)*($request->discount)/100);
        $OBJ_ImportGoods->VAT = (($request->total_money)*($request->vat)/100);
        $OBJ_ImportGoods->total_money = $request->total_money;
        $OBJ_ImportGoods->total_payment = $request->total_payment;
        $OBJ_ImportGoods->prepayment = $request->prepayment;
        $OBJ_ImportGoods->owed_money = $request->owed_money;
        $OBJ_ImportGoods->save();
        
        echo json_encode('save edit import goods thành công!');
    }

    public function confirmEditImportGoods(Request $request)
	{
        $OBJ_ImportGoods = ImportGoods::find($request->id_import_goods);
        $OBJ_ImportGoods->datetime = str_replace( substr( $request->datetime,  10, 1), " ", $request->datetime );
        $OBJ_ImportGoods->supplier_id = $request->supplier_id;
        $OBJ_ImportGoods->import_staff = Auth::user()->name;
        $OBJ_ImportGoods->discount = (($request->total_money)*($request->discount)/100);
        $OBJ_ImportGoods->VAT = (($request->total_money)*($request->vat)/100);
        $OBJ_ImportGoods->total_money = $request->total_money;
        $OBJ_ImportGoods->total_payment = $request->total_payment;
        $OBJ_ImportGoods->prepayment = $request->prepayment;
        $OBJ_ImportGoods->owed_money = $request->owed_money;
        $OBJ_ImportGoods->status = 1;
        $OBJ_ImportGoods->save();
        
        echo json_encode('confirm edit import goods thành công!');
    }

    public function updateProductAfterUpdateImportGoods(Request $request)
	{
        $OBJ_Product_Import = Product_Import::select('product_import.amount_of')
        ->where('product_import.import_good_id',$request->id_import_goods)
        ->where('product_import.product_id',$request->product_id)
        ->first();
        $OBJ_Product = Product::find($request->product_id);
        $count_Product_Import = Product_Import::where('product_import.import_good_id',$request->id_import_goods)
        ->where('product_import.product_id',$request->product_id)
        ->count();
        if($count_Product_Import == 1){
            if($request->amount_of > $OBJ_Product_Import->amount_of){
                $OBJ_Product->amount_of = ($OBJ_Product->amount_of) + ($request->amount_of - $OBJ_Product_Import->amount_of); 
                $OBJ_Product->cost_prices = $request->cost_prices;
                $OBJ_Product->save();
            }
            if($request->amount_of < $OBJ_Product_Import->amount_of){
                $OBJ_Product->amount_of = ($OBJ_Product->amount_of) - ($OBJ_Product_Import->amount_of - $request->amount_of); 
                $OBJ_Product->cost_prices = $request->cost_prices;
                $OBJ_Product->save();
            }
        }
        else{
            $OBJ_Product->amount_of = $OBJ_Product->amount_of + $request->amount_of; 
            $OBJ_Product->cost_prices = $request->cost_prices;
            $OBJ_Product->save();
        }
        echo json_encode('update product thành công!');
    }

    public function updateSupplierAfterUpdateImportGoods(Request $request)
	{
        $total_payment = ImportGoods::where('import_goods.status',1)
        ->where('import_goods.supplier_id',$request->supplier_id)
        ->sum('import_goods.total_payment');

        $owed_money = ImportGoods::where('import_goods.status',1)
        ->where('import_goods.supplier_id',$request->supplier_id)
        ->sum('import_goods.owed_money');
        
        $OBJ_Supplier = Supplier::find($request->supplier_id);
        $OBJ_Supplier->total_money = $total_payment;
        $OBJ_Supplier->owed_money = $owed_money;
        $OBJ_Supplier->save();
        echo json_encode('update supplier thành công!');
    }

    public function saveEditProductImport(Request $request)
	{
        $count_Product_Import = Product_Import::where('product_import.import_good_id',$request->id_import_goods)->where('product_import.product_id',$request->product_id)->count();
        if($count_Product_Import == 1){
            Product_Import::where('product_import.import_good_id',$request->id_import_goods)->where('product_import.product_id',$request->product_id)->delete();
        }
        $OBJ_Product_Import = new Product_Import();
        $OBJ_Product_Import->product_id = $request->product_id;
        $OBJ_Product_Import->amount_of = $request->amount_of;
        $OBJ_Product_Import->import_price = $request->import_price;
        $OBJ_Product_Import->total_money = $request->total_money;
        $OBJ_Product_Import->import_good_id = $request->id_import_goods;
        $OBJ_Product_Import->save();
        echo json_encode('save edit product import thành công!');
    }

    public function getProductImportByIdImportGoods(Request $request)
	{
        $data = Product_Import::where('product_import.import_good_id',$request->id_import_goods)->paginate();
        echo json_encode($data);
    }

    public function cancelImportGoods(Request $request)
	{
        $OBJ_ImportGoods = ImportGoods::find($request->id_import_goods);
        $OBJ_ImportGoods->status = 2;
        $OBJ_ImportGoods->save();
        
        echo json_encode('cancel import goods thành công!');
    }

    public function updateProductAfterCancelImportGoods(Request $request)
	{
        $OBJ_Product = Product::find($request->product_id);
        $OBJ_Product->amount_of = ($OBJ_Product->amount_of) - ($request->amount_of);
        $OBJ_Product->save();
        
        echo json_encode('update Product after cancel import goods thành công!');
    }

    public function updateSupplierAfterCancelImportGoods(Request $request)
	{
        $OBJ_ImportGoods = ImportGoods::find($request->id_import_goods);
        $OBJ_Supplier = Supplier::find($request->id_supplier);
        $OBJ_Supplier->total_money = ($OBJ_Supplier->total_money)-($OBJ_ImportGoods->total_payment);
        $OBJ_Supplier->owed_money = ($OBJ_Supplier->owed_money)-($OBJ_ImportGoods->owed_money);
        $OBJ_Supplier->save();
        echo json_encode('update supplier after cancel import goods thành công!');
    }

    public function deleteImportGoods(Request $request)
	{
        $OBJ_ImportGoods = ImportGoods::destroy($request->id_import_goods);
        echo json_encode('delete import goods thành công!');
    }
}