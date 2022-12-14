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
            <h1>歷年成績單</h1>
            <div class="File-Upload">
                <form action="{{route('Score.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="files" />
                    <button type="submit">提交</button>
                </form>
            </div>
        </div>
    </div>
    @endsection


    @section('footer')
    @parent

    @endsection

</body>