<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

use App\Models\Login;
use Mail;

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
        function get_student_id()
        {
            $today = date("Ynj");
            $nums = Student::count();
            // echo $nums;
            $id = "U" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $user_id = get_student_id();
        $student_datas = $request->validate([
            'username' => 'required|string',
            'real_name' => 'required|string',
            'student_id' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email',
        ]);
        // echo  $student_datas['username'];
        // echo  $student_datas['password'];
        // echo  $student_datas['email'];
        $random = codestr();
        $Student_username_isUse = Student::where('user_name',  $student_datas['username'])->count();
        if ($Student_username_isUse == 0) {

            $student_datas["random"] = $random;
            $student_datas["user_id"] = $user_id;
            $student_datas["real_name"] = $student_datas['real_name'];
            foreach ($student_datas as $value) {
                // echo $value;
            }

            // echo $student_datas;


            //學長解釋trycatch 使用
            Mail::send('IN.Student.sendMail', $student_datas, function ($message) use ($student_datas) {
                $message->from('mikeliu20010106@gmail.com');
                $message->to($student_datas['email'])->subject('email認證');
            });

            return view(
                "IN.Student.register",
                [
                    "random" => $random,
                    "user_id" => $user_id,
                    'student_datas' => $student_datas
                ]
            );
        } else {
            echo "帳號被使用";
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
        // echo $value["user_id"];
        if ($value["random"] === $value["input_random"]) {
            // echo '登入成功';
            $Student_insert = Student::create(
                [
                    'user_create_time' => date("ymd"),
                    'user_id'       =>  $value["user_id"],
                    'student_id'       =>  $value["student_id"],
                    'user_name'     =>  $value["username"],
                    'user_real_name'     =>  $value["real_name"],
                    'user_password' =>  $value["password"],
                    'user_email'    =>  $value["email"],
                    'user_level'         =>  "1",
                ]
            );
            Login::create(
                [
                    'id'            => $value["user_id"],
                    'username'      =>  $value["username"],
                    'password'      =>  $value["password"],
                    'level'                 =>  "1",
                ]
            );
            return view("index");
        } else {
            echo "驗證碼出錯";
        }
    }
}
