<html>
    <head>
  
    @section('head')
        <head>
            <meta charset="UTF-8">
            
            <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Posts</title>
            <link rel="stylesheet" type = "text/css" href="/css/app.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
        </head>
    @show
    </head>
    <body>
        @section('nav')
        {{-- <nav class="navbar navbar-expand navbar-right navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand fs-2" href="#">pccu</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      學生
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      廠商
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      教師
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled " href="#" tabindex="-1" aria-disabled="true">Link</a>
                    </li>
                </ul>
              </div>
            </div>
        </nav> --}}
            <nav>
                <div class="logo">pccu</div>
                    <a class="UserBox_s">學生</a>
                    <a class="UserBox_c">廠商</a>
                    <a class="UserBox_t">教師</a>   
                <div class="user_img">
                    <a href = "{{route('Login.index')}}">Login</a> 
                </div>
                <div class="user_img2">
                    <a href = "{{route('Signup.index')}}">sign up</a>
                </div>
                <div class="hr"></div>

                <div id ="studnet_change" class = "jump1" style = "display:none">
          
                        <a href= "#">申請辦法</a>
                        <a href= "{{route('Apply.index')}}">實習應徵</a>
                        <a href= "{{route('Pair.index')}}">配對上傳</a>
                       <a href= "{{route('Chat.index')}}">意見反映</a>
                        <a href= "{{route('File.index')}}">履歷處理</a>
                </div>
                <div id ="company_change" class = "jump2" style = "display:none">
<!--之後要修改讓他可以看到他的職缺-->   <a href= "{{route('Vacancies.index')}}">職缺查看</a> 
                    <a href= "{{route('CompanyChat.index')}}">意見反映</a>
                </div>
                <div id ="company_change" class = "jump3" style = "display:none">
                    <a href= "{{route('VacanciesCheck.index')}}">職位審查</a>
                    <a href= "{{route('TeacherChat.index')}}">意見反映</a>
                    <a href= "{{route('UserCheck.index')}}">學生檢查</a>
                </div>
            </nav>  
        @show   
        <div class = "main" > 
            @section('content')
      
        
            @show
            </div> 
        @section('footer')
            <script src = "js/jquery-3.6.0.min.js"></script>
            <script src = "js/index.js"></script>
	        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        @show
    </body>
</html>