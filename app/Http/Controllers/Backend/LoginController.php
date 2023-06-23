<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;


session_start();
class LoginController extends Controller
{
    public function index()
    {
        return view('admin_pages.login.login'); // gọi login.blade trong folder admin_pages
    }

    public function login(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->password);
        $admin = Admin::where('admin_email', '=', $admin_email)->first();
        if ($admin && $admin_password == $admin->admin_password) {
            Auth::login($admin);
            if (Auth::check()) {
                Toastr::success('Đăng nhập thành công', 'Thành công');
                //Session::put('message', 'Đăng nhập thành công'); 
                return redirect::to('/trang-chu-admin');
            } else {
                Toastr::error('Mật khẩu không đúng, vui lòng thử lại', 'Thất bại');
                //Session::put('message', 'Mật khẩu không đúng, vui lòng thử lại'); 
                return redirect::to('/login-auth');
            }
        } else {
            Toastr::error('Mật khẩu không đúng, vui lòng thử lại', 'Thất bại');
            //Session::put('message', 'Mật khẩu không đúng, vui lòng thử lại'); 
            return redirect::to('/login-auth');
        }

        // $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first(); // first để limit 1 user
        // // nếu result là true
        // if ($result) {
        //     Session::put('admin_name', $result->admin_name); // lấy tên admin
        //     Session::put('admin_id', $result->admin_id);
        //     return Redirect::to('/trang-chu-admin');
        // }
        // // nếu sai
        // else {
        //     Session::put('message', 'Tài khoản hoặc mật khẩu chưa đúng'); // lấy tên admin
        //     return Redirect::to('/login-auth');
        // }


        // $data = $request->validate(
        //     [
        //         'admin_email' => 'required|email|max:255',

        //         'admin_password' => 'required',
        //     ],
        //     [
        //         'admin_email.required' => 'Vui lòng điền địa chỉ Email',
        //         'admin_email.email' => 'Địa chỉ Email không hợp lệ',

        //         'admin_password.required' => 'Vui lòng điền mật khẩu',
        //     ]
        // );

        // if (Auth::attempt(['admin_email' => $admin_email, 'password' => $admin_password])) {
        //     Toastr::success('Đăng nhập thành công', 'Thành công');
        //     //exit("abc");
        //     return redirect::to('/trang-chu-admin');
        // } else {
        //     Toastr::error('Mật khẩu không đúng, vui lòng thử lại', 'Thất bại');
        //     exit($admin_email . "<br>" . $admin_password);
        //     return redirect::to('/login-auth');
        // }
    }

    public function logout()
    {
        // Session::put('admin_name', null); // reset session
        // Session::put('admin_id', null);

        Auth::logout();

        Toastr::success('Đăng xuất thành công', 'Thành công');

        return Redirect::to('/login-auth');
    }

    // public function validation($request){
    //     return $this->validate($request,[
    //         'admin_name' => 'required|max:255',
    //         'admin_phone' =>'required|max:255',
    //         'admin_email' =>'required|unique:tbl_admin,admin_email|max:255',
    //         'admin_password' =>'required|max:255',
    //         ]);
    // }
}