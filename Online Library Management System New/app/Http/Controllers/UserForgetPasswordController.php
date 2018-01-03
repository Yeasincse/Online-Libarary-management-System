<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Redirect;
use Session;
class UserForgetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verification_code = rand(10000,99999);
        return view('user_forgot_password', ['verification_code' => $verification_code]);
    }
    public function user_password_change(Request $request){    
        $student_info = Student::all()
                ->where('EmailId', $request->email)
                ->where('MobileNumber', $request->mobile)
                ->first();
        if($student_info){
            $save_pass = Student::find($student_info->id);
            $save_pass->Password = md5($request->confirmpassword);
            $save_pass->save();
            Session::put('message', 'Your password has been changed');
            return Redirect::to('/user-forgot-password');
        }
        else {
            Session::put('exception', 'Email and Mobile no. incorrected');
            return Redirect::to('/user-forgot-password');
        }
    }
}
