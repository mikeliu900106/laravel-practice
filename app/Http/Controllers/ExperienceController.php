<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Resume;
use App\Models\Student;
use App\Models\Experience;
use Mail;
use \PhpOffice\PhpWord\PhpWord;
class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->session()->has('user_id')) {
            // if ($request->session()->get('level') == '4') {
            $user_id = session()->get('user_id');
            if ($request->session()->get('level') == '4') {
                $isUpload = Experience::where('user_id',$user_id)->count();
                if($isUpload == 0)
                    return view('IN.Student.Experience.index');
                else
                    return view('IN.Student.Experience.show', ["user_id" => $user_id ]);
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
        $user_id = session()->get('user_id');
        echo $user_id;
        return view('IN.Student.Experience.update', ["user_id" => $user_id ]);
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
        // $file_floder = 'public\upload\\';
        function  getExperienceName(){
            $today = date("Ynj");
            $nums = Experience::count();
            $name = "E" . (($today * 1000000) + ($nums + 1));
            return $name;
        }

        function get_delete_path($delete_datas , $databaseColume){
            foreach ($delete_datas as $dlete_data) {
                $delete_name = $dlete_data[$databaseColume];
                return   $delete_name ;
            }
        }
        function delete_file($id = "",$file_floder = 'public\Experience\\'){
                $delete_datas = Experience::where("user_id",$id)->get();
                $delete_name = get_delete_path($delete_datas,"Experience_file_name" );
                echo $delete_name;
                $real_file_path = 'public\Experience\\' . $delete_name;
                Storage::delete($real_file_path);
                Experience::where("user_id",$id)->delete();
        }

        if($request->hasFile('files')){
            delete_file($user_id,$file_floder = 'public\Experience\\');
            $files = $request->file('files');
            $file_name =  getExperienceName();
            $file_path = "public\Experience\\";
            echo$file_path;
            $extension = $files->getClientOriginalExtension();
            $file_name = $file_name .".".$extension;
            $path = $files->storeAs($file_path,$file_name) ;
    
            $Experience = [
                'user_id'    => $user_id,
                'Experience_file_path'  => $file_path,
                'Experience_file_name'  => $file_name,
            ];
            Experience::create($Experience);
            
            return redirect()->route("Experience.index");
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
        $user_id = session()->get('user_id');
        // $file_floder = 'public\upload\\';
        function  getExperienceName(){
            $today = date("Ynj");
            $nums = Experience::count();
            $name = "E" . (($today * 1000000) + ($nums + 1));
            return $name;
        }

        function get_delete_path($delete_datas , $databaseColume){
            foreach ($delete_datas as $dlete_data) {
                $delete_name = $dlete_data[$databaseColume];
                return   $delete_name ;
            }
        }
        function delete_file($id = "",$file_floder = 'public\Experience\\'){
                $delete_datas = Experience::where("user_id",$id)->get();
                $delete_name = get_delete_path($delete_datas,"Experience_file_name" );
                echo $delete_name;
                $real_file_path = 'public\Experience\\' . $delete_name;
                Storage::delete($real_file_path);
                Experience::where("user_id",$id)->delete();
        }

        if($request->hasFile('files')){
            delete_file($user_id,$file_floder = 'public\Experience\\');
            $files = $request->file('files');
            $file_name =  getExperienceName();
            $file_path = "public\Experience\\";
            echo$file_path;
            $extension = $files->getClientOriginalExtension();
            $file_name = $file_name .".".$extension;
            $path = $files->storeAs($file_path,$file_name) ;
    
            $Experience = [
                'user_id'    => $user_id,
                'Experience_file_path'  => $file_path,
                'Experience_file_name'  => $file_name,
            ];
            Experience::where('user_id',$user_id)->update($Experience);
            
            return redirect()->route("Experience.index");
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
            }
            return  $delete_name;
        }
        function delete_file($id = "",$file_floder = 'public\Experience\\'){
                $delete_datas = Experience::where("user_id",$id)->get();
                echo $delete_datas;
                $delete_name = get_delete_path($delete_datas,"Experience_file_name" );
                echo $delete_name;
                $real_file_path = 'public\Experience\\' . $delete_name;
                Storage::delete($real_file_path);
                Experience::where("user_id",$id)->delete();
        }
        delete_file($id,$file_floder = 'public\Experience\\');
        return redirect()->route("Experience.index");
    }
}
