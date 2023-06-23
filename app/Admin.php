<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //use HasFactory;
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'admin_email', 'admin_password', 'admin_name','admin_phone'
    ];
    protected $primaryKey = 'admin_id';
 	protected $table = 'tbl_admin';

	public function getAuthPassword()
    {
        return $this->admin_password;
    }
}
