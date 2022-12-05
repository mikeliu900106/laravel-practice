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
    <div id="container" style="text-align: center;">
        <div class="content-Box">
            <h1 class="text-center" style="margin-bottom: 30px;">學生成績單</h1>
            <a class="btn btn-lg btn-primary" style="margin: 10px;" href="{{route("CheckScore.show",$user_id)}}">成績單查看</a>
            <a class="btn btn-lg btn-success" style="margin: 10px;" href="{{route("Download.edit",$user_id)}}">成績單下載</a>
        </div>
    </div>
    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>