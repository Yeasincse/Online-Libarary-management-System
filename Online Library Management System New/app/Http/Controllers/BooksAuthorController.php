<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authors;
use Illuminate\Support\Facades\Session;
class BooksAuthorController extends Controller
{
    public function index(){
		$this->checkLogin();
        return view('admin.add_auhtor');
    }
    public function add_author_info(Request $request){
       $authors = new Authors();
       $authors->AuthorName = $request->AuthorName;
       $authors->save();
       return redirect('/add-author')->with('message', 'Save author name Successfully');
    }
    public function manage_author(){
		$this->checkLogin();
        $allAuthors = Authors::all(); 
        return view('admin.manage_author', ['allAuthors' => $allAuthors]);
    }
    public function edit_author($id){
		$this->checkLogin();
        $author = Authors::all()->where('id', $id)->first();
        return view('admin.edit_author', ['author' => $author]);
     }
     public function update_author_info(Request $request){
        $authorId = $request->AuthorId;
        $author = Authors::find($authorId);
        $author->AuthorName = $request->AuthorName;
        $author->save();       
        return redirect('/manage-authors')->with('message', 'Updated data Successfully');
     }
         public function delete_author($id) {
        $author = Authors::find($id);
        $author->delete();
        return redirect('/manage-authors')->with('message', 'Author Info Deleted successfull');
    }
	public  function checkLogin(){
		$admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
	}}
}
