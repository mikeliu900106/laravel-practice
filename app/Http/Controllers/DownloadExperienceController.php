<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Resume;
use App\Models\Score;
use App\Models\Experience;

class DownloadExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $Experience_datas = Experience::where('user_id',$id)->get();
        // echo  $Experience_datas;
        foreach($Experience_datas as $Experience_data ){
            $Experience_name = $Experience_data['Experience_file_name'];
        // echo $Experience_name;
        }
        $real_path = public_path()."\storage\Experience\\".$Experience_name;
        // echo $real_path;
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
        // echo "sb";

        if(Experience::where('user_id',$id)->count() != 0){
            $Experience_data = Experience::where('user_id',$id)->get();
            // echo $Experience_data;
            foreach($Experience_data as $value){
                $file_name = $value["Experience_file_name"];
                
               
            }
            echo $real_file_path;
            return Response::download($real_file_path);
        }
        else{
            echo "沒有上傳心得";
        }
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
