<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Student;
use App\IsseudBook;
class WelcomeController extends Controller
{
    public function user_dashboard($name){
         $id = Session::get('userId'); 
         $stnd_isbn = Student::find($id);
         $book_issued = IsseudBook::where('StudentID',$stnd_isbn->StudentId)->get();
         $book_issued_no_rtrn = IsseudBook::where('StudentID',$stnd_isbn->StudentId)
                            ->where('RetrunStatus',0)
                            ->get();
        return view('user.user_dashboard',['book_issued'=>$book_issued,'book_issued_no_rtrn'=>$book_issued_no_rtrn]);
    }
    public function user_logout(){
        Session::put('FullName', NULL);
        Session::put('userId', NULL); 
       return redirect('/');
    }
    public function my_profile($name){
       $id = Session::get('userId');
       $profile_info = Student::all()->where('id',$id)->first();
       return view('user.my_profile', ['profile_info'=>$profile_info]);
    }
    public function update_user_info(Request $request ){
        $name= Session::get('FullName');
        $id = Session::get('userId');      
        $update_info = Student::find($id);
        $update_info->FullName = $request->fullanme;
        $update_info->MobileNumber = $request->mobileno;
        $update_info->save();
        return redirect('/my-profile/'.$name)->with('message', 'Your information has updated');
        
    }
    public function change_password(){
        return view('user.change_password');
    }
    public function change_user_password(Request $request){
   
        $id = Session::get('userId');      
        $update_info = Student::find($id);
        if($update_info->Password != md5($request->password)){
            $name= Session::get('FullName');
            return redirect('/change-password/'.$name)
                    ->with('exception', 'You Input wrong current password');
        }else{
            $name= Session::get('FullName');
            $update_info->Password = md5($request->confirmpassword);
            $update_info->save();
              return redirect('/change-password/'.$name)
                    ->with('message', 'Password has changed');
        }
        
    }
    public function issued_book(){
        $id = Session::get('userId');
        $sidno = Student::find($id);
        $book_issued = IsseudBook::where('StudentID',$sidno->StudentId)->get();
        return view('user.issued_book',['book_issued'=>$book_issued]);
    }
}
