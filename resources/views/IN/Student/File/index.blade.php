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
    
            @foreach($upload as $value)
            <a>sv</a>
                <div>
                    履歷
                </div>
                <div>
                    歷年成績單
                </div>
                    <a href = "{{route('File.create')}}">更改</a>
                    <a href = "{{route('Download.create')}}">下載</a>
            @endforeach
 
    @endsection


    @section('footer')
        @parent

    @endsection 
  
</body>