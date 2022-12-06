<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent

<script>
    $(document).ready(function() {
        $('#Vacancies').DataTable({
            // "searching": false,
            // "paging": false,
            "responsive": true,
            "scrollX": true,
            "columnDefs": [{
                    targets: [0], // 第一欄 0開始, -1倒數
                    // width: "100px",
                    responsivePriority: 1,
                    createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                        // $(td).css('width', '30%') //可寫其他設定
                    },
                },
                {
                    targets: [10],
                    responsivePriority: 2,
                },
                {
                    targets: [11],
                    responsivePriority: 3,
                },
                {
                    targets: "_all", // 全部欄
                    className: 'text-center' // className: 'text-left text-info'
                },
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/zh_Hant.json"
            }
        });
    });
</script>
@endsection

<body>
    @section('nav')
    @parent
    @endsection

    @section('content')
    @parent
    <div id="container">
        <div class="Vacancies-Box">
            <h1 class="text-center">職缺管理</h1>
            <table id="Vacancies" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
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
                        <th>更新</th>
                        <th>刪除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Vacancies as $Vacancie)
                    <tr>
                        {{$Vacancie->vacancies_id}}
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
                        <td><a class="btn btn-primary" href="{{route("CompanyVacancies.edit",$Vacancie->vacancies_id)}}">更新</a></td>
                        <td>
                            <form action="{{route('CompanyVacancies.destroy',$Vacancie->vacancies_id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="w-100 btn btn-dark" style="margin-bottom: 5px" href="{{route("CompanyVacancies.create")}}">新增職位</a>
        </div>
    </div>
    @endsection
    @section('footer')
    @parent

    @endsection
</body>

</html>