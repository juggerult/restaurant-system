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
    <a class="addButton" href="{{route('deliver.employee.oders')}}">Перейти к недоставленым заказам ({{$notDoneOrder}})</a>
    <a class="addButton" href="{{route('delivert.employee.done.orders')}}">Просмотреть доставленые заказы ({{$DoneOrder}})</a>
    <table>
        <thead>
            <tr>
                <th>Блюда</th>
                <th>Состояние заказа</th>
                <th>Адресс доставки</th>
                <th>Время старта доставки</th>
                <th>Время окончания доставки</th>
                <th>Имя доставщик</th>
                <th>Имя заказчика</th>
            </tr>
        </thead>
        @foreach ($allDevilerOrders as $allDeliverOrder)
        <tbody>
        <tr>
        <td>{{$allDeliverOrder->meals}}</td>
        <td>{{$allDeliverOrder->status_oder}}</td>
        <td>{{$allDeliverOrder->adress}}</td>
        <td>{{$allDeliverOrder->timeAcceptDelivery}}</td>
        <td>{{$allDeliverOrder->timeDoneDeveliry}}</td>
        <td>{{$allDeliverOrder->provider_id}}</td>
        <td> {{\App\Models\User::find($allDeliverOrder->users_id)->name }}
        </td>
        </tr>
        </tbody>
        @endforeach
    </table>
</body>
</html>
