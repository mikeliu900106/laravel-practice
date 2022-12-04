<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vacancies;
use App\Models\Company;
use App\Models\Resume;
use App\Models\Student;
use App\Models\Score;
use App\Models\Pair;


class CheckUserController extends Controller
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
                $user_id = session()->get(' user_id');
                //$Vacancies = Vacancies::get();

                if ($request->has('search')) {

                    $search = $request->search;
                    $userDatas = Student::orWhere('user_real_name', 'LIKE', "%{$search}%")
                        ->orWhere('user_name', 'LIKE', "%{$search}%")
                        ->paginate(10);
                    //1.取user配對情況
                    //2.取user履歷
                    //3.取usert成績單    

                } else {
                    $userDatas = Student::paginate(10);
                    // echo $userDatas;
                }

                return view('IN.Teacher.CheckUser.index', [
                    'userDatas' => $userDatas,
                ]);
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
        $delete = Student::where('user_id', '=', $id)->delete();
        return redirect()->route('CheckUser.index');
    }
}
