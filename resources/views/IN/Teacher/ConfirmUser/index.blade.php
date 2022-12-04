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
                    
                    <table>
                        <thead>
                            <tr>
                                <th>學生真名</th>
                                <th >學生帳號名稱</th>
                                <th >學生信箱</th>
                                <th >學生學號</th>
                                <th >學生系別</th>
                                <th ></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Student_datas as $Student_data)
                                {{$user_id = $Student_data->user_id}}
                                </tr>
                                    <td>{{$Student_data->user_real_name}}</td>
                                    <td>{{$Student_data->user_name}}</td>
                                    <td>{{$Student_data->user_email}}</td>
                                    <td>{{$Student_data->student_id}}</td>
                                    <td>{{$Student_data->student_department}}</td>
                                    <td><a href = "{{route("ConfirmUser.edit",$user_id)}}">確認為本校學生</a></td>
                                    <form action="{{route('ConfirmUser.destroy',$user_id)}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <th><button type = "submit">刪除學生</button></th>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div> <!-- content -->
        </div> 
        {{$Student_datas->links()}}
        
            
       


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>