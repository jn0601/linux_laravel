<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_categories extends Model
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'name', 'desc', 'content', 'parent_id', 'root_id', 'level','display_order',
        'image', 'representative', 'status', 'display_menu', 'date_created', 'seo_name',
        'meta_title', 'meta_desc', 'meta_keyword'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'news_categories';
}
