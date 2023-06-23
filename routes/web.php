<?php

// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\BannerController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\MainMenuController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\SliderController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend
Route::get('/', 'Frontend\HomeController@index'); // vào func index của HomeController
Route::get('/trang-chu', 'Frontend\HomeController@index');


//Backend
// ->middleware('auth') để bảo mật đường dẫn
// ->name('login') để redirect về trang login
//Auth::routes();
Route::get('/admin', 'Backend\AdminController@index');//->middleware('auth'); // vào func index của AdminController
Route::get('/trang-chu-admin', 'Backend\AdminController@show_dashboard');//->middleware('auth');
Route::get('/login-auth', 'Backend\LoginController@index');//->name('login');
Route::post('/login', 'Backend\LoginController@login');
Route::get('/logout', 'Backend\LoginController@logout');
Route::get('/404', 'Backend\AdminController@error');

//Menu
Route::get('/add-menu', 'Backend\MainMenuController@add_menu');//->middleware('auth');
Route::get('/list-menu', 'Backend\MainMenuController@list_menu');//->middleware('auth');

//Category
Route::get('/add-category', 'Backend\CategoryController@add_category');//->middleware('auth');
Route::get('/list-category', 'Backend\CategoryController@list_category');//->middleware('auth');

//Product
Route::get('/add-product', 'Backend\ProductController@add_product');//->middleware('auth');
Route::get('/list-product', 'Backend\ProductController@list_product');//->middleware('auth');

//Post
Route::get('/add-post', 'Backend\PostController@add_post');//->middleware('auth');
Route::get('/list-post', 'Backend\PostController@list_post');//->middleware('auth');

//Banner
Route::get('/add-banner', 'Backend\BannerController@add_banner');//->middleware('auth');
Route::get('/list-banner', 'Backend\BannerController@list_banner');//->middleware('auth');
Route::get('/add-category-banner', 'Backend\BannerController@add_category_banner');
Route::get('/list-category-banner', 'Backend\BannerController@list_category_banner');

//Slider
Route::get('/add-slider', 'Backend\SliderController@add_slider');//->middleware('auth');
Route::get('/list-slider', 'Backend\SliderController@list_slider');//->middleware('auth');

//User
Route::get('/add-user', 'UserController@add_user')->middleware('auth');
Route::get('/list-user', 'UserController@list_user')->middleware('auth');