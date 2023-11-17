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
    <a class="addButton" href="{{route('delivery.add')}}"> Добавить нового сотрудника доставки</a>
    <table>
        <thead>
            <tr>
                <th>Имя сотрудника</th>
                <th>Почта</th>
                <th>Номер телефона</th>
                <th>Баланс</th>
                <th>Количество доставленых блюд</th>
            </tr>
        </thead>
        @foreach($employees as $employee)
        <tbody>
        <tr>
        <td>{{$employee->name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone_number}}</td>
        <td>{{$employee->balance}}</td>
        <td>{{$countOfDone}}</td>
        <td>
            <a class="actionButton" href="{{route('delivery.edit', ['id' => $employee->id])}}">Редактировать</a>
            <form method="POST" action="{{route('delivery.delete', ['id' => $employee->id])}}">
                @csrf
                @method('POST')
                <button type="submit" class="actionButton">Удалить</button>
            </form>
        </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
