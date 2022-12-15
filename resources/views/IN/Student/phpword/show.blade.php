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
    <div class="File-Update-Box">
        <h1>心得</h1>
        <div class="Edit">
            @foreach($experience_datas as $experience_data)
            <a class="File-Download" href="{{route("phpwordDownload.show", $user_id)}}">下載</a>
            <a class="File-Update" href="{{route("phpword.create",['user_id' => $user_id])}}">更新</a>
            <form method="post" action="{{route("phpword.destroy", $user_id)}}">
                @csrf
                @method("delete")
                <button class="File-Delete" type="submit">刪除</button>
            </form>
        </div>


    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>