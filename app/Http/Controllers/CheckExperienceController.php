<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\Student;
use App\Models\Experience;
use Mail;

class CheckExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request -> user_id;
        $Experiences = Experience::where('user_id',$user_id)->get();
        $is_upload = Experience::where('user_id',$user_id)->count();
            return view("IN.Teacher.CheckExperience.index",
            [
                "user_id" => $user_id,
                "is_upload" => $is_upload,
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $else = $request->else;
        $floder = "\storage\Experience\\";

        if(empty($else))$else = "";
        $user_id = $request->user_id;
        
        $comment = $request->validate([
            'Comment' => 'required'
        ]);
        $student_datas = Student::where('user_id',$user_id)->get();
        $Experience_datas = Experience::where("user_id",$user_id)->get();
        //implode(" , ",$comment);
        foreach( $Experience_datas as $Experience_datas){
            $Experience_file_name = $Experience_datas["Experience_file_name"];
        }
        foreach($comment as $value){
            $real_comment = implode(" 、 ",$value);
        }
        foreach($student_datas as $student_data){
            $user_real_name = $student_data["user_real_name"];
            $user_email = $student_data["user_email"];
        }
        Experience::where('user_id',$user_id)
        ->update([
            'Experience_comment' => $real_comment,
            'Experience_else'    => $else,
        ]);
        $real_file_path = public_path().$floder.$Experience_file_name;
        $data['real_file_path'] = $real_file_path;
        $data['user_email'] = $user_email;
        $data['user_real_name'] =  $user_real_name;
        $data['real_comment'] =  $real_comment;
        $data['else'] =  $else;
        Mail::send('IN.Teacher.CheckExperience.sendMail',$data, function ($message) use ($data) {
            $message->from('mikeliu20010106@gmail.com', $data['user_real_name']);    
            $message->to($data['user_email'])->subject('心得回復');
            $message->attach($data['real_file_path']);
        });
        return redirect()->route('CheckUser.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       
        //return response()->file($real_path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Experience_datas = Experience::where('user_id',$id)->get();
        // echo  $Experience_datas;
        foreach($Experience_datas as $Experience_data ){
            $Experience_name = $Experience_data['Experience_file_name'];
        echo $Experience_name;
        }
        $real_path = public_path()."\storage\Experience\\".$Experience_name;
        echo $real_path;
        return response()->file($real_path);
        
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
        Mail::send('IN.Teacher.CheckExperience.sendMail',$data, function ($message) use ($data) {
            $message->from('mikeliu20010106@gmail.com', $data['user_real_name']);    
            $message->to($data['user_email'])->subject('記得回復');
            $message->attach($data['real_file_path']);
        });
        return redirect()->route('CheckUser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
