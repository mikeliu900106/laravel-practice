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
    {{$id}}
    <form action="{{route('Pair.update', $id)}}" method="Post">
        @csrf
        @method("patch")
        <div id="container">
            <div class="Pair-Box">
                <h1>實習配對修改</h1>
                <div class="Pair-Fill-In">
                    <div class="Pair-Row">
                        <span>請選擇配對的職位：</span>
                        <select name="choose_vacancies_id">
                            <option disabled>請選擇配對的職位</option>
                            @foreach($Vacancies_datas as $Vacancies_data)
                            <option value="{{$Vacancies_data->vacancies_id}}">{{$Vacancies_data->company_name.$Vacancies_data->vacancies_name}}</option>
                            <div>{{$Vacancies_data->vacancies_id}}</div>
                            @endforeach
                        </select>
                    </div>

                    <div class="Pair-Row">
                        <span>實習開始日期：</span>
                        <input type="date" name="start_tme">
                    </div>
                    <div class="Pair-Row">
                        <span>實習結束日期：</span>
                        <input type="date" name="end_tme">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>

    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>