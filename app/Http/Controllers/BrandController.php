<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class BrandController extends Controller
{
    public function index()
	{
        $brands = Brand::all();
    	return view('view_admin.brand.index',compact('brands'));
    }

    public function add_Brand(Request $request)
	{
        $OBJ_Brand = new Brand();
        $OBJ_Brand->name = $request->brand_name;
        $OBJ_Brand->image = $request->brand_image;
        $OBJ_Brand->status = $request->brand_status;  
        $OBJ_Brand->save();
        alert()->success('Thông Báo','Thêm thương hiệu thành công!');
        return redirect()->action('BrandController@index');
    }

    public function edit_Brand($id)
	{
        $OBJ_Brand = Brand::find($id);
        echo json_encode($OBJ_Brand);
        
    }

    public function update_Brand(Request $request,$id)
	{
        $OBJ_Brand = Brand::find($id);
        $OBJ_Brand->name = $request->brand_name_edit;
        $OBJ_Brand->image = $request->brand_image_edit;
        $OBJ_Brand->status = $request->brand_status_edit;  
        $OBJ_Brand->save();
        alert()->success('Thông Báo','Cập nhật thương hiệu thành công!');
        return redirect()->action('BrandController@index');
    }

    public function delete_Brand($id)
	{
        Brand::destroy($id);
        alert()->success('Thông Báo','Xóa thương hiệu thành công!');
        return redirect()->action('BrandController@index');
    }
    
    public function indexWeb()
	{
    	return view('view_web.brand_product');
    }

}