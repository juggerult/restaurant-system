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
                <th>Имя</th>
                <th>Почта</th>
                <th>Номер телефона</th>
                <th>Баланс</th>
                <th>Адресс</th>
                <th>Учетная запись</th>
            </tr>
        </thead>
        @foreach($users as $user)
        <tbody>
        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone_number}}</td>
        <td>{{$user->balance}}</td>
        <td>{{$user->adress}}</td>
        <td>{{$user->isActive}}</td>
        <td>
            @if($user->isActive)
            <form method="POST" action="{{route('user.delete', ['id' => $user->id])}}">
                @csrf
                @method('POST')
                <button type="submit" class="actionButton">Удалить</button>
            </form>
            @else
            <form method="POST" action="{{route('user.restore', ['id' => $user->id])}}">
                @csrf
                @method('POST')
                <button type="submit" class="actionButton">Востановить</button>
            </form>
            @endif
        </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
