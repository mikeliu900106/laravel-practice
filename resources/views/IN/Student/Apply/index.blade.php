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
        {{-- @foreach ($user_id as $id)
           
        @endforeach --}}
        <div id="wrap">
            <div id="content">
                
                <div id="applyBox">
                    <form action="{{route("Apply.index")}}" method = "GET">
                        <input type="search" id="site-search" name="search">
                        <button>查詢</button>
                    </form>
                    <?echo $user_id?>
                    @foreach ($Vacancies as $Vacancie)
                        <?php 
                            $vacancies_id= $Vacancie->vacancies_id;
                        ?>
                        <div class="jobscont">
                            <div class="job_img">
                                <img src="../../image/contenzt2.jpg"></img>
                            </div>
                            <div class="job_t">
                                <p>職位名稱:{{$Vacancie->vacancies_name}}</p>
                            </div>
                            <div class="job_t">
                                <p>公司名稱:{{$Vacancie->company_name}}</p>
                            </div>
                            <a href="{{route('Apply.show',$vacancies_id)}}">
                                <img src="../../image/info-circle.svg">
                                詳細資訊
                            </a>
                            <!-- <img src="image/info-circle.svg" class="moreInfobtn"> -->
                        </div>
                    @endforeach
                </div>
            </div> <!-- content -->
        </div> 
        
        
            
       


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>