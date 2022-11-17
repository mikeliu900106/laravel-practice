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
            <form action = "{{ route('Mail.store') }}" method ="POST">
                @csrf
                <div class = "title">Feedback</div>
                <input class = "form-control" type = "text" name = "name" placeholder = "Name"/>
            
                <textarea class = "form-control" name="content" cols="50" rows="10" placeholder = "Feeback"></textarea>
                <button class="btn btn-primary">
                    Send
                    <i class="fa fa-spinner fa-spin"></i>
                </button>
            </form>
            
    @endsection


    @section('footer')
        @parent
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src = "js/index.js"></script>
    @endsection 
  
</body>



    
  