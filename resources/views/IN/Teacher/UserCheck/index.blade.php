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
        {{-- @foreach ($user_id as $id)
           
        @endforeach --}}
        <div id="wrap">
            <div id="content">
                
                <div id="applyBox">
                    <form action="{{route("UserCheck.index")}}" method = "GET">
                        <input type="search" id="site-search" name="search">
                        <button>查詢</button>
                    </form>
                    <table>
                        <tr>
                            <th>學生真名</th>
                            <th>學生帳號名稱</th>
                            <th>學生信箱</th>
                            <th>學生配對情況</th>
                            <th>學生履歷下載</th>
                            <th>學生成績單下載</th>
                            <th>刪除學生</th>
                        </tr>
                        @foreach ($userDatas as $userData)
                            {{$user_id = $userData->user_id}}
                            </tr>
                                <td>{{$userData->user_real_name}}</td>
                                <td>{{$userData->user_name}}</td>
                                <td>{{$userData->user_email}}</td>
                                <td><a href = "{{route("CheckPair.show",$user_id)}}">查看配對</a></td>
                                <td><a href = "{{route("Download.show",$user_id)}}">履歷下載</a></td>
                                <td><a href = "{{route("Download.edit",$user_id)}}">成績單下載</a></td>
                                <form action="{{route('UserCheck.destroy',$user_id)}}" method="POST">
                                    @csrf
                                    @method("delete")
                                    <th><button type = "submit">刪除學生</button></th>
                                </form>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div> <!-- content -->
        </div> 
        
        
            
       


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>