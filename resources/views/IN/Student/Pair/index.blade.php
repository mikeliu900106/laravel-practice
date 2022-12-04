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
    <form action="{{route('Pair.store')}}" method="Post">
        @csrf
        <div class="container">
            <div class="Pair-Box">
                <h1>實習配對填寫</h1>
                <div id="pairBox">
                    <div class="pair-fill-in">
                        <div class="pair-row">
                            <span>請選擇配對成功的廠商：</span>
                            <select name="choose_company">
                                <option disabled>請選擇配對成功的廠商</option>
                                @foreach($Company_names as $Company_name)
                                <option value="{{$Company_name->company_name}}">{{$Company_name->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pair-row">
                            <span>請選擇實習的負責老師：</span>
                            <select name="choose_teacher">
                                <option disabled>請選擇實習負責老師</option>
                                @foreach($Teacher_names as $Teacher_name)
                                <option value="{{$Teacher_name->teacher_real_name}}">{{$Teacher_name->teacher_real_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pair-row">
                            <span>實習開始日期：</span>
                            <input type="date" name="start_tme">
                        </div>
                        <div class="pair-row">
                            <span>實習結束日期：</span>
                            <input type="date" name="end_tme">
                        </div>
                        <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>

    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>