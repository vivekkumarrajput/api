<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{
    function reviews(){
    	
    	return $this->hasMany(Review::class);
    }
}
