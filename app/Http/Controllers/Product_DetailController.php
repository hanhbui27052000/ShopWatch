<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product_DetailController extends Controller
{
     public function index()
	{
    	return view('view_web.product_detail');
    }
}
