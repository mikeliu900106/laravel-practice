<?php

namespace App\Http\Controllers;
use App\Models\Resume;
use Illuminate\Http\Request;

class MailChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($request->session()->has('user_id')) {
            if ($request->session()->get('level') == '1') {
                $user_id = session()->get('user_id');
                return view("Mail.index");
    
            }
            else{
                echo "你不是學生";
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
        $data= $request->all();
        $user_id = session()->get('user_id');
        if( Resume::where("user_id",$user_id)->count()>0){

            $resume_value = Resume::where("user_id",$user_id)->get();
            //$test_value =array(){"user_id":"U2205300001","file_path":"public\/upload\/R2022118000012.pdf","file_name":"R2022118000012.pdf"};
            foreach($resume_value as $key => $value){
                if($key === 0){
                    $first_file_name = $value["file_name"];
                    echo$first_file_name;
                }
                elseif($key === 1){
                    $twice_file_name = $value["file_name"];
                    echo $twice_file_name;
                }
            }
            if(!empty($twice_file_name)){
                $first_path = public_path()."\storage\upload\\".$first_file_name;
                $twice_path = public_path()."\storage\upload\\".$twice_file_name;
                echo $first_path;
                echo$twice_path;
                $data['first_path'] =$first_path;
                $data['twice_path'] =$twice_path;
                echo $resume_value;
                Mail::send('Mail.sendMail',$data, function ($message) use ($data) {
                    $message->from('mikeliu20010106@gmail.com', $data['name']);    
                    $message->to('mikeliu20010106@gmail.com')->subject('工作應徵');
                    $message->attach($data['first_path']);
                    $message->attach($data['twice_path']);

                });
                echo "寄送成功";
            }else{
                $first_path = public_path()."\storage\upload\\".$first_file_name;
                $data['first_path'] =$first_path;
                Mail::send('Mail.sendMail',$data, function ($message) use ($data) {
                    $message->from('mikeliu20010106@gmail.com', $data['name']);    
                    $message->to('mikeliu20010106@gmail.com')->subject('工作應徵');
                    $message->attach($data['first_path']);
                });
                echo "寄送成功";//用'jumpTime'=>2,延遲跳轉業面
            }
            // } 之後改版
            // foreach($resume_value as $key =>$value){
            //     if($key == 1)
            //     $file_name = $value["file_name"];
            //     echo $value;
            // }

            
        }
        else{
            echo "請先上傳履歷";
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
    public function destroy($id)
    {
        //
    }
}
