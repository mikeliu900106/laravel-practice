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
                <div class="d-flex mb-3 flex-wrap">
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
                    <canvas id="TagCountChart" class="w-100"></canvas>
                </div>
                <div class="mt-2 text-center">
                    <span>學生配對成功人數:{{$pair_count_data}}</span>
                </div>
            </form>
        </div>
    </div>
    @endsection

    @section('footer')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let select_choose_date = document.getElementById("choose_date")
        let Submit_btn = document.getElementById('submit')
        let url = location.href
        let date = 0
        if (url.indexOf('?') != -1) {
            let arr = url.split('?choose_date=');
            date = arr[1]
        }
        console.log(date)
        select_choose_date[date].selected = "true"

        var languageList = <?php echo json_encode($skill_count) ?>;
        var ctx = document.getElementById('TagCountChart');
        const chart = new Chart(ctx, {
            type: "bar", // 圖表類型
            data: {
                labels: ["C#", "C++", "Java", "Python", "Kotlin", "Javascript", "React", "Vue", "Angular", "Php", "Mysql", "SqlServer", "Laravel"], //顯示區間名稱
                datasets: [{
                    label: "次數", // tootip 出現的名稱
                    maxBarThickness: 40,
                    minBarLength: 10, // 起始值
                    data: languageList, // 資料
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                        "rgba(42, 180, 64, 0.2)",
                        "rgba(155, 20, 210, 0.2)",
                        "rgba(255, 0, 0, 0.2)",
                        "rgba(255, 191, 255, 0.2)",
                        "rgba(88, 44, 152, 0.2)",
                        "rgba(40, 150, 152, 0.2)",
                        "rgba(92, 154, 185, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                        "rgba(42, 180, 64, 1)",
                        "rgba(155, 20, 210, 1)",
                        "rgba(255, 0, 0, 1)",
                        "rgba(255, 191, 255, 1)",
                        "rgba(88, 44, 152, 1)",
                        "rgba(40, 150, 152, 1)",
                        "rgba(92, 154, 185, 1)",
                    ],
                    borderWidth: 1 // 外框線寬度
                }]
            },
            options: {
                indexAxis: 'y',
                maintainAspectRatio: false,
                beginAtZero: true,
                plugins: {
                    title: {
                        display: true,
                        text: '廠商選用Tag數',
                        font: {
                            size: 24,
                        }
                    },
                    legend: {
                        display: false,
                        // labels: {
                        //     font: {
                        //         size: 16
                        //     }
                        // }
                    }
                },
            },
        });
    </script>
    @endsection
</body>

</html>