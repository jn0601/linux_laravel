<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nodes extends BaseModel
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'type', 'object_id', 'seo_name', 
        'status', 'is_sitemap',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'nodes';
    
    
}
