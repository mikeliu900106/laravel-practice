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
        <div class="File-Update-Box">
            <h1>歷年成績單</h1>
            <div class="Edit">
                @foreach($Scores as $Score)
                <a class="File-Download" href="{{route("Download.edit", $user_id)}}">下載</a>
                <a class="File-Update" href="{{route("Score.create",['user_id' => $user_id])}}">更新</a>
                <form method="post" action="{{route("Score.destroy", $user_id)}}">
                    @csrf
                    @method("delete")
                    <button class="File-Delete" type="submit">刪除</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>