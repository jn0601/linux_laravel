<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners extends BaseModel
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'category_id','name', 'desc', 'content', 'link', 'display_order', 'image', 'status'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'banners';
}
