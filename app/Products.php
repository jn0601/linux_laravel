<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends BaseModel
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'code', 'name', 'desc', 'content', 'image', 'price','price_sale', 'count_view', 
        'display_order', 'options', 'status', 'display_menu', 'date_created',
        'seo_name', 'tags', 'meta_title', 'meta_desc', 'meta_keyword'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'products';
}
