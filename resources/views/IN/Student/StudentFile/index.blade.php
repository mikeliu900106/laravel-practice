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
        <div class="Announcement-Box">
            <h1>實習須知公告</h1>
            <table class="table table-striped table-responsive-xl table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>檔案名稱</th>
                        <th>上傳老師</th> <!-- # -->
                        <th>上傳日期</th> <!-- # -->
                        <th>下載</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teacher_datas as $teacher_data)
                    <tr>
                        <td>{{$teacher_data->teacher_real_file_name}}:</td>
                        <td>TCH</td> <!-- # -->
                        <td>2022/12/10</td> <!-- # -->
                        <td><a class="btn btn-success" href="{{route("TeacherFile.show", $teacher_data->teacher_file_id)}}">下載</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @endsection

    @section('footer')
    @parent
    @endsection
</body>