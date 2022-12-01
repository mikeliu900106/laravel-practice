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
        <a href = "{{route("CompanyVacancies.create")}}">新增職位</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">職位名稱</th>
                    <th scope="col">工作待遇</th>
                    <th scope="col">工作時間</th>
                    <th scope="col">工作地點</th>
                    <th scope="col">工作內容</th>
                    <th scope="col">工作經驗</th>
                    <th scope="col">學歷要求</th>
                    <th scope="col">科系要求</th>
                    <th scope="col">其他事項</th>
                    <th scope="col">工作保險</th>
                    <th scope="col">更新</th>
                    <th scope="col">刪除ㄒ</th>
                <tr>
            </thead>
            <tbody>
                @foreach($Vacancies as $Vacancie)
                <tr>
                    <td>{{$Vacancie->vacancies_name}}</td>
                    <td>{{$Vacancie->company_money }}</td>
                    <td>{{$Vacancie->company_time }}</td>
                    <td>{{$Vacancie->company_place }}</td>
                    <td>{{$Vacancie->company_content }}</td>
                    <td>{{$Vacancie->company_work_experience }}</td>
                    <td>{{$Vacancie->company_Education }}</td>
                    <td>{{$Vacancie->company_department }}</td>
                    <td>{{$Vacancie->company_other}}</td>
                    <td>{{$Vacancie->company_safe}}</td>
                    <form action = "{{route('CompanyVacancies.destroy',$Vacancie->vacancies_id) }}" method = "post">
                        @method('DELETE')
                        @csrf    
                        <td><a href = "{{route("CompanyVacancies.edit",$Vacancie->vacancies_id)}}">更新</a></td>
                        <td><button class="btn btn-danger" type="submit">Delete</button></td>
                    </form>
                <tr>
                @endforeach
            </tbody>
        </table>   
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>