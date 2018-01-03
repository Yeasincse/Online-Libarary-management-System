<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$this->checkLogin();
        return view('admin.add_category');
    }
    public function add_category_info(Request $request){
        $category = new Category();
        $category->CategoryName = $request->CategoryName;
        $category->Status = $request->Status;
        $category->save();
        return redirect('/add-category')->with('message', 'Save category Successfully');
    }
    public function manage_category(){
		$this->checkLogin();
        $allCategory = Category::all(); 
        return view('admin.manage_category', ['allCategory' => $allCategory]);
    }
    public function edit_category($id){
		$this->checkLogin();
        $category = Category::all()->where('id', $id)->first();
        return view('admin.edit_category', ['category' => $category]);
     }
     public function update_category_info(Request $request){
        $categoryId = $request->CategoryId;
        $category = Category::find($categoryId);
        $category->CategoryName = $request->CategoryName;
        $category->Status = $request->Status;
        $category->save(); 
        
        return redirect('/manage-category')->with('message', 'Updated data Successfully');
     }
         public function delete_category($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('/manage-category')->with('message', 'Category Info Deleted successfull');
    }
		public  function checkLogin(){
		$admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
	}}

}
