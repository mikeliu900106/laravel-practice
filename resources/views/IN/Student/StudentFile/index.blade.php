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
        <a href = "{{route("TeacherFile.create")}}">上傳檔案</a>
        <br>
        @foreach($teacher_datas as $teacher_data)
            <span>{{$teacher_data->teacher_real_file_name}}:</span>
            <a href = "{{route("TeacherFile.show", $teacher_data->teacher_file_id)}}">下載</a>
            <br>
        @endforeach

    @endsection

    @section('footer')
    @parent
    @endsection
</body>