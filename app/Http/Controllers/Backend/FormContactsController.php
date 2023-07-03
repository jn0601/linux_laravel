<?php

namespace App\Http\Controllers\Backend;

use App\Form_contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class FormContactsController extends Controller
{
    // trang danh sách liên hệ
    public function list_contacts()
    {
        $list_contacts = Form_contacts::orderBy('id', 'DESC')->get();//->paginate(5); // paginate để phân trang, thường thì xài get
        $view_contacts = view('admin_pages.contact.list_contacts')
        ->with('list_contacts', $list_contacts);
        return view('admin_layout')->with('admin_pages.contact.list_contacts', $view_contacts);
    }

    // trang xem chi tiết liên hệ
    public function detail_contacts($id)
    {
        $contacts = Form_contacts::orderBy('id', 'desc')->get();
        $detail_contacts = Form_contacts::where('id', $id)->get();
        $view_contacts = view('admin_pages.contact.detail_contacts')
        ->with('contacts', $contacts)
        ->with('detail_contacts', $detail_contacts);
        return view('admin_layout')->with('admin_pages.contact.detail_contacts', $view_contacts);
    }

    // xoá liên hệ
    public function delete_contacts($id)
    {
        DB::table('form_contacts')->where('id', $id)->delete();
        Toastr::success('Xóa liên hệ thành công', 'Thành công');
        return Redirect::to('list-contacts');
    }
}
