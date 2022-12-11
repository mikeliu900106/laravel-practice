<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pair;
use App\Models\Teacher;
use App\Models\Vacancies;
use App\Models\Company;

class PairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('user_id')) {
            if ($request->session()->get('level') == '4') {
                $user_id = session()->get('user_id');
                //$Vacancies = Vacancies::get();
                //echo $user_id;
                $pair = Pair::where('user_id',"$user_id")->count();
                $Teacher_name =Teacher::select('teacher_real_name')->get();
                $Vacancies_datas =$Vacancies = Vacancies::join('company','company.company_id','=','vacancies.company_id')
                ->select('vacancies.*', 'company.*')
                ->get();
                $Pair_data = Pair::where('user_id',"$user_id")->get();
                if($pair == 0){
                    return view('IN.Student.Pair.index',
                    [
                        'Teacher_names' =>$Teacher_name,
                        'Vacancies_datas' =>$Vacancies_datas,
                    ]);
                }else{
                    return view('IN.Student.Pair.show',[
                        'Pairs' => $Pair_data,
                    ]);
                }

               //之後下面要改

            }
            elseif($request->session()->get('level') == '1'){
                echo "請等老師認證為本人,此功能開放";
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
    public function create(Request $request)
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
        $user_id = session()->get('user_id');
        echo $user_id;
        $validata = $request -> validate([
            'choose_vacancies_name' => 'required|string',
            'choose_teacher' => 'required|string',
            'start_tme' => 'required',
            'end_tme' => 'required',
        ]);
        $Pair_insert = Pair::create(
            [
                'user_id'       => $user_id,
                'teacher_name'  => $validata['choose_teacher'],
                'company_name'  => $validata['choose_company'],
                'start_time'    => $validata['start_tme'],
                'end_time'      => $validata['end_tme'],
            ]
        );
        return redirect()->route("Pair.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Teacher_name =Teacher::select('teacher_real_name')->get();
        $Company_name =Company::select('company_name')->get();
        echo   $Company_name;
        return view('IN.Student.Pair.edit',
                    [
                        'id'=>$id,
                        'Teacher_names' =>$Teacher_name,
                        'Company_names' =>$Company_name,
                    ]);
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
        $validata = $request -> validate([
            'choose_company' => 'required|string',
            'choose_teacher' => 'required|string',
            'start_tme' => 'required',
            'end_tme' => 'required',
        ]);
        Pair::where('user_id', $id)
        ->update(
        [
            'teacher_name'  => $validata['choose_teacher'],
            'company_name'  => $validata['choose_company'],
            'start_time'    => $validata['start_tme'],
            'end_time'      => $validata['end_tme'],
            
        ]);
        $Pair_data = Pair::where('user_id',$id)->get();
        return redirect()->route("Pair.index");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delete_pair = Pair::where('user_id', '=', $id)->delete();
        return redirect()->route("Pair.index");
    }

}
