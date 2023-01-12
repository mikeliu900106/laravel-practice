<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chat;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('user_id')) {
            if ($request->session()->get('level') == '4') {
                $user_id = session()->get('user_id');
                // echo $user_id;
                $Chat = Chat::paginate(10);
                $Chat_level  = Chat::select('chat_level')->where('chat_id', $user_id)->get();
                return view('IN.student.Chat.index', [
                    'Chats' => $Chat,
                    'Chat_level' => $Chat_level,
                    'Chat_id' => $user_id,
                ]);
            } elseif ($request->session()->get('level') == '1') {
                echo "請等老師認證";
            } else {
                echo "你不是學生";
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
        $Chat_level  = Chat::select('chat_level')->where('chat_id', $user_id)->get();
        return view("IN.Student.Chat.store", ['Chat_level' => $Chat_level]);
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
            'maker' => 'required|string',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);
        $user_id = session()->get('user_id');
        $today = date("Ymd");
        $Chat_insert = Chat::create(
            [
                'chat_id'        =>  $user_id,
                'chat_maker'     =>  $validate['maker'],
                'chat_subject'   =>  $validate['subject'],
                'chat_content'   =>  $validate['content'],
                'chat_date'      =>  $today,
                'chat_level'     =>  '1',
            ]
        );
        return redirect()->route('Chat.index');
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
