<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главное меню</title>
    <link href="{{ asset('tables.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <a class="addButton" href="{{route('kitchen.main')}}">Перейти к сотрудникам кухни {{$countKitchenMembers}}</a>
    <a class="addButton" href="{{route('delivery.main')}}">Перейти к сотрудникам доставки {{$countDeliverMembers}}</a>
    <a class="addButton" href="{{route('question.main')}}">Перейти к вопросам {{$countQuestions}}</a>
    <a class="addButton" href="{{route('admin.menu')}}">Перейти к меню {{$countMenuPositions}}</a>
</body>
</html>
