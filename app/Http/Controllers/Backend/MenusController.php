<?php

namespace App\Http\Controllers\Backend;

use App\BaseModel;
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
        // $list_menus_lv1 = Menus::where('parent_id', '=', 0)->orderBy('display_order', 'DESC')->get();
        // $list_menus_lv2 = Menus::where('parent_id', '!=', 0)->orderBy('display_order', 'DESC')->get();
        return view('admin_pages.menu.add_menus')
        // ->with('list_menus_lv1', $list_menus_lv1)
        // ->with('list_menus_lv2', $list_menus_lv2)
        ->with('list_menus', $list_menus);
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

    // trang update menu
    public function edit_menus($id)
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $menus_2_3 = Menus::where('parent_id', '!=', 0)->orderBy('id', 'desc')->get();
        // $product_cate = Product_categories::where('level', 1)->orderBy('id', 'desc')->get();
        // $product_sub_cate = Product_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $edit_menus = Menus::where('id', $id)->get();
        $edit_menus_vn = Multi_languages::where('object_id', $id)
        ->where('lang_code', 'vn')
        ->where('type', $this->type_menus)->get();
        $edit_menus_en = Multi_languages::where('object_id', $id)
        ->where('lang_code', 'en')
        ->where('type', $this->type_menus)->get();
        $view_menus = view('admin_pages.menu.edit_menus')
        // ->with('product_cate', $product_cate)
        // ->with('product_sub_cate', $product_sub_cate)
        ->with('edit_menus', $edit_menus)
        ->with('edit_menus_vn', $edit_menus_vn)
        ->with('edit_menus_en', $edit_menus_en)
        ->with('menus', $menus)
        ->with('menus_2_3', $menus_2_3);
        return view('admin_layout')->with('admin_pages.menu.edit_menus', $view_menus);
    }

    // lưu menu
    public function save_menus(Request $request)
    {
        $data = $request->all();
        $get_image = request('img');
        $data_vn = $request->validate(
            [
                'name' => 'required|unique:menus|max:255',
                'img' => 'required',
                'seo_name' => 'required|unique:menus',
                'tags' => 'required',
                'meta_title' => 'required',
                'meta_desc' => 'required',
                'meta_keyword' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên đã tồn tại, vui lòng chọn tên khác',
                'img.required' => 'Vui lòng thêm hình ảnh',
                'seo_name.required' => 'Vui lòng điền seo name',
                'seo_name.unique' => 'Seo name đã tồn tại, vui lòng chọn tên khác',
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
            $get_image->move('public/backend/uploads/menus', $new_image);

            $menus = new Menus();

            // save vào bảng chính
            $menus->name = $data['name'];
            $menus->seo_name = $data['seo_name'];
            $menus->tags = $data['tags'];
            $menus->meta_title = $data['meta_title'];
            $menus->meta_desc = $data['meta_desc'];
            $menus->meta_keyword = $data['meta_keyword'];
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
            $menus_node = new BaseModel();
            $menus_node->save_nodes($menus_node, $this->type_menus, $menus->id, $data['seo_name'], 1, 1);

            //save vào bảng phụ tiếng Việt
            $menus_vn = new BaseModel();
            $menus_vn->save_lang($menus_vn, $this->type_menus, $menus->id, "vn", 
            $data['name'],
            $data['desc'], 
            $data['content'], 
            $data['seo_name'], 
            $data['tags'], 
            $data['meta_title'],
            $data['meta_desc'], 
            $data['meta_keyword']);

            // $menus_vn->type = $menus->type;
            // $menus_vn->object_id = $menus->id;
            // $menus_vn->lang_code = "vn";
            // $menus_vn->name = $data['name'];
            // $menus_vn->desc = '';
            // $menus_vn->content = '';
            // $menus_vn->seo_name = $data['seo_name'];
            // $menus_vn->tags = '';
            // $menus_vn->meta_title = '';
            // $menus_vn->meta_desc = '';
            // $menus_vn->meta_keyword = '';
            // $menus_vn->save();

            // save vào bảng phụ tiếng Anh
            $menus_en = new BaseModel();
            $menus_en->save_lang($menus_en, $this->type_menus, $menus->id, "en", 
            ($data['name2'] ? $data['name2'] : ''),
            ($data['desc2'] ? $data['desc2'] : ''), 
            ($data['content2'] ? $data['content2'] : ''), 
            ($data['seo_name2'] ? $data['seo_name2'] : ''), 
            ($data['tags2'] ? $data['tags2'] : ''), 
            ($data['meta_title2'] ? $data['meta_title2'] : ''),
            ($data['meta_desc2'] ? $data['meta_desc2'] : ''), 
            ($data['meta_keyword2'] ? $data['meta_keyword2'] : ''));

            // $menus_en->type = $menus->type;
            // $menus_en->object_id = $menus->id;
            // $menus_en->lang_code = "en";
            // $menus_en->name = ($data['name2'] ? $data['name2'] : '');
            // $menus_en->desc = '';
            // $menus_en->content = '';
            // $menus_en->seo_name = ($data['seo_name2'] ? $data['seo_name2'] : '');
            // $menus_en->tags = '';
            // $menus_en->meta_title = '';
            // $menus_en->meta_desc = '';
            // $menus_en->meta_keyword = '';
            // $menus_en->save();
            Toastr::success('Thêm thành công', 'Thành công');
            return Redirect::to('/admin/list-menus');
            //return redirect()->action('Backend\BannerController@edit_banners', ['id' => $banners->id]);
        } else {
            Session::put('message', 'Vui lòng điền đầy đủ các trường');
            return Redirect::to('/admin/add-menus');
        }
    }

    // update menu
    public function update_menus(Request $request, $id)
    {
        $data = array();
        // $data_vn = array();
        // $data_en = array();

        
        $get_image = $request->file('img');
        

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/backend/uploads/menus', $new_image);
            $data['icon'] = $new_image;
        }

        //if ($data_validate) {
            $data['name'] = $request->name;
            $data['is_folder'] = $request->is_folder;
            $data['is_horizontal'] = $request->is_horizontal;
            $data['status'] = $request->status;
            $data['seo_name'] = $request->seo_name;
            $data['tags'] = $request->tags;
            $data['meta_title'] = $request->meta_title;
            $data['meta_desc'] = $request->meta_desc;
            $data['meta_keyword'] = $request->meta_keyword;

            $data['parent_id'] = $request->parent_id;

            Menus::where('id', $id)->update($data);
            //DB::table('news_categories')->where('id', $id)->update($data);

            //update bảng nodes
            $data_nodes = new BaseModel();
            $data_nodes->update_nodes($id, $this->type_menus, $request->seo_name);
            
            //update bảng phụ
            $data_vn = new BaseModel();
            $data_vn->update_lang($id, 'vn', $this->type_menus, 
            $request->name, ($request->desc ? $request->desc : ''), 
            ($request->content ? $request->content : ''), $request->seo_name, 
            $request->tags, $request->meta_title,
            $request->meta_desc, $request->meta_keyword);

            // $data_vn['name'] = $request->name;
            // $data_vn['desc'] = $request->desc;
            // $data_vn['content'] = $request->content;
            // $data_vn['seo_name'] = $request->seo_name;
            // $data_vn['tags'] = $request->tags;
            // $data_vn['meta_title'] = $request->meta_title;
            // $data_vn['meta_desc'] = $request->meta_desc;
            // $data_vn['meta_keyword'] = $request->meta_keyword;
            // DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'vn')->where('type', $this->type_news_categories)->update($data_vn);

            //update bảng phụ
            $data_en = new BaseModel();
            $data_en->update_lang($id, 'en', $this->type_menus, 
            ($request->name2 ? $request->name2 : ''),
            ($request->desc2 ? $request->desc2 : ''), 
            ($request->content2 ? $request->content2 : ''),
            ($request->seo_name2 ? $request->seo_name2 : ''),
            ($request->tags2 ? $request->tags2 : ''), 
            ($request->meta_title2 ? $request->meta_title2 : ''),
            ($request->meta_desc2 ? $request->meta_desc2 : ''), 
            ($request->meta_keyword2 ? $request->meta_keyword2 : ''));

            // $data_en['name'] = ($request->name2 ? $request->name2 : '');
            // $data_en['desc'] = ($request->desc2 ? $request->desc2 : '');
            // $data_en['content'] = ($request->content2 ? $request->content2 : '');
            // $data_en['seo_name'] = ($request->seo_name2 ? $request->seo_name2 : '');
            // $data_en['tags'] = ($request->tags2 ? $request->tags2 : '');
            // $data_en['meta_title'] = ($request->meta_title2 ? $request->meta_title2 : '');
            // $data_en['meta_desc'] = ($request->meta_desc2 ? $request->meta_title2 : '');
            // $data_en['meta_keyword'] = ($request->meta_keyword2 ? $request->meta_keyword2 : '');
            // DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'en')->where('type', $this->type_news_categories)->update($data_en);
            Toastr::success('Cập nhật menu thành công', 'Thành công');

            // Session::put('message','Cập nhật danh mục sản phẩm thành công');
            return Redirect::to('/admin/list-menus');
        // }
        // else {
        //     Session::put('message', 'Vui lòng điền đầy đủ các trường');
        //     return Redirect::to('edit-news/{$id}');
        // }
        
    }

    // xoá menu
    public function delete_menus($id)
    {
        Menus::where('id', $id)->delete();
        Nodes::where('object_id', $id)->where('type', $this->type_menus)->delete();
        Multi_languages::where('object_id', $id)->where('type', $this->type_menus)->delete();
        Toastr::success('Xóa menu thành công', 'Thành công');
        return Redirect::to('/admin/list-menus');
    }

    // bật tắt hoạt động
    public function unactive_menus_status($id)
    {
        Menus::where('id', $id)->update(['status' => 3]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
    public function active_menus_status($id)
    {
        Menus::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
