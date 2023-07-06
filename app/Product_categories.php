<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_categories extends BaseModel
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'parent_id', 'root_id','name', 'desc', 'content', 'level','display_order',
        'image', 'representative', 'status', 'display_menu', 'date_created', 'seo_name',
        'meta_title', 'meta_desc', 'meta_keyword'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'product_categories';
}
