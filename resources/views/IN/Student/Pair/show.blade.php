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
            <h1>配對職位</h1>
            @foreach($pair_datas as $pair_data)
            <div class="table-responsive-md w-100">
                <table class="table table-responsive-xl table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>公司名稱</th>
                            <th>職缺名稱</th>
                            <th>開始時間</th>
                            <th>結束時間</th>
                            <th>是否確認</th>
                            <th>批准老師</th>
                            <th>修改</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            {{$user_id = $pair_data->user_id}}
                            <td data-lebel="公司名稱">{{ $pair_data->company_name }}</td>
                            <td data-lebel="職缺名稱">{{ $pair_data->vacancies_name }}</td>
                            <td data-lebel="開始時間">{{ $pair_data->start_time }}</td>
                            <td data-lebel="結束時間">{{ $pair_data->end_time }}</td>
                            <td data-lebel="是否確認">{{ $pair_data->teacher_confirm}}</td>
                            <td data-lebel="批准老師">{{ $pair_data->teacher_name }}</td>
                            <td data-lebel="修改">
                                <a class="btn btn-success text-decoration-none text-white" href="{{ route('Pair.edit',['Pair' =>$pair_data->user_id,'vacancies_id'=>$pair_data->vacancies_id] )}}">編輯</a>
                            </td>
                            <td data-lebel="刪除">
                                <form class="w-100" action="{{ route('Pair.destroy', ['Pair' => $pair_data->user_id] )}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">刪除</button>
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