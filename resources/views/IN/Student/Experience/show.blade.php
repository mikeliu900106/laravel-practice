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
        <div class="File-Update-Box">
            <h1>心得</h1>
            <div class="Edit">
                <a class="File-Download" href="{{route("DownloadExperience.edit",$user_id)}}">下載</a>
                <a class="File-Update" href="{{route("Experience.create")}}">更新</a>
                <form method="post" action="{{route("DownloadExperience.destroy",$user_id)}}">
                    @csrf
                    @method("delete")
                    <button class="File-Delete" type="submit">刪除</button>
                </form>
                </table>
            </div>
        </div>
    </div>
    @endsection


    @section('footer')
    @parent

    @endsection
</body>

</html>