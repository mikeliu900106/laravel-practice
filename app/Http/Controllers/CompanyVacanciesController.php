<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancies;

class CompanyVacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('user_id')) {
            if ($request->session()->get('level') == '3') {
                $user_id = session()->get('user_id');
                echo $user_id;
                //$Vacancies = Vacancies::where('teacher_watch','通過')->get();正式版本使用
                //echo $Vacancies;
                $Vacancies = Vacancies::get()->where('company_id', '=', $user_id); //之後要改
                return view('IN.Company.CompanyVacancies.index', [
                    'user_id'  => $user_id,
                    'Vacancies' => $Vacancies,
                ]);
            } else {
                echo "你不是公司";
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
        return view('IN.Company.CompanyVacancies.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = session()->get('user_id');
        $type = $request->input('sql_type');

        echo $type;
        function get_Vacancies_id()
        {
            $today = date("Ynj");
            $nums = Vacancies::count();
            echo $nums;
            $id = "V" . (($today * 100000) + ($nums + 1));
            return $id;
        }
        $Vacancies_id = get_Vacancies_id();
        $request_value = $request->validate([
            'vacancies_name'            => 'required|string',
            'company_money'             => 'required|string',
            'company_time'              => 'required|string',
            'vacancies_place'           => 'required|string',
            'company_content'           => 'required|string',
            'company_department'        => 'required|string',
            'vacancies_Skill'           => 'required',
            'company_Education'         => 'required|string',
            'company_work_experience'   => 'required|string',
            'company_other'             => 'required|string',
            'company_safe'              => 'required|string',
        ]);
        $vacancies_Skill = $request_value["vacancies_Skill"];
        $vacancies_Skill =implode(" 、 ",$vacancies_Skill);
        

      
        Vacancies::create(
            [
                'company_id'                =>  $user_id,
                'vacancies_id'              =>  $Vacancies_id,
                'vacancies_name'            =>  $request_value['vacancies_name'],
                'company_money'             =>  $request_value['company_money'],
                'company_time'              =>  $request_value['company_time'],
                'vacancies_place'           =>  $request_value['vacancies_place'],
                'company_content'           =>  $request_value['company_content'],
                'company_work_experience'   =>  $request_value['company_work_experience'],
                'vacancies_Skill'           =>  $vacancies_Skill,
                'company_Education'         =>  $request_value['company_Education'],
                'company_department'        =>  $request_value['company_department'],
                'company_other'             =>  $request_value['company_other'],
                'company_safe'              =>  $request_value['company_safe'],
                'teacher_watch'             =>  "待檢查",
                'teacher_name'              =>  "無人檢查",
            ]
        );
        $Vacancies = Vacancies::get()->where('company_id', '=', $user_id);
        return redirect()->route("CompanyVacancies.index");
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
        return view("IN.Company.CompanyVacancies.update", ["user_id" => $id]);
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
        $request_value = $request->validate([
            'vacancies_name'            => 'required|string',
            'company_money'             => 'required|string',
            'company_time'              => 'required|string',
            'vacancies_place'           => 'required|string',
            'company_content'           => 'required|string',
            'company_department'        => 'required|string',
            'vacancies_Skill'           => 'required',
            'company_Education'         => 'required|string',
            'company_work_experience'   => 'required|string',
            'company_other'             => 'required|string',
            'company_safe'              => 'required|string',
        ]);
        Vacancies::where('vacancies_id', $id)
            ->update(
                [
                    'vacancies_name'            =>  $request_value['vacancies_name'],
                    'company_money'             =>  $request_value['company_money'],
                    'company_time'              =>  $request_value['company_time'],
                    'vacancies_place'           =>  $request_value['vacancies_place'],
                    'company_content'           =>  $request_value['company_content'],
                    'company_work_experience'   =>  $request_value['company_work_experience'],
                    'vacancies_Skill'           =>  $vacancies_Skill,
                    'company_Education'         =>  $request_value['company_Education'],
                    'company_department'        =>  $request_value['company_department'],
                    'company_other'             =>  $request_value['company_other'],
                    'company_safe'              =>  $request_value['company_safe'],
                    'teacher_watch'             =>  "待檢查",
                    'teacher_name'              =>  "無人檢查",
                ]
            );
        $user_id = session()->get('user_id');
        echo $user_id;
        $Vacancies = Vacancies::get()->where('company_id', '=', $user_id); //之後要改
        return redirect()->route("CompanyVacancies.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
        $delete_Vacancies = Vacancies::where('vacancies_id', '=', $id)->delete();
        $user_id = session()->get('user_id');
        return redirect()->route("CompanyVacancies.index");
    }
}
