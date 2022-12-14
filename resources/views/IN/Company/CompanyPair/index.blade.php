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
            @foreach($pair_datas as $pair_data)
            <div class="table-responsive-md w-100">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>公司名稱</th>
                            <th>職缺名稱</th>
                            <th>開始時間</th>
                            <th>結束時間</th>
                            <th>是否確認</th>
                            <th>批准人員</th>
                            <th>確認</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="text-center">
                            {{$user_id = $pair_data->user_id}}
                            <td>{{ $pair_data->company_name }}</td>
                            <td>{{ $pair_data->vacancies_name }}</td>
                            <td>{{ $pair_data->start_time }}</td>
                            <td>{{ $pair_data->end_time }}</td>
                            <td>{{ $pair_data->teacher_confirm}}</td>
                            <td>{{ $pair_data->teacher_name }}</td>
                            <td>
                                <a class="w-100 btn btn-success text-decoration-none text-white" href="{{ route('CompanyPair.edit',['CompanyPair' =>$pair_data->vacancies_id] )}}">通過</a>
                            </td>
                            <td>
                                <form class="w-100" action="{{ route('CompanyPair.destroy',$pair_data->user_id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type = "hidden" value = "{{$pair_data->vacancies_id}}" name = "vacancies_id">
                                    <button class="w-100 btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
        </div>
    </div>
    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>