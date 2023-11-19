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
    <a class="addButton" href="{{route('kitchen.employee.orders')}}">Перейти к неприготовленых заказам ({{$notDoneOrder}})</a>
    <a class="addButton" href="{{route('kitchen.employee.done.orders')}}">Просмотреть приготовленых заказов ({{$DoneOrder}})</a>
    <table>
        <thead>
            <tr>
                <th>Блюда</th>
                <th>Состояние заказа</th>
                <th>Время начатия готовки</th>
                <th>Время окончания готовки</th>
                <th>Имя повара</th>
            </tr>
        </thead>
        @foreach ($allKitchenOrders as $allKitchenOrder)
        <tbody>
        <tr>
        <td>{{$allKitchenOrder->meals}}</td>
        <td>{{$allKitchenOrder->status_oder}}</td>
        <td>{{$allKitchenOrder->timeAcceptCook}}</td>
        <td>{{$allKitchenOrder->timeDoneCook}}</td>
        <td> @if($user = \App\Models\User::find($allKitchenOrder->cook_id))
            {{ $user->name }}
        @else
            В ожидании
        @endif</td>
        </tr>
        </tbody>
        @endforeach
    </table>
</body>
</html>
