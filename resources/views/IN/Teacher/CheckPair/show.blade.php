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
                <h1 class="text-center">學生配對</h1>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>學生名稱</th>
                            <th>公司名稱</th>
                            <th>開始時間</th>
                            <th>結束時間</th>
                            <th>是否配對</th>
                            <th>配對人員</th>
                            <th>認證</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            @foreach($Pairs as $pairData)
                            <td data-lebel="學生名稱">{{ $pairData->user_real_name }}</td>
                            <td data-lebel="公司名稱">{{ $pairData->company_name }}</td>
                            <td data-lebel="開始時間">{{ $pairData->start_time }}</td>
                            <td data-lebel="結束時間">{{ $pairData->end_time }}</td>
                            <td data-lebel="是否配對">{{ $pairData->teacher_confirm }}</td>
                            <td data-lebel="配對人員">{{ $pairData->teacher_name }}</td>
                            <td data-lebel="認證">
                                <a class="w-100 btn btn-success text-decoration-none text-white" href="{{ route('CheckPair.edit',['CheckPair' =>$pairData->vacancies_id,'vacancies_id'=>$pairData->user_id ] )}}">認證</a>
                            </td>
                            <td data-lebel="刪除">
                                <form class="w-100" action="{{ route('CheckPair.destroy',$pairData->user_id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" value="{{$pairData->vacancies_id}}" name="vacancies_id">
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
    @endsection
</body>

</html>