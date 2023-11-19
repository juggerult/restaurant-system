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
        <h1>Reset Password</h1>
        <p>Введите почту которая была привязана к аккаунта</p>
        <div>
            <form action="{{route('user.email.check')}}" method="POST">
                @csrf
                <input type="text" placeholder="Почта" id="email" name="email"><br>
                @error('error')
                <div class="alert-danger">{{ $message }} </div>
                @enderror
                <button type="submit">Продолжить</button>
            </form>
        </div>
    </div>
</body>
</html>
