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
    <div id="container">
        <div class="Pair-Box">
            <h1>配對確認</h1>
            <div class="table-responsive-md w-100">
                <table class="table table-responsive-xl table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>使用者名稱</th>
                            <th>職缺名稱</th>
                            <th>開始時間</th>
                            <th>結束時間</th>
                            <th>是否確認</th>
                            <th>批准人員</th>
                            <th>確認</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody id="Pair-Box-tbody">
                        @foreach($pair_datas as $pair_data)
                        <tr class="text-center">
                            <td data-lebel="使用者名稱">{{ $pair_data->user_real_name }}</td>
                            <!-- <td>{{ $pair_data->company_name }}</td> -->
                            <td data-lebel="職缺名稱">{{ $pair_data->vacancies_name }}</td>
                            <td data-lebel="開始時間">{{ $pair_data->start_time }}</td>
                            <td data-lebel="結束時間">{{ $pair_data->end_time }}</td>
                            <td data-lebel="是否確認">{{ $pair_data->teacher_confirm}}</td>
                            <td data-lebel="批准人員">{{ $pair_data->teacher_name }}</td>
                            <td data-lebel="確認">
                                <a class="w-100 btn btn-success text-decoration-none text-white" href="{{ route('CompanyPair.edit',['CompanyPair' =>$pair_data->vacancies_id] )}}">通過</a>
                            </td>
                            <td data-lebel="刪除">
                                <form class="w-100" action="{{ route('CompanyPair.destroy',$pair_data->user_id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" value="{{$pair_data->vacancies_id}}" name="vacancies_id">
                                    <button class="w-100 btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    <script>
        let PB_tbody = document.querySelector("#Pair-Box-tbody");
        // console.log(PB_tbody.rows.length)
        if (PB_tbody.rows.length === 0) {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            tr.append(td);
            PB_tbody.append(tr);
            td.colSpan = "100";
            td.innerHTML = "暫無資料";
            td.className = "text-center";
        }
    </script>
    @endsection
</body>

</html>