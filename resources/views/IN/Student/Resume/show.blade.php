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
            <h1>履歷</h1>
            <div class="Edit">
                @foreach($Resumes as $Resume)
                <a class="File-Download" href="{{route("Download.show", $user_id)}}">下載</a>
                <a class="File-Update" href="{{route("Resume.create",['user_id' => $user_id])}}">更新</a>
                <form method="post" action="{{route("Resume.destroy", $user_id)}}">
                    @csrf
                    @method("delete")
                    <button class="File-Delete" type="submit">刪除</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection
</body>