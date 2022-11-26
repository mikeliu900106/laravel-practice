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
        @foreach($Pairs as $Pair) 
            <table>
                <tr>
                    <th>教授名稱</th>
                    <th>公司名稱</th>
                    <th>開始時間</th>
                    <th>結束時間</th>
                    <th>修改</th>
                    <th>刪除</th>
                </tr>
                <tr>
                    {{$user_id = $Pair->user_id}}
                    <td>{{ $Pair->teacher_name }}</td>
                    <td>{{ $Pair->company_name }}</td>
                    <td>{{ $Pair->start_time }}</td>
                    <td>{{ $Pair->end_time }}</td>
                    <td><a href = "{{route('Pair.edit',
                        [
                            'Pair' =>$Pair->user_id,
                        ]
                        )}}">修改</a>
                        </td> 

                    <td>
                        <form action="{{ route('Pair.destroy', ['Pair' => $Pair->user_id] )}}" method="post">
                            @method('DELETE')
                            @csrf
                            
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </table>
        @endforeach


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>