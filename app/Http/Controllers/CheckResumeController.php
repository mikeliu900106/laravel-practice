<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\Student;
use Mail;
class CheckResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user_id;
        
        if(Resume::where('user_id',$user_id)->count() == 0){
            echo "此學生沒上傳履歷";
        }
        else{
            return view("IN.Teacher.CheckResume.index",["user_id"=>$user_id]);
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
        
 
        $else = $request->else;
        $resume_floder = "\storage\upload\\";

        if(empty($else))$else = "";
        $user_id = $request->user_id;
        
        $comment = $request->validate([
            'Comment' => 'required'
        ]);
        $student_datas = Student::where('user_id',$user_id)->get();
        $resume_datas = Resume::where("user_id",$user_id)->get();
        //implode(" , ",$comment);
        foreach( $resume_datas as $resume_datas){
            $resume_file_name = $resume_datas["resume_file_name"];
        }
        foreach($comment as $value){
            $real_comment = implode(" 、 ",$value);
        }
        foreach($student_datas as $student_data){
            $user_real_name = $student_data["user_real_name"];
            $user_email = $student_data["user_email"];
        }
        Resume::where('user_id',$user_id)
        ->update([
            'resume_comment' => $real_comment,
            'resume_else'    => $else,
        ]);
        $real_file_path = public_path().$resume_floder.$resume_file_name;
        $data['real_file_path'] = $real_file_path;
        $data['user_email'] = $user_email;
        $data['user_real_name'] =  $user_real_name;
        $data['real_comment'] =  $real_comment;
        $data['else'] =  $else;
        Mail::send('IN.Teacher.CheckResume.sendMail',$data, function ($message) use ($data) {
            $message->from('mikeliu20010106@gmail.com', $data['user_real_name']);    
            $message->to($data['user_email'])->subject('工作應徵');
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
        // $user_id = $request->user_id;
        $Resume_datas = Resume::where('user_id',$id)->get();
        foreach($Resume_datas as $Resume_data ){
            $resume_name = $Resume_data["resume_file_name"];
            echo $resume_name;
        }
        $real_path = public_path()."\storage\upload\\".$resume_name;
        echo $real_path;
        return response()->file($real_path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
