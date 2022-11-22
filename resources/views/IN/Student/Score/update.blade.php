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
        <form action="{{route('Score.update',$user_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("patch")
            <br>
            <span>歷年成績單</span>
            <input type="file" class="form-control" name="files"  />
            <br>
            <button type="submit" class="btn btn-dark">提交</button>
        </form>
    @endsection


    @section('footer')
        @parent

    @endsection 
  
</body>