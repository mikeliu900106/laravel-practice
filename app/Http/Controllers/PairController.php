<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pair;
use App\Models\HistoryPair;
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
                // echo $user_id;
                $pair = Pair::where('user_id', "$user_id")->count();
                $Teacher_name = Teacher::select('teacher_real_name')->get();
                $Vacancies_datas = Vacancies::join('companybase', 'companybase.company_id', '=', 'vacanciesbase.company_id')
                    ->select('vacanciesbase.*', 'companybase.*')
                    ->where("vacanciesbase.teacher_watch", "通過")
                    ->where('vacancies_match', '並無配對')
                    ->get();
                $Pair_data = Pair::where('user_id', "$user_id")->get();
                if ($pair == 0) {
                    return view(
                        'IN.Student.Pair.index',
                        [
                            'Teacher_names' => $Teacher_name,
                            'Vacancies_datas' => $Vacancies_datas,
                        ]
                    );
                } else {
                    $Pair_Vacancies_id = Pair::select('vacancies_id')->where('user_id', $user_id)->get();
                    foreach ($Pair_Vacancies_id as $value) {
                        $Pair_Vacancies_id = $value['vacancies_id'];
                    }
                    // echo $Pair_Vacancies_id;
                    $pair_datas  = Vacancies::leftJoin('companybase', 'companybase.company_id', '=', 'vacanciesbase.company_id')
                        ->leftJoin('pairbase', 'pairbase.vacancies_id', '=', 'vacanciesbase.vacancies_id')
                        ->select('vacanciesbase.*', 'companybase.*', 'pairbase.*')
                        ->where('vacanciesbase.vacancies_id', $Pair_Vacancies_id)
                        ->where("vacanciesbase.teacher_watch", "通過")
                        ->get();
                    // echo $Vacancies_datas;
                    return view('IN.Student.Pair.show', [
                        'pair_datas' => $pair_datas,
                    ]);
                }
                //之後下面要改
            } elseif ($request->session()->get('level') == '1') {
                echo "請等老師認證為本人,此功能開放";
            } else {
                echo "你不是學生";
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
        // echo $user_id;
        $validata = $request->validate([
            'choose_vacancies_id' => 'required|string',
            'start_tme' => 'required',
            'end_tme' => 'required',
        ]);
        $Pair_insert = Pair::create(
            [
                'user_id'       => $user_id,
                'vacancies_id'  => $validata['choose_vacancies_id'],
                'start_time'    => $validata['start_tme'],
                'end_time'      => $validata['end_tme'],
                'teacher_confirm' => '尚未確認',
                'teacher_name'   => '暫無確認',
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
    public function edit(Request $request, $id)
    {
        $vacancies_id = $request->vacancies_id;
        $Teacher_name = Teacher::select('teacher_real_name')->get();
        $Vacancies_datas = Vacancies::Join('companybase', 'companybase.company_id', '=', 'vacanciesbase.company_id')
            ->select('vacanciesbase.*', 'companybase.*')
            ->where("vacanciesbase.teacher_watch", "通過")
            ->get();
        // echo $Vacancies_datas;
        return view(
            'IN.Student.Pair.edit',
            [
                'id' => $vacancies_id,
                'Vacancies_datas' => $Vacancies_datas
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
        $user_id = session()->get('user_id');
        $validata = $request->validate([
            'choose_vacancies_id' => 'required',
            'start_tme' => 'required',
            'end_tme' => 'required',
        ]);
        // echo $id;
        // echo $validata['choose_vacancies_id'];
        Pair::where('user_id', $user_id)->where('vacancies_id', $id)
            ->update(
                [
                    'user_id'       => $user_id,
                    'vacancies_id'  => $validata['choose_vacancies_id'],
                    'start_time'    => $validata['start_tme'],
                    'end_time'      => $validata['end_tme'],
                    'teacher_confirm' => '尚未確認',
                    'teacher_name'   => '暫無確認',
                ]
            );
        $Pair_data = Pair::where('user_id', $id)->get();

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
        $pair_datas = Pair::where('user_id', '=', $id)->get();
        // echo $pair_datas;
        foreach ($pair_datas as $pair_data) {
            $delete_time = $pair_data["delete_time"];
            $user_id = $pair_data["user_id"];
            $vacancies_id = $pair_data["vacancies_id"];
            $start_time = $pair_data["start_time"];
            $end_time = $pair_data["end_time"];
            $is_confirm = $pair_data["teacher_confirm"];
            $teacher_name = $pair_data["teacher_name"];
        }
        if ($is_confirm == "配對成功") {
            HistoryPair::create([
                'delete_time'     => Date("Ymd"),
                'user_id'         => $id,
                'vacancies_id'    => $vacancies_id,
                'start_time'      => $start_time,
                'end_time'        => $end_time,
                'teacher_confirm' => $is_confirm,
                'teacher_name'    => $teacher_name,
            ]);
        }
        Pair::where('user_id', $id)->delete();
        return redirect()->route("Pair.index");
    }
}
