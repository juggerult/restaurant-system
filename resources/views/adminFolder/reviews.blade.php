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
                <th>Отзыв</th>
                <th>Оцена</th>
                <th>ID-Пользователя</th>>
                <th>Функции</th>
            </tr>
        </thead>
        @foreach($reviews as $review)
        <tbody>
        <tr>
        <td>{{$review->review}}</td>
        <td>{{$review->rating}}</td>
        <td>{{$review->user_id}}</td>
        <td>
            <form method="POST" action="{{route('admin.review.delete', ['id' => $review->id])}}">
                @csrf
                @method('POST')
                <button type="submit" class="actionButton">Удалить</button>
            <form>
        </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
