<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('In.Student.index');
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
        
        function get_student_id(){
            $today = date("Ynj");
            $nums = Student::count();
            echo $nums;
            $id = "U" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $student_id = get_student_id();
        $student_data = $request -> validate([
            'username' => 'required|string',
            'real_name' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email',
            
        ]);
        echo  $student_data['username'];
        echo  $student_data['password'];
        echo  $student_data['email'];
        $Student_username_isUse = Student::where('user_name',  $student_data['username'])->count();
        if($Student_username_isUse == 0){
            $Student_insert = Student::create(
                [
                    'user_id'       =>  $student_id,
                    'user_real_name'     =>  $student_data['real_name'],
                    'user_name'     =>  $student_data['username'],
                    'user_password' =>  $student_data['password'],
                    'user_email'    =>  $student_data['email'],
                    'user_level'         =>  "1",
                ]
            );
            $random = codestr();
            //echo $random;
            $student_data["random"] = $random;
            //echo $Company_data["random"] = $random;

            //學長解釋trycatch 使用
            Mail::send('IN.Student.sendMail',$student_data, function ($message) use ($student_data) {
                $message->from('mikeliu20010106@gmail.com');    
                $message->to($student_data['email'])->subject('email認證');
            });

            return view("IN.Student.register",
            [
                "random" =>$random,
                "student_id"=>$student_id,
            ]);
        }
        else{
            //error
        }
        
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
    public function destroy(Request $request,$id)
    {
        $value = $request->all();
        echo $value["random"];
        echo $value["input_random"];
        if($value["random"] === $value["input_random"]){
            echo '登入成功';
            return view("index")->with([
                //跳轉信息正確controller
            //'message'=>'你已經成功註冊！',
            'jumpTime'=>5,
        ]);
        }
        else{
            $delete = Student::where('user_id', '=', $id)->delete();
        }
    }
}
