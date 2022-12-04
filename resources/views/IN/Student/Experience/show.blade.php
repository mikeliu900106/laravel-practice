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
            <th>實習心得</th>
            <th>更新</th>
            <th>刪除</th>
        </tr>
        <tr>
            <td><a href = "{{route("Experience.create")}}">更新</a></td>
            <td><a href = "{{route("DownloadExperience.edit",$user_id)}}">下載</a></td>
            <form method="post" action="{{route("DownloadExperience.destroy",$user_id)}}">
                @csrf
                @method("delete")
                <td><button type="submit">刪除</button></td>
            </form>
        </tr>
    </table>     
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>