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
                    <form action="{{route("CheckUser.index")}}" method = "GET">
                        <input type="search" id="site-search" name="search">
                        <button>查詢</button>
                    </form>
                    
                    <table class="table table-striped table-dark">
                        <thead >
                            <tr>
                                <th scope="col">學生真名</th>
                                <th scope="col">學生帳號名稱</th>
                                <th scope="col">學生信箱</th>
                                <th scope="col">學生配對情況</th>
                                <th scope="col">學生履歷檢查</th>
                                <th scope="col">學生成績單檢查</th>
                                <th scope="col">刪除學生</th>
                                <th scope="col">查看言論</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userDatas as $userData)
                                {{$user_id = $userData->user_id}}
                                </tr>
                                    <td>{{$userData->user_real_name}}</td>
                                    <td>{{$userData->user_name}}</td>
                                    <td>{{$userData->user_email}}</td>
                                    <td><a href = "{{route("CheckPair.show",$user_id)}}">查看配對</a></td>
                                    <td><a href = "{{route("CheckResume.index",['user_id' => $user_id])}}">履歷檢查</a></td>
                                    <td><a href = "{{route("CheckScore.index",['user_id' => $user_id])}}">成績單檢查</a></td>
                                    <form action="{{route('CheckUser.destroy',$user_id)}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <th><button type = "submit">刪除學生</button></th>
                                    </form>
                                    <td><a href = "{{route("CheckChat.index",['user_id' => $user_id])}}">查看言論</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div> <!-- content -->
        </div> 
        {{$userDatas->links()}}
        
            
       


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>