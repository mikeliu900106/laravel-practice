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
        <td><a href = "{{route('Score.index')}}">歷年成績單</a></td>
        <td> <a href = "{{route('Resume.index')}}">履歷</a></td>
    @endsection


    @section('footer')
        @parent

    @endsection 
  
</body>