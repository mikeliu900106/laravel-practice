<?php

namespace App\Http\Controllers;
use App\Models\Score;
use Illuminate\Http\Request;

class CheckScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user_id;
        
        if(Score::where('user_id',$user_id)->count() == 0){
            echo "此學生沒上傳成績單";
      
        }
        else{
            return view("IN.Teacher.CheckScore.index",["user_id"=>$user_id]);
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
        $Resume_datas = score::where('user_id',$id)->get();
        foreach($Resume_datas as $Resume_data ){
            $score_name = $Resume_data["score_file_name"];
            echo $score_name;
        }
        $real_path = public_path()."\storage\upload\\".$score_name;
        echo $real_path;
        return response()->file($real_path);
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
