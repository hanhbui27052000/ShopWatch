<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogListController extends Controller
{
    public function index()
	{
    	return view('view_web.blog_list');
    }
}
