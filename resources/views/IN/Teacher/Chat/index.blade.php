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

        <?php if ($Chat_level != '2') { ?>
            <form class="leavecomment" action="{{route("TeacherChat.store")}}" method="post">
                @csrf
                <div class="author">
                    <p>作者</p><input name="maker" type="text">
                </div>
                <div class="gist">
                    <p>主旨</p><input name="subject" type="text">
                    <br>
                </div>
                <div class="content">
                    <p>內容</p><textarea name="content" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="送出">
                </div>
            </form>
        <?php
        } else {
            echo "<div>你不能發言</div>";
        }    ?>
    </div>
    {{ $Chats->links() }}
    @endsection

    @section('footer')
    @parent
    @endsection
</body>