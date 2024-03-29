<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <style>
header {
    padding: 10px;
    background: rgba(34, 34, 34, 0.9);
    text-align: center;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

nav li {
    display: inline;
    margin-right: 20px;
}

nav a {
    font-size: 20px;
    font-family: 'Times New Roman', Times, serif;
    text-decoration: none;
    color: #fff;
}
</style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="{{route('main')}}">Главная</a></li>
            <li><a href="{{route('order')}}">Заказать</a></li>
            @if(!Auth::check())
            <li><a href="{{route('login')}}">Вход</a></li>
            @else
            <li><a href="{{route('profile')}}">Профиль</a></li>
            <li><a href="{{route('replenish.balance')}}">Баланс: {{Auth::user()->balance}} грн</a></li>
            <li><a href="{{route('logout')}}" style="color: red;">Выйти</a></li>
            @endif
        </ul>
        </nav>
    </header>

