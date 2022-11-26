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

        <a href = "{{route("CheckResume.show",$user_id)}}">履歷查看</a>
        <a href = "{{route("Download.show",$user_id)}}">履歷下載</a> 
        <form action = "{{route("CheckResume.store")}}" method = "POST">
            {{$user_id}}
            @csrf
            <label>履歷評語:</label>
                <label><input type="checkbox" name="Comment[]" value="不具體的方式表達" >不具體的方式表達</label>
                <label><input type="checkbox" name="Comment[]" value="缺少標點符號和文字錯誤">缺少標點符號和文字錯誤</label>
                <label><input type="checkbox" name="Comment[]" value="不要寫跟應徵職缺無關的內容">不要寫跟應徵職缺無關的內容</label>
                <label><input type="checkbox" name="Comment[]" value="專業用詞寫錯">專業用詞寫錯</label>
                <label><input type="checkbox" name="Comment[]" value="內容過少">內容過少</label>
                <label><input type="checkbox" name="Comment[]" value="缺少作品集" >缺少作品集</label>
                <label><input type="checkbox" name="Comment[]" value="完美的履歷" >完美的履歷</label>
                <input type = "hidden" name = "user_id" value = "{{$user_id}}">
                <br>    
            <label name="else">其他:</label>
                <textarea id="w3review" name="else" rows="4" cols="50">
        
                </textarea>
                <br>
                <input type = "submit" value = "提交">
            </form>


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>