<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Deviler Employee</title>
    <link href="{{ asset('adminFunction.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <form class="admin-form" action="{{ route('delivery.save.edit', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">

            <label for="email">Почта:</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">

            <label for="phone_number">Номер телефона:</label>
            <input type="tel" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" value="{{$user->password}}">

            <button type="submit">Сохранить</button>
        </form>
    </main>
</body>
</html>
