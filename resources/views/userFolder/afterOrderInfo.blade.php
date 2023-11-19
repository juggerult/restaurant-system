<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пополнение баланса</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-image: url('https://restoran5el.com.ua/image/catalog/about/rest_kuhnia_006.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin: 0;
    padding: 0;
    }

    .container {
    max-width: 400px;
    margin: 50px auto;
    background: rgba(34, 34, 34, 0.9);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
    text-align: center;
    color: #e5dddd;
    }

    form {
    display: flex;
    flex-direction: column;
    }

    label {
    margin-bottom: 8px;
    color: #e5dddd;
    }

    input {
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    }

    button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    button:hover {
    background-color: #45a049;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Чек</h1>
        <form action="{{route('main')}}" method="get">
            @csrf
            <h2 style="color: white;">Ваш заказ принят</h2>
            <label>Номер заказа: {{$order->id}}</label>
            <label>Заказ на сумму: {{$order->price}} грн</label>
            <label>Заказ на адресс: {{$order->adress}}</label>
            <label>Статус заказа: В обработке</label>
            <label>Дата заказа: {{$order->created_at}}</label>
            <img style="height: 150px; width: 150px; margin-left:auto; margin-right: auto;"src="https://t3.gstatic.com/licensed-image?q=tbn:ANd9GcSh-wrQu254qFaRcoYktJ5QmUhmuUedlbeMaQeaozAVD4lh4ICsGdBNubZ8UlMvWjKC"><br>
            <button type="submit">Вернуться на главную</button>
        </form>
    </div>
</body>
</html>
