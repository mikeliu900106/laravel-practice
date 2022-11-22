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
    <table>
        <tr>
            <th>成績單</th>
            <th>更新</th>
            <th>刪除</th>
        </tr>
        @foreach($Scores as $Score)
            <tr>
                <td><a href = "{{route("Download.edit", $user_id)}}">下載</a></td>
                <td><a href = "{{route("Score.create",['user_id' => $user_id])}}">更新</a></td>
                <form method="post" action="{{route("Score.destroy", $user_id)}}">
                    @csrf
                    @method("delete")
                    <td><button type="submit">刪除</button></td>
                </form>
            </tr>
        @endforeach
    <table>        
        
    @endsection


    @section('footer')
        @parent

    @endsection 
  
</body>