<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choose(Request $request)
    {
        $login_username = $request -> login_username;
        
        
        return $login_username;
    }
    public function index()
    {
        return view('Login.index');
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
        $validata = $request -> validate([
            'login_username' => 'required|string',
            'login_password' => 'required|string',
        ]);
        $logindata = Login::where('username', $validata["login_username"])->first();
        if($logindata != NULL){
            if($validata['login_password'] == $logindata["password"]){
                if($logindata["level"] == 1){
                    Session::put('user_id', $logindata["id"]);
                    Session::put('level', $logindata["level"]);
                    return view('index'); 
                }
                elseif($logindata["level"] == 2){
                    Session::put('user_id', $logindata["id"]);
                    Session::put('level', $logindata["level"]);
                    return view('index');
                }
                elseif($logindata["level"] == 3){
                    Session::put('user_id', $logindata["id"]);
                    Session::put('level', $logindata["level"]);
                    return view('index');
                } 
                elseif($logindata["level"] == 4){
                    Session::put('user_id', $logindata["id"]);
                    Session::put('level', $logindata["level"]);
                    return view('index');
                }    
            }
            else{
                echo "密碼錯誤";
            }
        }
        else{
            echo "登入錯誤返回主主頁";
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
    public function login()
    {
        return"ha";
    }
    
}
