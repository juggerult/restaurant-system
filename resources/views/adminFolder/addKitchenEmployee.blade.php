<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Kitchen Employee</title>
    <link href="{{ asset('adminFunction.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <form class="admin-form" action="{{ route('kitchen.save.add')}}" method="POST">
            @csrf

            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" value="">

            <label for="email">Почта:</label>
            <input type="text" id="email" name="email" value="">

            <label for="phone_number">Номер телефона:</label>
            <input type="tel" id="phone_number" name="phone_number" value="">

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" value="">

            <button type="submit">Добавить</button>
        </form>
    </main>
</body>
</html>
