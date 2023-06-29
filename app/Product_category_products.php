<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category_products extends Model
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'category_id', 'product_id'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'product_category_products';
}
