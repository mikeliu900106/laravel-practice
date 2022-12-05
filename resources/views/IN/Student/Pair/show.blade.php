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
            @foreach($Pairs as $Pair)
            <div class="table-responsive-md w-100">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>教授名稱</th>
                            <th>公司名稱</th>
                            <th>開始時間</th>
                            <th>結束時間</th>
                            <th>修改</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="text-center">
                            {{$user_id = $Pair->user_id}}
                            <td>{{ $Pair->teacher_name }}</td>
                            <td>{{ $Pair->company_name }}</td>
                            <td>{{ $Pair->start_time }}</td>
                            <td>{{ $Pair->end_time }}</td>
                            <td>
                                <a class="w-100 btn btn-success text-decoration-none text-white" href="{{ route('Pair.edit',['Pair' =>$Pair->user_id,] )}}">Edit</a>
                            </td>
                            <td>
                                <form class="w-100" action="{{ route('Pair.destroy', ['Pair' => $Pair->user_id] )}}" method="post">
                                    @method('DELETE')
                                    @csrf
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