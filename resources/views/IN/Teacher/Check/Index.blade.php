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
                <th>是否通過</th>
                <th>是誰批准</th>
                <th>是否通過</th>
                <th>是否修正</th>
                <th>刪除</th>
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
                <td>{{$Vacancie->teacher_watch}}</td>
                <td>{{$Vacancie->teacher_name}}</td>
                <form action = "{{route('Check.destroy',$Vacancie->vacancies_id) }}" method = "post">
                    @method('DELETE')
                    @csrf    
                    <td><a href = "{{route("Check.edit",$Vacancie->vacancies_id)}}">通過</a></td>
                    <td><a href = "{{route("Check.update",$Vacancie->vacancies_id)}}">不通過</a></td>
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