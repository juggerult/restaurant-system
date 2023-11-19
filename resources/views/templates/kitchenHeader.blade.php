<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Kitchen - Panel</title>
    <link href="{{ asset('templates.css') }}" rel="stylesheet">
</head>
<body>
    <header class="admin-header">
        <nav>
            <ul>
                <li><a href="{{route('kitchen.employee.main')}}">Главная</a></li>
                <li><a href="{{route('kitchen.employee.orders')}}">Заказы</a></li>
                <li><a href="{{route('kitchen.employee.done.orders')}}">Выполнены заказы</a></li>
                <li><a href="{{route('kitchen.employee.menu')}}">Меню</a></li>
                <li><a href="{{route('logout')}}">Выйти</a></li>
            </ul>
        </nav>
    </header>
    <main>
    </main>
