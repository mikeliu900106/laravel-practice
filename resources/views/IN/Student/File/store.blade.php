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
    <form action="{{route('File.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        批量上傳
        <br>
        <span>歷年成績單</span>
        <input type="file" class="form-control" name="files[]"  />
        <br>
        <span>履歷</span>
        <input type="file" class="form-control" name="files[]"  accept="application/pdf*"/>
        <br>
        <button type="submit" class="btn btn-dark">提交</button>
    </form>
    
    @endsection


    @section('footer')
        @parent

    @endsection 
  
</body>