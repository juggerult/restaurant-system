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
        <h1>Пополнение баланса</h1>
        <form action="{{route('process.payment')}}" method="post">
            @csrf
            <label for="amount">Сумма пополнения:</label>
            <input type="text" id="amount" name="amount" placeholder="Введите сумму" required>

            <label for="card_number">Номер карты:</label>
            <input type="text" id="card_number" name="card_number" placeholder="XXXX-XXXX-XXXX-XXXX" required>

            <label for="expiry_date">Срок действия:</label>
            <input type="text" id="expiry_date" name="expiry_date" placeholder="ММ/ГГ" required>

            <label for="cvv">CVV код:</label>
            <input type="text" id="cvv" name="cvv" placeholder="***" required>

            <button type="submit">Пополнить баланс</button>
        </form>
    </div>

</body>
</html>
