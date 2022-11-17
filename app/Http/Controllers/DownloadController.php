<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resume;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $user_id = session()->get('user_id');
        // $resume_data = Resume::select("resume_path","resume_file_name")->where('user_id',$user_id)->get();
        // foreach($resume_data as $value){
        //     $resume_path = $value -> resume_path;
        //     $resume_file_name = $value -> resume_file_name;
        //     echo $resume_path;
        //     //echo $resume_file_name;
        // }

        // $file= $resume_path.$resume_file_name;

        // $headers = [
        //     'Content-Type: application/pdf',
        // ];
        // return response()->download($file, '履歷.pdf', $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = session()->get('user_id');
        $zip_file = 'invoices.zip';
        $zip = new \ZipArchive();
        $resume_data = Resume::select("file_path","file_name")->where('user_id',$user_id)->get();
        foreach($resume_data as $value){
            $resume_path = $value -> file_path;
            $resume_file_name = $value -> file_name;
            echo $resume_path;
            //echo $resume_file_name;
        }

        $file= $resume_path.$resume_file_name;

        $headers = [
            'Content-Type: application/pdf',
        ];
        return response()->download($file, '成績單.pdf', $headers);
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
