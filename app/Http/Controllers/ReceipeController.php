<?php

namespace App\Http\Controllers;

use App\Receipes;
use App\Category;
use App\Test;
use App\Mail\ReceipeStored;
use Illuminate\Http\Request;
use App\Notifications\ReceipeCreaedNotification;
use App\User;

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
        // $user = User::find(2);
        // $user->notify(new ReceipeCreaedNotification());
        // echo "Sent notification";
        // exit();

        $data = Receipes::where('author_id',auth()->id())->paginate(10);
        return view('receipeviews.home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('receipeviews.create',compact('category'));
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
        'description'=>'required',
    ]);
        
       $receipe =  Receipes::create($validatedData + ['author_id' => auth()->id()] );

    
       // event(new ReceipeCreatedEvent($receipe));
        
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
        
        $this->authorize('view',$receipe);
        return view('receipeviews.show',compact('receipe'));
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

        return view('receipeviews.edit',compact('receipe','category'));


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
        'description'=>'required',
    ]);

         $receipe->update($validatedData);
            // updateFlash();
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
