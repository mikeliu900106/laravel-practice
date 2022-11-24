<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancies;
use App\Models\Teacher;
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
                echo $user_id;
                //$Vacancies = Vacancies::where('teacher_watch','通過')->get();正式版本使用
                //echo $Vacancies;
                $Vacancies = Vacancies::get()->where('teacher_watch','!=','通過');//之後要改
                return view('IN.Teacher.VacanciesCheck.index',[
                    'user_id'  => $user_id,
                    'Vacancies'=> $Vacancies,
                ]);
            }
            else{
                echo "你不是老師";
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
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
        echo  $user_id; 
        $teacherData = Teacher::select('teacher_real_name')->where("teacher_id",'T2022530000')->get();
        $VacanciesData = Vacancies::where('vacancies_id', $id)->get();
        foreach($teacherData as $value){
            $teacher_real_name = $value['teacher_real_name'];
        }
        foreach($VacanciesData as $value){
            $vacancies_name = $value['vacancies_name'];
        }
        $data['vacancies_name'] = $vacancies_name;
        $data['isPass'] = "通過";
        echo $teacher_real_name;
        Vacancies::where('vacancies_id', $id)
            ->update(
                [
                    'teacher_watch'             =>  "通過",
                    'teacher_name'              =>  $teacher_real_name,
                ]   
            );
            Mail::send('VacanciesCheck.sendMail',$data, function ($message) use ($data) {
                $message->from('mikeliu20010106@gmail.com');    
                $message->to('mikeliu20010106@gmail.com')->subject('職位審查:通過');
            });

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
        $user_id = session()->get('user_id');
        echo  $user_id; 
        $teacherData = Teacher::select('teacher_real_name')->where("teacher_id",'T2022530000')->get();
        $VacanciesData = Vacancies::where('vacancies_id', $id)->get();
        foreach($teacherData as $value){
            $teacher_real_name = $value['teacher_real_name'];
        }
        foreach($VacanciesData as $value){
            $vacancies_name = $value['vacancies_name'];
        }
        $data['vacancies_name'] = $vacancies_name;
        $data['isPass'] = "不通過";
        echo $teacher_real_name;
        Vacancies::where('vacancies_id', $id)
            ->update(
                [
                    'teacher_watch'             =>  "不通過",
                    'teacher_name'              =>  $teacher_real_name,
                ]   
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_Vacancies = Vacancies::where('vacancies_id', '=', $id)->delete();
        $user_id = session()->get('user_id');
        $Vacancies = Vacancies::get()->where('teacher_watch','!=','通過');
            return view('IN.company.Vacancies.show',[
                'user_id'  => $user_id,
                'Vacancies'=> $Vacancies,
            ]);
    }
}
