<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News_categories;
use App\Product_categories;
use App\Menus;
use App\Products;
use App\News;

class CategoryController extends Controller
{
    // hiển thị tất cả danh mục sản phẩm
    public function show_all_category_product() {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();

        
        $cate_product = Product_categories::orderBy('level', 'desc')->paginate(6);
        $seo_name = 'danh-muc-san-pham';
        
        return view('pages.category.show_category_product')->with('menu_tab', $menu_tab)
        ->with('cate_product', $cate_product)
        ->with('seo_name', $seo_name);
    }

    // hiển thị tất cả danh mục tin tức
    public function show_all_category_news() {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();

        
        $cate_news = News_categories::orderBy('level', 'desc')->paginate(6);
        $seo_name = 'danh-muc-tin-tuc';
        
        return view('pages.category.show_category_news')->with('menu_tab', $menu_tab)
        ->with('cate_news', $cate_news)
        ->with('seo_name', $seo_name);
    }
    
    // hiển thị danh mục sản phẩm
    public function show_category_product($seo_name) {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();

        //product
        $category = Product_categories::where('seo_name', $seo_name)->get('id')->first();
        $cate_product = Products::join('product_category_products', 'product_category_products.product_id', '=', 'products.id')
        ->where('product_category_products.category_id', '=', $category->id)
        ->where('products.status', 1)
        ->orderBy('products.id', 'desc')->paginate(4);
        
        return view('pages.category.show_category_product')->with('menu_tab', $menu_tab)
        ->with('cate_product', $cate_product)
        ->with('seo_name', $seo_name)
        ->with('category', $category);
    }

    // hiển thị danh mục tin tức
    public function show_category_news($seo_name) {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();

        //news
        //$list_cate = News_categories::get();
        $category = News_categories::where('seo_name', $seo_name)->get('id')->first();
        // $category_level = News_categories::where('seo_name', $seo_name)->get('level')->first();
        // if ($category_level->level == 1) {
        //     $cate_news_lv1 = News::where('status', 1)
        //     ->where('category_id', $category->id)
        //     ->get('');

        //     $cate_lv2 = News_categories::where('level', 2)
        //     ->where('category_id', $category->id)->get('id')->first();
        //     $cate_news_lv2 = News::where('status', 1)
        //     ->where('category_id', $cate_lv2->id)
        //     ->get('');

        //     $cate_lv3 = News_categories::where('level', 3)
        //     ->where('category_id', $cate_lv2->id)->get('id')->first();
        //     $cate_news_lv3 = News::where('status', 1)
        //     ->where('category_id', $cate_lv3->id)
        //     ->get('');
        // }
        $cate_news = News::where('status', 1)
        ->where('category_id', $category->id)
        ->orderBy('id', 'desc')->paginate(4);

        return view('pages.category.show_category_news')->with('menu_tab', $menu_tab)
        ->with('category', $category)
        ->with('seo_name', $seo_name)
        ->with('cate_news', $cate_news);
    }
}
