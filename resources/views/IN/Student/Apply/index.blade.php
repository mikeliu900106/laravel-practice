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
                    
                    <?echo $user_id?>
                    @foreach ($Vacancies as $Vacancie)
                        <?php 
                            $vacancies_id= $Vacancie->teacher_watch;
                            echo $vacancies_id;
                            $company_id = $Vacancie->company_id;
                            echo $company_id;
                        ?>
                        <div class="jobscont">
                            <div class="job_img">
                                <img src="../../image/content2.jpg"></img>
                            </div>
                            <div class="job_t">
                                <p><?php echo $Vacancie->vacancies_name ?></p>
                            </div>
                            <a href="{{route('Apply.show',$vacancies_id
                            //問學長
                            )}}"><img src="../../image/info-circle.svg">ssss</a>
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