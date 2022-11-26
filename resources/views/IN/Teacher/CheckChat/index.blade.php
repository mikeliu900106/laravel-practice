<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
    @parent
    
@endsection

<body>
    @section('nav') 
        @parent
    @endsection

    @section('content')
    <a href = "{{route("CheckChat.update",$user_id)}}"></a>
    <div id="responseBox">
        <ul>
            @foreach($Chats as $Chat)
                <li>
                    <div class="author">作者：{{$Chat->chat_maker}}</div>
                    <div class="article">主旨：{{$Chat->chat_subject}}</div>
                    <div class="time">時間：{{$Chat->chat_date}}</div>
                    <hr>
                    <div class="message">{{$Chat->chat_content}}</div>
                </li>
            @endforeach
        </ul>

    </div>
    @endsection


    @section('footer')
        @parent
    @endsection 
  
</body>
    