<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add Services</title>
    <style>
        /* Стили для формы */
.admin-form {
    background-color: #f2f2f2;
    padding: 20px;
    border: 1px solid #ddd;
    max-width: 400px;
    margin: 0 auto;
}

/* Стили для меток (labels) */
.admin-form label {
    display: block;
    margin-bottom: 10px;
}

/* Стили для вводных полей (input) */
.admin-form input {
    width: 95%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Стили для кнопки */
.admin-form button {
    background-color: #0077cc;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

.admin-form button:hover {
    background-color: #005599;
}

</style>
</head>
<body>
    <main>
        <form class="admin-form" action="{{route('admin.save.dishes')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Название блюда:</label>
            <input type="text" id="name" name="name" required>

            <label for="weight">Вес блюда:</label>
            <input type="text" id="weight" name="weight" required>

            <label for="price">Цена: </label>
            <input type="text" id="price" name="price" required>

            <label for="description">Краткое описание </label>
            <input type="description" id="description" name="description" required>

            <label for="description">Фото: </label>
            <input type="file" id="images" name="images[]" multiple required>

            <select name="type_dishes">
                <option value="Основное">Основное</option>
                <option value="Закуска">Закуска</option>
                <option value="Суп">Суп</option>
                <option value="Десерт">Десерт</option>
            </select>

            <button type="submit">Добавить</button>
        </form>
    </main>
</body>
</html>
