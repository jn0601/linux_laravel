<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multi_languages extends Model
{
    public $timestamps = false; //set time to false
    
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'type', 'object_id', 'lang_code',
        'name', 'desc', 'content', 'seo_name',
        'tags', 'meta_title', 'meta_desc', 'meta_keyword'
    ];
    // protected $attributes = [
    //     'type' => '4'
    // ];
    protected $primaryKey = 'id';
 	protected $table = 'multi_languages';

    
}
