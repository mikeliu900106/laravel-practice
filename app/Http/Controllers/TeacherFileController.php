<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Chat;

use Response;

use App\Models\Teacherfile;

class TeacherFileController extends Controller
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
                $teacher_datas =Teacherfile::get();
                return view("IN.Teacher.TeacherFile.index",["teacher_datas" => $teacher_datas]);
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
    public function create(Request $request)
    {
        $user_id = session()->get('user_id');
        return view("IN.Teacher.TeacherFile.store");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_floder = 'public\teacherfile\\';
        $user_id = session()->get('user_id');
        function  getTeacherfileName(){
            $today = date("Ynj");
            $nums = Teacherfile::count();
            $name = "TF" . (($today * 1000000) + ($nums + 1));
            return $name;
        }
        if($request->hasFile('files')){
            $files = $request->file('files');
            $extension = $files->getClientOriginalExtension();
            $real_file_name = $files->getClientOriginalName();
            $file_name =  getTeacherfileName();
            $file_name = $file_name.".".$extension;
            $file_path = public_path()."storage\teacherfile\\".$file_name;
            $files->storeAs($file_floder,$file_name) ;

            $Teacherfile = [
                'teacher_id'    => $user_id,
                'teacher_file_id'  => $file_name ,
                'teacher_file_path'  => $file_path,
                'teacher_file_name'  => $file_name,
                'teacher_real_file_name'  => $real_file_name,
            ];
            Teacherfile::create($Teacherfile);
            return redirect()->route("TeacherFile.index");
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
        if(Teacherfile::where('teacher_file_id',$id)->count() != 0){
            $Teacherfile_data = Teacherfile::where('teacher_file_id',$id)->get();
            foreach($Teacherfile_data as $value){
                $file_name = $value["teacher_file_name"];
                
                $real_file_path = public_path()."/storage/teacherfile/".$file_name;
            }

            return Response::download($real_file_path);
        }
        else{
            echo "沒有上傳心得";
        }
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
        echo$id;
        function get_delete_path($delete_datas , $databaseColume){
            foreach ($delete_datas as $dlete_data) {
                $delete_name = $dlete_data[$databaseColume];
                return   $delete_name ;
            }
        }
        function delete_file($id = "",$database = "",$file_floder = 'public\teacherfile\\'){
                $delete_datas = Teacherfile::where("teacher_file_id",$id)->get();
                $delete_name = get_delete_path($delete_datas,"teacher_file_name" );
                $real_file_path = $file_floder . $delete_name;
                Storage::delete($real_file_path);
                Teacherfile::where('teacher_file_id',$id)->delete();
        
        }
        delete_file($id,$database = "Teacherfile",$file_floder = 'public\teacherfile\\');
        return redirect()->route("TeacherFile.index");
    }
}
