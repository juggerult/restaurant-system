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
        <h1>Login</h1>
        <p>Введите свои учетные данные</p>
        <div>
            <form action="{{route('login.post')}}" method="POST">
                @csrf
                <input type="text" placeholder="Почта" id="email" name="email"><br>
                <input type="password" placeholder="Пароль" id="password" name="password">
                @error('error')
                <div class="alert-danger">{{ $message }} </div>
                @enderror
                <button type="submit">Войти</button>
                <p><a href="{{route('registration')}}">Нет аккаунта? - Регистрируй!</a></p>
                <p><a href="{{route('registration')}}">Забыли пароль? - Восстановите его сейчас же!</a></p>
            </form>
        </div>
    </div>
</body>
</html>
