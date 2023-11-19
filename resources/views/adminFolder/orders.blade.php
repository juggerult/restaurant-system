<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Услуги</title>
    <link href="{{ asset('tables.css') }}" rel="stylesheet">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Блюда</th>
                <th>Статус заказа</th>
                <th>Цена заказа</th>
                <th>Имя повара</th>
                <th>Имя доставщика</th>
                <th>Имя заказчика</th>
                <th>Адресс доставки</th>
                <th>Время начала готовки</th>
                <th>Время конца готовки</th>
                <th>Время начала доставки</th>
                <th>Время конца доставки</th>
            </tr>
        </thead>
        @foreach($orders as $order)
        <tbody>
        <tr>
        <td>{{$order->meals}}</td>
        <td>{{$order->status_oder}}</td>
        <td>{{$order->price}}</td>
        <td>{{\App\Models\User::find($order->cook_id)->name }}</td>
        <td>{{\App\Models\User::find($order->provider_id)->name }}</td>
        <td>{{\App\Models\User::find($order->users_id)->name }}</td>
        <td>{{$order->adress}}</td>
        <td>{{$order->timeAcceptCook}}</td>
        <td>{{$order->timeDoneCook}}</td>
        <td>{{$order->timeAcceptDelivery}}</td>
        <td>{{$order->timeDoneDeveliry}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
