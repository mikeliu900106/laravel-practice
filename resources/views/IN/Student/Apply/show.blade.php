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
            <form action="{{route("Apply.update" , $Vacancie->vacancies_id)}}" method="post">
                @method("patch")
                @csrf
                <div class="Vacancies-Name">
                    <!-- sticky-top -->
                    <h1 class="text-center">{{$Vacancie->vacancies_name}}</h1>
                </div>
                <div class="Vacancies-Content">
                    <div class="Vacancies-Tabs-List col-md-2 col">
                        <nav class="nav">
                            <a class="nav-link active" id="Jobs-content" href="#Jobs-Description">工作內容</a>
                            <a class="nav-link" id="Jobs-info" href="#Jobs-Info">公司資訊</a>
                            <a class="nav-link" id="Jobs-terms" href="#Jobs-Terms">要求條件</a>
                            <a class="nav-link" id="Jobs-benefit" href="#Jobs-Benefit">公司福利</a>
                            <a class="nav-link" id="Jobs-other" href="#Jobs-Other">其他事項</a>
                        </nav>
                    </div>
                    <div class="Vacancies-Info col-md-10 ">
                        <div class="Jobs-Company Info-Item">
                            <div class="Jobs-Title">{{$Vacancie->company_name}}</div> <!-- 公司名稱 -->
                            <div class="text-muted">{{$Vacancie->company_title}}</div> <!-- 公司分類 # -->
                        </div>
                        <div class="Jobs-Description Info-Item">
                            <div class="Jobs-Title">工作內容：</div>
                            <div class="Jobs-Content" style="white-space: pre-wrap;">{{$Vacancie->company_content}}</div>
                        </div>
                        <div class="Jobs-Info Info-Item">
                            <div class="Jobs-Title">公司資訊：</div>
                            <div class="Jobs-Content">
                                <ul class="d-flex flex-column">
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
                                </ul>
                            </div>
                        </div>
                        <div class="Jobs-Terms Info-Item">
                            <div class="Jobs-Title">要求條件：</div>
                            <div class="Jobs-Content">
                                <ul>
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
                                        <span>{{$Vacancie->company_other}}</span> <!-- 駕照之類的 -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="Jobs-Terms Info-Item">
                            <div class="Jobs-Title">公司福利：</div>
                            <div class="Jobs-Content">
                                <ul>
                                    <li>工作保險：
                                        <span>{{$Vacancie->company_safe}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" value="{{$Vacancie->company_email}}" name="company_email">
                    </div>
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