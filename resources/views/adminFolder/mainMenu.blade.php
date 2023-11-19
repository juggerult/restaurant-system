<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главное меню</title>
    <link href="{{ asset('tables.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <a class="addButton" href="{{route('kitchen.main')}}">Перейти к сотрудникам кухни {{$countKitchenMembers}}</a>
    <a class="addButton" href="{{route('delivery.main')}}">Перейти к сотрудникам доставки {{$countDeliverMembers}}</a>
    <a class="addButton" href="{{route('question.main')}}">Перейти к вопросам {{$countQuestions}}</a>
    <a class="addButton" href="{{route('admin.menu')}}">Перейти к меню {{$countMenuPositions}}</a>

    <div style="display: inline-flex;">
        <canvas id="myChart" width="700" height="350" style="margin-right: 100px; margin-left: 50px;"></canvas>
        <canvas id="orderCount" width="700" height="350" style="margin-left: 100px;"></canvas>
    </div>


    <script>
        var totalPrices = {!! json_encode($totalPrices) !!};
        var countOrders = {!! json_encode($orderCounts) !!};


        var data1 = {
            labels: Object.keys(totalPrices),
            datasets: [
                {
                    label: 'Прибыль',
                    data: Object.values(totalPrices),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        };

        var data2 = {
            labels: Object.keys(countOrders),
            datasets: [
                {
                    label: 'Кол-во выполненых',
                    data: Object.values(countOrders),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        };

        var options = {
            responsive: false, // Отключить автоматическое масштабирование
            maintainAspectRatio: false, // Отключить масштабирование
            scales: {
                xAxes: [{
                    beginAtZero: true
                }],
                yAxes: [{
                    beginAtZero: true
                }]
            }
        };

        // Создайте график
        var ctx = document.getElementById('myChart').getContext('2d');
        var count = document.getElementById('orderCount').getContext('2d');

        var countGra = new Chart(count, {
            type: 'bar',
            data: data2,
            options: options
        });
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data1,
            options: options
        });
    </script>
</body>
</html>
