<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказы</title>
    <link href="{{ asset('tables.css') }}" rel="stylesheet">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Блюда</th>
                <th>Состояние заказа</th>
                <th>Адресс доставки</th>
                <th>Прибыль за доставку</th>
                <th>Время старта доставки</th>
                <th>Время окончания доставки</th>
                <th>Имя заказчика</th>
                <th>Функции</th>
            </tr>
        </thead>
        @foreach($orders as $order)
        <tbody>
        <tr>
        <td>{{$order->meals}}</td>
        <td>{{$order->status_oder}}</td>
        <td>{{$order->adress}}</td>
        <td>{{$order->price * 0.25}}</td>
        <td>{{$order->timeAcceptDelivery}}</td>
        <td>{{$order->timeDoneDeveliry}}</td>
        <td>{{\App\Models\User::find($order->users_id)->name }}</td>
        <td>
            @if($order->status_oder == 'Приготовлено')
            <form method="POST" action="{{route('deviler.employee.order.take', ['id' => $order->id])}}">
                @csrf
                @method('POST')
                <button type="submit" class="actionButton">Взяться</button>
            </form>
            @else
            <form method="POST" action="{{route('deliver.employee.order.done', ['id' => $order->id])}}">
                @csrf
                @method('POST')
                <button type="submit" class="actionButton">Отменить как доставлено</button>
            </form>
            @endif
        </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
