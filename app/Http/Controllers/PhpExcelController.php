<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;

use App\Models\HistoryPair;

use App\Models\Teacher;

use App\Models\Vacancies;

use App\Models\Company;

use App\Models\HistoryVacancies;

class PhpExcelController extends Controller
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

                function getskill($skill_count,$skill,$date = 0){        
                    for($i = 0; $i < count($skill);$i++){
                        $this_year = date('Y');
                        $top_year = $this_year - $date;
                        $top_date = $top_year."-"."12"."-"."31";
                        $last_date = $top_year."-"."1"."-"."1";
                        // echo $top_date;
                        // echo $last_date;

                        $count = HistoryVacancies::where('vacancies_match','已有配對')
                        ->where('vacancies_Skill','LIKE',"%{$skill[$i]}%")
                        ->where('delete_time','<',$top_date)
                        ->where('delete_time','>',$last_date)
                        ->count();
                        echo $count ;
                        array_push($skill_count,$count);
                        
                    }
                    return $skill_count;
                }
                function getpair($date = 0){        
                        $this_year = date('Y');
                        $top_year = $this_year - $date;
                        $top_date = $top_year."-"."12"."-"."31";
                        $last_date = $top_year."-"."1"."-"."1";

                        $pair_count = HistoryPair::
                        where('teacher_confirm','已有配對')
                        ->where('delete_time','<',$top_date)
                        ->where('delete_time','>',$last_date)
                        ->count();
                        echo$pair_count;
                    return $pair_count;
                }
                if ($request->has('choose_date')) {
                    $date = $request->choose_date;
                    $skill = array('React','Javascript','Vue','Angular','Mysql','SqlServer','Php','Laravel','c#','c++','java','python','kotlin');
                    $skill_count = [];
                    $skill_count_data = getskill($skill_count,$skill,$date);
                    $pair_count_data = getpair($date);
                    $skill_count_data= json_encode($skill_count_data); 
                    //1.取user配對情況
                    //2.取user履歷
                    //3.取usert成績單    
                    return view("IN.Teacher.PhpExcel.index",
                        [
                            "skill_count"=>$skill_count_data,
                            "pair_count_data"=>$pair_count_data,
                            'date'          => $date,
                        ]
                    );

                } else {
                    $skill = array('React','Javascript','Vue','Angular','Mysql','SqlServer','Php','Laravel','c#','c++','java','python','kotlin');
                    $skill_count = [];
                    $skill_count_data = getskill($skill_count,$skill,$date = 0);
                    $pair_count_data = getpair($date = 0);
                    // echo $userDatas;
                    // $skill_count_data = json_decode($json,true);
                    $skill_count_data= json_encode($skill_count_data); 
                    // echo $skill_count_data;
                    return view("IN.Teacher.PhpExcel.index",
                        [
                            "skill_count"=>$skill_count_data,
                            "pair_count_data"=>$pair_count_data,
                            'date'          => $date,
                        ]
                    );
                }

                

            } else {
                echo "你不是教師";
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
