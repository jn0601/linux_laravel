<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MainMenuController extends Controller
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
    public function add_menu(){
        //$this->AuthLogin();
        return view('admin_pages.main_menu.add_menu');
    }
    public function list_menu(){
        //$this->AuthLogin();
        return view('admin_pages.main_menu.list_menu');
    }
}
