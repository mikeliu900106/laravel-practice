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
    {{-- @foreach ($user_id as $id)
        @endforeach --}}
    <div id="container">
        <div class="CheckUser-Box">
            <form action="{{route("CheckUser.index")}}" method="GET" class="d-flex" style="height: 40px;">
                <input class="form-control" type="search" id="site-search" name="search" style="flex-grow: 1;">
                <button class="btn btn-primary" style="margin-left: 5px; word-break: keep-all;">查詢</button></span>
            </form>
            <table class="table table-light table-striped table-responsive-xl">
                <thead>
                    <tr class="text-center">
                        <th>學生姓名</th>
                        <th style="text-align: left;">學生帳號名稱</th>
                        <th style="text-align: left;">學生信箱</th>
                        <th>配對情況</th>
                        <th>履歷檢查</th>
                        <th>成績單檢查</th>
                        <th>查看言論</th>
                        <th>查看心得</th>
                        <th>刪除學生</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userDatas as $userData)
                    {{$user_id = $userData->user_id}}
                    <tr class="text-center">
                        <td data-label="學生姓名">{{$userData->user_real_name}}</td>
                        <td data-label="學生帳號名稱" style="text-align: left;">{{$userData->user_name}}</td>
                        <td data-label="學生信箱" style="text-align: left;">{{$userData->user_email}}</td>
                        <td data-label="學生配對情況"><a href="{{route("CheckPair.index",['user_id' => $user_id])}}">查看配對</a></td>
                        <td data-label="學生履歷檢查"><a href="{{route("CheckResume.index",['user_id' => $user_id])}}">履歷檢查</a></td>
                        <td data-label="學生成績單檢查"><a href="{{route("CheckScore.index",['user_id' => $user_id])}}">成績單檢查</a></td>
                        <td data-label="查看言論"><a href="{{route("CheckChat.index",['user_id' => $user_id])}}">查看言論</a></td>
                        <td data-label="查看心得"><a href="{{route("CheckExperience.index",['user_id' => $user_id])}}">查看心得</a></td>
                        <form action="{{route('CheckUser.destroy',$user_id)}}" method="POST">
                            @csrf
                            @method("delete")
                            <td data-label="刪除學生"><button type="submit" class="btn btn-danger" style="min-width:90px">刪除學生</button></td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$userDatas->links()}}
        </div>
    </div>







    @endsection
    @section('footer')
    @parent

    @endsection
</body>

</html>