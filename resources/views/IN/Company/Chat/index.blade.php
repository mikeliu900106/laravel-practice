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
            <h1 class="text-center">意見反映</h1>
            <ul class="Responses">
                @foreach($Chats as $Chat)
                <li class="Response-Card">
                    <div class="Message-Detail">
                        <div class="article">主旨：{{$Chat->chat_subject}}</div>
                        <div class="author">作者：{{$Chat->chat_maker}}</div>
                        <div class="time">時間：{{$Chat->chat_date}}</div>
                    </div>
                    <!-- <hr> -->
                    <div class="Message">{{$Chat->chat_content}}</div>
                </li>
                @endforeach
            </ul>
            <a class="btn btn-primary mx-3 mb-2" href="{{route("CompanyChat.create")}}">新增評論</a>
            {{ $Chats->links() }}
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection
</body>