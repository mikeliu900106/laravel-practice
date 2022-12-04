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
    <div id="container">
        <div class="Apply-Info-Box">
            @parent
            @foreach ($Vacancies as $Vacancie)
            <h1 class="text-center">{{$Vacancie->vacancies_name}}</h1>
            <hr>
            <form action="{{route("Apply.update" , $Vacancie->vacancies_id)}}" method="post">
                @method("patch")
                @csrf

                <div class="Vacancy-Content">
                    <div class="Tabs-List col-md-2 col">
                        <nav class="nav">
                            <a class="nav-link active" id="jobs_content" href="#jobs_content">工作內容</a>
                            <a class="nav-link" id="jobs_info" href="#jobs_info">公司資訊</a>
                            <a class="nav-link" id="jobs_terms" href="#jobs_terms">要求條件</a>
                            <a class="nav-link" id="jobs_benefit" href="#jobs_benefit">公司福利</a>
                            <a class="nav-link" id="jobs_other" href="#jobs_other">其他事項</a>
                        </nav>
                    </div>
                    <ul class="Vacancy-Info">
                        <li>
                            <p>公司名稱：</p>
                            <span>{{$Vacancie->company_name}}</span>
                        </li>
                        <li><i class="bi bi-coin"></i>
                            <p>薪水待遇：</p>
                            <span>{{$Vacancie->company_money}}</span>
                        </li>
                        <li><i class="bi bi-telephone"></i>
                            <p>公司電話：</p>
                            <span>{{$Vacancie->company_number}}</span>
                        </li>
                        <li><i class="bi bi-envelope"></i>
                            <p>公司信箱：</p>
                            <span>{{$Vacancie->company_email}}</span>
                        </li>
                        <li><i class="bi bi-clock"></i>
                            <p>工作時間：</p>
                            <span>{{$Vacancie->company_time}}</span>
                        </li>
                        <li><i class="bi bi-geo-alt"></i>
                            <p>工作地點：</p>
                            <span>{{$Vacancie->company_place}}</span>
                        </li>
                        <li>工作內容：
                            <span>{{$Vacancie->company_content}}</span>
                        </li>
                        <li>工作經驗要求：
                            <span>{{$Vacancie->company_work_experience}}</span>
                        </li>
                        <li>學歷要求：
                            <span>{{$Vacancie->company_Education}}</span>
                        </li>
                        <li>科系要求：
                            <span>{{$Vacancie->company_department}}</span>
                        </li>
                        <li>其他事項：
                            <span>{{$Vacancie->company_other}}</span>
                        </li>
                        <li>工作保險：
                            <span>{{$Vacancie->company_safe}}</span>
                        </li>
                    </ul>
                    <input type="hidden" value="{{$Vacancie->company_email}}" name="company_email">
                </div>
                <button type="submit" class="btn btn-primary">我要應徵</button>
            </form>
            @endforeach
        </div>
    </div>

    @endsection
    @section('footer')
    @parent

    @endsection
</body>

</html>