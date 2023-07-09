<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menus;
use App\News;
use App\Product_category_products;
use App\Products;

class DetailController extends Controller
{
    public function detail_product($seo_name) {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();

        $product_detail = Products::where('seo_name', $seo_name)->get();
        $get_product_id = Products::where('seo_name', $seo_name)->get('id')->first();

        $get_category_product = Product_category_products::where('product_id', $get_product_id->id)
        ->orderBy('category_id', 'asc')
        ->get('category_id')->first();

        $related_product = Products::join('product_category_products', 'products.id', '=', 'product_category_products.product_id')
        ->where('product_category_products.category_id', $get_category_product->category_id)->get();

        //update views product
        $view_product = Products::where('id', $get_product_id->id)->first();
        $view_product->count_view = $view_product->count_view + 1;
        $view_product->save();

        return view('pages.product.show_detail_product')->with('menu_tab', $menu_tab)
        ->with('related_product', $related_product)
        ->with('product_detail', $product_detail);
    }

    public function detail_news($seo_name) {
        $menu_tab = Menus::where('status', 1)->orderBy('id', 'asc')->get();

        $news_detail = News::where('seo_name', $seo_name)->get();
        $get_news_id = News::where('seo_name', $seo_name)->get('id')->first();
        $get_category_news = News::where('seo_name', $seo_name)->get('category_id')->first();

        //update views news
        $view_news = News::where('id', $get_news_id->id)->first();
        $view_news->count_view = $view_news->count_view + 1;
        $view_news->save();

        $related_news = News::where('category_id', $get_category_news->category_id)->get();

        return view('pages.news.show_detail_news')->with('menu_tab', $menu_tab)
        ->with('related_news', $related_news)
        ->with('news_detail', $news_detail);
    }
}
