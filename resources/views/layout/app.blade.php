<html>

<head>

    @section('head')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posts</title>
        <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
        <script src="{{asset("js/index.js")}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset("/css/app.css")}}">
        <link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap.min.css")}}" />
        <link rel="stylesheet" href="{{asset("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css")}}">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    </head>
    @show
</head>

<body>
    @section('nav')
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand logo col-2 text-center" href="{{url('/')}}">PCCU</a>
        <!-- RWD -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navDropdown">
            <ul class="navbar-nav col-12 text-center">
                <div class="col"></div>
                <li class="nav-item dropdown col-2">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">學生</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="">申請辦法</a></li>
                        <li><a class="dropdown-item" href="{{route('Apply.index')}}">實習應徵</a></li>
                        <li><a class="dropdown-item" href="{{route('Pair.index')}}">配對上傳</a></li>
                        <li><a class="dropdown-item" href="{{route('Chat.index')}}">意見反映</a></li>
                        <li><a class="dropdown-item" href="{{route('File.index')}}">履歷處理</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown col-2">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">廠商</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('CompanyVacancies.index')}}">職缺查看</a></li>
                        <li><a class="dropdown-item" href="{{route('CompanyChat.index')}}">意見反映</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown col-2">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">老師</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('VacanciesCheck.index')}}">職位審查</a></li>
                        <li><a class="dropdown-item" href="{{route('TeacherChat.index')}}">意見反映</a></li>
                        <li><a class="dropdown-item" href="{{route('CheckUser.index')}}">學生檢查</a></li>
                    </ul>
                </li>
                <li class="nav-item col-2 account">
                    <a class="nav-link" href="{{route('Login.index')}}">登入<i class="bi bi-person"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    @show
    <div class="main">
        @section('content')
        @show

    </div class="footer">
    @section('footer')
    @show
    </div>
    <script type="text/javascript" src="{{asset("bootstrap/js/bootstrap.min.js")}}"></script>
</body>

</html>