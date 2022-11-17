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
        <a href = "{{route("Vacancies.show",$user_id)}}">新增職位</a>
        <table>
            <tr>
                <th>職位名稱</th>
                <th>工作待遇</th>
                <th>工作時間</th>
                <th>工作地點</th>
                <th>工作內容</th>
                <th>工作經驗</th>
                <th>學歷要求</th>
                <th>科系要求</th>
                <th>其他事項</th>
                <th>工作保險</th>
                <th>工作保險</th>
                <th>更新</th>
                <th>刪除ㄒ</th>
            <tr>
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
                <td>{{$Vacancie->company_company_safe}}</td>
                <td>{{$Vacancie->company_company_safe}}</td>
                <td>{{$Vacancie->company_company_safe}}</td>
                <form action = "{{route('Vacancies.destroy',$Vacancie->vacancies_id) }}" method = "post">
                    @method('DELETE')
                    @csrf    
                    <td><a href = "{{route("Vacancies.create",['vacancies_id' => $Vacancie->vacancies_id])}}">更新</a></td>
                    <td><button class="btn btn-danger" type="submit">Delete</button></td>
                </form>
            <tr>
            @endforeach
        </table>   
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>