<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Admin;
class AdminLogInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verification_code = rand(10000,99999);
       return view('adminlogin',['verification_code' => $verification_code]);
    }
       public function admin_login_check(Request $request){       
        $AdminEmail = $request->AdminEmail;
        $password = md5($request->Password);
        $result = DB::table('admins')
                ->where('AdminEmail', $AdminEmail)
                ->where('Password', $password)
                ->first();
         if ($result) {
            Session::put('AdminEmail', $result->AdminEmail);
            Session::put('adminId', $result->id); 
            return redirect('/admin-dashboard');
        } else {
            Session::put('exception', 'Email and Password incorrected');
            return Redirect::to('/adminlogin');
        }
    }
    public function change_password(){
		$this->checkLogin();
        return view('admin.change_password');
    }
    public function admin_password_change(Request $request){
       $admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
        }

       $admin_info = Admin::find($admin_id);
       if($admin_info->Password != md5($request->password)){
           Session::put('exception', 'Wrong Current Password');
           return redirect('/change-password');
       }
       $admin_info->Password = md5($request->confirmpassword);
       $admin_info->save();
       Session::put('message', 'Password changed Successfully');
       return redirect('/change-password');
    }
	public  function checkLogin(){
		$admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
	}}

}
