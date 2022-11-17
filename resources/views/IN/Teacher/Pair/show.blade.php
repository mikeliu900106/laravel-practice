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
        
        <table>
                <tr>
                    <th>學生名稱</th>
                    <th>教授名稱</th>
                    <th>公司名稱</th>
                        <th>開始時間</th>
                        <th>結束時間</th>
                    <th>刪除</th>
                </tr>
            @foreach($Pairs as $Pair)         
                <tr>
                    <td>{{ $Pair->user_real_name }}</td>
                    <td>{{ $Pair->teacher_name }}</td>
                    <td>{{ $Pair->company_name }}</td>
                    <td>{{ $Pair->start_time }}</td>
                    <td>{{ $Pair->end_time }}</td>
                        </td> 
                    <td>
                        <form action="{{ route('CompanyPair.destroy', ['CompanyPair' => $Pair->user_id] )}}" method="post">
                            @method('DELETE')
                            @csrf
                            
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
       


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>