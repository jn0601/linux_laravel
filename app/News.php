<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends BaseModel
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'category_id', 'name', 'desc', 'content', 'image',  
        'display_order', 'options', 'status', 'count_view', 'date_created',
        'date_updated', 'seo_name', 'tags', 'meta_title', 'meta_desc', 'meta_keyword'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'news';
}
