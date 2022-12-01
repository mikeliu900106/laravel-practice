<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use Mail;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('In.Company.index');
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
        function codestr(){
            $arr = array_merge(range('a', 'b'), range('A', 'B'), range('0', '9'));
            shuffle($arr);
            $arr = array_flip($arr);
            $arr = array_rand($arr, 6);
            $res = '';
            foreach ($arr as $v) {
                $res .= $v;
            }
            return $res;
        }
        function get_company_id(){
            $today = date("Ynj");
            $nums = company::count();
            $id = "C" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $company_data = $request -> validate([
            'company_name' => 'required|string',
            'company_title' => 'required|string',
            'company_number' => 'required|min:8|max:10',
            'company_place' => 'required|string',
            'company_email' => 'required|email',
            'company_username' => 'required|string',
            'company_password' => 'required|string',
        ]);
        $Company_id = get_company_id();
        echo $company_data['company_username'];
        $Company_username_isUse = Company::where('company_username', $company_data['company_username'])->count();
        echo $Company_username_isUse;
        if($Company_username_isUse == 0){
            $Company_insert = Company::create(
                [
                    'company_id'            =>  $Company_id,
                    'company_name'          =>  $company_data['company_name'],
                    'company_title'         =>  $company_data['company_title'],
                    'company_username'      =>  $company_data['company_username'],
                    'company_password'      =>  $company_data['company_password'],
                    'company_number'        =>  $company_data['company_number'],
                    'company_email'         =>  $company_data['company_email'],
                    'level'                 =>  "3",
                ]
            );
            $random = codestr();
            //echo $random;
            $company_data["random"] = $random;
            //echo $Company_data["random"] = $random;

            //學長解釋trycatch 使用
            Mail::send('IN.Company.sendMail',$company_data, function ($message) use ($company_data) {
                $message->from('mikeliu20010106@gmail.com');    
                $message->to($company_data['company_email'])->subject('email認證');
            });

            return view("IN.Company.register",
            [
                "random" =>$random,
                "company_id"=>$Company_id,
            ]);
        }else{
            //errorcontroller
            echo "error";
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
        $value = $request->all();
        echo $value["random"];
        echo $value["input_random"];
        if($value["random"] === $value["input_random"]){
            echo '登入成功';
            return view("index")->with([
                //跳轉信息正確controller
            //'message'=>'你已經成功註冊！',
            'jumpTime'=>5,
        ]);
        }
        else{
            $delete = Company::where('company_id', '=', $id)->delete();
        }
    }
}
