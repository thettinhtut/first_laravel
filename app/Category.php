<?php

namespace App;
use App\Receipes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='category';

    public function receipes()
    {
    	return $this->hasMany(Receipes::class);
    }
}
