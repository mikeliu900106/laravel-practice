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
        <div class="CheckUser-Box">
            <form action="{{route("CheckUser.index")}}" method="GET" class="d-flex" style="height: 40px;">
                <input type=" search" id="site-search" name="search" style="flex-grow: 1;">
                <button class="btn btn-primary" style="margin-left: 5px; word-break: keep-all;">查詢</button>
            </form>
            <table class="table table-light table-striped table-responsive-xl">
                <thead>
                    <tr>
                        <th>學生姓名</th>
                        <th style="text-align: left;">學生帳號名稱</th>
                        <th style="text-align: left;">學生信箱</th>
                        <th style="text-align: left;">學生學號</th>
                        <th>學生系別</th>
                        <th>確認為本校學生</th>
                        <th>刪除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($Student_datas as $Student_data)
                        {{$user_id = $Student_data->user_id}}
                        <td data-label="學生姓名">{{$Student_data->user_real_name}}</td>
                        <td data-label="學生帳號名稱" style="text-align: left;">{{$Student_data->user_name}}</td>
                        <td data-label="學生信箱" style="text-align: left;">{{$Student_data->user_email}}</td>
                        <td data-label="學生學號" style="text-align: left;">{{$Student_data->student_id}}</td>
                        <td data-label="學生系別">{{$Student_data->student_department}}</td>
                        <td data-label="確認為本校學生"><a class="btn btn-success" style="min-width:90px" href="{{route("ConfirmUser.edit",$user_id)}}">同意</a></td>
                        <form action="{{route('ConfirmUser.destroy',$user_id)}}" method="POST">
                            @csrf
                            @method("delete")
                            <td data-label="刪除"><button type="submit" class="btn btn-danger" style="min-width:90px">刪除學生</button></td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div> <!-- content -->
    </div>
    {{$Student_datas->links()}}






    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>