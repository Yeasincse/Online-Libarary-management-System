<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Student;
use App\Books;
use App\IsseudBook;
use App\Authors;
use App\Category;
class AdminDashBoardController extends Controller
{
    public function index(){
        $admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
        }
        $alluser = Student::all();
        $book = Books::all();
        $book_isseud = IsseudBook::all(); 
        $book_isseud_rtrn = IsseudBook::where('RetrunStatus', '1')->get(); 
        $author = Authors::all();
        $category = Category::all();
        return view('admin.admin_dashboard',[
                'alluser'=>$alluser,
                'book'=>$book,
                'book_isseud'=>$book_isseud,
                'book_isseud_rtrn'=>$book_isseud_rtrn,
                'author'=>$author,
                'category'=>$category]);
    }
    public function admin_logout(){
       Session::put('adminId', NUll);
	   Session::put('AdminEmail', NULL);
       return redirect('/adminlogin');
    }
}
