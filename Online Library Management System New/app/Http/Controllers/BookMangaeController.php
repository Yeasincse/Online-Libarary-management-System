<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Authors;
use App\Category;
use App\BookShelf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class BookMangaeController extends Controller {

    public function index() {
		$this->checkLogin();
        $allCategory = Category::where('Status',1)->get();
        $allAuthors = Authors::all();
		$bookShelf = BookShelf::where('Status',1)->get();
        return view('admin.add_book', ['allAuthors' => $allAuthors, 'allCategory' => $allCategory, 'bookShelf'=>$bookShelf]);
    }

    public function add_book_info(Request $request) {
    



	//  $book = new Books();
      //  $book->BookName = $request->BookName;
      //  $book->CatId = $request->CatId;
      //  $book->AuthorId = $request->AuthorId;
     //   $book->ISBNNumber = $request->ISBNNumber;
     //   $book->BookPrice = $request->BookPrice;
     //   $book->save();
	     $data = array();
        $data['BookName'] = $request->BookName;
        $data['CatId'] = $request->CatId;
        $data['AuthorId'] = $request->AuthorId;
		$data['shelfId'] = $request->shelfId;
        $data['ISBNNumber'] = $request->ISBNNumber;
		$data['BookPrice'] = $request->BookPrice;
		$data['TotalBook'] = $request->TotalBook;
		$data['TotalFixedBook'] = $request->TotalBook;
        DB::table('books')->insert($data);
		
	$this->update_self_totalbook($request->shelfId);
	
        return redirect('/add-book')->with('message', 'Save Book Details Successfully');
    }

    public function manage_book() {
		$this->checkLogin();
        $Books = Books::all();		
        return view('admin.manage_book', ['books' => $Books]);
    }

    public function edit_book($id) {
		$this->checkLogin();
        $book = Books::all()->where('id', $id)->first();
        $allCategory = Category::where('Status',1)->get();
        $allAuthors = Authors::all();
		$bookShelf = BookShelf::where('Status',1)->get();;
        return view('admin.edit_book', ['book' => $book,'allAuthors' => $allAuthors, 'allCategory' => $allCategory, 'bookShelf'=>$bookShelf]);
    }

    public function update_book_info(Request $request) {
   //     $bookid = $request->id;
   //     $book = Books::find($bookid);
     //   $book->BookName = $request->BookName;
     //   $book->CatId = $request->CatId;
     //   $book->AuthorId = $request->AuthorId;
     //   $book->ISBNNumber = $request->ISBNNumber;
      //  $book->BookPrice = $request->BookPrice;
	//	$book->TotalBook = $request->TotalBook;
       // $book->save();
		$totalbook = DB::table('books')->where('id',$request->id)->first();
		$totalIssuedBook = $totalbook->TotalFixedBook - $totalbook->TotalBook;
		$totalfixedBook = $totalIssuedBook + $request->TotalBook;
		 DB::table('books')
                ->where('id', $request->id)
                ->update([
					'BookName'=>$request->BookName,
					'CatId'=>$request->CatId,
					'AuthorId'=>$request->AuthorId, 
					'shelfId'=>$request->shelfId,
					'ISBNNumber'=>$request->ISBNNumber,
					'BookPrice'=>$request->BookPrice, 
					'TotalBook'=>$request->TotalBook,
					'TotalFixedBook'=>$totalfixedBook
					]);
		
		$this->update_self_totalbook($request->shelfId);	
		
        return redirect('/manage-books')->with('message', 'Updated data Successfully');
    }

    public function delete_book($id) {
        $book = Books::find($id);
        $book->delete();
        return redirect('/manage-books')->with('message', 'Book Info Deleted successfull');
    }
    public function isbn_no_check($isbn_no = null){
        $isbn_info = DB::table('books')
                ->where('ISBNNumber', $isbn_no)
                ->first();
        if ($isbn_info) {
            echo 'Alerdy Exists !';
        } else {
            echo 'Avilable';
        }
    }
		public  function checkLogin(){
		$admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
	}}
	public function update_self_totalbook($id){	
	$totalbookByself = DB::table('books')->where('shelfId', $id)->get();
	$totalbooks = 0;
	foreach($totalbookByself as $totalbook){
	$totalbooks +=$totalbook->TotalFixedBook;			
	}
		DB::table('book_shelves')
					->where('id', $id)
					->update(['TotalBook'=>$totalbooks]);	
	
}}
