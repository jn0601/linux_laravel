<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Multi_languages;
use App\Product_categories;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    //type product là 6

    public function add_product(){
        //$this->AuthLogin();
        return view('admin_pages.product.add_products');
    }
    public function list_product(){
        //$this->AuthLogin();
        return view('admin_pages.product.list_products');
    }

    // trang thêm danh mục
    public function add_product_categories()
    {
        $list_product_cate = Product_categories::orderBy('display_order', 'DESC')->get();
        $product_cate = Product_categories::where('parent_id',0)->orderBy('id', 'desc')->get();
        $product_sub_cate = Product_categories::where('parent_id', '!=', 0)->orderBy('id', 'desc')->get();
        //$banners = Banners::orderBy('display_order', 'asc')->get();
        return view('admin_pages.product.add_product_categories')->with('list_product_cate', $list_product_cate)->with('product_cate', $product_cate)->with('product_sub_cate', $product_sub_cate);
    }

    // trang danh sách
    public function list_product_categories()
    {
        //$categories = Product_categories::orderBy('id', 'desc')->get('id');
        $product_cate = Product_categories::where('parent_id',0)->orderBy('id', 'desc')->get();
        //$get_id_product_cate = Product_categories::where('parent_id',$categories)->orderBy('id', 'desc')->get('id');
        $product_sub_cate = Product_categories::where('parent_id', '!=', 0)->orderBy('id', 'desc')->get();
        //$list_banners = Banners::join('banner_categories', 'banner_categories.id', '=', 'banners.category_id')->orderBy('banners.display_order', 'DESC')->paginate(5); // paginate để phân trang, thường thì xài get
        $list_product_cate = Product_categories::orderBy('display_order', 'DESC')->paginate(5); // paginate để phân trang, thường thì xài get
        $view_product_cate = view('admin_pages.product.list_product_categories')->with('list_product_cate', $list_product_cate)->with('product_cate', $product_cate)->with('product_sub_cate', $product_sub_cate);
        return view('admin_layout')->with('admin_pages.product.list_product_categories', $view_product_cate);
    }

    // trang update
    public function edit_product_categories($id)
    {
        $categories = Product_categories::orderBy('id', 'desc')->get();
        //$banner_cate = DB::table('banner_categories')->orderby('id', 'desc')->get();
        $edit_categories = Product_categories::where('id', $id)->get();
        //$edit_banner_categories_lang = Multi_languages::where('object_id',$id)->get();
        $edit_categories_vn = Multi_languages::where('object_id', $id)->where('lang_code', 'vn')->get();
        $edit_categories_en = Multi_languages::where('object_id', $id)->where('lang_code', 'en')->get();
        //$view_banner_categories  = view('admin_pages.banner.edit_banner_categories')->with('edit_banner_categories',$edit_banner_categories)->with('edit_banner_categories_lang',$edit_banner_categories_lang)->with('category',$category);
        $view_categories = view('admin_pages.product.edit_product_categories')->with('edit_categories', $edit_categories)->with('edit_categories_vn', $edit_categories_vn)->with('edit_categories_en', $edit_categories_en)->with('categories', $categories);
        return view('admin_layout')->with('admin_pages.product.edit_product_categories', $view_categories);
    }

    // xoá danh mục
    public function delete_product_categories($id)
    {
        DB::table('product_categories')->where('id', $id)->delete();
        DB::table('multi_languages')->where('object_id', $id)->delete();
        Toastr::success('Xóa danh mục thành công', 'Thành công');

        // Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('list-product-categories');
    }

    // bật tắt tiêu biểu
    public function unactive_representative($id)
    {
        //$unactive = CategoryProduct::where('id', $id)->update(['status'=>0]);
        DB::table('product_categories')->where('id', $id)->update(['representative' => 3]);
        Toastr::success('Danh mục không tiêu biểu thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();

    }
    public function active_representative($id)
    {
        DB::table('product_categories')->where('id', $id)->update(['representative' => 1]);
        Toastr::success('Danh mục tiêu biểu thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }

    // bật tắt hiển thị
    public function unactive_display_menu($id)
    {
        //$unactive = CategoryProduct::where('id', $id)->update(['status'=>0]);
        DB::table('product_categories')->where('id', $id)->update(['display_menu' => 0]);
        Toastr::success('Ẩn danh mục thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();

    }
    public function active_display_menu($id)
    {
        DB::table('product_categories')->where('id', $id)->update(['display_menu' => 1]);
        Toastr::success('Hiển thị danh mục thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }


    // bật tắt hoạt động
    public function unactive_status($id)
    {
        //$unactive = CategoryProduct::where('id', $id)->update(['status'=>0]);
        DB::table('product_categories')->where('id', $id)->update(['status' => 3]);
        Toastr::success('Ẩn banner thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();

    }
    public function active_status($id)
    {
        DB::table('product_categories')->where('id', $id)->update(['status' => 1]);
        Toastr::success('Hiển thị banner thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
}
