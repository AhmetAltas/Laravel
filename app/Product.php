<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model

{

	protected $table = 'Products';

    public function categories(){
    	return $this->belongsTo(Category::class);
    }
}
