<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
<link rel="stylesheet" href="./css/app.css">
@endsection

<body>
    @section('nav')
    @parent
    @endsection

    @section('content')
    @parent
    <div id="container">
        <div class="Pair-Box">
            <div class="table-responsive-md w-100">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>教授名稱</th>
                            <th>公司名稱</th>
                            <th>開始時間</th>
                            <th>結束時間</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pairDatas as $pairData)
                        <tr class="text-center">
                            {{$user_id = $pairData->user_id}}
                            <td>{{ $pairData->teacher_name }}</td>
                            <td>{{ $pairData->company_name }}</td>
                            <td>{{ $pairData->start_time }}</td>
                            <td>{{ $pairData->end_time }}</td>
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
    @endsection
</body>

</html>