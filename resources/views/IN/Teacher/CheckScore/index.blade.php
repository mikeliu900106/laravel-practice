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

        <a href = "{{route("CheckScore.show",$user_id)}}">成績單查看</a>
        <a href = "{{route("Download.edit",$user_id)}}">成績單下載</a>  
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>