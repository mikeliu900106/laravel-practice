<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Login;
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
        
        $company_datas = $request -> validate([
            'company_name' => 'required|string',
            'company_title' => 'required|string',
            'company_number' => 'required|min:8|max:10',
            'county' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'company_email' => 'required|email',
            'company_username' => 'required|string',
            'company_password' => 'required|string',
        ]);
        $Company_id = get_company_id();
        $company_datas['company_id'] =$Company_id;
        $Company_username_isUse = Company::where('company_username', $company_datas['company_username'])->count();
        echo $Company_username_isUse;
        if($Company_username_isUse == 0){
            $random = codestr();
            //echo $random;
            $company_datas["random"] = $random;


            //學長解釋trycatch 使用
            Mail::send('IN.Company.sendMail',$company_datas, function ($message) use ($company_datas) {
                $message->from('mikeliu20010106@gmail.com');    
                $message->to($company_datas['company_email'])->subject('email認證');
            });

            return view("IN.Company.register",
            [
                "random" =>$random,
                "company_id"=>$Company_id,
                'company_datas'=>$company_datas,
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
    public function destroy($id,Request $request)
    {
        $value = $request->all();
        echo $value["random"];
        echo $value["input_random"];
        if($value["random"] === $value["input_random"]){
            echo '登入成功';
            $Company_insert = Company::create(
                [
                    'company_id'            =>  $value["company_id"],
                    'company_name'          =>  $value['company_name'],
                    'company_title'         =>  $value['company_title'],
                    'company_username'      =>  $value['company_username'],
                    'company_password'      =>  $value['company_password'],
                    'company_number'        =>  $value['company_number'],
                    'company_county'        =>  $value['county'],
                    'company_district'      =>  $value['district'],
                    'company_address'       =>  $value['address'],
                    'company_email'         =>  $value['company_email'],
                    'level'                 =>  "3",
                ]
            );
            Login::create(
                [
                    'id'            =>  $value["company_id"],
                    'username'      =>  $value['company_username'],
                    'password'      =>  $value['company_password'],
                    'level'                 =>  "3",
                ]
            );
            return view("index");
        }
        else{
            echo "驗證碼錯誤";
        }
    }
}
