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

    <div class="main">
        <h1 class="word_main">practice</h1>
        <h1 class="word">change your life!</h1>
    </div>
    <div class="user_news"></div>


    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>