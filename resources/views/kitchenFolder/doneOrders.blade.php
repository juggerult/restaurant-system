<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Выполненые заказы</title>
    <link href="{{ asset('tables.css') }}" rel="stylesheet">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Блюда</th>
                <th>Состояние заказа</th>
                <th>Время начатия готовки</th>
                <th>Время окончания готовки</th>
            </tr>
        </thead>
        @foreach($orders as $order)
        <tbody>
        <tr>
        <td>{{$order->meals}}</td>
        <td>{{$order->status_oder}}</td>
        <td>{{$order->timeAcceptCook}}</td>
        <td>{{$order->timeDoneCook}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
