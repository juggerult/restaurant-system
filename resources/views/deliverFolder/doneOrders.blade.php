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
                <th>Адресс</th>
                <th>Время начатия доставки</th>
                <th>Время окончания доставки</th>
                <th>Заработок за закак</th>
            </tr>
        </thead>
        @foreach($orders as $order)
        <tbody>
        <tr>
        <td>{{$order->meals}}</td>
        <td>{{$order->status_oder}}</td>
        <td>{{$order->adress}}</td>
        <td>{{$order->timeAcceptDelivery}}</td>
        <td>{{$order->timeDoneDeveliry}}</td>
        <td>{{$order->price * 0.25}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
