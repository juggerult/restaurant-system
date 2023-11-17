<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вопросы</title>
    <link href="{{ asset('tables.css') }}" rel="stylesheet">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Имя</th>
                <th>Номер телефона</th>
                <th>Вопрос</th>
            </tr>
        </thead>
        @foreach($questions as $question)
        <tbody>
        <tr>
        <td>{{$question->name}}</td>
        <td>{{$question->phone_number}}</td>
        <td>{{$question->question}}</td>
        <td>
            <form method="POST" action="{{route('question.delete', ['id' => $question->id])}}">
                @csrf
                @method('POST')
                <button type="submit" class="actionButton">Удалить</button>
            </form>
        </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
