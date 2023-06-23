<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    // public function AuthLogin()
    // {
    //     // kiểm tra admin id 
    //     $admin_id = Auth::id();
    //     // tồn tại thì redirect tới trang chủ, không thì phải login
    //     if ($admin_id) {
    //         return Redirect::to('trang-chu-admin');
    //     } else {
    //         return Redirect::to('404')->send();
    //     }
    // }
    public function add_category(){
        //$this->AuthLogin();
        return view('admin_pages.category.add_category');
    }
    public function list_category(){
        //$this->AuthLogin();
        return view('admin_pages.category.list_category');
    }
}
