<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BannerController extends Controller
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

    public function add_banner(){
        //$this->AuthLogin();
        return view('admin_pages.banner.add_banner');
    }
    public function list_banner(){
        //$this->AuthLogin();
        return view('admin_pages.banner.list_banner');
    }
}
