<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\ImportGoods;
class SupplierController extends Controller
{
    public function index() 
    {
        $suppliers = Supplier::orderBy('suppliers.id','desc')->get();        
        return view('view_admin.supplier.index',compact('suppliers'));
    }

    public function formAdd_Supplier() 
    {
        return view('view_admin.supplier.add-supplier');
    }

    public function add_Supplier(Request $request) 
    {
        $getSupplier = Supplier::orderBy('suppliers.id','desc')->first();
        
        $OBJ_Supplier = new Supplier();
        $OBJ_Supplier->supplier_code = str_replace( substr( $getSupplier->supplier_code,  5, 4), substr( $getSupplier->supplier_code,  5, 4)+1, $getSupplier->supplier_code );
        $OBJ_Supplier->supplier_name = $request->supplierName;
        $OBJ_Supplier->gender = $request->gender;
        $OBJ_Supplier->date_of_birth = $request->dateOfBirth;
        $OBJ_Supplier->image = $request->image;
        $OBJ_Supplier->phone_number = $request->phoneNumber;
        $OBJ_Supplier->address = $request->address;
        $OBJ_Supplier->total_money = 0;
        $OBJ_Supplier->owed_money = 0;
        $OBJ_Supplier->tax_code = $request->taxCode;
        $OBJ_Supplier->note = $request->note;
        $OBJ_Supplier->save();
        alert()->success('Thông Báo','Thêm nhà cung cấp thành công!');
        return redirect()->action('SupplierController@formAdd_Supplier');
    }

    public function formEdit_Supplier($id) 
    {
        $getSupplierById = Supplier::find($id);
        return view('view_admin.supplier.edit-supplier',compact('getSupplierById'));
    }

    public function edit_Supplier(Request $request,$id) 
    {
        $getSupplierUpdateById = Supplier::find($id);
        $getSupplierUpdateById->supplier_name = $request->supplierNameEdit;
        $getSupplierUpdateById->gender = $request->genderEdit;
        $getSupplierUpdateById->date_of_birth = $request->dateOfBirthEdit;
        $getSupplierUpdateById->image = $request->imageEdit;
        $getSupplierUpdateById->phone_number = $request->phoneNumberEdit;
        $getSupplierUpdateById->address = $request->addressEdit;
        $getSupplierUpdateById->total_money = 0;
        $getSupplierUpdateById->owed_money = 0;
        $getSupplierUpdateById->tax_code = $request->taxCodeEdit;
        $getSupplierUpdateById->note = $request->noteEdit;
        $getSupplierUpdateById->save();
        alert()->success('Thông Báo','Cập Nhật nhà cung cấp thành công!');
        return redirect()->action('SupplierController@index');
    }

    public function delete_Supplier($id){

        Supplier::destroy($id);
		
        alert()->success('Thông Báo','Xóa nhà cung cấp thành công!');
        return redirect()->action('SupplierController@index');
       
    }

    public function viewSupplierById($id_supplier) 
    {
        $data = Supplier::where('suppliers.id',$id_supplier)->first();        
        
        echo json_encode($data);
    }

    public function transactionHistory($id_supplier) 
    {
        $data = ImportGoods::where('import_goods.supplier_id',$id_supplier)->orderBy('import_goods.id','desc')->paginate();        
        echo json_encode($data);
    }

    public function debtBook($id_supplier) 
    {
        // $data = ImportGoods::where('import_goods.supplier_id',$id_supplier)->paginate();        
        // echo json_encode($data);
    }
}