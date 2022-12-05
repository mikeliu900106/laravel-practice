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
    <?php if ($Chat_level != '2') { ?>
        <div id="container">
            <div class="Response-Box">
                <form class="w-100" action="{{route("TeacherChat.store")}}" method="post">
                    @csrf
                    <div class="Leave-Comment">
                        <div class="author">
                            <span>作者</span><input name="maker" type="text">
                        </div>
                        <div class="gist">
                            <span>主旨</span><input name="subject" type="text">
                            <br>
                        </div>
                        <div class="content">
                            <span>內容</span><textarea name="content" id="" cols="1" rows="10"></textarea>
                        </div>
                        <input class="btn btn-primary" type="submit" value="送出">
                    </div>
                </form>

            </div>
        </div>
    <?php
    } else {
        echo "<div>你已被封禁沒資格發言</div>";
    } ?>
    </div>

    </div>

    @endsection



    @section('footer')
    @parent

    @endsection

</body>