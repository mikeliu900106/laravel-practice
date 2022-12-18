<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;
use App\Models\Vacancies;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\HistoryPair;
use App\Models\HistoryVacancies;
class CheckPairController extends Controller
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
                $user_id = $request-> user_id;
                if(Pair::where('user_id',$user_id)->count() >= 0){
                    $teacher_id = session()->get("user_id");

                    // echo $user_id;
                    $pair_datas =Pair::where('pairbase.user_id',$user_id)
                    ->get();
                    // echo $pair_datas;
                    $student_name = Student::where('user_id',$user_id)->select("user_real_name")->get();
                    return view('IN.Teacher.CheckPair.show',[
                            'Pairs' => $pair_datas,
                            "student_name"=> $student_name,
                    ]);
                }
                else{
                    echo "沒有配對";
                }

            }
            else{
                echo "你不是教師";
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
    public function show($id)
    {
        $pairDatas = Pair::where('user_id',$id)->get();
        return view("IN.Teacher.CheckPair.show",
        [
            'pairDatas' => $pairDatas,
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = session()->get('user_id');//老師
        $Teacher_name =Teacher::select("teacher_real_name")->where('teacher_id',$user_id)->get();

        foreach($Teacher_name as $value){
            $Teacher_name = $value['teacher_real_name'];
        }
        Pair::where("vacancies_id",$id)->update([
            'teacher_confirm' => '已有配對',
            'teacher_name' => $Teacher_name,
        ]);
        Vacancies::where("vacancies_id",$id)->update([
            'vacancies_match' => '已有配對',
        ]);
        $vacancies_datas = Vacancies::where("vacancies_id",$id)->get();

        Vacancies::where("vacancies_id",$id)->delete();
    

        foreach($vacancies_datas as $vacancies_data){
            $company_id                =  $vacancies_data["company_id"]                ;
            $vacancies_id              =  $vacancies_data["vacancies_id"]              ;
            $vacancies_name            =  $vacancies_data["vacancies_name"]            ;
            $company_money             =  $vacancies_data["company_money"]             ;
            $company_time              =  $vacancies_data["company_time"]              ;
            $vacancies_county          =  $vacancies_data["vacancies_county"]          ;
            $vacancies_district        =  $vacancies_data["vacancies_district"]        ;
            $vacancies_address         =  $vacancies_data["vacancies_address"]         ;
            $company_content           =  $vacancies_data["company_content"]           ;
            $company_work_experience   =  $vacancies_data["company_work_experience"]   ;
            $vacancies_Skill           =  $vacancies_data["vacancies_Skill"]           ;
            $company_Education         =  $vacancies_data["company_Education"]         ;
            $company_department        =  $vacancies_data["company_department"]        ;
            $company_other             =  $vacancies_data["company_other"]             ;
            $company_safe              =  $vacancies_data["company_safe"]              ;
            $teacher_watch             =  $vacancies_data["teacher_watch"]             ;
            $teacher_name              =  $vacancies_data["teacher_name"]              ;
            $vacancies_match           =  $vacancies_data["vacancies_match"]           ;
            $apply_number              =  $vacancies_data["apply_number"]              ;            
        }
        // echo $vacancies_Skill ;
        // echo $company_money;
        // echo$apply_number ;
        
        HistoryVacancies::create(
            [
                "delete_time"               =>   Date("Ymd")            ,      
                'company_id'                =>   $company_id               ,
                'vacancies_id'              =>   $vacancies_id             ,
                'vacancies_name'            =>   $vacancies_name           ,
                'company_money'             =>   $company_money            ,
                'company_time'              =>   $company_time             ,
                'vacancies_county'          =>   $vacancies_county         ,
                'vacancies_district'        =>   $vacancies_district       ,
                'vacancies_address'         =>   $vacancies_address        ,
                'company_content'           =>   $company_content          ,
                'company_work_experience'   =>   $company_work_experience  ,
                'vacancies_Skill'           =>   $vacancies_Skill          ,
                'company_Education'         =>   $company_Education        ,
                'company_department'        =>   $company_department       ,
                'company_other'             =>   $company_other            ,
                'company_safe'              =>   $company_safe             ,
                'teacher_watch'             =>   $teacher_watch            ,
                'teacher_name'              =>   $teacher_name             ,
                'vacancies_match'           =>   $vacancies_match          ,
                'apply_number'              =>   $apply_number             ,             
            ]
        );
        return redirect()->route("CheckPair.index");
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
        $vacancies_id = $request->vacancies_id;
    //    echo $vacancies_id;
    //    echo $id;
        $pair_datas = Pair::where("vacancies_id",$vacancies_id)->where('user_id',$id)->get();
        // echo $pair_datas ;
        foreach($pair_datas as $pair_data){
            $start_time = $pair_data["start_time"];
            $end_time = $pair_data["end_time"];
            $teacher_confirm = $pair_data["teacher_confirm"];
            $teacher_name = $pair_data["teacher_name"];
        }
        HistoryPair::where("vacancies_id",$vacancies_id)->where('user_id',$id)->create(
            [
                'delete_time' => Date("Ymd"),
                'user_id'     => $id ,
                'vacancies_id' => $vacancies_id,
                'start_time'  =>  $start_time,
                'end_time'    => $end_time,
                'teacher_confirm' => $teacher_confirm,
                'teacher_name'   => $teacher_name,
            ]

        );
        Pair::where("vacancies_id",$vacancies_id)->where('user_id',$id)->delete();
        return redirect()->route("CheckPair.index");
    }
}
