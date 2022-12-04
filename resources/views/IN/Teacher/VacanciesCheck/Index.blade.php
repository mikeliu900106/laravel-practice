<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#CPN-Verify').DataTable({
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
                    targets: [9],
                    responsivePriority: 2,
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
        <div class="VacanciesCheck-Box">
            <h1 class="text-center">職缺審查</h1>
            <table id="CPN-Verify" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>職位名稱</th>
                        <th>公司名稱</th>
                        <th>工作待遇</th>
                        <th>工作時間</th>
                        <th>工作地點</th>
                        <th>工作內容</th>
                        <th>工作經驗</th>
                        <th>學歷要求</th>
                        <th>科系要求</th>
                        <th>是否通過</th>
                        <th>其他事項</th>
                        <th>工作保險</th>
                        <th>是誰批准</th>
                        <th>編輯</th>
                        <th>刪除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Vacancies as $Vacancie)
                    <tr>
                        {{$Vacancie->vacancies_id}}
                        <td>{{$Vacancie->vacancies_name}}</td>
                        <td>{{$Vacancie->company_name }}</td>
                        <td>{{$Vacancie->company_money }}</td>
                        <td>{{$Vacancie->company_time }}</td>
                        <td>{{$Vacancie->company_place }}</td>
                        <td>{{$Vacancie->company_content }}</td>
                        <td>{{$Vacancie->company_work_experience }}</td>
                        <td>{{$Vacancie->company_Education }}</td>
                        <td>{{$Vacancie->company_department }}</td>
                        <td>{{$Vacancie->teacher_watch}}</td>
                        <td>{{$Vacancie->company_other}}</td>
                        <td>{{$Vacancie->company_safe}}</td>
                        <td>{{$Vacancie->teacher_name}}</td>
                        <form action="{{route('VacanciesCheck.destroy',$Vacancie->vacancies_id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <td>
                                <div class="btn btn-success btn"><a class="text-white text-decoration-none" href="{{route("VacanciesCheck.edit",$Vacancie->vacancies_id)}}">通過</a></div>
                                <div class="btn btn-warning btn"><a class="text-white text-decoration-none" href="{{route("VacanciesCheck.update",$Vacancie->vacancies_id)}}">不通過</a></div>
                            </td>
                            <td><button class="btn btn-danger" type="submit" id="VacanciesCheck_delete_button">Delete</button></td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$Vacancies->links()}}
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection
</body>


</html>