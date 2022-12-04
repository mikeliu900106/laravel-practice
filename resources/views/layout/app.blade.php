<html>

<head>

    @section('head')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posts</title>
        {{-- <link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
        <script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
        <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("bootstrap/js/bootstrap.min.js")}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset("/css/app.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("/css/table.css")}}">
        <link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap.min.css")}}" />
        <link rel="stylesheet" href="{{asset("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css")}}">
    </head>
    @show
</head>

<body>
    @section('nav')
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand logo col-2 text-center" href="{{url('/')}}">PCCU</a>
        <!-- RWD -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDropdown" style="color: white">
            <span class="navbar-toggler-icon toggler"></span>
        </button>
        <div class="collapse navbar-collapse" id="navDropdown">
            <ul class="navbar-nav col text-center">
                <li class="nav-item dropdown col-1">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">學生</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('Apply.index')}}">實習應徵</a></li>
                        <li><a class="dropdown-item" href="{{route('Pair.index')}}">配對上傳</a></li>
                        <li><a class="dropdown-item" href="{{route('Chat.index')}}">意見反映</a></li>
                        <li><a class="dropdown-item" href="{{route('File.index')}}">履歷處理</a></li>
                        <li><a class="dropdown-item" href="{{route('Experience.index')}}">心得上傳</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown col-1">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">廠商</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('CompanyVacancies.index')}}">職缺查看</a></li>
                        <li><a class="dropdown-item" href="{{route('CompanyChat.index')}}">意見反映</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown col-1">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">老師</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('ConfirmUser.index')}}">學生註冊</a></li>
                        <li><a class="dropdown-item" href="{{route('VacanciesCheck.index')}}">職位審查</a></li>
                        <li><a class="dropdown-item" href="{{route('TeacherChat.index')}}">意見反映</a></li>
                        <li><a class="dropdown-item" href="{{route('CheckUser.index')}}">學生檢查</a></li>

                    </ul>
                </li>
                <div class="col"></div>
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
    </div>
    </div class="footer">
    @section('footer')
    @show
    </div>
    <script>

    </script>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("js/index.js")}}"></script>

</body>

</html>