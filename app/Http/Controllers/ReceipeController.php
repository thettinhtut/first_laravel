<?php

namespace App\Http\Controllers;

use App\Receipes;
use App\Category;
use Illuminate\Http\Request;

class ReceipeController extends Controller
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

         $data = Receipes::where('author_id',auth()->id())->get();
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        

        $validatedData = request()->validate([
        'name' => 'required',
        'ingredients' => 'required',
        'category'=>'required',
    ]);
        
        Receipes::create($validatedData + ['author_id' => auth()->id()]);

        
        return redirect('receipe');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function show(Receipes $receipe)
    {
        // if($receipe->author_id != auth()->id())
        // {
        //     abort('403');
        // }
        $this->authorize('view',$receipe);
        return view('show',compact('receipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipes $receipe)
    {
        $this->authorize('view',$receipe);

        $category = Category::all();
        return view('edit',compact('receipe','category'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function update( Receipes $receipe)
    {
        $this->authorize('view',$receipe);
         $validatedData = request()->validate([
        'name' => 'required',
        'ingredients' => 'required',
        'category'=>'required',
    ]);

         $receipe->update($validatedData);


        //  $receipe = Receipes::find($receipe->id);
        // $receipe->name  = request()->name;
        // $receipe->ingredients  = request()->ingredients;
        // $receipe->category = request()->category;
        // $receipe->save();
        return redirect('receipe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipes $receipe)
    {
        $this->authorize('view',$receipe);
        $receipe->delete();
        return redirect('receipe');
    }

}
