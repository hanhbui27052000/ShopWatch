<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Product;
use App\Image_Product;
use App\Description_Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::join('images','products.id','=','images.product_id')
        ->join('brands','products.brand_id','=','brands.id')->select('products.id as id_product','products.product_code',
        'products.product_name','brands.name','images.image as image_product','products.amount_of','products.cost_prices','products.price',
        'products.discount','products.status as status_product')->orderBy('products.id','desc')->where('images.status',0)->get();
        
        return view('view_admin.product.index',compact('products'));
    }

    public function formAdd_Product()
    {
        $brands = Brand::all();
        return view('view_admin.product.add-product',compact('brands'));
    }

    public function add_Product(Request $request)
    {
        $countProductNumber = Product::select('product_number')->where('product_number',$request->productNumber)->count();
        //add table products 
        if($countProductNumber>=1){
            toast('Số hiệu sản phẩm đã tồn tại!','error');
            return redirect()->action('ProductController@formAdd_Product');
        }
        else{
            $getProductCode = Product::orderBy('products.id','desc')->first();
            $OBJ_Product = new Product();
            $OBJ_Product->product_code = str_replace( substr( $getProductCode->product_code,  2, 10), substr( $getProductCode->product_code,  2, 10)+1, $getProductCode->product_code );
            $OBJ_Product->product_number = $request->productNumber;
            $OBJ_Product->product_name = $request->productName;
            $OBJ_Product->brand_id = $request->brand;
            $OBJ_Product->amount_of = 0;
            $OBJ_Product->cost_prices = $request->costPrice;
            $OBJ_Product->price = $request->price;
            $OBJ_Product->discount = $request->distCount;
            $OBJ_Product->status = $request->status;
            $OBJ_Product->content = $request->content;
            $OBJ_Product->save();

            
            $getIDProduct = Product::select('products.id')->orderBy('products.id','desc')->first();
            //add table image product
            $OBJ_image_product = new Image_Product();
            $OBJ_image_product->image = $request->image;
            $OBJ_image_product->product_id = $getIDProduct->id;
            $OBJ_image_product->status = 0;
            $OBJ_image_product->save();

            //add table description product
            $OBJ_Description_Product = new Description_Product();
            $OBJ_Description_Product->product_id = $getIDProduct->id;
            $OBJ_Description_Product->save();

            alert()->success('Thông Báo','Thêm sản phẩm thành công!');
            return redirect()->action('ProductController@formAdd_Product');
        }
        
    }

    public function formEdit_Product($id)
    {
        $getProductByID = Product::join('images','products.id','=','images.product_id')
        ->join('brands','products.brand_id','=','brands.id')->select('products.id as id_product','products.product_number',
        'products.product_name','brands.name','products.brand_id','images.image as image_product','products.amount_of','products.cost_prices','products.cost_prices','products.price',
        'products.discount','products.status as status_product')->where('images.status',0)->where('products.id','=',$id)->first();
        
        $brands = Brand::all();
        return view('view_admin.product.edit-product',compact('getProductByID','brands'));
        
    }

    public function update_Product(Request $request,$id)
    {
        $OBJProduct_Update = Product::find($id);
            $OBJProduct_Update->product_name = $request->productNameEdit;
            $OBJProduct_Update->brand_id = $request->brandEdit;
            $OBJProduct_Update->cost_prices = $request->costPriceEdit;
            $OBJProduct_Update->price = $request->priceEdit;
            $OBJProduct_Update->discount = $request->distCountEdit;
            $OBJProduct_Update->status = $request->statusEdit;
            $OBJProduct_Update->content = $request->contentEdit;
            $OBJProduct_Update->save();
            
            //update table image product
            $OBJ_image_product_Update = Image_Product::where('images.product_id',$id)->where('images.status',0)->first();
            $OBJ_image_product_Update->image = $request->imageEdit;
            $OBJ_image_product_Update->save();
            
            alert()->success('Thông Báo','Cập nhật sản phẩm thành công!');
            return redirect()->action('ProductController@index');
    
    }

    public function formDescription($id)
    {
        $OBJ_Description_Product = Description_Product::join('products','products.id','=','descriptions.product_id')
        ->select('products.product_name','descriptions.product_id','descriptions.origin','descriptions.guarantee','descriptions.wire_color','descriptions.wire_material',
        'descriptions.wire_length','descriptions.wire_thickness','descriptions.shell_color','descriptions.shell_diameter','descriptions.glass_type',
        'descriptions.water_proof','descriptions.where_production')
        ->where('descriptions.product_id',$id)->first();
        return view('view_admin.product.description',compact('OBJ_Description_Product'));      
    }

    public function description_Product(Request $request,$id)
    {
        $description = Description_Product::where('descriptions.product_id',$id)->first();
        $description->origin = $request->origin;
        $description->guarantee = $request->guarantee;
        $description->wire_color = $request->wireColor;
        $description->wire_material = $request->wireMaterial;
        $description->wire_length = $request->wireLength;
        $description->wire_thickness = $request->wireThickness;
        $description->shell_color = $request->shellColor;
        $description->shell_diameter = $request->shellDiameter;
        $description->glass_type = $request->glassType;
        $description->water_proof = $request->waterProof;
        $description->where_production = $request->whereProduction;
        $description->save();
        alert()->success('Thông Báo','Cập nhật mô tả sản phẩm thành công!');
        return redirect()->action('ProductController@index');    
    }

    public function delete_Product($id)
    {
        Product::destroy($id);
        alert()->success('Thông Báo','Xóa sản phẩm thành công!');
        return redirect()->action('ProductController@index');    
    }
}