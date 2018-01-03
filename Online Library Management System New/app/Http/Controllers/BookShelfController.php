<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookShelf;
use Illuminate\Support\Facades\Session;
class BookShelfController extends Controller
{
       public function index()
    {
		$this->checkLogin();
        return view('admin.add_bookshelf');
    }
    public function add_shelf_info(Request $request){
        $bookshelf = new BookShelf();
        $bookshelf->ShelfName = $request->ShelfName;
        $bookshelf->Status = $request->Status;
        $bookshelf->save();
        return redirect('/add-shelf')->with('message', 'Save BookShelf Successfully');
    }
    public function manage_shelf(){
		$this->checkLogin();
        $allshelf = BookShelf::all(); 
        return view('admin.manage_shelf', ['allshelf' => $allshelf]);
    }
    public function edit_shelf($id){
		$this->checkLogin();
        $bookshelf = BookShelf::all()->where('id', $id)->first();
        return view('admin.edit_bookshelf', ['bookshelf' => $bookshelf]);
     }
     public function update_shelf_info(Request $request){
        $shelfId = $request->shelfId;
        $shelf = BookShelf::find($shelfId);
        $shelf->ShelfName = $request->ShelfName;
        $shelf->Status = $request->Status;
        $shelf->save(); 
        
        return redirect('/manage-shelf')->with('message', 'Updated data Successfully');
     }
         public function delete_shelf($id) {
        $shelf = BookShelf::find($id);
        $shelf->delete();
        return redirect('/manage-shelf')->with('message', 'Shelf Info Deleted successfull');
    }
		public  function checkLogin(){
		$admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
	}}
}
