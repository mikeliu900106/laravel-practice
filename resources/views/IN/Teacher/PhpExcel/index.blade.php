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
    <form action="{{route("PhpExcel.index")}}" method="get">
        <select name="choose_date">
            <option value="9">十年前</option>
            <option value="8">九年前</option>
            <option value="7">八年前</option>
            <option value="6">七年前</option>
            <option value="5">六年前</option>
            <option value="4">五年前</option>
            <option value="3">大前年</option>
            <option value="2">前年</option>
            <option value="1">去年</option>
            <option value="0">今年</option>
        </select>
        <input type=submit value="送出">

        <p>廠商要求技能次數</p>
        <p>react:{{ $skill_count[0] }}次</p>
        <p>Javascript:{{ $skill_count[1] }}次</p>
        <p>Vue:{{ $skill_count[2] }}次</p>
        <p>Angular:{{ $skill_count[3] }}次</p>
        <p>Mysql:{{ $skill_count[4] }}次</p>
        <p>SqlServer:{{ $skill_count[5] }}次</p>
        <p>Php:{{ $skill_count[6] }}次</p>
        <p>Laravel:{{ $skill_count[7] }}次</p>
        <p>c#:{{ $skill_count[8] }}次</p>
        <p>c++:{{ $skill_count[9] }}次</p>
        <p>java:{{ $skill_count[10] }}次</p>
        <p>python:{{ $skill_count[11] }}次</p>
        <p>kotlin:{{ $skill_count[12] }}次</p>
        <p>學生配對成功次數</p>
        <p>配對成功人數:{{$pair_count_data}}</p>
    </form>
    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>