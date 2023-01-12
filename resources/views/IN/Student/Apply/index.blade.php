<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script> --}}
<script>
    $(document).ready(function() {
        let V = $('#Vacancies').DataTable({
            // "searching": false,
            // "paging": false,
            // "ordering": false,
            "responsive": true,
            "scrollX": true,
            "columnDefs": [{
                    targets: [0], // 第一欄 0開始, -1倒數
                    responsivePriority: 1,
                    createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                        // $(td).css('width', '30%') //可寫其他設定
                    },
                },
                {
                    "orderable": false,
                    "targets": [5]
                },
                {
                    targets: [5],
                    responsivePriority: 2,
                },
                {
                    targets: "_all", // 全部欄
                    // className: 'text-center' // className: 'text-left text-info'
                },
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/zh_Hant.json"
            }
        });
        let Vacancies = document.getElementById('Vacancies')
        Vacancies.addEventListener('click', function() {
            V.columns.adjust()
        })
        window.onresize = function() {
            V.columns.adjust()
        }

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
        <div class="Apply-Box">
            <h1 class="text-center">職缺列表</h1>
            <table id="Vacancies" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>職位名稱</th>
                        <th>公司名稱</th>
                        <th>工作地點</th>
                        <th>工作薪資</th>
                        <th>時間</th>
                        <th class="text-center">更多資訊</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Vacancies as $Vacancie)
                    <?php
                    $vacancies_id = $Vacancie->vacancies_id;
                    // echo $vacancies_id;
                    ?>
                    <tr>
                        <a class="Vacancy-Info" href="{{route('Apply.show',$vacancies_id)}}">
                            <td>{{$Vacancie->vacancies_name}}</td>
                            <td>{{$Vacancie->company_name}}</td>
                            <td>{{$Vacancie->vacancies_county .$Vacancie->vacancies_district}}</td>
                            <td>{{$Vacancie->company_money}}</td>
                            <td>{{$Vacancie->vacancies_create_time}}</td>
                            <td class="text-center"><a class="Vacancy-Info text-decoration-none" href="{{route('Apply.show',$vacancies_id)}}"><i class="bi bi-info-circle"></i>詳細資訊</a></td>
                        </a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- {{$Vacancies->links()}} --}}
    @endsection

    @section('footer')
    @parent
    <script>
        // let aArray = document.querySelectorAll('a.Vacancy-Info')
        // let tBody = document.querySelector('tbody')
        // let trArray = tBody.querySelectorAll('tr')
        // console.log("<?php echo $Vacancie->vacancies_id . $Vacancie->vacancies_name ?>")

        // trArray.forEach(function(tr, index) {
        //     tr.addEventListener('click', function() {
        //         location.href = aArray[index]
        //     })
        // })
        // console.log(trArray)
    </script>
    @endsection
</body>

</html>