<?php

namespace App\Http\Controllers;

use App\Models\Student;

use App\Models\Login;
use Illuminate\Http\Request;
use Mail;

class ConfirmUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('user_id')) {
            if ($request->session()->get('level') == '2') {
                $user_id = session()->get('user_id');
                $Student_datas = Student::where("user_level","1")->paginate(10);
                return view("IN.Teacher.ConfirmUser.index",
                [
                    'Student_datas' =>  $Student_datas,
                ]
                );

            }
            else{
                echo "你不是教師";
                //1. 顯示錯誤2.錯誤controller

            }
        }
        else{
            echo "你沒登入";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Student_datas = Student::where("user_id",$id)->get();
        foreach($Student_datas as $value){
            $real_name = $value["user_real_name"];
            $user_email = $value["user_email"];
        }
        $data['real_name'] = $real_name;
        $data["user_email"] = $user_email;

        Mail::send('IN.Teacher.ConfirmUser.sendMail',$data, function ($message) use ($data) {
            $message->from('mikeliu20010106@gmail.com', $data['real_name']);    
            $message->to($data['user_email'])->subject('帳號認證');

        });
        Student::where('user_id', $id)
            ->update(
                [
                    'user_level'=>  "4",
                ]   
        );
        Login::where('id', $id)
        ->update(
            [
                'level'=>  "4",
            ]   
    );
        return redirect()->route("ConfirmUser.index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('user_id', $id)->delete();
        return redirect()->route("ConfirmUser.index");
    }
}
