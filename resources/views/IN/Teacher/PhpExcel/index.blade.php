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
        <div class="Statistics-Box">
            <h1 class="text-center mb-3">資料統計</h1>
            <form action="{{route("PhpExcel.index")}}" method="get">
                <div class="Select-Date d-flex mb-3 flex-wrap">
                    <div class="col-sm-10 col px-1" style="min-width: 5rem;">
                        <select class="form-select" name="choose_date" id="choose_date">
                            <option value="0">今年</option>
                            <option value="1">去年</option>
                            <option value="2">前年</option>
                            <option value="3">大前年</option>
                            <option value="4">五年前</option>
                            <option value="5">六年前</option>
                            <option value="6">七年前</option>
                            <option value="7">八年前</option>
                            <option value="8">九年前</option>
                            <option value="9">十年前</option>
                        </select>
                    </div>
                    <div class="col-sm-2" style="min-width: 5rem;">
                        <input class="w-100 h-100 btn btn-primary" type="submit" value="送出" id="submit">
                    </div>
                </div>
                <div class="chart">
                    <div class="chart-Switch d-flex" id="chart-Switch">
                        <div class="Switch-Btn active" id="TagCountChart_Btn">技能分布</div>
                        <div class="Switch-Btn" id="SuccessPairChart_Btn">配對成功率</div>
                    </div>
                    <div class="TagCountchart">
                        <canvas id="TagCountChart" class="w-100"></canvas>
                    </div>
                    <div class="SuccessPairChart" style="min-width: 500px;">
                        <canvas id="SuccessPairChart" class="w-100" style="display: none;"></canvas>
                    </div>
                </div>
                <!-- <div class="mt-2 text-center"> -->
                <!-- <span>學生配對成功人數:{{$pair_count_data}}</span> -->
                <!-- </div> -->
            </form>
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        let select_choose_date = document.getElementById("choose_date")
        let Submit_btn = document.getElementById('submit')
        let url = location.href
        let date = 0
        if (url.indexOf('?') != -1) {
            date = url.split('?choose_date=')[1];
        }
        select_choose_date[date].selected = "true"

        // ChartSwitch
        let chart_Switch = document.querySelector('#chart-Switch')
        let Switch_Btn_Array = chart_Switch.querySelectorAll('.Switch-Btn')
        let canvas_Array = document.querySelectorAll('canvas')

        Switch_Btn_Array.forEach(function(Switch_Btn) {
            Switch_Btn.addEventListener('click', function() {
                let canvas_name = this.id.replace("_Btn", "") //圖表id
                // canvas切換
                canvas_Array.forEach(function(canvas) {
                    canvas.style.display = "none"
                    if (canvas.id === canvas_name) {
                        canvas.style.display = "block"
                    }
                })
                // Switch_Btn active切換
                for (let i = 0; i < Switch_Btn_Array.length; i++) {
                    Switch_Btn_Array[i].classList.remove("active")
                }
                // console.log(this)
                this.classList.add('active')
            })
        })

        // TagCountChart
        let languageList_label = ['C#', 'C++', "Java", "Python", "Kotlin", "Javascript", "React", "Vue", "Angular", "Php", "Mysql", "SqlServer", "Laravel"]
        let languageList = <?php echo json_encode($skill_count) ?>;
        let TagCountChart = document.getElementById('TagCountChart');

        const TagCount_data = {
            labels: languageList_label, //顯示區間名稱
            datasets: [{
                label: "選用數", // tootip 出現的名稱
                data: languageList, // 資料 [12, 24, 20, 19, 9, 30, 27, 25, 23, 25, 20, 23, 24]
                minBarLength: 10, // 起始值
                maxBarThickness: 40,
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(255, 223, 40, 0.3)",
                    "rgba(54, 219, 228, 0.2)",
                    "rgba(42, 180, 64, 0.2)",
                    "rgba(255, 0, 0, 0.2)",
                    "rgba(36, 99, 244, 0.2)",
                    "rgba(255, 159, 64, 0.2)",
                    "rgba(40, 150, 152, 0.2)",
                    "rgba(255, 47, 67, 0.2)",
                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                    "rgba(255, 223, 40, 1)",
                    "rgba(54, 219, 228, 1)",
                    "rgba(42, 180, 64, 1)",
                    "rgba(255, 0, 0, 1)",
                    "rgba(36, 99, 244, 1)",
                    "rgba(255, 159, 64, 1)",
                    "rgba(40, 150, 152, 1)",
                    "rgba(255, 47, 67, 1)",
                ],
                borderWidth: 1, // 外框線寬度
            }]
        };
        const TagCount_config = {
            type: 'bar', // 圖表類型
            data: TagCount_data,
            options: {
                maintainAspectRatio: false, // 保持圖表原有比例
                indexAxis: 'y',
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                scale: {
                    ticks: {
                        precision: 0
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        // position: 'right',
                    },
                    title: {
                        display: true,
                        text: '廠商選用技能數',
                        font: {
                            size: 24,
                        },
                    },
                },
            },
        };
        const TagCountChart_ = new Chart(TagCountChart, TagCount_config);

        // SuccessPairRateChart
        let pair_count = <?php echo json_encode($pair_count_data) ?>;
        let vacancies_count = <?php echo json_encode($vacancies_count_data) ?>;
        let remain_vacancies = vacancies_count - pair_count
        let SuccessRate = pair_count / vacancies_count

        const SuccessPairChart = document.getElementById('SuccessPairChart');
        const SuccessPairRate_data = {
            labels: [
                '配對成功率',
                '配對失敗率',
            ],
            datasets: [{
                label: ['數量'],
                data: [pair_count, remain_vacancies], // [SuccessRate, 1 - SuccessRate]
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',
                    // 'rgb(255, 205, 86)'
                ],
                hoverOffset: 4,
            }]
        };
        const SuccessPairRate_config = {
            type: 'pie',
            data: SuccessPairRate_data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        color: '#fff',
                        formatter: function(value) {
                            return Math.round((value / vacancies_count) * 100) + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 20,
                        }
                    },
                    legend: {
                        labels: {
                            font: {
                                size: 18,
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: '年度配對成功率',
                        font: {
                            size: 24,
                        },
                    },
                },
            },
            plugins: [ChartDataLabels]
        };
        const SuccessPairChart_ = new Chart(SuccessPairChart, SuccessPairRate_config);

        // console.log(vacancies_count)
    </script>
    @endsection
</body>

</html>