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

//Contact
Route::get('/list-contacts', 'Backend\FormContactsController@list_contacts');
Route::get('/detail-contacts/{id}', 'Backend\FormContactsController@detail_contacts');
Route::get('/delete-contacts/{id}', 'Backend\FormContactsController@delete_contacts');

//Product
Route::get('/add-product-categories', 'Backend\ProductController@add_product_categories');//->middleware('auth');
Route::get('/list-product-categories', 'Backend\ProductController@list_product_categories');//->middleware('auth');
Route::get('/edit-product-categories/{id}', 'Backend\ProductController@edit_product_categories');
Route::post('/update-product-categories/{id}', 'Backend\ProductController@update_product_categories');
Route::post('/save-product-categories', 'Backend\ProductController@save_product_categories');
Route::get('/delete-product-categories/{id}', 'Backend\ProductController@delete_product_categories');

Route::get('/unactive-product-categories-representative/{id}', 'Backend\ProductController@unactive_product_categories_representative');//->middleware('auth');;
Route::get('/active-product-categories-representative/{id}', 'Backend\ProductController@active_product_categories_representative');//->middleware('auth');
Route::get('/unactive-product-categories-status/{id}', 'Backend\ProductController@unactive_product_categories_status');//->middleware('auth');;
Route::get('/active-product-categories-status/{id}', 'Backend\ProductController@active_product_categories_status');//->middleware('auth');
Route::get('/unactive-product-categories-display-menu/{id}', 'Backend\ProductController@unactive_product_categories_display_menu');//->middleware('auth');;
Route::get('/active-product-categories-display-menu/{id}', 'Backend\ProductController@active_product_categories_display_menu');//->middleware('auth');

Route::get('/unactive-product-status/{id}', 'Backend\ProductController@unactive_product_status');//->middleware('auth');;
Route::get('/active-product-status/{id}', 'Backend\ProductController@active_product_status');//->middleware('auth');
Route::get('/unactive-product-display-menu/{id}', 'Backend\ProductController@unactive_product_display_menu');//->middleware('auth');;
Route::get('/active-product-display-menu/{id}', 'Backend\ProductController@active_product_display_menu');


Route::get('/add-products', 'Backend\ProductController@add_products');//->middleware('auth');
Route::get('/list-products', 'Backend\ProductController@list_products');//->middleware('auth');
Route::post('/save-products', 'Backend\ProductController@save_products');
Route::get('/edit-products/{id}', 'Backend\ProductController@edit_products');
Route::post('/update-products/{id}', 'Backend\ProductController@update_products');
Route::get('/delete-products/{id}', 'Backend\ProductController@delete_products');


//News
Route::get('/add-news-categories', 'Backend\NewsController@add_news_categories');//->middleware('auth');
Route::get('/list-news-categories', 'Backend\NewsController@list_news_categories');//->middleware('auth');
Route::get('/edit-news-categories/{id}', 'Backend\NewsController@edit_news_categories');
Route::post('/update-news-categories/{id}', 'Backend\NewsController@update_news_categories');
Route::post('/save-news-categories', 'Backend\NewsController@save_news_categories');
Route::get('/delete-news-categories/{id}', 'Backend\NewsController@delete_news_categories');

Route::get('/unactive-news-categories-representative/{id}', 'Backend\NewsController@unactive_news_categories_representative');//->middleware('auth');;
Route::get('/active-news-categories-representative/{id}', 'Backend\NewsController@active_news_categories_representative');//->middleware('auth');
Route::get('/unactive-news-categories-status/{id}', 'Backend\NewsController@unactive_news_categories_status');//->middleware('auth');;
Route::get('/active-news-categories-status/{id}', 'Backend\NewsController@active_news_categories_status');//->middleware('auth');
Route::get('/unactive-news-categories-display-menu/{id}', 'Backend\NewsController@unactive_news_categories_display_menu');//->middleware('auth');;
Route::get('/active-news-categories-display-menu/{id}', 'Backend\NewsController@active_news_categories_display_menu');//->middleware('auth');

Route::get('/unactive-news-status/{id}', 'Backend\NewsController@unactive_news_status');//->middleware('auth');;
Route::get('/active-news-status/{id}', 'Backend\NewsController@active_news_status');//->middleware('auth');

Route::get('/add-news', 'Backend\NewsController@add_news');//->middleware('auth');
Route::get('/list-news', 'Backend\NewsController@list_news');//->middleware('auth');
Route::post('/save-news', 'Backend\NewsController@save_news');
Route::get('/edit-news/{id}', 'Backend\NewsController@edit_news');
Route::post('/update-news/{id}', 'Backend\NewsController@update_news');
Route::get('/delete-news/{id}', 'Backend\NewsController@delete_news');

//Banner
Route::get('/add-banners', 'Backend\BannerController@add_banners');//->middleware('auth');
Route::get('/list-banners', 'Backend\BannerController@list_banners');//->middleware('auth');
Route::get('/add-banner-categories', 'Backend\BannerController@add_banner_categories');
Route::post('/save-banner-categories', 'Backend\BannerController@save_banner_categories');
Route::post('/save-banners', 'Backend\BannerController@save_banners');
Route::get('/list-banner-categories', 'Backend\BannerController@list_banner_categories');
Route::get('/edit-banner-categories/{id}', 'Backend\BannerController@edit_banner_categories');
Route::get('/edit-banners/{id}', 'Backend\BannerController@edit_banners');
Route::post('/update-banner-categories/{id}', 'Backend\BannerController@update_banner_categories');
Route::post('/update-banners/{id}', 'Backend\BannerController@update_banners');
Route::get('/delete-banner-categories/{id}', 'Backend\BannerController@delete_banner_categories');
Route::get('/delete-banners/{id}', 'Backend\BannerController@delete_banners');
Route::get('/unactive-banners/{id}', 'Backend\BannerController@unactive_banners');//->middleware('auth');;
Route::get('/active-banners/{id}', 'Backend\BannerController@active_banners');//->middleware('auth');



//User
Route::get('/add-user', 'UserController@add_user')->middleware('auth');
Route::get('/list-user', 'UserController@list_user')->middleware('auth');