<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_contacts extends Model
{
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'fullname','title', 'address', 'phone', 'email', 'content', 'note', 'date_created'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'form_contacts';
}
