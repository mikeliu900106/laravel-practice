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
        <form action="{{route("Apply.update" , $Vacancie->vacancies_id)}}" method="post">
            @method("patch")
            @csrf
            <div>
                <p>職位名稱:{{$Vacancie->vacancies_name}}<p>
            </div>
            <div>
                <p>薪水待遇:{{$Vacancie->company_money}}<p>
            </div>
            <div>
                <p>公司名稱:{{$Vacancie->company_name}}<p>
            </div>
            <div>
                <p>公司電話:{{$Vacancie->company_number}}<p>
            </div>
            <div>
                <p>公司email:{{$Vacancie->company_email}}<p>
            </div>
            <div>
                <p>工作時間:{{$Vacancie->company_time}}<p>
            </div>
            <div>
                <p>工作地點:{{$Vacancie->company_place}}<p>
            </div>
            <div>
                <p>工作內容:{{$Vacancie->company_content}}<p>
            </div>
            <div>
                <p>工作經驗要求:{{$Vacancie->company_work_experience}}<p>
            </div>
            <div>
                <p>學歷要求:{{$Vacancie->company_Education}}<p>
            </div>
            <div>
                <p>科系要求:{{$Vacancie->company_department}}<p>
            </div>
            <div>
                <p>其他事項:{{$Vacancie->company_other}}<p>
            </div>
            <div>
                <p>工作保險:{{$Vacancie->company_safe}}<p>
            </div>
            <input type = "hidden" value="{{$Vacancie->company_email}}" name = "company_email">
            <button type="submit" >應徵</button> 
        </form>



        @endforeach
    </table>
        
            
       


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>