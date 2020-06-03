<?php

namespace App;
use App\Receipes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='category';

    protected $fillable = ['name','description'];

    public static function boot()
    {
    	parent::boot();
    	static::created(function()
    		{
    			session()->flash('message','A Category Added');
    		});
    	static::deleted(function(){
    			session()->flash('message','A Category Deleted');
    		});
    	static::updated(function()
    		{
    			session()->flash('message','A Category Updated');
    		});
    }

    public function receipes()
    {
    	return $this->hasMany(Receipes::class,'receipes');
    }
}
