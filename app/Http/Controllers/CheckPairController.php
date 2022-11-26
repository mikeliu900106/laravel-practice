<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;

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
                $user_id = session()->get('user_id');

                $Pair_data = 
                Pair::join('user', 'Pair.user_id', '=', 'user.user_id')
                    ->select('Pair.*', 'user.user_real_name')
                    ->get();
                ;
                echo $Pair_data;
                return view('IN.Teacher.Pair.show',[
                        'Pairs' => $Pair_data,
                        
                ]);


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
        $delete_pair = Pair::where('user_id', '=', $id)->delete();
    }
}