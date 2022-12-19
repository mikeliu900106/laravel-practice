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
        <div class="File-Box">
            <div>
                <h1>履歷處理</h1>
            </div>
            <div class="d-flex flex-wrap justify-content-center w-100">
                <a class="btn btn-primary" href="{{route('Score.index')}}">歷年成績單</a>
                <a class="btn btn-success" href="{{route('Resume.index')}}">履歷</a>
                <!-- <a class="btn btn-warning text-white" href="{{route('Resume.index')}}">心得</a> -->
            </div>
        </div>
    </div>
    @endsection


    @section('footer')
    @parent

    @endsection

</body>