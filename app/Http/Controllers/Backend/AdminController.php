<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
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

    public function index()
    {
        //$this->AuthLogin();
        return view('admin_pages.admin_home'); // gọi admin_home.blade trong folder admin_pages
    }

    public function show_dashboard()
    {
        //$this->AuthLogin();
        return view('admin_pages.admin_home'); // gọi admin_home.blade trong folder admin_pages
    }

    public function error()
    {
        return view('admin_pages.error.404');
    }
}