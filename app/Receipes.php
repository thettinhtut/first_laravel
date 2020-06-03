<?php
namespace App;
use App\Mail\ReceipeStored;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Events\ReceipeCreatedEvent;
class Receipes extends Model
{
    protected $table = 'receipes';
    protected $fillable = ['name','ingredients','category','author_id','description'];

    // protected $dispatchesEvents = [

    //     'created' => ReceipeCreatedEvent::class,
    // ];


    protected static function boot()
    {
     	parent::boot();
     	static::created(function()
        {
            createFlash();
           
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
