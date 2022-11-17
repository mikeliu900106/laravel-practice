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
    @foreach ($Vacancies as $Vacancie)
            <? echo $companys["company_id"]?>



            <a href = "{{route('Apply.email ')}}">ss</a>
    @endforeach

        
            
       


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>