<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Models\Score;
use App\Models\Resume;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = session()->get('user_id');
        if(Score::where('user_id',$user_id)->count()==0){
            return view('IN.Student.Score.store');
        }else{
            $Scores = Score::where('user_id',$user_id)->get();
            return view('IN.Student.Score.show',
            [
                "Scores"  => $Scores,
                "user_id" => $user_id,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request -> user_id;
        echo  $user_id;
        return view('IN.Student.Score.update',
            [
                "user_id" => $user_id,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_floder = 'public\upload\\';
        $user_id = session()->get('user_id');
        function  getScoreName(){
            $today = date("Ynj");
            $nums = Score::count();
            $name = "SC" . (($today * 1000000) + ($nums + 1)).".pdf";
            return $name;
        }
        if($request->hasFile('files')){
            $files = $request->file('files');
            $file_name =  getScoreName();
            $file_path = public_path()."\upload\\".$file_name;
            $files->storeAs($file_floder,$file_name) ;
            $Scores = Score::where('user_id',$user_id)->get();
            $Score = [
                'user_id'    => $user_id,
                'score_file_path'  => $file_path,
                'score_file_name'  => $file_name,
            ];
            Score::create($Score);
            return redirect()->route("Score.index");
        }
        else{
            echo "沒上傳檔案";
        }
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
        $file_floder = 'public\upload\\';
        function  getScoreName(){
            $today = date("Ynj");
            $nums = Score::count();
            $name = "SC" . (($today * 1000000) + ($nums + 1)).".pdf";
            return $name;
        }

        function get_delete_path($delete_datas , $databaseColume){
            foreach ($delete_datas as $dlete_data) {
                $delete_name = $dlete_data[$databaseColume];
                return   $delete_name ;
            }
        }
        function delete_file($id = "",$database = "",$file_floder = 'public\upload\\'){
            if($database == "Score"){
                $delete_datas = Score::where("user_id",$id)->get();
                $delete_name = get_delete_path($delete_datas,"score_file_name" );
                $real_file_path = 'public\upload\\' . $delete_name;
                Storage::delete($real_file_path);
                Score::where("user_id",$id)->delete();
            }
            elseif($database == "Resume"){
                $delete_datas = Resume::where("user_id",$id)->get();
                $delete_name = get_delete_path($delete_datas,"resume_file_name");
                $real_file_path = 'public\upload\\' . $delete_name;
                Storage::delete($real_file_path);
                Resume::where("user_id",$id)->delete();
            }
        }

        if($request->hasFile('files')){
            delete_file($id,$database = "Score",$file_floder = 'public\upload\\');
            Score::where('user_id',$id)->delete();
            $files = $request->file('files');
            $file_name =  getScoreName();
            $file_path = public_path()."\upload\\".$file_name;
            $files->storeAs($file_floder,$file_name) ;
            $Scores = Score::where('user_id',$id)->get();
            $Score = [
                'user_id'    => $id,
                'score_file_path'  => $file_path,
                'score_file_name'  => $file_name,
            ];
            Score::create($Score);
            
            return redirect()->route("Score.index");
        }
        else{
            echo "沒上傳檔案";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        function get_delete_path($delete_datas , $databaseColume){
            foreach ($delete_datas as $dlete_data) {
                $delete_name = $dlete_data[$databaseColume];
                return   $delete_name ;
            }
        }
        function delete_file($id = "",$database = "",$file_floder = 'public\upload\\'){
            if($database == "Score"){
                $delete_datas = Score::where("user_id",$id)->get();
                $delete_name = get_delete_path($delete_datas,"score_file_name" );
                $real_file_path = 'public\upload\\' . $delete_name;
                Storage::delete($real_file_path);
                Score::where("user_id",$id)->delete();
            }
            elseif($database == "Resume"){
                $delete_datas = Resume::where("user_id",$id)->get();
                $delete_name = get_delete_path($delete_datas,"resume_file_name");
                $real_file_path = 'public\upload\\' . $delete_name;
                Storage::delete($real_file_path);
                Resume::where("user_id",$id)->delete();
            }
        }
        delete_file($id,$database = "Score",$file_floder = 'public\upload\\');
        Score::where('user_id',$id)->delete();
        return redirect()->route("Score.index");
    }
}
