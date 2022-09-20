<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
	public function frontend_index()
	{
		return view('frontend.index');
	}
}
