<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class UserLogInController extends Controller
{
    public function index(){
       $verification_code = rand(10000,99999);
        return view('homeContent',['verification_code' => $verification_code]);
    }
    public function user_login_check(Request $request){
        $emailid = $request->emailid;
        $password = md5($request->password);
        $result = DB::table('students')
                ->where('EmailId', $emailid)
                ->where('Password', $password)
                ->first();
         if ($result) {
             if($result->Status == 0){
                 Session::put('exception', 'This ID has been blocked ! Please contact with authority');
                 return Redirect::to('/');
             }                        
            Session::put('FullName', $result->FullName);
            Session::put('userId', $result->id); 
            return redirect('/user/dashboard/'.$result->FullName);
        } else {
            Session::put('exception', 'User id and Password incorrected');
            return Redirect::to('/');
        }
    }
}
