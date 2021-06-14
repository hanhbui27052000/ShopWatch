<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogSingleController extends Controller
{
     public function index()
	{
    	return view('view_web.blog_single');
    }
}
