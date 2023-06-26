<?php

namespace App\Http\Controllers\Backend;

use App\Banner_categories;
use App\Http\Controllers\Controller;
use App\Multi_languages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

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

    // public function add_banner(){
    //     //$this->AuthLogin();
    //     return view('admin_pages.banner.add_banner');
    // }
    // public function list_banner(){
    //     //$this->AuthLogin();
    //     return view('admin_pages.banner.list_banner');
    // }

    
    // public function save_banner_categories_vn_update(Request $request, $id)
    // {
    //     $data = $request->all();
    //     //$banner_categories = DB::table('banner_categories')->where('id',$id)->get();
    //     $banner_categories_lang = new Multi_languages();

    //     // save vào bảng chính
    //     // nếu là tiếng Việt
    //     // $banner_categories->name = $data['name'];
    //     // $banner_categories->desc = $data['desc'];
    //     // $banner_categories->content = $data['content'];
    //     // $get_display_order = count(Banner_categories::orderBy('display_order','asc')->get());
    //     // $display_order = $get_display_order++;
    //     // $banner_categories->display_order = $display_order;
    //     // $banner_categories->save();



    //     // save vào bảng phụ
    //     $banner_categories_lang->type = "4";
    //     $banner_categories_lang->object_id = $id;
    //     $banner_categories_lang->lang_code = "vn";
    //     $banner_categories_lang->name = $data['name'];
    //     $banner_categories_lang->desc = $data['desc'];
    //     $banner_categories_lang->content = $data['content'];
    //     $banner_categories_lang->seo_name = $data['seo_name'];
    //     $banner_categories_lang->tags = $data['tags'];
    //     $banner_categories_lang->meta_title = $data['meta_title'];
    //     $banner_categories_lang->meta_desc = $data['meta_desc'];
    //     $banner_categories_lang->meta_keyword = $data['meta_keyword'];
    //     $banner_categories_lang->save();
    //     Toastr::success('Thêm danh mục thành công', 'Thành công');




    //     // return Redirect::to('add-banner-categories');
    //     //return Redirect::to('edit-banner-categories/{$banner_categories->id}');
    //     return redirect()->action('Backend\BannerController@edit_banner_categories', ['id' => $id]);

    // }

    // public function save_banner_categories_en_update(Request $request, $id)
    // {
    //     $data = $request->all();
    //     //$banner_categories = DB::table('banner_categories')->where('id',$id)->get();
    //     $banner_categories_lang = new Multi_languages();

    //     // save vào bảng chính
    //     // nếu là tiếng Việt
    //     // $banner_categories->name = $data['name'];
    //     // $banner_categories->desc = $data['desc'];
    //     // $banner_categories->content = $data['content'];
    //     // $get_display_order = count(Banner_categories::orderBy('display_order','asc')->get());
    //     // $display_order = $get_display_order++;
    //     // $banner_categories->display_order = $display_order;
    //     // $banner_categories->save();



    //     // save vào bảng phụ
    //     $banner_categories_lang->type = "4";
    //     $banner_categories_lang->object_id = $id;
    //     $banner_categories_lang->lang_code = "en";
    //     $banner_categories_lang->name = $data['name2'];
    //     $banner_categories_lang->desc = $data['desc2'];
    //     $banner_categories_lang->content = $data['content2'];
    //     $banner_categories_lang->seo_name = $data['seo_name2'];
    //     $banner_categories_lang->tags = $data['tags2'];
    //     $banner_categories_lang->meta_title = $data['meta_title2'];
    //     $banner_categories_lang->meta_desc = $data['meta_desc2'];
    //     $banner_categories_lang->meta_keyword = $data['meta_keyword2'];
    //     $banner_categories_lang->save();
    //     Toastr::success('Category added sucessfully', 'Success');




    //     // return Redirect::to('add-banner-categories');
    //     //return Redirect::to('edit-banner-categories/{$banner_categories->id}');
    //     return redirect()->action('Backend\BannerController@edit_banner_categories', ['id' => $id]);

    // }
    // public function save_banner_categories_en(Request $request)
    // {
    //     $data = $request->all();
    //     $banner_categories = new Banner_categories();
    //     $banner_categories_lang = new Multi_languages();

    //     // save vào bảng chính

    //     // nếu là tiếng Anh
    //     $banner_categories->name = '';
    //     $banner_categories->desc = '';
    //     $banner_categories->content = '';
    //     $get_display_order = count(Banner_categories::where('name', '')->orderBy('display_order', 'asc')->get());
    //     $display_order = $get_display_order++;
    //     $banner_categories->display_order = $display_order;
    //     $banner_categories->save();


    //     // save vào bảng phụ
    //     $banner_categories_lang->type = "4";
    //     $banner_categories_lang->object_id = $banner_categories->id;
    //     $banner_categories_lang->lang_code = "en";

    //     $banner_categories_lang->name = $data['name2'];
    //     $banner_categories_lang->desc = $data['desc2'];
    //     $banner_categories_lang->content = $data['content2'];
    //     $banner_categories_lang->seo_name = $data['seo_name2'];
    //     $banner_categories_lang->tags = $data['tags2'];
    //     $banner_categories_lang->meta_title = $data['meta_title2'];
    //     $banner_categories_lang->meta_desc = $data['meta_desc2'];
    //     $banner_categories_lang->meta_keyword = $data['meta_keyword2'];
    //     $banner_categories_lang->save();
    //     Toastr::success('Category added sucessfully', 'Success');


    //     // return Redirect::to('add-banner-categories');
    //     //return Redirect::to('edit-banner-categories/{$banner_categories->id}');
    //     return redirect()->action('Backend\BannerController@edit_banner_categories', ['id' => $banner_categories->id]);

    // }

    // public function update_banner_categories_en(Request $request, $id)
    // {
    //     $data = array();
    //     //update bảng chính
    //     $data['name'] = $request->name2;
    //     $data['desc'] = $request->desc2;
    //     $data['content'] = $request->content2;

    //     DB::table('banner_categories')->where('id', $id)->update($data);

    //     //update bảng phụ
    //     $data['name'] = $request->name2;
    //     $data['desc'] = $request->desc2;
    //     $data['content'] = $request->content2;
    //     $data['seo_name'] = $request->seo_name2;
    //     $data['tags2'] = $request->tags2;
    //     $data['meta_title'] = $request->meta_title2;
    //     $data['meta_desc'] = $request->meta_desc2;
    //     $data['meta_keyword'] = $request->meta_keyword2;
    //     DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'en')->update($data);
    //     Toastr::success('Cập nhật danh mục thành công', 'Thành công');

    //     // Session::put('message','Cập nhật danh mục sản phẩm thành công');
    //     return Redirect::to('list-banner-categories');
    // }

    // trang thêm danh mục
    public function add_banner_categories()
    {
        $banner_categories = Banner_categories::orderBy('display_order', 'asc')->get();
        return view('admin_pages.banner.add_banner_categories')->with(compact('banner_categories'));
    }

    // lưu danh mục
    public function save_banner_categories(Request $request)
    {
        //$data = $request->all();
        $data_en = $request->all();
        $data = $request->validate(
            [
                'name' => 'required|unique:banner_categories|max:255',
                'desc' => 'required',
                'content' => 'required',
                'seo_name' => 'required',
                'tags' => 'required',
                'meta_title' => 'required',
                'meta_desc' => 'required',
                'meta_keyword' => 'required',

            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
                'name.unique' => 'Tên danh mục đã tồn tại, vui lòng chọn tên khác',
                'desc.required' => 'Vui lòng điền mô tả',
                'content.required' => 'Vui lòng điền nội dung',
                'seo_name.required' => 'Vui lòng điền slug danh mục',
                'tags.required' => 'Vui lòng điền tags danh mục',
                'meta_title.required' => 'Vui lòng điền tiêu đề seo danh mục',
                'meta_desc.required' => 'Vui lòng điền mô tả seo danh mục',
                'meta_keyword.required' => 'Vui lòng điền từ khóa seo danh mục',
            ]
        );
        if ($data) {
            $banner_categories = new Banner_categories();
            $banner_categories_vn = new Multi_languages();
            $banner_categories_en = new Multi_languages();

            // save vào bảng chính
            // nếu là tiếng Việt
            $banner_categories->name = $data['name'];
            $banner_categories->desc = $data['desc'];
            $banner_categories->content = $data['content'];
            $get_display_order = Banner_categories::max('display_order');
            $display_order = $get_display_order + 1;
            $banner_categories->display_order = $display_order;
            $banner_categories->save();

            // save vào bảng phụ tiếng Việt
            //$banner_categories_vn->type = "4";
            $banner_categories_vn->object_id = $banner_categories->id;
            $banner_categories_vn->lang_code = "vn";
            $banner_categories_vn->name = $data['name'];
            $banner_categories_vn->desc = $data['desc'];
            $banner_categories_vn->content = $data['content'];
            $banner_categories_vn->seo_name = $data['seo_name'];
            $banner_categories_vn->tags = $data['tags'];
            $banner_categories_vn->meta_title = $data['meta_title'];
            $banner_categories_vn->meta_desc = $data['meta_desc'];
            $banner_categories_vn->meta_keyword = $data['meta_keyword'];
            $banner_categories_vn->save();

            // save vào bảng phụ tiếng Anh
            //$banner_categories_en->type = "4";
            $banner_categories_en->object_id = $banner_categories->id;
            $banner_categories_en->lang_code = "en";
            $banner_categories_en->name = ($data_en['name2'] ? $data_en['name2'] : '' );
            $banner_categories_en->desc = ($data_en['desc2'] ? $data_en['desc2'] : '');
            $banner_categories_en->content = ($data_en['content2'] ? $data_en['content2'] : '');
            $banner_categories_en->seo_name = ($data_en['seo_name2'] ? $data_en['seo_name2'] : '');
            $banner_categories_en->tags = ($data_en['tags2'] ? $data_en['tags2'] : '');
            $banner_categories_en->meta_title = ($data_en['meta_title2'] ? $data_en['meta_title2'] : '');
            $banner_categories_en->meta_desc = ($data_en['meta_desc2'] ? $data_en['meta_desc2'] : '');
            $banner_categories_en->meta_keyword = ($data_en['meta_keyword2'] ? $data_en['meta_keyword2'] : '');
            $banner_categories_en->save();
            Toastr::success('Thêm danh mục thành công', 'Thành công');
            return redirect()->action('Backend\BannerController@edit_banner_categories', ['id' => $banner_categories->id]);
        } else {
            Session::put('message', 'Vui lòng điền đầy đủ các trường');
            return Redirect::to('add-banner-categories');
        }

        // return Redirect::to('add-banner-categories');
        //return Redirect::to('edit-banner-categories/{$banner_categories->id}');


    }

    // trang danh sách
    public function list_banner_categories()
    {
        // $banner_categories_vn = Banner_categories::where('name', '!=', '')->orderBy('display_order','asc')->get();
        // $banner_categories_en = Banner_categories::where('name', '')->orderBy('display_order','asc')->get();
        //exit($banner_categories_vn . "<br>" . "<br>" . "<br>" . "<br>" . $banner_categories_en) ;
        $list_banner_categories = Banner_categories::orderBy('display_order', 'DESC')->paginate(5); // paginate để phân trang, thường thì xài get

        $view_banner_categories = view('admin_pages.banner.list_banner_categories')->with('list_banner_categories', $list_banner_categories); //->with('banner_categories', $banner_categories);
        return view('admin_layout')->with('admin_pages.banner.list_banner_categories', $view_banner_categories);
    }


    // trang chỉnh sửa
    public function edit_banner_categories($id)
    {
        $category = Banner_categories::orderBy('id', 'desc')->get();

        $edit_banner_categories = Banner_categories::where('id', $id)->get();
        //$edit_banner_categories_lang = Multi_languages::where('object_id',$id)->get();
        $edit_banner_categories_vn = Multi_languages::where('object_id', $id)->where('lang_code', 'vn')->get();
        $edit_banner_categories_en = Multi_languages::where('object_id', $id)->where('lang_code', 'en')->get();
        //$view_banner_categories  = view('admin_pages.banner.edit_banner_categories')->with('edit_banner_categories',$edit_banner_categories)->with('edit_banner_categories_lang',$edit_banner_categories_lang)->with('category',$category);
        $view_banner_categories = view('admin_pages.banner.edit_banner_categories')->with('edit_banner_categories', $edit_banner_categories)->with('edit_banner_categories_vn', $edit_banner_categories_vn)->with('edit_banner_categories_en', $edit_banner_categories_en)->with('category', $category);
        return view('admin_layout')->with('admin_pages.banner.edit_banner_categories', $view_banner_categories);
    }
    // lưu chỉnh sửa
    public function update_banner_categories(Request $request, $id)
    {
        $data = array();
        //update bảng chính
        $data['name'] = $request->name;
        $data['desc'] = $request->desc;
        $data['content'] = $request->content;

        DB::table('banner_categories')->where('id', $id)->update($data);

        //update bảng phụ
        $data['name'] = $request->name;
        $data['desc'] = $request->desc;
        $data['content'] = $request->content;
        $data['seo_name'] = $request->seo_name;
        $data['tags'] = $request->tags;
        $data['meta_title'] = $request->meta_title;
        $data['meta_desc'] = $request->meta_desc;
        $data['meta_keyword'] = $request->meta_keyword;
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'vn')->update($data);

        //update bảng phụ
        $data['name'] = $request->name2;
        $data['desc'] = $request->desc2;
        $data['content'] = $request->content2;
        $data['seo_name'] = $request->seo_name2;
        $data['tags'] = $request->tags2;
        $data['meta_title'] = $request->meta_title2;
        $data['meta_desc'] = $request->meta_desc2;
        $data['meta_keyword'] = $request->meta_keyword2;
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'en')->update($data);
        Toastr::success('Cập nhật danh mục thành công', 'Thành công');

        // Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('list-banner-categories');
    }
    
    // xoá danh mục
    public function delete_banner_categories($id)
    {
        DB::table('banner_categories')->where('id', $id)->delete();
        DB::table('multi_languages')->where('object_id', $id)->delete();
        Toastr::success('Xóa danh mục thành công', 'Thành công');

        // Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('list-banner-categories');
    }
}