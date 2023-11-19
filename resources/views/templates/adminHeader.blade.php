<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin - Panel</title>
    <link href="{{ asset('templates.css') }}" rel="stylesheet">
</head>
<body>
    <header class="admin-header">
        <nav>
            <ul>
                <li><a href="{{route('admin.main')}}">Главная</a></li>
                <li><a href="{{route('kitchen.main')}}">Сотрудники кухни</a></li>
                <li><a href="{{route('delivery.main')}}">Сотрудники доставки</a></li>
                <li><a href="{{route('admin.orders')}}">Заказы</a></li>
                <li><a href="{{route('admin.menu')}}">Меню</a></li>
                <li><a href="{{route('user.main')}}">Пользователи</a></li>
                <li><a href="{{route('question.main')}}">Вопросы</a></li>
                <li><a href="{{route('logout')}}">Выйти</a></li>
            </ul>
        </nav>
    </header>
    <main>
    </main>
