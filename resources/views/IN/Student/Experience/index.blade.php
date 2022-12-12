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
        <div class="File-Box">
            <h1>心得上傳</h1>
            <div class="File-Upload">
                <form action="{{route('Experience.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="files" />
                    <button type="submit" class="btn btn-dark">提交</button>
                </form>
            </div>
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection
</body>

</html>