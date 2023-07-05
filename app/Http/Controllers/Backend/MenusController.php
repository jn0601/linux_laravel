<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menus;
use App\Multi_languages;
use App\Nodes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MenusController extends Controller
{
    //type menus là 15
    private $type_menus = 15;
    
    /// trang thêm menu
    public function add_menus()
    {
        $list_menus = Menus::orderBy('display_order', 'asc')->get();
        // $menus_lv1 = Menus::where('parent_id', 0)->orderBy('id', 'desc')->get();
        // $menus_lv2 = Menus::where('parent_id', '!=', 0)->orderBy('id', 'desc')->get();
        return view('admin_pages.menu.add_menus')->with('list_menus', $list_menus);//->with('news_cate', $news_cate)->with('news_sub_cate', $news_sub_cate);
    }

    // trang danh sách menu
    public function list_menus()
    {
        // $news_cate = Menus::where('level', 1)->orderBy('id', 'desc')->get();
        // $news_sub_cate = Menus::where('level', 2)->orderBy('id', 'desc')->get();
        $list_menus = Menus::orderBy('display_order', 'DESC')->get();//->paginate(5); // paginate để phân trang, thường thì xài get
        $view_menus = view('admin_pages.menu.list_menus')->with('list_menus', $list_menus);//->with('news_cate', $news_cate)->with('news_sub_cate', $news_sub_cate);
        return view('admin_layout')->with('admin_pages.menu.list_menus', $view_menus);
    }

    // lưu menu
    public function save_menus(Request $request)
    {
        //$data = $request->all();
        $data = $request->all();
        $get_image = request('img');
        $data_vn = $request->validate(
            [
                'name' => 'required|unique:menus|max:255',
                'img' => 'required',
                'seo_name' => 'required|unique:menus',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên đã tồn tại, vui lòng chọn tên khác',
                'img.required' => 'Vui lòng thêm hình ảnh',
                'seo_name.required' => 'Vui lòng điền seo name',
                'seo_name.unique' => 'Seo name đã tồn tại, vui lòng chọn tên khác',
            ]
        );

        if ($get_image && $data_vn) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/backend/uploads/menus', $new_image);

            $menus = new Menus();
            $menus_node = new Nodes();
            $menus_vn = new Multi_languages();
            $menus_en = new Multi_languages();

            // save vào bảng chính
            $menus->name = $data['name'];
            $menus->seo_name = $data['seo_name'];
            $menus->icon = $new_image;
            $get_display_order = Menus::max('display_order');
            $display_order = $get_display_order + 1;
            $menus->display_order = $display_order;

            $menus->parent_id = $data['parent_id'];
            
            $menus->type = $this->type_menus;
            $menus->is_folder = $data['is_folder'];
            $menus->is_horizontal = $data['is_horizontal'];
            $menus->status = $data['status'];
            $menus->save();

            //save vào bảng phụ đường dẫn
            $menus_node->type = $menus->type;
            $menus_node->object_id = $menus->id;
            $menus_node->seo_name = $data['seo_name'];
            $menus_node->status = 1;
            $menus_node->is_sitemap = 1;
            $menus_node->save();

            //save vào bảng phụ tiếng Việt
            $menus_vn->type = $menus->type;
            $menus_vn->object_id = $menus->id;
            $menus_vn->lang_code = "vn";
            $menus_vn->name = $data['name'];
            $menus_vn->desc = '';
            $menus_vn->content = '';
            $menus_vn->seo_name = $data['seo_name'];
            $menus_vn->tags = '';
            $menus_vn->meta_title = '';
            $menus_vn->meta_desc = '';
            $menus_vn->meta_keyword = '';
            $menus_vn->save();

            // save vào bảng phụ tiếng Anh
            $menus_en->type = $menus->type;
            $menus_en->object_id = $menus->id;
            $menus_en->lang_code = "en";
            $menus_en->name = ($data['name2'] ? $data['name2'] : '');
            $menus_en->desc = '';
            $menus_en->content = '';
            $menus_en->seo_name = ($data['seo_name2'] ? $data['seo_name2'] : '');
            $menus_en->tags = '';
            $menus_en->meta_title = '';
            $menus_en->meta_desc = '';
            $menus_en->meta_keyword = '';
            $menus_en->save();
            Toastr::success('Thêm thành công', 'Thành công');
            return Redirect::to('list-menus');
            //return redirect()->action('Backend\BannerController@edit_banners', ['id' => $banners->id]);
        } else {
            Session::put('message', 'Vui lòng điền đầy đủ các trường');
            return Redirect::to('add-menus');
        }
    }
}
