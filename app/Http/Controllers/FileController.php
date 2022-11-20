<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File; 

use Illuminate\Http\Request;

use App\Models\Resume;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('user_id')) {
            if ($request->session()->get('level') == '1') {
                $user_id = session()->get('user_id');
                $isUpload = Resume::where('user_id',$user_id)->count();
                $upload = Resume::where('user_id',$user_id)->get();
                echo $isUpload;
                echo $upload;
                if($isUpload == 0){
                    return view('IN.Student.File.store');       
                }
                else{
                    return view('IN.Student.File.index',
                    [
                        'upload' => $upload,
                    ]);
                }

               //之後下面要改

            }
            else{
                echo "你不是學生";
                //1. 顯示錯誤2.錯誤controller
                

            }
        }
        else{
            echo "你沒登入";
        }
       
        //return view("IN.Student.File.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('IN.Student.File.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        function  getResumeName(){
            $today = date("Ynj");
            $nums = Resume::count();
            $name = "R" . (($today * 1000000) + ($nums + 1)).".pdf";
            return $name;
        }

        // $name = getResumeName();
        // echo $name ;
        if($request->hasFile('files'))
        {
            $files = $request->file('files');
            $user_id = session()->get('user_id');
            $dlete_datas = Resume::where("user_id",$user_id)->get();
            echo $dlete_datas ;
            // echo$dlete_datas;
            if(Resume::where("user_id",$user_id)->count()>0){
                foreach ($dlete_datas as $dlete_data) {
                    $id = $dlete_data->user_id;
                    $delete_path = $dlete_data->file_path;
                    $delete_name = $dlete_data->file_name;
                    $delete_name = "public\upload\\".$delete_name ;
                    //上一行特別重要delete規律
                    echo  $delete_name ;
                    Storage::delete($delete_name);
                    Resume::where("user_id",$user_id)->delete();
                }
            }
            foreach ($files as $file) {
                //包裝
                $file_name = getResumeName();
                //echo $file_name;
                $file->storeAs('public\upload',$file_name) ;
                $file_path  =public_path()."\upload\\".$file_name;
                echo $file_path;
                $Resume = [
                    'user_id'    => $user_id,
                    'file_path'  => $file_path,
                    'file_name'  => $file_name,
                ];
                $Resume = Resume::create($Resume);
                
            }
             return  redirect()->route("File.index");
        }
        else{
            echo("你沒上傳檔案"); 
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
