<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Services</title>
    <link href="{{ asset('adminFunction.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <form class="admin-form" action="{{ route('admin.save.edit.dishes', ['id' => $dish->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Название блюда:</label>
            <input type="text" id="name" name="name" value="{{ $dish->name }}">

            <label for="weight">Вес блюда:</label>
            <input type="text" id="weight" name="weight" value="{{ $dish->weight }}">

            <label for="price">Цена: </label>
            <input type="text" id="price" name="price" value="{{ $dish->price }}">

            <label for="description">Краткое описание </label>
            <input type="text" id="description" name="description" value="{{ $dish->description }}">

            <select name="type_dishes">
                <option value="Основное" {{ $dish->type_dishes === 'Основное' ? 'selected' : '' }}>Основное</option>
                <option value="Закуска" {{ $dish->type_dishes === 'Закуска' ? 'selected' : '' }}>Закуска</option>
                <option value="Суп" {{ $dish->type_dishes === 'Суп' ? 'selected' : '' }}>Суп</option>
                <option value="Десерт" {{ $dish->type_dishes === 'Десерт' ? 'selected' : '' }}>Десерт</option>
            </select>

            <button type="submit">Сохранить</button>
        </form>

    </main>
</body>
</html>
