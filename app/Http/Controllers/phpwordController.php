<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use App\Models\Vacancies;
use App\Models\Company;
use App\Models\Resume;
use App\Models\Student;
use App\Models\Score;
use App\Models\Pair;
use App\Models\Experience;
use Illuminate\Support\Facades\Storage;


class phpwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->session()->has('user_id')) {
            // if ($request->session()->get('level') == '4') {
                $user_id = session()->get('user_id');
                //$Vacancies = Vacancies::get();
                $experience_datas = Experience::where("user_id",$user_id)->get();
                if(Experience::where("user_id",$user_id)->count() == 0){
                    return view("IN.Student.phpword.index");
                }else{
                    return view("IN.Student.phpword.show",[
                        'experience_datas' => $experience_datas,
                        'user_id'          => $user_id,
                    ]);
                }
                
            // }
        //     elseif($request->session()->get('level') == '1'){
        //         echo "請等老師認證為本人,此功能開放";
        //     }
        //     else{
        //         echo "你不是學生";
        //         //1. 顯示錯誤2.錯誤controller
                

        //     }
        // }
        // else{
        //     echo "你沒登入";
        // }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = session()->get('user_id');
        return view("IN.Student.phpword.update",[ "user_id" => $user_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'reason' => 'required|string',
            'study_content' => 'required|string',
            'work_content' => 'required|string',
            'achievement' => 'required|string',
            'suggest' => 'required|string',
            'grateful' => 'required|string',
        ]);
        function  getExperienceName(){
            $today = date("Ynj");
            $nums = Experience::count();
            $name = "E" . (($today * 1000000) + ($nums + 1));
            return $name;
        }
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $user_id = session()->get('user_id');
        $user_datas = Student::where("user_id",$user_id);
        foreach($user_datas as $user_data){
            $user_real_name = $user_data["user_real_name"];
            $student_id = $user_data["student_id"];
        }
        //替代
        empty($user_real_name) ? $user_real_name = " " : $user_real_name;
        empty($student_id) ? $student_id = " " : $student_id;
        $connect = $request -> ss;
        echo $connect;
        $phpWord = new PhpWord();

        $fontStyle = ['align' => 'center'];
        //整体页面
        $section = $phpWord->addSection();

        //标题样式
        $phpWord->addTitleStyle(1, [
            'bold' => true,
            'color' => 000,
            'size' => 22,
            'name' => '標楷體',
        ], $fontStyle);
        $fontStyle1 = array('name'=>'標楷體', 'size'=>18);
        $fontStyle2 = array('name'=>'標楷體', 'size'=>20);
        $section->addTitle('實習報告' );
        $section->addText("學號:".$student_id ."名字:".$user_real_name,$fontStyle2,$fontStyle);
        $section->addTextBreak(1);//2个换行
        $section->addText($validate['reason'],$fontStyle1,);
        $section->addTextBreak(1);
        $section->addTitle('學習內容' );
        $section->addTextBreak(1);
        $section->addText($validate['study_content'],$fontStyle1);
        $section->addTitle('工作內容' );
        $section->addTextBreak(1);
        $section->addText($validate['work_content'],$fontStyle1);
        $section->addTitle('成就' );
        $section->addTextBreak(1);
        $section->addText($validate['achievement'],$fontStyle1);
        $section->addTitle('建議' );
        $section->addTextBreak(1);
        $section->addText($validate['suggest'],$fontStyle1);
        $section->addTitle('感謝' );
        $section->addTextBreak(1);
        $section->addText($validate['grateful'],$fontStyle1);
        $today = date("ymd");
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = getExperienceName();
        $fileName = $fileName.".docx";
        $writer->save('/Experience/' . $fileName);
        $file = public_path('/Experience/') . $fileName;  
        Experience::create(
            [
                "user_id" => $user_id,
                "Experience_file_path" => $file,
                "Experience_file_name" => $fileName,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $validate = $request->validate([
            'reason' => 'required|string',
            'study_content' => 'required|string',
            'work_content' => 'required|string',
            'achievement' => 'required|string',
            'suggest' => 'required|string',
            'grateful' => 'required|string',
        ]);
        function  getExperienceName(){
            $today = date("Ynj");
            $nums = Experience::count();
            $name = "E" . (($today * 1000000) + ($nums + 1));
            return $name;
        }
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $user_id = session()->get('user_id');
        $user_datas = Student::where("user_id",$user_id);
        foreach($user_datas as $user_data){
            $user_real_name = $user_data["user_real_name"];
            $student_id = $user_data["student_id"];
        }
        //替代
        empty($user_real_name) ? $user_real_name = " " : $user_real_name;
        empty($student_id) ? $student_id = " " : $student_id;
        $connect = $request -> ss;
        echo $connect;
        $phpWord = new PhpWord();

        $fontStyle = ['align' => 'center'];
        //整体页面
        $section = $phpWord->addSection();

        //标题样式
        $phpWord->addTitleStyle(1, [
            'bold' => true,
            'color' => 000,
            'size' => 22,
            'name' => '標楷體',
        ], $fontStyle);
        $fontStyle1 = array('name'=>'標楷體', 'size'=>18);
        $fontStyle2 = array('name'=>'標楷體', 'size'=>20);
        $section->addTitle('實習報告' );
        $section->addText("學號:".$student_id ."名字:".$user_real_name,$fontStyle2,$fontStyle);
        $section->addTextBreak(1);//2个换行
        $section->addText($validate['reason'],$fontStyle1,);
        $section->addTextBreak(1);
        $section->addTitle('學習內容' );
        $section->addTextBreak(1);
        $section->addText($validate['study_content'],$fontStyle1);
        $section->addTitle('工作內容' );
        $section->addTextBreak(1);
        $section->addText($validate['work_content'],$fontStyle1);
        $section->addTitle('成就' );
        $section->addTextBreak(1);
        $section->addText($validate['achievement'],$fontStyle1);
        $section->addTitle('建議' );
        $section->addTextBreak(1);
        $section->addText($validate['suggest'],$fontStyle1);
        $section->addTitle('感謝' );
        $section->addTextBreak(1);
        $section->addText($validate['grateful'],$fontStyle1);
        $today = date("ymd");
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = getExperienceName();
        $fileName = $fileName.".docx";
        ob_clean();
        $writer->save('/Experience/' . $fileName);
        $file = public_path('/Experience/') . $fileName;  
        Experience::where("user_id",$user_id)->delete();
        Experience::where("user_id",$user_id)->update(
            [
                "user_id" => $user_id,
                "Experience_file_path" => $file,
                "Experience_file_name" => $fileName,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience_datas = Experience::where("user_id",$id)->get();
        foreach($experience_datas as $experience_data){
            $Experience_file_path =$experience_data["Experience_file_path"];
        }
        Storage::delete($Experience_file_path);
    }
       
}
