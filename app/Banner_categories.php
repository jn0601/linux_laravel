<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner_categories extends BaseModel
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'name', 'desc', 'content','display_order'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'banner_categories';

}
