<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('auth.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        <p>Введите свои учетные данные</p>
        <div>
            <form action="{{route('save.new.account')}}" method="POST">
                @csrf
                <input type="text" placeholder="Имя" id="name" name="name"><br>
                <input type="text" placeholder="Почта" id="email" name="email"><br>
                <input type="text" placeholder="Номер телефона" id="phone_number" name="phone_number"><br>
                <input type="text" placeholder="Адресс доставки (необязательно)" id="adress" name="adress"><br>
                <input type="password" placeholder="Пароль" id="password" name="password">
                @error('error')
                <div class="alert-danger">{{ $message }} </div>
                @enderror
                <button type="submit">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</body>
</html>
