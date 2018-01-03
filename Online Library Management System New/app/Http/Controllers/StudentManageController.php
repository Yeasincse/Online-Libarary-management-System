<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Redirect;
use Session;
class StudentManageController extends Controller
{
    public function index(){   
		$this->checkLogin();	
        $alluser = Student::all();
        return view('admin.user_register_info', ['alluser'=>$alluser]);
    }
    public function block_user($id){
        $block_user = Student::find($id);
        $block_user->Status = 0;
        $block_user->save();
        Session::put('block', 'Blocked Student Successfully ');
        return redirect('/reg-students');
    }
    public function unblock_user($id){
        $unblock_user = Student::find($id);
        $unblock_user->Status = 1;
        $unblock_user->save();
        Session::put('message', 'UnBlocked Student Successfully ');
        return redirect('/reg-students');
    }
		public  function checkLogin(){
		$admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
	}}
}
