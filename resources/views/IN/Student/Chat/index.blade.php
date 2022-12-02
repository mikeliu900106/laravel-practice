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
    @parent
    <div id="container">
        <div id="Response-Box">
            <a href="{{route("Chat.create")}}">新增評論</a>
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
            {{ $Chats->links()}}
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection
</body>