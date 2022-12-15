<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pair;

use App\Models\HistoryPair;

use App\Models\Teacher;

use App\Models\Vacancies;

use App\Models\Company;

use App\Models\HistoryVacancies;


class CompanyPairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = session()->get('user_id');
        echo $user_id;
        $pair_datas =$Vacancies = Vacancies::Join('companybase','companybase.company_id','=','vacanciesbase.company_id')
                    ->Join('pairbase','pairbase.vacancies_id','=','vacanciesbase.vacancies_id')
                    ->select('vacanciesbase.vacancies_id','vacanciesbase.vacancies_name', 'companybase.company_name','companybase.company_id','pairbase.*')
                    ->where('companybase.company_id',$user_id)
                    ->get();
                    echo  $pair_datas;
        return view("IN.Company.CompanyPair.index",
        [
            'pair_datas' => $pair_datas,
        ]
        );
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
    public function edit($id,Request $request)
    {
        $user_id = session()->get('user_id');
        $company_name = Company::select("company_name")->where('company_id',$user_id)->get();

        foreach($company_name as $value){
            $company_name = $value['company_name'];
        }
        Pair::where("vacancies_id",$id)->update([
            'teacher_confirm' => '已有配對',
            'teacher_name' => $company_name,
        ]);
        Vacancies::where("vacancies_id",$id)->update([
            'vacancies_match' => '已有配對',
        ]);
        $vacancies_datas = Vacancies::where("vacancies_id",$id)->get();

        // Vacancies::where("vacancies_id",$id)->delete();
    

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
        echo $vacancies_Skill ;
        echo $company_money;
        echo$apply_number ;
        
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
    public function destroy(Request $request,$id)
    {
        $vacancies_id = $request->vacancies_id;
        Pair::where("vacancies_id",$vacancies_id)->where('user_id',$id)->delete();
        $pair_datas = Pair::where("vacancies_id",$vacancies_id)->where('user_id',$id)->get();
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
                'start_time'  =>$start_time,
                'end_time'    => $end_time,
                'teacher_confirm' => $teacher_confirm,
                'teacher_name'   => $teacher_name,
            ]

        );
        return redirect()->route("CompanyPair.index");
     

    }
}
