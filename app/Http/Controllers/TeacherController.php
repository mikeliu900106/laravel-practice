<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;
use Mail;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('In.Teacher.index');
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
            function codestr(){
                $arr = array_merge(range('a', 'b'), range('A', 'B'), range('0', '9'));
                shuffle($arr);
                $arr = array_flip($arr);
                $arr = array_rand($arr, 6);
                $res = '';
                foreach ($arr as $v) {
                    $res .= $v;
                }
                return $res;
            }
            function get_teacher_id(){
                $today = date("Ynj");
                $nums = Teacher::count();
                $id = "T" . (($today * 10000) + ($nums + 1));
                return $id;
            }
            $teacher_id = get_teacher_id();
            $teacherdata = $request -> validate([
                'teacher_username'  => 'required|string',
                'teacher_password'  => 'required|string',
                'teacher_real_name' => 'required|string|max:8',
                'teacher_email'     => 'required|email',
            ]);
            $teacher_username_isUse = Teacher::where('teacher_username', $teacherdata['teacher_username'])->count();
            if($teacher_username_isUse == 0){
                $Teacher_insert = Teacher::create([
                    'teacher_id'        => $teacher_id,
                    'teacher_username'  => $teacherdata['teacher_username'],
                    'teacher_password'  => $teacherdata['teacher_password'],
                    'teacher_real_name' => $teacherdata['teacher_real_name'],
                    'teacher_email'     => $teacherdata['teacher_email'],
                    'teacher_level'     => '2',
                ]);
                $random = codestr();
                //echo $random;
                $teacherdata["random"] = $random;
                //echo $teacherdata["random"] = $random;

                //學長解釋trycatch 使用
                Mail::send('IN.Teacher.sendMail',$teacherdata, function ($message) use ($teacherdata) {
                    $message->from('mikeliu20010106@gmail.com');    
                    $message->to($teacherdata['teacher_email'])->subject('email認證');
                });
                return view("IN.Teacher.register",
                [
                    "random" =>$random,
                    "teacher_id"=>$teacher_id,
                ]);
            }
            else{
                //errorcontroller
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
            $delete = Teacher::where('teacher_id', '=', $id)->delete();
            Login::where('id', '=', $id)->delete();
        }
    }
}
