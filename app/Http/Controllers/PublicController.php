<?php

namespace App\Http\Controllers;

use App\Category;
use App\Receipes;
use Illuminate\Http\Request;

class PublicController extends Controller
{
	public function index()
	{
		$receipes = Receipes::paginate(9);
    	return view('publicviews.public_welcome',compact('receipes'));
    	

	}

	public function show($id)
	{
		$receipes = Receipes::find($id);
		return view('publicviews.detail',compact('receipes'));
	}
}
