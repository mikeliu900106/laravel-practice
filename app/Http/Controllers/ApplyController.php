<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vacancies;
use App\Models\Company;
use App\Models\Resume;
use App\Models\Student;
use Mail;

use Session;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->session()->has('user_id')) {
            if ($request->session()->get('level') == '1') {
                $user_id = session()->get('user_id');
                //$Vacancies = Vacancies::get();
                echo $user_id;
                if ($request->has('search')) {
                    $search = $request->search;
                    $Vacancies = Vacancies::join('company','company.company_id','=','vacancies.company_id')
                    ->select('vacancies.*', 'company.*')
                    ->orWhere('vacancies_name', 'LIKE', "%{$search}%")
                    ->orWhere('company_money', 'LIKE', "%{$search}%")
                    ->orWhere('company_content', 'LIKE', "%{$search}%")
                    ->orWhere('company_name', 'LIKE', "%{$search}%")
                    ->where('teacher_watch','通過')
                    ->get();
                    echo $Vacancies;
                }else{
                    $Vacancies = Vacancies::join('company','company.company_id','=','vacancies.company_id')
                    ->select('vacancies.*', 'company.*')
                    ->where('teacher_watch','通過')
                    ->get();
                    echo $Vacancies;
                }

                return view('IN.student.Apply.index',[
                    'Vacancies'=> $Vacancies,
                    'user_id'  => $user_id,
                ]);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $Vacancies = Vacancies::join('company','company.company_id','=','vacancies.company_id')
                ->select('vacancies.*', 'company.*')
                ->where('vacancies_id',$id)
                ->where('teacher_watch','通過')
                ->get();
        $user_id = session()->get('user_id');
        return view('IN.student.Apply.show',[
                    'Vacancies'=> $Vacancies,
                    'user_id'  => $user_id,
                ]);
        echo $Vacancies;
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
        echo  $id;
        $company_email  = $request->company_email;
        echo $company_email;
        $user_id = session()->get('user_id');
        $is_use_resume = Resume::where("user_id",$user_id)->count();
        $resume_value = Resume::where("user_id",$user_id)->get();
        $user_real_name = Student::select("user_real_name")->where("user_id",$user_id)->get();
        foreach($user_real_name as $value){
            $real_name = $value["user_real_name"];
            echo $real_name;
        }
        if(!$is_use_resume == 0){
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
                $data['company_email'] =$company_email;
                $data['real_name'] =$real_name;
                echo $resume_value;
                Mail::send('Mail.sendMail',$data, function ($message) use ($data) {
                    $message->from('mikeliu20010106@gmail.com', $data['real_name']);    
                    $message->to($data['company_email'])->subject('工作應徵');
                    $message->attach($data['first_path']);
                    $message->attach($data['twice_path']);

                });
                echo "寄送成功";
            }else{
                $first_path = public_path()."\storage\upload\\".$first_file_name;
                $data['first_path'] =$first_path;
                $data['company_email'] =$company_email;
                $data['real_name'] =$real_name;
                Mail::send('Mail.sendMail',$data, function ($message) use ($data) {
                    $message->from('mikeliu20010106@gmail.com', $data['real_name']);    
                    $message->to($data['company_email'])->subject('工作應徵');
                    $message->attach($data['first_path']);
                });
                echo "寄送成功";//用'jumpTime'=>2,延遲跳轉業面
            }
        }else{
            echo "沒填寫過履歷";
            return view("File.index");
        }
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
