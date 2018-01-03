<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Books;
use Session;
use Illuminate\Support\Facades\DB;
use App\IsseudBook;
use Illuminate\Support\Facades\Redirect;

class IssuedBookController extends Controller
{
    public function index(){
		$this->checkLogin();
        return view('admin.add_issued_book');
    }
    public function add_issued_book_info(Request $request){
        $booikid = $request->booikid;        
        $book = Books::where('ISBNNumber',$booikid)->first();
        $isseud_date = date("F j, Y, g:i a");
        $return_date = 'Not Return Yet';
		
      //  $isseud = new IsseudBook();
       // $isseud->BookId = $book->id;
       // $isseud->StudentID = $request->studentid;
       // $isseud->IssuesDate = $isseud_date;
      //  $isseud->ReturnDate = $return_date;    
      //  $isseud->save();  
	     $data = array();
        $data['BookId'] = $book->id;
        $data['StudentID'] = $request->studentid;
        $data['IssuesDate'] = $isseud_date;
        $data['ReturnDate'] = $return_date;

//        echo '<pre>';
//        print_r($data);
//        exit();
        DB::table('isseud_books')->insert($data);
        $total_book = $book->TotalBook - 1;
		 DB::table('books')
                ->where('id', $book->id)
                ->update(['TotalBook'=>$total_book]);
				
        Session::put('message', 'BooK Issued Successfully');
        return redirect('/add-issued-book');
    }
    
    public function manage_issued_books(){
		$this->checkLogin();
        $manage_issued_books = IsseudBook::all();       
        return view('admin.manage_issued_books',['manage_isseud_books'=>$manage_issued_books]);
    }
    public function edit_issued_books($id){
		$this->checkLogin();
        $isseuedboook = IsseudBook::find($id);
        return view('admin.edit_issued_books',['issuedbook'=>$isseuedboook]);
    }
    public function update_return_isseud_book(Request $request){
        $return_date = date("F j, Y, g:i a");
       // $Issued_id = IsseudBook::find($request->Issued_id);
       // $Issued_id->fine = $request->fine;
       // $Issued_id->ReturnDate = $return_date; 
       // $Issued_id->RetrunStatus = 1;
      //  $Issued_id->save();
		        DB::table('isseud_books')
                ->where('id', $request->Issued_id)
                ->update(['fine'=>$request->fine,'ReturnDate'=>$return_date, 'RetrunStatus'=> 1]);
		$Totalbook_info = DB::table('books')
			->where('id', $request->book_id)
			->first();
		$total_book = $Totalbook_info->TotalBook + 1;
		DB::table('books')
			->where('id', $Totalbook_info->id)
			->update(['TotalBook'=>$total_book]);
			
        Session::put('message', 'Return Issued save Successfully');
        return redirect('/manage-issued-books');
    }
    public function studentsid_check($studentsid = null) {
        $studentsid_info = DB::table('students')
                ->where('StudentId', $studentsid)
                ->first();
        if ($studentsid_info) {
			$studentissued_info = DB::table('isseud_books')
                ->where('StudentID', $studentsid)
				->where('RetrunStatus', 0)
                ->first();
				if($studentissued_info){
					 echo  "This Student Isued A Book But Not Return !";
				}	
				else if($studentsid_info->Status == 1){
                 echo  "STUDENT NAME :".' '.$studentsid_info->FullName;
				}else{
                echo "STUDENT ID BLOCKED";
                echo  "STUDENT NAME : ".' '. $studentsid_info->FullName;
            }                             
        } else {
            echo "Invaid Student Id. Please Enter Valid Student id";
        }
    }
    public function book_isbn_check($bookisbn = null) {
        $bookisbn_info = DB::table('books')
                ->where('ISBNNumber', $bookisbn)
                ->first();
				
		$selfStatus =DB::table('book_shelves')->where('id',$bookisbn_info->shelfId)->first();	
		if($selfStatus->Status == 0){
			echo 'The bookshelf of this book Are Not Available!';
		}			
        else if($bookisbn_info) {    
			if($bookisbn_info->TotalBook == 0){
				echo 'This Book Are Not Available!';
			}else{
				
			echo $bookisbn_info->BookName;  
			}                                    
        } else {
           echo "Invalid";
        }
    }
		public  function checkLogin(){
		$admin_id = Session::get('adminId');
        if ($admin_id == NULL) {            
            Session::put('admin_id', $admin_id);
            return redirect('/adminlogin')->send();
	}}
}
