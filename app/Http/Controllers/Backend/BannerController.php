<?php

namespace App\Http\Controllers\Backend;

use App\Banners;
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
    //type mặc định là 4


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

    // trang thêm banner
    public function add_banners()
    {
        $banner_categories = Banner_categories::orderBy('id', 'desc')->get();
        //$banners = Banners::orderBy('display_order', 'asc')->get();
        return view('admin_pages.banner.add_banners')->with('banner_categories', $banner_categories);
    }

    // trang danh sách
    public function list_banners()
    {
        $banner_cate = Banners::join('banner_categories', 'banner_categories.id', '=', 'banners.category_id')->orderBy('banner_categories.id', 'desc')->get();
        //$list_banners = Banners::join('banner_categories', 'banner_categories.id', '=', 'banners.category_id')->orderBy('banners.display_order', 'DESC')->paginate(5); // paginate để phân trang, thường thì xài get
        $list_banners = Banners::orderBy('banners.display_order', 'DESC')->paginate(5); // paginate để phân trang, thường thì xài get
        $view_banners = view('admin_pages.banner.list_banners')->with('list_banners', $list_banners)->with('banner_cate', $banner_cate);
        return view('admin_layout')->with('admin_pages.banner.list_banners', $view_banners);
    }

    // lưu danh mục
    public function save_banners(Request $request)
    {
        //$data = $request->all();
        $data_en = $request->all();
        $data = $request->all();
        $get_image = request('img');
        $data_vn = $request->validate(
            [
                'name' => 'required|unique:banners|max:255',
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
                'name.required' => 'Tên banner không được để trống',
                'name.unique' => 'Tên banner đã tồn tại, vui lòng chọn tên khác',
                'desc.required' => 'Vui lòng điền mô tả',
                'content.required' => 'Vui lòng điền nội dung',
                'img.required' => 'Vui lòng thêm hình ảnh',
                'seo_name.required' => 'Vui lòng điền slug banner',
                'tags.required' => 'Vui lòng điền tags banner',
                'meta_title.required' => 'Vui lòng điền tiêu đề seo banner',
                'meta_desc.required' => 'Vui lòng điền mô tả seo banner',
                'meta_keyword.required' => 'Vui lòng điền từ khóa seo banner',
            ]
        );

        if ($get_image && $data_vn) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/backend/uploads/banners', $new_image);

            $banners = new Banners();
            $banners_vn = new Multi_languages();
            $banners_en = new Multi_languages();

            // save vào bảng chính
            // nếu là tiếng Việt
            $banners->name = $data['name'];
            $banners->desc = $data['desc'];
            $banners->content = $data['content'];
            $banners->link = $data['link'];
            $get_display_order = Banners::max('display_order');
            $display_order = $get_display_order + 1;
            $banners->display_order = $display_order;
            $banners->image = $new_image;
            $banners->category_id = $data['category_id'];
            $banners->status = $data['status'];
            $banners->save();

            // save vào bảng phụ tiếng Việt
            $banners_vn->type = "4";
            $banners_vn->object_id = $banners->id;
            $banners_vn->lang_code = "vn";
            $banners_vn->name = $data['name'];
            $banners_vn->desc = $data['desc'];
            $banners_vn->content = $data['content'];
            $banners_vn->seo_name = $data['seo_name'];
            $banners_vn->tags = $data['tags'];
            $banners_vn->meta_title = $data['meta_title'];
            $banners_vn->meta_desc = $data['meta_desc'];
            $banners_vn->meta_keyword = $data['meta_keyword'];
            $banners_vn->save();

            // save vào bảng phụ tiếng Anh
            $banners_en->type = "4";
            $banners_en->object_id = $banners->id;
            $banners_en->lang_code = "en";
            $banners_en->name = ($data_en['name2'] ? $data_en['name2'] : '');
            $banners_en->desc = ($data_en['desc2'] ? $data_en['desc2'] : '');
            $banners_en->content = ($data_en['content2'] ? $data_en['content2'] : '');
            $banners_en->seo_name = ($data_en['seo_name2'] ? $data_en['seo_name2'] : '');
            $banners_en->tags = ($data_en['tags2'] ? $data_en['tags2'] : '');
            $banners_en->meta_title = ($data_en['meta_title2'] ? $data_en['meta_title2'] : '');
            $banners_en->meta_desc = ($data_en['meta_desc2'] ? $data_en['meta_desc2'] : '');
            $banners_en->meta_keyword = ($data_en['meta_keyword2'] ? $data_en['meta_keyword2'] : '');
            $banners_en->save();
            Toastr::success('Thêm banner thành công', 'Thành công');
            return Redirect::to('list-banners');
            //return redirect()->action('Backend\BannerController@edit_banners', ['id' => $banners->id]);
        } else {
            Session::put('message', 'Vui lòng điền đầy đủ các trường');
            return Redirect::to('add-banners');
        }
    }

    public function edit_banners($id)
    {
        $banner = Banners::orderBy('id', 'desc')->get();
        $banner_cate = DB::table('banner_categories')->orderby('id', 'desc')->get();
        $edit_banners = Banners::where('id', $id)->get();
        //$edit_banner_categories_lang = Multi_languages::where('object_id',$id)->get();
        $edit_banners_vn = Multi_languages::where('object_id', $id)->where('lang_code', 'vn')->get();
        $edit_banners_en = Multi_languages::where('object_id', $id)->where('lang_code', 'en')->get();
        //$view_banner_categories  = view('admin_pages.banner.edit_banner_categories')->with('edit_banner_categories',$edit_banner_categories)->with('edit_banner_categories_lang',$edit_banner_categories_lang)->with('category',$category);
        $view_banners = view('admin_pages.banner.edit_banners')->with('banner_cate', $banner_cate)->with('edit_banners', $edit_banners)->with('edit_banners_vn', $edit_banners_vn)->with('edit_banners_en', $edit_banners_en)->with('banner', $banner);
        return view('admin_layout')->with('admin_pages.banner.edit_banners', $view_banners);
    }

    // lưu update banner
    public function update_banners(Request $request, $id)
    {
        $data = array();
        $data_vn = array();
        $data_en = array();
        //update bảng chính
        $data['name'] = $request->name;
        $data['desc'] = $request->desc;
        $data['content'] = $request->content;
        $data['link'] = $request->link;
        $data['category_id'] = $request->category_id;
        $data['status'] = $request->status;
        $get_image = $request->file('img');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/backend/uploads/banners', $new_image);
            $data['img'] = $new_image;
            //DB::table('banners')->where('id', $id)->update($data);
        }
        DB::table('banners')->where('id', $id)->update($data);

        //update bảng phụ
        $data_vn['name'] = $request->name;
        $data_vn['desc'] = $request->desc;
        $data_vn['content'] = $request->content;
        $data_vn['seo_name'] = $request->seo_name;
        $data_vn['tags'] = $request->tags;
        $data_vn['meta_title'] = $request->meta_title;
        $data_vn['meta_desc'] = $request->meta_desc;
        $data_vn['meta_keyword'] = $request->meta_keyword;
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'vn')->update($data_vn);

        //update bảng phụ
        $data_en['name'] = ($request->name2 ? $request->name2 : '' );
        $data_en['desc'] = ($request->desc2 ? $request->desc2 : '' );
        $data_en['content'] = ($request->content2 ? $request->content2 : '' );
        $data_en['seo_name'] = ($request->seo_name2 ? $request->seo_name2 : '' );
        $data_en['tags'] = ($request->tags2 ? $request->tags2 : '' );
        $data_en['meta_title'] = ($request->meta_title2 ? $request->meta_title2 : '' );
        $data_en['meta_desc'] = ($request->meta_desc2 ? $request->meta_title2 : '' );
        $data_en['meta_keyword'] = ($request->meta_keyword2 ? $request->meta_keyword2 : '' );
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'en')->update($data_en);
        Toastr::success('Cập nhật danh mục thành công', 'Thành công');

        // Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('list-banners');
    }

    // xoá banner
    public function delete_banners($id)
    {
        DB::table('banners')->where('id', $id)->delete();
        DB::table('multi_languages')->where('object_id', $id)->delete();
        Toastr::success('Xóa banner thành công', 'Thành công');

        // Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('list-banners');
    }

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
            $banner_categories_vn->type = "4";
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
            $banner_categories_en->type = "4";
            $banner_categories_en->object_id = $banner_categories->id;
            $banner_categories_en->lang_code = "en";
            $banner_categories_en->name = ($data_en['name2'] ? $data_en['name2'] : '');
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
    // lưu update danh mục
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
        $data['name'] = ($request->name2 ? $request->name2 : '');
        $data['desc'] = ($request->desc2 ? $request->desc2 : '');
        $data['content'] = ($request->content2 ? $request->content2 : '');
        $data['seo_name'] = ($request->seo_name2 ? $request->seo_name2 : '');
        $data['tags'] = ($request->tags2 ? $request->tags2 : '');
        $data['meta_title'] = ($request->meta_title2 ? $request->meta_title2 : '');
        $data['meta_desc'] = ($request->meta_desc2 ? $request->meta_desc2 : '');
        $data['meta_keyword'] = ($request->meta_keyword2 ? $request->meta_keyword2 : '');
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

    public function unactive_banners($id)
    {
        //$unactive = CategoryProduct::where('id', $id)->update(['status'=>0]);
        DB::table('banners')->where('id', $id)->update(['status' => 3]);
        Toastr::success('Ẩn banner thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();

    }
    public function active_banners($id)
    {
        DB::table('banners')->where('id', $id)->update(['status' => 1]);
        Toastr::success('Hiển thị banner thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
}