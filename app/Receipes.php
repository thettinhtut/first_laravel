<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Receipes extends Model
{
    protected $table = 'receipes';
     protected $fillable = ['name','ingredients','category','author_id'];

     public function categories()
{
    return $this->belongsTo(Category::class, 'category');
}
}
