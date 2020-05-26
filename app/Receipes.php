<?php
namespace App;
use App\Mail\ReceipeStored;
use Illuminate\Database\Eloquent\Model;
use App\Category;
class Receipes extends Model
{
    protected $table = 'receipes';
     protected $fillable = ['name','ingredients','category','author_id'];




     protected static function boot()
     {
     	parent::boot();
     	static::created(function($receipe){
        createFlash();
        \Mail::to('user@gmail.com')->send(new ReceipeStored($receipe));
    });


        static::updated(function()
        {
            updateFlash();
        });


        static::deleted(function()
        {
            deleteFlash();
        });
     }







     public function categories()
{
    return $this->belongsTo(Category::class, 'category');
}
}
