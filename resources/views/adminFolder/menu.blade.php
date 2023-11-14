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
    <a class="addButton" href="{{route('admin.add.dishes')}}"> Добавить новое блюдо </a>
    <table>
        <thead>
            <tr>
                <th>Название блюда</th>
                <th>Описание</th>
                <th>Тип блюда</th>
                <th>Вес</th>
                <th>Цена</th>
                <th>Функции</th>
            </tr>
        </thead>
        @foreach($menus as $itemMenu)
        <tbody>
        <tr>
        <td>{{$itemMenu->name}}</td>
        <td>{{$itemMenu->description}}</td>
        <td>{{$itemMenu->type_dishes}}</td>
        <td>{{$itemMenu->weight}}</td>
        <td>{{$itemMenu->price}}</td>
        <td>
            <a class="actionButton" href="{{ route('admin.edit.dishes', ['id'=> $itemMenu->id]) }}">Редактировать</a>
            <form method="POST" action="{{ route('admin.delete.dishes', ['id' => $itemMenu->id]) }}">
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
