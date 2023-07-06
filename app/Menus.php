<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends BaseModel
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'parent_id', 'name', 'seo_name', 'tags', 'meta_title', 
        'meta_desc', 'meta_keyword', 'type', 
        'icon', 'is_folder', 'is_horizontal',
        'display_order', 'status'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'menus';
}
