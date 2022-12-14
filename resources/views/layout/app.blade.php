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
        <!-- <link rel="stylesheet" href="{{asset("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css")}}"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css" />
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
    </head>
    @show
</head>

<body>
    @section('nav')
    <nav class="navbar navbar-expand-md navbar-light" id="nav">
        <a class="navbar-brand logo col-2 text-center" href="{{url('/')}}">PCCU</a>
        <!-- RWD -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDropdown" style="color: white">
            <span class="navbar-toggler-icon toggler"></span>
        </button>
        <div class="collapse navbar-collapse" id="navDropdown">
            <ul class="navbar-nav col text-center">
                <li class="nav-item dropdown col-1">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">??????</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('Apply.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('Pair.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('Chat.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('File.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('Experience.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('StudentFile.index')}}">????????????</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown col-1">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">??????</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('CompanyVacancies.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('CompanyChat.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('CompanyPair.index')}}">????????????</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown col-1">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">??????</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('ConfirmUser.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('VacanciesCheck.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('TeacherChat.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('CheckUser.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('TeacherFile.index')}}">????????????</a></li>
                        <li><a class="dropdown-item" href="{{route('PhpExcel.index')}}">????????????</a></li>
                    </ul>
                </li>
                <div class="col"></div>
                <li class="nav-item col-2 account">
                    <a class="nav-link" href="{{route('Login.index')}}">??????<i class="bi bi-person"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    @show
    <div class="main">
        @section('content')
        @show
    </div>
    <div class="footer">
        @section('footer')
        @show
    </div>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("js/index.js")}}"></script>
</body>

</html>