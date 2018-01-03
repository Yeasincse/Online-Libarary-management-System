<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;

class UserSignUpController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $verification_code = rand(10000, 99999);
        return view('signup', ['verification_code' => $verification_code]);
    }

    public function save_user_details(Request $request) {
        $date = date('Y-m-d h:i:s');
        $id = DB::table('students')->insertGetId([
            'FullName' => $request->FullName,
            'StudentId' => 'SID',
            'MobileNumber' => $request->MobileNumber,
            'EmailId' => $request->email,
            'Password' => md5($request->confirmpassword),
            'created_at' => $date
        ]);
        $sdtid = Student::find($id);
        $sdtid->StudentId = $sdtid->StudentId . '0' . $id;
        $sdtid->save();

        return redirect('/signup')
                        ->with('message', 'Your Registation Done Successfully')
                        ->with('sdtid', 'Your Student Id No : ' . $sdtid->StudentId);
    }

    public function ajax_email_check($email_address = null) {
        $customer_info = DB::table('students')
                ->where('EmailId', $email_address)
                ->first();
        if ($customer_info) {
            echo 'Alerdy Exists !';
        } else {
            echo 'Avilable';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
