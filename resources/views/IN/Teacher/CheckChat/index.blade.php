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
    <div id="container">
        <div class="Response-Box">
            <!-- <a href="{{route("CheckChat.update",$user_id)}}"></a> ? -->
            <h1 class="text-center">學生發言</h1>
            <ul class="Responses">
                @foreach($Chats as $Chat)
                <li class="Response-Card">
                    <div class="Message-Detail">
                        <div class="article">主旨：{{$Chat->chat_subject}}</div>
                        <div class="author">作者：{{$Chat->chat_maker}}</div>
                        <div class="time">時間：{{$Chat->chat_date}}</div>
                    </div>
                    <div class="message">{{$Chat->chat_content}}</div>
                </li>
                @endforeach
            </ul>
            <div class="w-100 d-flex" style="flex-wrap: wrap;">
                <a class="col btn btn-danger" style="min-width: 200px; margin:5px;" href="{{route("CheckChat.edit",$user_id)}}">禁止使用者發言</a>
                <a class="col btn btn-success" style="min-width: 200px; margin:5px;" href="{{route("CheckChat.update",$user_id)}}">解除禁言</a>
            </div>
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>