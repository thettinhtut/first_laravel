<?php

namespace App\Http\Controllers;

use App\Category;
Use App\Receipes;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(5);
        return view('categoryviews.home',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
        'name' => 'required',
        'description' => 'required',
         ]);
        Category::create($validatedData);
        
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categoryviews.show',compact('category'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categoryviews.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update( Category $category)
    {
        $validatedData = request()->validate([
        'name' => 'required',
        'description' => 'required',
         ]);
        $category->update($validatedData);
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $receipe = Receipes::where('category',$category->id)->get();
        foreach ($receipe as  $value) {
           $image_path = "storage/images/".$value->image; 

           if (file_exists($image_path)) 
           {
             @unlink($image_path);
           }
           $value->delete();
        }
        
        $category->delete();
        return redirect('category');
    }
}
