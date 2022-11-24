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
                    <th>教授名稱</th>
                    <th>公司名稱</th>
                    <th>開始時間</th>
                    <th>結束時間</th>
                </tr>
                @foreach($pairDatas as $pairData) 
                    <tr>
                        <?$user_id = {{$pairData->user_id}}?>
                        <td>{{ $pairData->teacher_name }}</td>
                        <td>{{ $pairData->company_name }}</td>
                        <td>{{ $pairData->start_time }}</td>
                        <td>{{ $pairData->end_time }}</td>
                    </tr>
                @endforeach

            </table>
       

        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>