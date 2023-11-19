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
                <th>Название блюда</th>
                <th>Описание</th>
                <th>Тип блюда</th>
                <th>Вес</th>
                <th>Цена</th>
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
        </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
