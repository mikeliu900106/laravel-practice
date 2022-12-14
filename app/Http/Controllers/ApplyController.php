<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vacancies;
use App\Models\Company;
use App\Models\Resume;
use App\Models\Student;
use App\Models\Score;
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
            if ($request->session()->get('level') == '4' ||$request->session()->get('level') == '1') {
                $user_id = session()->get('user_id');
                //$Vacancies = Vacancies::get();
                // echo $user_id;
                if ($request->has('search')) {
                    $search = $request->search;
                    $Vacancies = Vacancies::join('company','company.company_id','vacancies.company_id')
                    ->select('vacanciesbase.*', 'companybase.*')
                    ->orWhere('vacancies_name', 'LIKE', "%{$search}%")
                    ->orWhere('company_money', 'LIKE', "%{$search}%")
                    ->orWhere('company_content', 'LIKE', "%{$search}%")
                    ->orWhere('company_name', 'LIKE', "%{$search}%")
                    ->orWhere('vacancies_Skill', 'LIKE', "%{$search}%")
                    ->orWhere('vacancies_district', 'LIKE', "%{$search}%")
                    ->orWhere('vacancies_county', 'LIKE', "%{$search}%")
                    ->orWhere('vacancies_address', 'LIKE', "%{$search}%")
                    ->where('teacher_watch','通過')
                    ->where('vacancies_match','並無配對')
                    ->paginate(10);
                    // echo $Vacancies;
                    return view('IN.student.Apply.index',[
                        'Vacancies'=> $Vacancies,
                        'user_id'  => $user_id,
                    ]);
                }else{
                    $Vacancies = Vacancies::join('companybase','companybase.company_id','=','vacanciesbase.company_id')
                    ->select('vacanciesbase.*', 'companybase.*')
                    ->where('teacher_watch','通過')
                    ->where('vacancies_match','並無配對')
                    ->paginate(10);
                    // echo $Vacancies;
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
        $user_id = session()->get('user_id');
        $isUseResume = Resume::where("user_id",$user_id)->count();

        if($isUseResume != 0){
            $Vacancies = Vacancies::join('companybase','companybase.company_id','=','vacanciesbase.company_id')
                    ->select('vacanciesbase.*', 'companybase.*')
                    ->where('vacancies_id',$id)
                    ->where('teacher_watch','通過')
                    ->where('vacancies_match','並無配對')
                    ->get();
            $user_id = session()->get('user_id');
            return view('IN.student.Apply.show',[
                        'Vacancies'=> $Vacancies,
                        'user_id'  => $user_id,
                    ]);
        }
        else{
            echo "你沒上傳履歷";
        }
        // echo $Vacancies;
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
        // echo  $id;
        $company_email  = $request->company_email;
        // echo $company_email;
        $user_id = session()->get('user_id');
        $isUseResume = Resume::where("user_id",$user_id)->count();
        $isUseScore = Score::where("user_id",$user_id)->count();
        $ResumeData = Resume::where("user_id",$user_id)->get();
        $ScoreData = Score::where("user_id",$user_id)->get();
        $userData = Student::where("user_id",$user_id)->get();
        //$data = $request -> all();
        if($isUseResume != 0){
            if($isUseScore!=0){
                
                foreach($userData as $value){
                    $real_name = $value["user_real_name"];
                    $user_email = $value["user_email"];
                }
                foreach($ResumeData as $ResumeValue){
                    $ResumeName = $ResumeValue["resume_file_name"];
                }
                foreach($ScoreData as $ScoreValue){
                    $ScoreName = $ScoreValue["score_file_name"];
                }
                $ResumePath = public_path()."/storage/upload/".$ResumeName;
                $ScorePath = public_path()."/storage/upload/".$ScoreName;
                $data['ResumePath'] =$ResumePath;
                $data['ScorePath'] = $ScorePath;
                $data['company_email'] =$company_email;
                $data['real_name'] =$real_name; 
                $data["user_email"] =$user_email;         
                Mail::send('Mail.sendMail',$data, function ($message) use ($data) {
                    $message->from('mikeliu20010106@gmail.com', $data['real_name']);    
                    $message->to($data['company_email'])->subject('工作應徵');
                    $message->attach($data['ResumePath']);
                    $message->attach($data['ScorePath']);

                });
                $apply_number = Vacancies::where("vacancies_id",$id)->select('apply_number')->get();
                foreach($apply_number as $value){
                    $apply_number = $value["apply_number"] + 1;
                }

                Vacancies::where("vacancies_id",$id)->update(
                    [
                        'apply_number' => $apply_number,
                    ]
                );
                echo "寄送成功";
            }
            else
            {
            
                foreach($ResumeData as $ResumeValue){
                    $ResumeName = $ResumeValue["resume_file_name"];
                }
                foreach($userData as $value){
                    $real_name = $value["user_real_name"];
                    $user_email = $value["user_email"];
                }

                $ResumePath = public_path()."/storage/upload/".$ResumeName;
                $data['ResumePath'] =$ResumePath;
                $data['company_email'] =$company_email;
                $data['real_name'] =$real_name;
                $data["user_email"] =$user_email; 
                Mail::send('Mail.sendMail',$data, function ($message) use ($data) {
                    $message->from('mikeliu20010106@gmail.com', $data['real_name']);    
                    $message->to($data['company_email'])->subject('工作應徵');
                    $message->attach($data['ResumePath']);
                });
                $apply_number = Vacancies::where("vacancies_id",$id)->select('apply_number')->get();
                foreach($apply_number as $value){
                    $apply_number = $value["apply_number"] + 1;
                }

                Vacancies::where("vacancies_id",$id)->update(
                    [
                        'apply_number' => $apply_number,
                    ]
                );
                // echo "寄送成功";//用'jumpTime'=>2,延遲跳轉業面
                return redirect()-> route('Apply.index');
            }
        }   
        else
        {
            echo "沒填寫過履歷";
            return view("Resume.index");
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
