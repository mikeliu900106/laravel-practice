<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
class TeacherChatController extends Controller
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
                $user_id = session()->get('user_id');
                $Chat = Chat::paginate(10);
                $Chat_level  = Chat::select('chat_level' )->where('chat_id',$user_id)->get();
                return view('IN.teacher.Chat.index',[
                    'Chats'=> $Chat,
                    'Chat_level' =>$Chat_level,
                ]);
            }
            else{
                echo "你不是老師";
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
        $validate = $request -> validate([
            'maker' => 'required|string',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);
        $user_id = session()->get('user_id');
        $today = date("Ynj");
        $Chat_insert = Student::create(
            [
                'chat_id'        =>  $user_id,
                'chat_maker'     =>  $validate['maker'],
                'chat_subject'   =>  $validate['subject'],
                'chat_content'   =>  $validate['content'],
                'chat_date'      =>  $today,
                'chat_level'      =>  "2",
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
