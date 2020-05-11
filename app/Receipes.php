<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipes extends Model
{
    protected $table = 'receipes';
     protected $fillable = ['name','ingredients','category'];
}
