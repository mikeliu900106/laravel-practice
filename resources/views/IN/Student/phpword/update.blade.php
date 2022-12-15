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
            <form action="{{route("phpword.update",$user_id)}}" method="POST">
                @csrf
                <label name="reason">緣起(最少要800字):</label>
                <textarea class="w-100 h4" name="reason" rows="10" cols="100"></textarea>
                <br>
                <label name="study_content">學習內容(最少要800字):</label>
                <textarea class="w-100 h4" name="study_content" rows="10" cols="100"></textarea>
                <br>
                <label name="work_content">工作內容(最少要800字):</label>
                <textarea class="w-100 h4" name="work_content" rows="10" cols="100"></textarea>
                <br>
                <label name="achievement">成就(最少要800字):</label>
                <textarea class="w-100 h4" name="achievement" rows="10" cols="100"></textarea>
                <br>
                <label name="suggest">建議(最少要800字):</label>
                <textarea class="w-100 h4" name="suggest" rows="10" cols="100"></textarea>
                <br>
                <label name="grateful">感謝(最少要800字):</label>
                <textarea class="w-100 h4" name="grateful" rows="10" cols="100"></textarea>
                <br>
                <input class="btn btn-dark w-100" type="submit" value="提交">
            </form>
    </div>


    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>