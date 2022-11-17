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
        </head>
    @show
    </head>
    <body>
        @section('nav')
            <nav>
                <div class="logo">pccu</div>
                <a class="UserBox_s">student</a>
                <a class="UserBox_c">company</a>
                <a class="UserBox_t">teacher</a>
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
                    <a href= "{{route('Check.index')}}">職位審查</a>
    <!--之後要改-->  <a href= "{{route('CompanyPair.index')}}">實習配對</a>
                </div>
            </nav>
        @show    
        <div class = "main" >
            @section('content')
      
        
            @show
            </div> 
        @section('footer')
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script src = "js/index.js"></script>
        @show
    </body>
</html>