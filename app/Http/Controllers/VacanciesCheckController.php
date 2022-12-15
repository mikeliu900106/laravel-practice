<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;

use App\Models\HistoryPair;

use App\Models\Teacher;

use App\Models\Vacancies;

use App\Models\Company;

use App\Models\HistoryVacancies;

use Mail;

class VacanciesCheckController extends Controller
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
                //echo $user_id;
                //$Vacancies = Vacancies::where('teacher_watch','通過')->get();正式版本使用
                //echo $Vacancies;
                $Vacancies = Vacancies::join('companybase', 'companybase.company_id', '=', 'vacanciesbase.company_id')
                    // ->where('teacher_watch','!=','通過') 
                    ->select('vacanciesbase.*', 'companybase.*')
                    ->paginate(10);; //之後要改
                return view('IN.Teacher.VacanciesCheck.index', [
                    'user_id'  => $user_id,
                    'Vacancies' => $Vacancies,
                ]);
            } else {
                echo "你不是老師";
                //1. 顯示錯誤2.錯誤controller

            }
        } else {
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
    public function show(Request $request, $id)
    {
        $user_id = session()->get('user_id');
        echo  $user_id;
        $teacherData = Teacher::select('teacher_real_name')->where("teacher_id", $user_id)->get();
        $VacanciesData = Vacancies::where('vacancies_id', $id)->get();
        //echo$VacanciesData;
        foreach ($teacherData as $value) {
            $teacher_real_name = $value['teacher_real_name'];
            //echo $teacher_real_name;
        }
        foreach ($VacanciesData as $value) {
            $vacancies_name = $value['vacancies_name'];
        }
        $data['vacancies_name'] = $vacancies_name;
        $data['isPass'] = "不通過";
        // echo $teacher_real_name;
        Vacancies::where('vacancies_id', $id)
            ->update(
                [
                    'teacher_name'              =>   $teacher_real_name,
                    'teacher_watch'             =>  "不通過",
                ]
            );
        return redirect()->route("VacanciesCheck.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $user_id = session()->get('user_id');
        echo  $user_id;
        $teacherData = Teacher::select('teacher_real_name')->where("teacher_id", $user_id)->get();
        $VacanciesData = Vacancies::where('vacancies_id', $id)->get();
        foreach ($teacherData as $value) {
            $teacher_real_name = $value['teacher_real_name'];
        }
        foreach ($VacanciesData as $value) {
            $vacancies_name = $value['vacancies_name'];
        }
        $data['vacancies_name'] = $vacancies_name;
        $data['isPass'] = "通過";
        //echo $teacher_real_name;
        Vacancies::where('vacancies_id', $id)
            ->update(
                [
                    'teacher_watch'             =>  "通過",
                    'teacher_name'              =>  $teacher_real_name,
                ]
            );
        // Mail::send('IN.Teacher.VacanciesCheck.sendMail',$data, function ($message) use ($data) {
        //     $message->from('mikeliu20010106@gmail.com');    
        //     $message->to('mikeliu20010106@gmail.com')->subject('職位審查:通過');
        // });
        return redirect()->route("VacanciesCheck.index");
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
        $user_id = session()->get('user_id');
        $vacancies_datas = Vacancies::get()->where('teacher_watch', '通過');
        foreach ($vacancies_datas as $vacancies_data) {
            $company_id                =  $vacancies_data["company_id"];
            $vacancies_id              =  $vacancies_data["vacancies_id"];
            $vacancies_name            =  $vacancies_data["vacancies_name"];
            $company_money             =  $vacancies_data["company_money"];
            $company_time              =  $vacancies_data["company_time"];
            $vacancies_county          =  $vacancies_data["vacancies_county"];
            $vacancies_district        =  $vacancies_data["vacancies_district"];
            $vacancies_address         =  $vacancies_data["vacancies_address"];
            $company_content           =  $vacancies_data["company_content"];
            $company_work_experience   =  $vacancies_data["company_work_experience"];
            $vacancies_Skill           =  $vacancies_data["vacancies_Skill"];
            $company_Education         =  $vacancies_data["company_Education"];
            $company_department        =  $vacancies_data["company_department"];
            $company_other             =  $vacancies_data["company_other"];
            $company_safe              =  $vacancies_data["company_safe"];
            $teacher_watch             =  $vacancies_data["teacher_watch"];
            $teacher_name              =  $vacancies_data["teacher_name"];
            $vacancies_match           =  $vacancies_data["vacancies_match"];
            $apply_number              =  $vacancies_data["apply_number"];
        }
        HistoryVacancies::create(
            [
                'delete_time'               =>   Date("Ymd"),
                'company_id'                =>   $company_id,
                'vacancies_id'              =>   $vacancies_id,
                'vacancies_name'            =>   $vacancies_name,
                'company_money'             =>   $company_money,
                'company_time'              =>   $company_time,
                'vacancies_county'          =>   $vacancies_county,
                'vacancies_district'        =>   $vacancies_district,
                'vacancies_address'         =>   $vacancies_address,
                'company_content'           =>   $company_content,
                'company_work_experience'   =>   $company_work_experience,
                'vacancies_Skill'           =>   $vacancies_Skill,
                'company_Education'         =>   $company_Education,
                'company_department'        =>   $company_department,
                'company_other'             =>   $company_other,
                'company_safe'              =>   $company_safe,
                'teacher_watch'             =>   $teacher_watch,
                'teacher_name'              =>   $teacher_name,
                'vacancies_match'           =>   $vacancies_match,
                'apply_number'              =>   $apply_number,
            ]
        );
        $delete_Vacancies = Vacancies::where('vacancies_id', '=', $id)->delete();
        return redirect()->route("VacanciesCheck.index");
    }
}
