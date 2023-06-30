<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Multi_languages;
use App\Product_categories;
use App\Product_category_products;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private $type_product = 6;
    //type product là 6

    public function add_products()
    {
        $list_product = Products::orderBy('display_order', 'DESC')->get();
        $product_cate_1 = Product_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $product_cate_2 = Product_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $product_cate_3 = Product_categories::where('level', 3)->orderBy('id', 'desc')->get();
        return view('admin_pages.product.add_products')->with('list_product', $list_product)->with('product_cate_1', $product_cate_1)->with('product_cate_2', $product_cate_2)->with('product_cate_3', $product_cate_3);
    }
    public function list_products()
    {
        // $product = Products::orderBy('id', 'desc')->get();
        // $get_product_id = $product->id;
        $list_product_cate = Product_categories::orderBy('id', 'DESC')->get();
        $list_product = Products::orderBy('display_order', 'DESC')->paginate(5); // paginate để phân trang, thường thì xài get
        $product_cate = Product_category_products::orderBy('id', 'desc')->get();
        $view_product = view('admin_pages.product.list_products')->with('list_product', $list_product)->with('product_cate', $product_cate)->with('list_product_cate', $list_product_cate);
        return view('admin_layout')->with('admin_pages.product.list_products', $view_product);
    }

    // trang update sản phẩm
    public function edit_products($id)
    {
        $products = Products::orderBy('id', 'desc')->get();
        $product_categories = Product_categories::orderBy('id', 'desc')->get();
        $product_cate_1 = Product_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $product_cate_2 = Product_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $product_cate_3 = Product_categories::where('level', 3)->orderBy('id', 'desc')->get();
        $product_cate = Product_category_products::where('product_id', $id)->orderBy('id', 'desc')->get();
        $edit_products = Products::where('id', $id)->get();
        $edit_products_vn = Multi_languages::where('object_id', $id)->where('lang_code', 'vn')->where('type', $this->type_product)->get();
        $edit_products_en = Multi_languages::where('object_id', $id)->where('lang_code', 'en')->where('type', $this->type_product)->get();
        $view_categories = view('admin_pages.product.edit_products')->with('product_categories', $product_categories)->with('product_cate', $product_cate)->with('product_cate_1', $product_cate_1)->with('product_cate_2', $product_cate_2)->with('product_cate_3', $product_cate_3)->with('edit_products', $edit_products)->with('edit_products_vn', $edit_products_vn)->with('edit_products_en', $edit_products_en)->with('products', $products);
        return view('admin_layout')->with('admin_pages.product.edit_products', $view_categories);
    }

    // lưu sản phẩm
    public function save_products(Request $request)
    {
        //$data = $request->all();
        $data_en = $request->all();
        $data = $request->all();
        $get_image = request('img');
        $data_vn = $request->validate(
            [
                'name' => 'required|unique:products|max:255',
                'code' => 'required',
                'desc' => 'required',
                'content' => 'required',
                'img' => 'required',
                'price' => 'required|min:0|max:1000000000',
                'price_sale' => 'required|min:0|max:1000000000|gte:price',
                'seo_name' => 'required',
                'tags' => 'required',
                'meta_title' => 'required',
                'meta_desc' => 'required',
                'meta_keyword' => 'required',

            ],
            [
                'name.required' => 'Tên không được để trống',
                'code.required' => 'Mã sản phẩm không được để trống',
                'name.unique' => 'Tên đã tồn tại, vui lòng chọn tên khác',
                'desc.required' => 'Vui lòng điền mô tả',
                'content.required' => 'Vui lòng điền nội dung',
                'img.required' => 'Vui lòng thêm hình ảnh',
                'seo_name.required' => 'Vui lòng điền seo name',
                'tags.required' => 'Vui lòng điền tags',
                'meta_title.required' => 'Vui lòng điền tiêu đề seo ',
                'meta_desc.required' => 'Vui lòng điền mô tả seo ',
                'meta_keyword.required' => 'Vui lòng điền từ khóa seo ',
                'price.required' => 'Vui lòng điền giá gốc ',
                'price.min' => 'Giá gốc phải là một số lớn hơn 0 ',
                'price.max' => 'Giá gốc không quá 1 tỉ ',
                'price_sale.required' => 'Vui lòng điền giá bán ',
                'price_sale.min' => 'Giá bán phải là một số lớn hơn 0',
                'price_sale.max' => 'Giá bán không quá 1 tỉ ',
                'price_sale.gte' => 'Giá bán phải lớn hơn hoặc bằng giá gốc ',
            ]
        );

        if ($get_image && $data_vn) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/backend/uploads/products', $new_image);

            $product = new Products();
            $product_vn = new Multi_languages();
            $product_en = new Multi_languages();

            // save vào bảng chính
            $product->name = $data['name'];
            $product->code = $data['code'];
            $product->desc = $data['desc'];
            $product->content = $data['content'];
            $get_display_order = Products::max('display_order');
            $display_order = $get_display_order + 1;
            $product->display_order = $display_order;
            $product->image = $new_image;
            $product->price = $data['price'];
            $product->price_sale = $data['price_sale'];
            $product->count_view = 0;
            
            //$options = $data['options'];
            $options = $request->input('options');
            $option_values = '';
            // var_dump($options);
            if ($options) {
                foreach($options as $key => $opt) {
                    $option_values = $option_values . "," . $opt;
                }
            }
            else {
                $option_values = ",";
            }
            

            $product->date_created = date("Ymd");
            $product->seo_name = $data['seo_name'];
            $product->tags = $data['tags'];
            $product->meta_title = $data['meta_title'];
            $product->meta_desc = $data['meta_desc'];
            $product->meta_keyword = $data['meta_keyword'];
            $product->status = $data['status'];
            $product->display_menu = $data['display_menu'];
            $product->options = $option_values;
            
            $product->save();

            // save vào bảng khoá ngoại
            $categories = $request->input('product_categories');
            // var_dump($categories);
            // exit();
            if ($categories) {
                foreach($categories as $key => $cate) {
                    $product_category_products = new Product_category_products();
                    $product_category_products->category_id = $cate;
                    $product_category_products->product_id = $product->id;
                    $product_category_products->save();
                }
            }
            

            //save vào bảng phụ tiếng Việt
            $product_vn->type = $this->type_product;
            $product_vn->object_id = $product->id;
            $product_vn->lang_code = "vn";
            $product_vn->name = $data['name'];
            $product_vn->desc = $data['desc'];
            $product_vn->content = $data['content'];
            $product_vn->seo_name = $data['seo_name'];
            $product_vn->tags = $data['tags'];
            $product_vn->meta_title = $data['meta_title'];
            $product_vn->meta_desc = $data['meta_desc'];
            $product_vn->meta_keyword = $data['meta_keyword'];
            $product_vn->save();

            // save vào bảng phụ tiếng Anh
            $product_en->type = $this->type_product;
            $product_en->object_id = $product->id;
            $product_en->lang_code = "en";
            $product_en->name = ($data_en['name2'] ? $data_en['name2'] : '');
            $product_en->desc = ($data_en['desc2'] ? $data_en['desc2'] : '');
            $product_en->content = ($data_en['content2'] ? $data_en['content2'] : '');
            $product_en->seo_name = ($data_en['seo_name2'] ? $data_en['seo_name2'] : '');
            $product_en->tags = ($data_en['tags2'] ? $data_en['tags2'] : '');
            $product_en->meta_title = ($data_en['meta_title2'] ? $data_en['meta_title2'] : '');
            $product_en->meta_desc = ($data_en['meta_desc2'] ? $data_en['meta_desc2'] : '');
            $product_en->meta_keyword = ($data_en['meta_keyword2'] ? $data_en['meta_keyword2'] : '');
            $product_en->save();
            Toastr::success('Thêm thành công', 'Thành công');
            return Redirect::to('list-products');
            //return redirect()->action('Backend\BannerController@edit_banners', ['id' => $banners->id]);
        } else {
            Session::put('message', 'Vui lòng điền đầy đủ các trường');
            return Redirect::to('add-products');
        }
    }

    // trang thêm danh mục
    public function add_product_categories()
    {
        $list_product_cate = Product_categories::orderBy('display_order', 'DESC')->get();
        $product_cate = Product_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $product_sub_cate = Product_categories::where('level', 2)->orderBy('id', 'desc')->get();
        //$banners = Banners::orderBy('display_order', 'asc')->get();
        return view('admin_pages.product.add_product_categories')->with('list_product_cate', $list_product_cate)->with('product_cate', $product_cate)->with('product_sub_cate', $product_sub_cate);
    }

    // trang danh sách
    public function list_product_categories()
    {
        $product_cate = Product_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $product_sub_cate = Product_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $list_product_cate = Product_categories::orderBy('display_order', 'DESC')->paginate(5); // paginate để phân trang, thường thì xài get
        $view_product_cate = view('admin_pages.product.list_product_categories')->with('list_product_cate', $list_product_cate)->with('product_cate', $product_cate)->with('product_sub_cate', $product_sub_cate);
        return view('admin_layout')->with('admin_pages.product.list_product_categories', $view_product_cate);
    }

    // lưu danh mục
    public function save_product_categories(Request $request)
    {
        //$data = $request->all();
        $data_en = $request->all();
        $data = $request->all();
        $get_image = request('img');
        $data_vn = $request->validate(
            [
                'name' => 'required|unique:product_categories|max:255',
                'desc' => 'required',
                'content' => 'required',
                // 'link' => 'required',
                'img' => 'required',
                'seo_name' => 'required',
                'tags' => 'required',
                'meta_title' => 'required',
                'meta_desc' => 'required',
                'meta_keyword' => 'required',

            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên đã tồn tại, vui lòng chọn tên khác',
                'desc.required' => 'Vui lòng điền mô tả',
                'content.required' => 'Vui lòng điền nội dung',
                'img.required' => 'Vui lòng thêm hình ảnh',
                'seo_name.required' => 'Vui lòng điền seo name',
                'tags.required' => 'Vui lòng điền tags',
                'meta_title.required' => 'Vui lòng điền tiêu đề seo ',
                'meta_desc.required' => 'Vui lòng điền mô tả seo ',
                'meta_keyword.required' => 'Vui lòng điền từ khóa seo ',
            ]
        );

        if ($get_image && $data_vn) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/backend/uploads/product_categories', $new_image);

            $product_cate = new Product_categories();
            $product_cate_vn = new Multi_languages();
            $product_cate_en = new Multi_languages();

            // save vào bảng chính
            $product_cate->name = $data['name'];
            $product_cate->desc = $data['desc'];
            $product_cate->content = $data['content'];
            $get_display_order = Product_categories::max('display_order');
            $display_order = $get_display_order + 1;
            $product_cate->display_order = $display_order;
            $product_cate->image = $new_image;

            $product_cate->parent_id = $data['parent_id'];
            if ($data['parent_id'] == 0) {
                $product_cate->root_id = " , ";
                $product_cate->level = 1;
            } else {
                $get_level = Product_categories::where('id', $data['parent_id'])->get('level')->first();
                $get_level_value = $get_level->level;
                $product_cate->level = $get_level_value + 1;
                $get_root_id = Product_categories::where('id', $data['parent_id'])->get('id')->first();
                if ($get_level->level == 1) {
                    $product_cate->root_id = "," . $get_root_id->id . ",";
                } else {
                    $get_level_id = Product_categories::where('id', $data['parent_id'])->get('parent_id')->first();
                    $get_level_id_value = $get_level_id->parent_id;
                    $get_higher_id = Product_categories::where('id', $get_level_id_value)->get('id')->first();
                    $product_cate->root_id = "," . $get_higher_id->id . "," . $get_root_id->id . ",";
                }
            }
            $product_cate->representative = $data['representative'];
            $product_cate->status = $data['status'];
            $product_cate->display_menu = $data['display_menu'];
            $product_cate->date_created = date("Ymd");
            $product_cate->seo_name = $data['seo_name'];
            $product_cate->meta_title = $data['meta_title'];
            $product_cate->meta_desc = $data['meta_desc'];
            $product_cate->meta_keyword = $data['meta_keyword'];
            $product_cate->save();

            //save vào bảng phụ tiếng Việt
            $product_cate_vn->type = $this->type_product;
            $product_cate_vn->object_id = $product_cate->id;
            $product_cate_vn->lang_code = "vn";
            $product_cate_vn->name = $data['name'];
            $product_cate_vn->desc = $data['desc'];
            $product_cate_vn->content = $data['content'];
            $product_cate_vn->seo_name = $data['seo_name'];
            $product_cate_vn->tags = $data['tags'];
            $product_cate_vn->meta_title = $data['meta_title'];
            $product_cate_vn->meta_desc = $data['meta_desc'];
            $product_cate_vn->meta_keyword = $data['meta_keyword'];
            $product_cate_vn->save();

            // save vào bảng phụ tiếng Anh
            $product_cate_en->type = $this->type_product;
            $product_cate_en->object_id = $product_cate->id;
            $product_cate_en->lang_code = "en";
            $product_cate_en->name = ($data_en['name2'] ? $data_en['name2'] : '');
            $product_cate_en->desc = ($data_en['desc2'] ? $data_en['desc2'] : '');
            $product_cate_en->content = ($data_en['content2'] ? $data_en['content2'] : '');
            $product_cate_en->seo_name = ($data_en['seo_name2'] ? $data_en['seo_name2'] : '');
            $product_cate_en->tags = ($data_en['tags2'] ? $data_en['tags2'] : '');
            $product_cate_en->meta_title = ($data_en['meta_title2'] ? $data_en['meta_title2'] : '');
            $product_cate_en->meta_desc = ($data_en['meta_desc2'] ? $data_en['meta_desc2'] : '');
            $product_cate_en->meta_keyword = ($data_en['meta_keyword2'] ? $data_en['meta_keyword2'] : '');
            $product_cate_en->save();
            Toastr::success('Thêm thành công', 'Thành công');
            return Redirect::to('list-product-categories');
            //return redirect()->action('Backend\BannerController@edit_banners', ['id' => $banners->id]);
        } else {
            Session::put('message', 'Vui lòng điền đầy đủ các trường');
            return Redirect::to('add-product-categories');
        }
    }

    // update danh mục
    public function update_product_categories(Request $request, $id)
    {
        $data = array();
        $data_vn = array();
        $data_en = array();
        //update bảng chính
        $data['name'] = $request->name;
        $data['desc'] = $request->desc;
        $data['content'] = $request->content;
        $data['representative'] = $request->representative;
        $data['status'] = $request->status;
        $data['display_menu'] = $request->display_menu;
        $get_image = $request->file('img');
        $data['seo_name'] = $request->seo_name;
        $data['meta_title'] = $request->meta_title;
        $data['meta_desc'] = $request->meta_desc;
        $data['meta_keyword'] = $request->meta_keyword;

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/backend/uploads/product_categories', $new_image);
            $data['img'] = $new_image;
            //DB::table('banners')->where('id', $id)->update($data);
        }
        $data['parent_id'] = $request->parent_id;
        if ($request->parent_id == 0) {
            $data['root_id'] = " , ";
            $data['level'] = 1;
        } else {
            $get_level = Product_categories::where('id', $data['parent_id'])->get('level')->first();
            $get_level_value = $get_level->level;
            $data['level'] = $get_level_value + 1;
            $get_root_id = Product_categories::where('id', $data['parent_id'])->get('id')->first();
            if ($get_level->level == 1) {
                $data['root_id'] = "," . $get_root_id->id . ",";
            } else {
                $get_level_id = Product_categories::where('id', $data['parent_id'])->get('parent_id')->first();
                $get_level_id_value = $get_level_id->parent_id;
                $get_higher_id = Product_categories::where('id', $get_level_id_value)->get('id')->first();
                $data['root_id'] = "," . $get_higher_id->id . "," . $get_root_id->id . ",";
            }
        }

        DB::table('product_categories')->where('id', $id)->update($data);

        //update bảng phụ
        $data_vn['name'] = $request->name;
        $data_vn['desc'] = $request->desc;
        $data_vn['content'] = $request->content;
        $data_vn['seo_name'] = $request->seo_name;
        $data_vn['tags'] = $request->tags;
        $data_vn['meta_title'] = $request->meta_title;
        $data_vn['meta_desc'] = $request->meta_desc;
        $data_vn['meta_keyword'] = $request->meta_keyword;
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'vn')->where('type', $this->type_product)->update($data_vn);

        //update bảng phụ
        $data_en['name'] = ($request->name2 ? $request->name2 : '' );
        $data_en['desc'] = ($request->desc2 ? $request->desc2 : '' );
        $data_en['content'] = ($request->content2 ? $request->content2 : '' );
        $data_en['seo_name'] = ($request->seo_name2 ? $request->seo_name2 : '' );
        $data_en['tags'] = ($request->tags2 ? $request->tags2 : '' );
        $data_en['meta_title'] = ($request->meta_title2 ? $request->meta_title2 : '' );
        $data_en['meta_desc'] = ($request->meta_desc2 ? $request->meta_title2 : '' );
        $data_en['meta_keyword'] = ($request->meta_keyword2 ? $request->meta_keyword2 : '' );
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'en')->where('type', $this->type_product)->update($data_en);
        Toastr::success('Cập nhật danh mục thành công', 'Thành công');

        // Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('list-product-categories');
    }

    // trang update danh mục
    public function edit_product_categories($id)
    {
        $categories = Product_categories::orderBy('id', 'desc')->get();
        $product_cate = Product_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $product_sub_cate = Product_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $edit_categories = Product_categories::where('id', $id)->get();
        $edit_categories_vn = Multi_languages::where('object_id', $id)->where('lang_code', 'vn')->where('type', $this->type_product)->get();
        $edit_categories_en = Multi_languages::where('object_id', $id)->where('lang_code', 'en')->where('type', $this->type_product)->get();
        //$view_banner_categories  = view('admin_pages.banner.edit_banner_categories')->with('edit_banner_categories',$edit_banner_categories)->with('edit_banner_categories_lang',$edit_banner_categories_lang)->with('category',$category);
        $view_categories = view('admin_pages.product.edit_product_categories')->with('product_cate', $product_cate)->with('product_sub_cate', $product_sub_cate)->with('edit_categories', $edit_categories)->with('edit_categories_vn', $edit_categories_vn)->with('edit_categories_en', $edit_categories_en)->with('categories', $categories);
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
        DB::table('product_categories')->where('id', $id)->update(['representative' => 0]);
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
        Toastr::success('Tắt hoạt động thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();

    }
    public function active_status($id)
    {
        DB::table('product_categories')->where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }


    // bật tắt hiển thị
    public function unactive_product_display_menu($id)
    {
        //$unactive = CategoryProduct::where('id', $id)->update(['status'=>0]);
        DB::table('products')->where('id', $id)->update(['display_menu' => 0]);
        Toastr::success('Ẩn danh mục thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();

    }
    public function active_product_display_menu($id)
    {
        DB::table('products')->where('id', $id)->update(['display_menu' => 1]);
        Toastr::success('Hiển thị danh mục thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }


    // bật tắt hoạt động
    public function unactive_product_status($id)
    {
        //$unactive = CategoryProduct::where('id', $id)->update(['status'=>0]);
        DB::table('products')->where('id', $id)->update(['status' => 3]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();

    }
    public function active_product_status($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
}