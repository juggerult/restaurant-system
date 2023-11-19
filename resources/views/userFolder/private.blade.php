<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личная страница пользователя</title>
    <style>
        /* Общие стили */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://c.pxhere.com/photos/45/ea/photo-179207.jpg!d');
            background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        }

        /* Стили для заголовка */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(34, 34, 34, 0.6);
            color: #fff;
        }

        .profile-info {
            display: flex;
            align-items: center;
        }

        .profile-info img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Стили для навигации */
        .main-ul {
            list-style: none;
            padding: 0;
            display: flex;
        }

        .main-navigation li {
            margin-right: 20px;
        }

        .main-navigation a {
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            font-size: 18px;
            position: relative;
        }


        /* Стили для разделов */
        .content {
            padding: 20px;
            background: rgba(34, 34, 34, 0.6);
        }

        .about-section {
            background-color: #333;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .notifications-section {
            background: rgba(34, 34, 34, 0.6);
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1;
        }

        .notification-button {
            background-color: #64ab8d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .notification-button:hover {
            background-color: #3d6d54;
        }

        /* Стили для уведомлений */
        .notification-tab h2 {
            font-size: 20px;
            margin: 0;
            margin-bottom: 10px;
        }

        .notification-tab ul {
            list-style: none;
            padding: 0;
        }

        .notification-tab li {
            margin-bottom: 5px;
        }

        /* Показываем блок с уведомлениями при наведении на текст "Уведомления" */
        .noti:hover .notifications-section{
            display: block;
        }
        button {
        border-color: #fff;
        color: white;
        background: none;
        width: 250px;
        display: block;
        text-transform: uppercase;
        font-weight: 900;
        border: 2px solid #64ab8d;
}
p {
    font-size: 20px;
    color: #fff;
    text-transform: none;
    margin-top: 0;
    opacity: 0.7;
    font-family: 'Open Sans';
    letter-spacing: 0;
    font-style: italic;
    font-weight: 300;
}

button:hover {
    color: #fff;
    background: #64ab8d;
}
textarea,input{
    color: #f7efef;
    text-transform: uppercase;
    font-weight: 900;
    width: 250px;
    outline: none;
    padding: 12px;
    border: 2px solid #444;
    background: none;
    transition: all 0.5s ease-in-out;
}
.alert-danger {
    background: rgba(34, 34, 34, 0.9);
    padding: 20px;
    color: #fff;
    font-weight: 300;
    width: 30%;
    font-size: 20px;
    border: 2px solid #64ab8d;
    text-align: center;
    border-radius: 10px;
}

.alert-danger a {
    color: #fff;
    text-decoration: underline;
}
table {
    border-collapse: collapse;
    width: 100%;
    background-color: #333;
    border: 2px solid #444;
    color: #fff;
}

/* Стили для строк */
tr {
    border: 2px solid #444;
}

/* Стили для заголовков столбцов */
th {
    background-color: #222;
    color: #fff;
    font-weight: 600;
    text-align: left;
    padding: 10px;
    border: 2px solid #444;
}

/* Стили для ячеек данных */
td {
    padding: 10px;
    border: 2px solid #444;
}
    </style>
</head>
<body>
    <header class="header">
        <div class="profile-info">
            <img src="https://icons.veryicon.com/png/o/internet--web/prejudice/user-128.png" alt="User Image">
            <h1>{{Auth::user()->name}}</h1>
        </div>
        <nav class="main-navigation">
            <ul class="main-ul">
                <li><a href="{{route('main')}}">Главная</a></li>
                <li><a href="{{route('order')}}">Заказать</a></li>
                <li><a href="{{route('logout')}}">Выйти</a></li>
                <li class="noti">
                    <a>Уведомления</a>
                    <div class="notifications-section" id="notifications">
                        <h2>Уведомления</h2>
                        <ul class="notification-ul">
                            @foreach($notifications as $notificate)
                            <li>{{$notificate->notification}} /{{ $notificate->created_at->format('d.m H:i') }}</li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li><a href="{{route('replenish.balance')}}">Баланс {{Auth::user()->balance}}</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <section class="about-section">
            <h2>Контактная информация <p style="font-size: 15px;">Если вы хотите изменить личную информацию то вводите новые данные та нажимайте на кнопку</p></h2>
            <div class="row" style="display: inline-flex;">
            <form action="{{route('update.email')}}" method="POST">
            @csrf
            <p>Почта</p>
            <input type="text" name="email" value="{{ Auth::user()->email }}">
             <button type="submit" class="btn btn-primary btn-sm" id="editEmail">Изменить</button></p>
            </form>
            <form action="{{route('update.phone')}}" method="POST">
            @csrf
            <p>Номер телефона</p>
            <input type="tel" name="phone_number" value="{{ Auth::user()->phone_number }}">
            <button type="submit" class="btn btn-primary btn-sm" id="editPhoneNumber">Изменить</button></p>
            </form>
            </div><br>
            <div class="row" style="display: inline-flex;">
            <form action="{{route('update.password')}}" method="POST">
                @csrf
                <p>Пароль</p>
                <input type="password" name="password" value="">
                <button type="submit" class="btn btn-primary btn-sm" id="editPhonePassword">Изменить</button></p>
            </form>
            <form action="{{route('update.adress')}}" method="POST">
                @csrf
                <p>Адрес</p>
                <input type="text" name="adress" value="{{ Auth::user()->adress }}">
                <button type="submit" class="btn btn-primary btn-sm" id="editPhoneAdress">Изменить</button></p>
            </form>
            </div>
            @error('error')
                <div class="alert-danger">{{ $message }}</div>
            @enderror

        </section>
    </div>
    <div class="content">
        <section class="about-section">
            <h2>Ваши записи</h2>
            <table>
                <thead>
                    <tr>
                        <th>Заказ</th>
                        <th>Цена</th>
                        <th>Адрес доставки</th>
                        <th>Статус заказа</th>
                        <th>Время начала готовки</th>
                        <th>Время начала доставки доставки</th>
                        <th>Номер телефона доставщика</th>
                    </tr>
                </thead>
                @foreach ($orders as $order)
                <tbody>
                <tr>
                    <td>{{$order->meals}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->adress}}</td>
                    <td>{{$order->status_oder}}</td>
                    <td>{{$order->timeAcceptCook}}</td>
                    <td>{{$order->timeAcceptDelivery}}</td>
                    <td>{{\App\Models\User::find($order->provider_id)->phone_number}}</td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </section>
    </div>
    <script>
        var notificationButton = document.querySelector('.noti');
        var notificationsSection = document.getElementById('notifications');

        notificationButton.addEventListener('mouseenter', function(e) {
            var x = e.clientX;
            var y = e.clientY;
            notificationsSection.style.display = 'block';
            notificationsSection.style.position = 'fixed';
            notificationsSection.style.top = (y + 10) + 'px';
            notificationsSection.style.left = (x - 150) + 'px';
        });

        notificationButton.addEventListener('mouseleave', function() {
            notificationsSection.style.display = 'none';
        });
    </script>
</body>
</html>
