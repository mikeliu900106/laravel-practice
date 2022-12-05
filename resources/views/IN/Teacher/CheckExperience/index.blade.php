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
    <div id="responseBox">
        @if ($is_upload === 0)
            <form action = "{{route("CheckExperience.update",$user_id)}}" method = "POST">
                <div>使用者並沒提交心得</div>
                <a href = "{{route("CheckExperience.show",$user_id)}}">提醒使用者交心得</a>
            </form>
        @else
        {{-- <a href = "{{route("DownloadExperience.show",$user_id)}}">心得查看</a> --}}
        <a href = "{{route("DownloadExperience.edit",$user_id)}}">心得下載</a> 
        <form action = "{{route("CheckExperience.store")}}" method = "POST">
            {{$user_id}}
            @csrf
            <label>履歷評語:</label>
            <label><input type="checkbox" name="Comment[]" value="不具體的方式表達" >不具體的方式表達</label>
            <label><input type="checkbox" name="Comment[]" value="缺少標點符號和文字錯誤">缺少標點符號和文字錯誤</label>
            <label><input type="checkbox" name="Comment[]" value="不要寫跟工作無關的內容">不要寫跟工作無關的內容</label>
            <label><input type="checkbox" name="Comment[]" value="專業用詞寫錯">專業用詞寫錯</label>
            <label><input type="checkbox" name="Comment[]" value="內容過少">內容過少</label>
            <label><input type="checkbox" name="Comment[]" value="缺少真實情況" >缺少真實情況</label>
            <label><input type="checkbox" name="Comment[]" value="完美的心得" >完美的心得</label>
            <input type = "hidden" name = "user_id" value = "{{$user_id}}">
            <br>    
        <label name="else">其他:</label>
            <textarea id="w3review" name="else" rows="4" cols="50">

            </textarea>
            <br>
            <input type = "submit" value = "提交">
        </form>
        @endif
    @endsection

    @section('footer')
    @parent
    @endsection
</body>