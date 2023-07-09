<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Menus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();
        return view('pages.home')->with('menu_tab', $menu_tab); // gọi home.blade trong folder pages
    }

    public function error() {
        return view('pages.404'); // gọi home.blade trong folder pages
    }

    public function about_us() {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();
        return view('pages.about_us')->with('menu_tab', $menu_tab);
    }

    public function contact() {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();
        return view('pages.contact')->with('menu_tab', $menu_tab);
    }
}
