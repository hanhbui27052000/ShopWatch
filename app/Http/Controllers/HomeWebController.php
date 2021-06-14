<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use DB;
class HomeWebController extends Controller
{

	public function index()
	{
		$amount_of_product_brands = Product::join('brands','brands.id','=','products.brand_id')
        ->where('brands.status',1)
        ->select('brands.id','brands.name',DB::raw('sum(products.amount_of) as amount_of_product'))
        ->groupBy('brands.id','brands.name')
		->orderBy('brands.id')
        ->get();

		$fastest_selling_products = Product::join('product_order','product_order.product_id','=','products.id')
		->join('images','images.product_id','=','products.id')
		->where('images.status',0)
		->where('products.status',0)
		->select('products.id as id_product','products.product_name','images.image',DB::raw('sum(product_order.amount_of) as amount_of_product'),
		'products.price','products.discount')
        ->groupBy('products.id','products.product_name','images.image','products.price','products.discount')
		->limit(6)		
		->orderBy('product_order.amount_of','desc')
    	->get();

		// $fastest_selling_products_brands = Product::join('brands','brands.id','=','products.brand_id')
		// ->join('images','images.product_id','=','products.id')
		// ->join('product_order','product_order.product_id','=','products.id')
		// ->where('images.status',0)
		// ->where('products.status',0)
		// ->select('products.id as id_product','products.product_name','images.image',DB::raw('sum(product_order.amount_of) as amount_of_product'),
		// 'products.price','products.discount','brands.id as id_brand','brands.name')
		// ->groupBy('products.id','products.product_name','images.image','products.price','products.discount','brands.id','brands.name')
		// ->limit(10)		
		// ->orderBy('brands.id','asc')
    	// ->get();
		// dd($fastest_selling_products_brands);
    	return view('view_web.index',compact('fastest_selling_products','amount_of_product_brands'));
    }
}