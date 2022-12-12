<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pair;

use App\Models\HistoryPair;

use App\Models\Teacher;

use App\Models\Vacancies;

use App\Models\Company;

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
        $pair_datas =$Vacancies = Vacancies::Join('company','company.company_id','=','vacancies.company_id')
                    ->Join('pair','pair.vacancies_id','=','vacancies.vacancies_id')
                    ->select('vacancies.vacancies_id','vacancies.vacancies_name', 'company.company_name','company.company_id','pair.*')
                    ->where('company.company_id',$user_id)
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
    public function edit($id)
    {
        Pair::where("vacancies_id")
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
        //
    }
}
