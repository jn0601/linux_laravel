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

//Product
Route::get('/add-product-categories', 'Backend\ProductController@add_product_categories');//->middleware('auth');
Route::get('/list-product-categories', 'Backend\ProductController@list_product_categories');//->middleware('auth');
Route::get('/edit-product-categories/{id}', 'Backend\ProductController@edit_product_categories');
Route::post('/update-product-categories/{id}', 'Backend\ProductController@update_product_categories');
Route::post('/save-product-categories', 'Backend\ProductController@save_product_categories');
Route::get('/delete-product-categories/{id}', 'Backend\ProductController@delete_product_categories');
Route::get('/unactive-representative/{id}', 'Backend\ProductController@unactive_representative');//->middleware('auth');;
Route::get('/active-representative/{id}', 'Backend\ProductController@active_representative');//->middleware('auth');
Route::get('/unactive-status/{id}', 'Backend\ProductController@unactive_status');//->middleware('auth');;
Route::get('/active-status/{id}', 'Backend\ProductController@active_status');//->middleware('auth');
Route::get('/unactive-display-menu/{id}', 'Backend\ProductController@unactive_display_menu');//->middleware('auth');;
Route::get('/active-display-menu/{id}', 'Backend\ProductController@active_display_menu');//->middleware('auth');

Route::get('/add-products', 'Backend\ProductController@add_products');//->middleware('auth');
Route::get('/list-products', 'Backend\ProductController@list_products');//->middleware('auth');

//News
Route::get('/add-news', 'Backend\PostController@add_post');//->middleware('auth');
Route::get('/list-news', 'Backend\PostController@list_post');//->middleware('auth');

//Banner
Route::get('/add-banners', 'Backend\BannerController@add_banners');//->middleware('auth');
Route::get('/list-banners', 'Backend\BannerController@list_banners');//->middleware('auth');
Route::get('/add-banner-categories', 'Backend\BannerController@add_banner_categories');
Route::post('/save-banner-categories', 'Backend\BannerController@save_banner_categories');
Route::post('/save-banners', 'Backend\BannerController@save_banners');
//Route::post('/save-banner-categories-vn-update/{id}', 'Backend\BannerController@save_banner_categories_vn_update');
//Route::post('/save-banner-categories-en-update/{id}', 'Backend\BannerController@save_banner_categories_en_update');
//Route::post('/save-banner-categories-en', 'Backend\BannerController@save_banner_categories_en');
Route::get('/list-banner-categories', 'Backend\BannerController@list_banner_categories');
Route::get('/edit-banner-categories/{id}', 'Backend\BannerController@edit_banner_categories');
Route::get('/edit-banners/{id}', 'Backend\BannerController@edit_banners');
Route::post('/update-banner-categories/{id}', 'Backend\BannerController@update_banner_categories');
Route::post('/update-banners/{id}', 'Backend\BannerController@update_banners');
//Route::post('/update-banner-categories-en/{id}', 'Backend\BannerController@update_banner_categories_en');
Route::get('/delete-banner-categories/{id}', 'Backend\BannerController@delete_banner_categories');
Route::get('/delete-banners/{id}', 'Backend\BannerController@delete_banners');
Route::get('/unactive-banners/{id}', 'Backend\BannerController@unactive_banners');//->middleware('auth');;
Route::get('/active-banners/{id}', 'Backend\BannerController@active_banners');//->middleware('auth');

//Slider
Route::get('/add-slider', 'Backend\SliderController@add_slider');//->middleware('auth');
Route::get('/list-slider', 'Backend\SliderController@list_slider');//->middleware('auth');

//User
Route::get('/add-user', 'UserController@add_user')->middleware('auth');
Route::get('/list-user', 'UserController@list_user')->middleware('auth');