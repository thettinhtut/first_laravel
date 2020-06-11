<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ReceipeStoreRequest;
use App\Mail\ReceipeStored;
use App\Notifications\ReceipeCreaedNotification;
use App\Receipes;
use App\Test;
use App\User;
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
        // $user = User::find(2);
        // $user->notify(new ReceipeCreaedNotification());
        // echo "Sent notification";
        // exit();

        $data = Receipes::where('author_id',auth()->id())->latest()->paginate(10);
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
    public function store(ReceipeStoreRequest $request)
    {
        

    //     $validatedData = request()->validate([
    //     'name' => 'required',
    //     'ingredients' => 'required',
    //     'category'=>'required',
    //     'description'=>'required',
    //     'rimage' => 'required|image',
    // ]);
        $validatedData = $request->validated();
        $imageName = date('YmdHis') . "." . request()->rimage->getClientOriginalExtension();
            request()->rimage->move(public_path('storage/images'), $imageName);

            $receipe =  Receipes::create($validatedData + ['author_id' => auth()->id()] + ['image' => $imageName] );

    
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
        'rimage'=>'image',
        ]);

         if(request()->rimage == null && request()->rimage =='')
         {
           $receipe->update($validatedData); 
         }
         else
         {
           $image_path = "storage/images/".$receipe->image; 

           if (file_exists($image_path)) 
           {
             @unlink($image_path);
           }
           $imageName = date('YmdHis').'.'.request()->rimage->getClientOriginalExtension();
           request()->rimage->move(public_path('storage/images'),$imageName);
           $receipe->update($validatedData + ['image'=>   $imageName]); 
         }
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
        $image_path = "storage/images/".$receipe->image; 

           if (file_exists($image_path)) 
           {
             @unlink($image_path);
           }
        $receipe->delete();
        
        return redirect('receipe');
    }

}
