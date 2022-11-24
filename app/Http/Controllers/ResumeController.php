<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Models\Resume;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = session()->get('user_id');
        if(Resume::where('user_id',$user_id)->count()==0){
            return view('IN.Student.Resume.store');
        }else{
            $Resumes = Resume::where('user_id',$user_id)->get();
            return view('IN.Student.Resume.show',
            [
                "Resumes"  => $Resumes,
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
        return view('IN.Student.Resume.update',
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
        function  getResumeName(){
            $today = date("Ynj");
            $nums = Resume::count();
            $name = "R" . (($today * 1000000) + ($nums + 1)).".pdf";
            return $name;
        }
        if($request->hasFile('files')){
            $files = $request->file('files');
            $file_name =  getResumeName();
            $file_path = public_path()."\upload\\".$file_name;
            $files->storeAs($file_floder,$file_name) ;
            $Resumes = Resume::where('user_id',$user_id)->get();
            $Resume = [
                'user_id'    => $user_id,
                'resume_file_path'  => $file_path,
                'resume_file_name'  => $file_name,
            ];
            Resume::create($Resume);
            return redirect()->route("Resume.index");
            // return view("IN.Student.Resume.show",
            // [
            //     "Resumes"  => $Resumes,
            //     "user_id" => $user_id,
            // ]);
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
        function  getResumeName(){
            $today = date("Ynj");
            $nums = Resume::count();
            $name = "R" . (($today * 1000000) + ($nums + 1)).".pdf";
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
            delete_file($id,$database = "Resume",$file_floder = 'public\upload\\');
            Resume::where('user_id',$id)->delete();
            $files = $request->file('files');
            $file_name =  getResumeName();
            $file_path = public_path()."\upload\\".$file_name;
            $files->storeAs($file_floder,$file_name) ;
            $Resumes = Resume::where('user_id',$id)->get();
            $Resume = [
                'user_id'    => $id,
                'resume_file_path'  => $file_path,
                'resume_file_name'  => $file_name,
            ];
            Resume::create($Resume);
            
            return redirect()->route("Resume.index");
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
        $Resumes = Resume::where("user_id",$id)->get();
        delete_file($id,$database = "Resume",$file_floder = 'public\upload\\');
        Resume::where('user_id',$id)->delete();
        return redirect()->route("Resume.index");
    }
}
