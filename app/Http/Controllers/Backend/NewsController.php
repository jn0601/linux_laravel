<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use App\Multi_languages;
use App\News_categories;
use App\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //type news là 2
    private $type_news = 2;
    //type news categories là 5
    private $type_news_categories = 5;


    public function add_news()
    {
        $list_news = News::orderBy('display_order', 'DESC')->get();
        $news_cate_1 = News_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $news_cate_2 = News_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $news_cate_3 = News_categories::where('level', 3)->orderBy('id', 'desc')->get();
        return view('admin_pages.news.add_news')
        ->with('list_news', $list_news)
        ->with('news_cate_1', $news_cate_1)
        ->with('news_cate_2', $news_cate_2)
        ->with('news_cate_3', $news_cate_3);
    }
    public function list_news()
    {
        $list_news = News::orderBy('display_order', 'DESC')->get();//->paginate(5); // paginate để phân trang, thường thì xài get
        $news_cate = News_categories::orderBy('id', 'desc')->get();
        $view_news = view('admin_pages.news.list_news')
        ->with('list_news', $list_news)
        ->with('news_cate', $news_cate);
        return view('admin_layout')->with('admin_pages.news.list_news', $view_news);
    }

    // lưu tin tức
    public function save_news(Request $request)
    {
        //$data = $request->all();
        $data_en = $request->all();
        $data = $request->all();
        $get_image = request('img');
        $data_vn = $request->validate(
            [
                'name' => 'required|unique:news|max:255',
                'desc' => 'required',
                'content' => 'required',
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
            $get_image->move('public/backend/uploads/news', $new_image);

            $news = new News();
            $news_vn = new Multi_languages();
            $news_en = new Multi_languages();

            // save vào bảng chính
            $news->name = $data['name'];
            $news->desc = $data['desc'];
            $news->content = $data['content'];
            $get_display_order = News::max('display_order');
            $display_order = $get_display_order + 1;
            $news->display_order = $display_order;
            $news->image = $new_image;

            $news->category_id = $data['category_id'];
            $news->status = $data['status'];

            $options = $request->input('options');
            $option_values = '';
            if ($options) {
                foreach ($options as $key => $opt) {
                    $option_values = $option_values . "," . $opt;
                }
            } else {
                $option_values = ",";
            }

            $news->options = $option_values;
            $news->count_view = 0;
            $news->date_created = date("Ymd");
            $news->date_updated = date("Ymd");
            $news->seo_name = $data['seo_name'];
            $news->tags = $data['tags'];
            $news->meta_title = $data['meta_title'];
            $news->meta_desc = $data['meta_desc'];
            $news->meta_keyword = $data['meta_keyword'];
            $news->save();

            //save vào bảng phụ tiếng Việt
            $news_vn->type = $this->type_news;
            $news_vn->object_id = $news->id;
            $news_vn->lang_code = "vn";
            $news_vn->name = $data['name'];
            $news_vn->desc = $data['desc'];
            $news_vn->content = $data['content'];
            $news_vn->seo_name = $data['seo_name'];
            $news_vn->tags = $data['tags'];
            $news_vn->meta_title = $data['meta_title'];
            $news_vn->meta_desc = $data['meta_desc'];
            $news_vn->meta_keyword = $data['meta_keyword'];
            $news_vn->save();

            // save vào bảng phụ tiếng Anh
            $news_en->type = $this->type_news;
            $news_en->object_id = $news->id;
            $news_en->lang_code = "en";
            $news_en->name = ($data_en['name2'] ? $data_en['name2'] : '');
            $news_en->desc = ($data_en['desc2'] ? $data_en['desc2'] : '');
            $news_en->content = ($data_en['content2'] ? $data_en['content2'] : '');
            $news_en->seo_name = ($data_en['seo_name2'] ? $data_en['seo_name2'] : '');
            $news_en->tags = ($data_en['tags2'] ? $data_en['tags2'] : '');
            $news_en->meta_title = ($data_en['meta_title2'] ? $data_en['meta_title2'] : '');
            $news_en->meta_desc = ($data_en['meta_desc2'] ? $data_en['meta_desc2'] : '');
            $news_en->meta_keyword = ($data_en['meta_keyword2'] ? $data_en['meta_keyword2'] : '');
            $news_en->save();
            Toastr::success('Thêm thành công', 'Thành công');
            return Redirect::to('list-news');
        } else {
            Session::put('message', 'Vui lòng điền đầy đủ các trường');
            return Redirect::to('add-news');
        }
    }

    // update tin tức
    public function update_news(Request $request, $id)
    {
        $data = array();
        $data_vn = array();
        $data_en = array();
        //update bảng chính
        $data['name'] = $request->name;
        $data['desc'] = $request->desc;
        $data['content'] = $request->content;
        $get_image = $request->file('img');
        $data['seo_name'] = $request->seo_name;
        $data['tags'] = $request->tags;
        $data['meta_title'] = $request->meta_title;
        $data['meta_desc'] = $request->meta_desc;
        $data['meta_keyword'] = $request->meta_keyword;

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/backend/uploads/news', $new_image);
            $data['image'] = $new_image;
        }
        $data['category_id'] = $request->category_id;
        $options = $request->input('options');
        $option_values = '';
        if ($options) {
            foreach ($options as $key => $opt) {
                $option_values = $option_values . "," . $opt;
            }
        } else {
            $option_values = ",";
        }
        
        $data['options'] = $option_values;
        $data['status'] = $request->status;

        DB::table('news')->where('id', $id)->update($data);

        //update bảng phụ
        $data_vn['name'] = $request->name;
        $data_vn['desc'] = $request->desc;
        $data_vn['content'] = $request->content;
        $data_vn['seo_name'] = $request->seo_name;
        $data_vn['tags'] = $request->tags;
        $data_vn['meta_title'] = $request->meta_title;
        $data_vn['meta_desc'] = $request->meta_desc;
        $data_vn['meta_keyword'] = $request->meta_keyword;
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'vn')->where('type', $this->type_news)->update($data_vn);

        //update bảng phụ
        $data_en['name'] = ($request->name2 ? $request->name2 : '');
        $data_en['desc'] = ($request->desc2 ? $request->desc2 : '');
        $data_en['content'] = ($request->content2 ? $request->content2 : '');
        $data_en['seo_name'] = ($request->seo_name2 ? $request->seo_name2 : '');
        $data_en['tags'] = ($request->tags2 ? $request->tags2 : '');
        $data_en['meta_title'] = ($request->meta_title2 ? $request->meta_title2 : '');
        $data_en['meta_desc'] = ($request->meta_desc2 ? $request->meta_title2 : '');
        $data_en['meta_keyword'] = ($request->meta_keyword2 ? $request->meta_keyword2 : '');
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'en')->where('type', $this->type_news)->update($data_en);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('list-news');
    }

    // trang update tin tức
    public function edit_news($id)
    {
        $news = News::orderBy('id', 'desc')->get();
        $news_lv1 = News_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $news_lv2 = News_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $news_lv3 = News_categories::where('level', 3)->orderBy('id', 'desc')->get();
        $edit_news = News::where('id', $id)->get();
        $get_options = News::where('id', $id)->get('options')->first();
        $option_values = $get_options->options;
        $string_values = preg_replace('/[^0-9]/', '', $option_values);
        $edit_news_vn = Multi_languages::where('object_id', $id)->where('lang_code', 'vn')->where('type', $this->type_news)->get();
        $edit_news_en = Multi_languages::where('object_id', $id)->where('lang_code', 'en')->where('type', $this->type_news)->get();
        $view_news = view('admin_pages.news.edit_news')
        ->with('news', $news)
        ->with('news_lv1', $news_lv1)
        ->with('news_lv2', $news_lv2)
        ->with('news_lv3', $news_lv3)
        ->with('edit_news', $edit_news)
        ->with('edit_news_vn', $edit_news_vn)
        ->with('edit_news_en', $edit_news_en)
        ->with('string_values', $string_values)
        ->with('news', $news);
        return view('admin_layout')->with('admin_pages.news.edit_news', $view_news);
    }

    // xoá tin tức
    public function delete_news($id)
    {
        DB::table('news')->where('id', $id)->delete();
        DB::table('multi_languages')->where('object_id', $id)->where('type', $this->type_news)->delete();
        Toastr::success('Xóa danh mục thành công', 'Thành công');

        // Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('list-news');
    }

    // trang thêm danh mục
    public function add_news_categories()
    {
        $list_news_cate = News_categories::orderBy('display_order', 'DESC')->get();
        $news_cate = News_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $news_sub_cate = News_categories::where('level', 2)->orderBy('id', 'desc')->get();
        //$banners = Banners::orderBy('display_order', 'asc')->get();
        return view('admin_pages.news.add_news_categories')->with('list_news_cate', $list_news_cate)->with('news_cate', $news_cate)->with('news_sub_cate', $news_sub_cate);
    }

    // trang danh sách danh mục
    public function list_news_categories()
    {
        $news_cate = News_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $news_sub_cate = News_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $list_news_cate = News_categories::orderBy('display_order', 'DESC')->get();//->paginate(5); // paginate để phân trang, thường thì xài get
        $view_news_cate = view('admin_pages.news.list_news_categories')->with('list_news_cate', $list_news_cate)->with('news_cate', $news_cate)->with('news_sub_cate', $news_sub_cate);
        return view('admin_layout')->with('admin_pages.news.list_news_categories', $view_news_cate);
    }

    // lưu danh mục
    public function save_news_categories(Request $request)
    {
        //$data = $request->all();
        $data_en = $request->all();
        $data = $request->all();
        $get_image = request('img');
        $data_vn = $request->validate(
            [
                'name' => 'required|unique:news_categories|max:255',
                'desc' => 'required',
                'content' => 'required',
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
            $get_image->move('public/backend/uploads/news_categories', $new_image);

            $news_cate = new News_categories();
            $news_cate_vn = new Multi_languages();
            $news_cate_en = new Multi_languages();

            // save vào bảng chính
            $news_cate->name = $data['name'];
            $news_cate->desc = $data['desc'];
            $news_cate->content = $data['content'];
            $get_display_order = News_categories::max('display_order');
            $display_order = $get_display_order + 1;
            $news_cate->display_order = $display_order;
            $news_cate->image = $new_image;

            $news_cate->parent_id = $data['parent_id'];
            if ($data['parent_id'] == 0) {
                $news_cate->root_id = " , ";
                $news_cate->level = 1;
            } else {
                $get_level = News_categories::where('id', $data['parent_id'])->get('level')->first();
                $get_level_value = $get_level->level;
                $news_cate->level = $get_level_value + 1;
                $get_root_id = News_categories::where('id', $data['parent_id'])->get('id')->first();
                if ($get_level->level == 1) {
                    $news_cate->root_id = "," . $get_root_id->id . ",";
                } else {
                    $get_level_id = News_categories::where('id', $data['parent_id'])->get('parent_id')->first();
                    $get_level_id_value = $get_level_id->parent_id;
                    $get_higher_id = News_categories::where('id', $get_level_id_value)->get('id')->first();
                    $news_cate->root_id = "," . $get_higher_id->id . "," . $get_root_id->id . ",";
                }
            }
            $news_cate->representative = $data['representative'];
            $news_cate->status = $data['status'];
            $news_cate->display_menu = $data['display_menu'];
            $news_cate->date_created = date("Ymd");
            $news_cate->seo_name = $data['seo_name'];
            $news_cate->meta_title = $data['meta_title'];
            $news_cate->meta_desc = $data['meta_desc'];
            $news_cate->meta_keyword = $data['meta_keyword'];
            $news_cate->save();

            //save vào bảng phụ tiếng Việt
            $news_cate_vn->type = $this->type_news_categories;
            $news_cate_vn->object_id = $news_cate->id;
            $news_cate_vn->lang_code = "vn";
            $news_cate_vn->name = $data['name'];
            $news_cate_vn->desc = $data['desc'];
            $news_cate_vn->content = $data['content'];
            $news_cate_vn->seo_name = $data['seo_name'];
            $news_cate_vn->tags = $data['tags'];
            $news_cate_vn->meta_title = $data['meta_title'];
            $news_cate_vn->meta_desc = $data['meta_desc'];
            $news_cate_vn->meta_keyword = $data['meta_keyword'];
            $news_cate_vn->save();

            // save vào bảng phụ tiếng Anh
            $news_cate_en->type = $this->type_news_categories;
            $news_cate_en->object_id = $news_cate->id;
            $news_cate_en->lang_code = "en";
            $news_cate_en->name = ($data_en['name2'] ? $data_en['name2'] : '');
            $news_cate_en->desc = ($data_en['desc2'] ? $data_en['desc2'] : '');
            $news_cate_en->content = ($data_en['content2'] ? $data_en['content2'] : '');
            $news_cate_en->seo_name = ($data_en['seo_name2'] ? $data_en['seo_name2'] : '');
            $news_cate_en->tags = ($data_en['tags2'] ? $data_en['tags2'] : '');
            $news_cate_en->meta_title = ($data_en['meta_title2'] ? $data_en['meta_title2'] : '');
            $news_cate_en->meta_desc = ($data_en['meta_desc2'] ? $data_en['meta_desc2'] : '');
            $news_cate_en->meta_keyword = ($data_en['meta_keyword2'] ? $data_en['meta_keyword2'] : '');
            $news_cate_en->save();
            Toastr::success('Thêm thành công', 'Thành công');
            return Redirect::to('list-news-categories');
            //return redirect()->action('Backend\BannerController@edit_banners', ['id' => $banners->id]);
        } else {
            Session::put('message', 'Vui lòng điền đầy đủ các trường');
            return Redirect::to('add-news-categories');
        }
    }

    // trang update danh mục
    public function edit_news_categories($id)
    {
        $categories = News_categories::orderBy('id', 'desc')->get();
        $news_cate = News_categories::where('level', 1)->orderBy('id', 'desc')->get();
        $news_sub_cate = News_categories::where('level', 2)->orderBy('id', 'desc')->get();
        $edit_categories = News_categories::where('id', $id)->get();
        $edit_categories_vn = Multi_languages::where('object_id', $id)->where('lang_code', 'vn')->where('type', $this->type_news_categories)->get();
        $edit_categories_en = Multi_languages::where('object_id', $id)->where('lang_code', 'en')->where('type', $this->type_news_categories)->get();
        $view_categories = view('admin_pages.news.edit_news_categories')->with('news_cate', $news_cate)->with('news_sub_cate', $news_sub_cate)->with('edit_categories', $edit_categories)->with('edit_categories_vn', $edit_categories_vn)->with('edit_categories_en', $edit_categories_en)->with('categories', $categories);
        return view('admin_layout')->with('admin_pages.news.edit_news_categories', $view_categories);
    }

    // update danh mục
    public function update_news_categories(Request $request, $id)
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
            $get_image->move('public/backend/uploads/news_categories', $new_image);
            $data['image'] = $new_image;
            //DB::table('banners')->where('id', $id)->update($data);
        }
        $data['parent_id'] = $request->parent_id;
        if ($request->parent_id == 0) {
            $data['root_id'] = " , ";
            $data['level'] = 1;
        } else {
            $get_level = news_categories::where('id', $data['parent_id'])->get('level')->first();
            $get_level_value = $get_level->level;
            $data['level'] = $get_level_value + 1;
            $get_root_id = news_categories::where('id', $data['parent_id'])->get('id')->first();
            if ($get_level->level == 1) {
                $data['root_id'] = "," . $get_root_id->id . ",";
            } else {
                $get_level_id = news_categories::where('id', $data['parent_id'])->get('parent_id')->first();
                $get_level_id_value = $get_level_id->parent_id;
                $get_higher_id = news_categories::where('id', $get_level_id_value)->get('id')->first();
                $data['root_id'] = "," . $get_higher_id->id . "," . $get_root_id->id . ",";
            }
        }

        DB::table('news_categories')->where('id', $id)->update($data);

        //update bảng phụ
        $data_vn['name'] = $request->name;
        $data_vn['desc'] = $request->desc;
        $data_vn['content'] = $request->content;
        $data_vn['seo_name'] = $request->seo_name;
        $data_vn['tags'] = $request->tags;
        $data_vn['meta_title'] = $request->meta_title;
        $data_vn['meta_desc'] = $request->meta_desc;
        $data_vn['meta_keyword'] = $request->meta_keyword;
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'vn')->where('type', $this->type_news_categories)->update($data_vn);

        //update bảng phụ
        $data_en['name'] = ($request->name2 ? $request->name2 : '');
        $data_en['desc'] = ($request->desc2 ? $request->desc2 : '');
        $data_en['content'] = ($request->content2 ? $request->content2 : '');
        $data_en['seo_name'] = ($request->seo_name2 ? $request->seo_name2 : '');
        $data_en['tags'] = ($request->tags2 ? $request->tags2 : '');
        $data_en['meta_title'] = ($request->meta_title2 ? $request->meta_title2 : '');
        $data_en['meta_desc'] = ($request->meta_desc2 ? $request->meta_title2 : '');
        $data_en['meta_keyword'] = ($request->meta_keyword2 ? $request->meta_keyword2 : '');
        DB::table('multi_languages')->where('object_id', $id)->where('lang_code', 'en')->where('type', $this->type_news_categories)->update($data_en);
        Toastr::success('Cập nhật danh mục thành công', 'Thành công');

        // Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('list-news-categories');
    }


    // xoá danh mục
    public function delete_news_categories($id)
    {
        DB::table('news_categories')->where('id', $id)->delete();
        DB::table('multi_languages')->where('object_id', $id)->where('type', $this->type_news_categories)->delete();
        Toastr::success('Xóa danh mục thành công', 'Thành công');

        // Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('list-news-categories');
    }

    // bật tắt tiêu biểu
    public function unactive_news_categories_representative($id)
    {
        DB::table('news_categories')->where('id', $id)->update(['representative' => 0]);
        Toastr::success('Danh mục không tiêu biểu thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
    public function active_news_categories_representative($id)
    {
        DB::table('news_categories')->where('id', $id)->update(['representative' => 1]);
        Toastr::success('Danh mục tiêu biểu thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }

    // bật tắt hiển thị
    public function unactive_news_categories_display_menu($id)
    {
        DB::table('news_categories')->where('id', $id)->update(['display_menu' => 0]);
        Toastr::success('Ẩn danh mục thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
    public function active_news_categories_display_menu($id)
    {
        DB::table('news_categories')->where('id', $id)->update(['display_menu' => 1]);
        Toastr::success('Hiển thị danh mục thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }


    // bật tắt hoạt động
    public function unactive_news_categories_status($id)
    {
        DB::table('news_categories')->where('id', $id)->update(['status' => 3]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
    public function active_news_categories_status($id)
    {
        DB::table('news_categories')->where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }


    // bật tắt hiển thị
    // public function unactive_news_display_menu($id)
    // {
    //     DB::table('news')->where('id', $id)->update(['display_menu' => 0]);
    //     Toastr::success('Ẩn danh mục thành công', 'Thành công');

    //     // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
    //     return redirect()->back();
    // }
    // public function active_news_display_menu($id)
    // {
    //     DB::table('news')->where('id', $id)->update(['display_menu' => 1]);
    //     Toastr::success('Hiển thị danh mục thành công', 'Thành công');

    //     // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
    //     return redirect()->back();
    // }


    // bật tắt hoạt động
    public function unactive_news_status($id)
    {
        DB::table('news')->where('id', $id)->update(['status' => 3]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');

        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
    public function active_news_status($id)
    {
        DB::table('news')->where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');

        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
}
