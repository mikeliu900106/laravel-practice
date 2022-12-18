<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
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
        function codestr()
        {
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
        function get_teacher_id()
        {
            $today = date("Ynj");
            $nums = Teacher::count();
            $id = "T" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $teacher_id = get_teacher_id();
        $teacherdatas = $request->validate([
            'teacher_username'  => 'required|string',
            'teacher_password'  => 'required|string',
            'teacher_real_name' => 'required|string|max:8',
            'teacher_email'     => 'required|email',
        ]);
        $teacher_username_isUse = Teacher::where('teacher_username', $teacherdatas['teacher_username'])->count();
        if ($teacher_username_isUse == 0) {
            $random = codestr();
            //echo $random;
            $teacherdatas["random"] = $random;
            $teacherdatas["teacher_id"] = $teacher_id;
            $teacherdatas["teacher_real_name"] = $teacherdatas['teacher_real_name'];
            //echo $teacherdata["random"] = $random;

            //學長解釋trycatch 使用
            Mail::send('IN.Teacher.sendMail', $teacherdatas, function ($message) use ($teacherdatas) {
                $message->from('mikeliu20010106@gmail.com');
                $message->to($teacherdatas['teacher_email'])->subject('email認證');
            });
            return view(
                "IN.Teacher.register",
                [
                    "random" => $random,
                    "teacher_id" => $teacher_id,
                    'teacherdatas' => $teacherdatas,
                ]
            );
        } else {
           echo "帳號民稱已被使用";
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
    public function destroy(Request $request, $id)
    {
        $value = $request->all();
        // echo $value["random"];
        // echo $value["input_random"];
        if ($value["random"] === $value["input_random"]) {
            $Teacher_insert = Teacher::create([
                'teacher_id'        => $value["teacher_id"],
                'teacher_username'  => $value["teacher_username"],
                'teacher_password'  => $value["teacher_password"],
                'teacher_real_name' => $value["teacher_real_name"],
                'teacher_email'     => $value["teacher_email"],
                'teacher_level'     => '2',
            ]);
            Login::create(
                [
                    'id'            =>  $value["teacher_id"],
                    'username'      =>  $value["teacher_username"],
                    'password'      =>  $value["teacher_password"],
                    'level'                 =>  "2",
                ]
            );
            return view("index");
        } else {
            echo "驗證碼錯誤";
        }
    }
}
