<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа в ресторане</title>
    <link href="{{ asset('order.css') }}" rel="stylesheet">
    <script>
        function calculateTotal() {
    var checkboxes = document.querySelectorAll('.custom-checkbox');
    var totalAmountElement = document.getElementById('totalAmount');
    var selectedDishesElement = document.getElementById('selectedDishes');
    var totalAmount = 0;
    var selectedDishes = [];

    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            var quantityId = checkbox.dataset.quantityId;
            var quantityElement = document.getElementById('quantity' + quantityId);
            var quantity = parseInt(quantityElement.textContent);
            var price = parseFloat(checkbox.value);
            var dishTotal = price * quantity;

            totalAmount += dishTotal;

            selectedDishes.push({
                name: checkbox.dataset.name,
                quantity: quantity,
                total: dishTotal.toFixed(2),
            });
        }
    });

    totalAmountElement.textContent = totalAmount.toFixed(2);
    document.getElementById('total-amount-input').value = totalAmount;

    // Update selected dishes list
    selectedDishesElement.innerHTML = '';
    selectedDishes.forEach(function (dish) {
        selectedDishesElement.innerHTML += `<li>${dish.name} x${dish.quantity} - ${dish.total} грн</li>`;
    });

    document.getElementById('selected-dishes-input').value = JSON.stringify(selectedDishes);
    }


        function increment(quantityId) {
            var quantityElement = document.getElementById('quantity' + quantityId);
            var quantity = parseInt(quantityElement.textContent);
            quantityElement.textContent = quantity + 1;
            calculateTotal();
        }

        function decrement(quantityId) {
            var quantityElement = document.getElementById('quantity' + quantityId);
            var quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantityElement.textContent = quantity - 1;
                calculateTotal();
            }
        }

    </script>
</head>
<body>
    <header>
        <h1>Restaurant Order</h1>
        <span class="header-span"></span>
    </header>
    <form method="POST" action="{{route('pay.order')}}">
        @csrf
        @method('POST')
    <div class="container">
        @foreach ($menus as $menu)
            <div class="menuPosition">
                <p>{{$menu->name}} {{$menu->price}} грн <br> {{$menu->weight}} грамм<br> <span style="font-size: 17px;"> {{$menu->description}}</span>  <br>
                    <input type="checkbox" name="custom-checkbox[]" class="custom-checkbox" value="{{ $menu->price }}" data-quantity-id="{{ $menu->id }}" data-name="{{ $menu->name }}" onchange="calculateTotal()">
                    <div style="display: inline-block;">
                        <p onclick="increment({{$menu->id}})" class="pClass" style="font-size: 25px;">+</p>
                        <p id="quantity{{$menu->id}}">1</p>
                        <p onclick="decrement({{$menu->id}})" class="pClass" style="font-size: 25px;">-</p>
                    </div>
                </p>
                @foreach ($menu->images as $photo)
                    <img src="{{ asset($photo->path) }}">
                @endforeach
            </div>
        @endforeach
        <p>Итого к оплате: <span id="totalAmount">0</span> грн</p>
        <ul id="selectedDishes"></ul>
        <input type="hidden" name="total_amount" id="total-amount-input" value="0">
        <input type="hidden" name="selected_dishes" id="selected-dishes-input" value="">
        <input type="text" name="adress" placeholder="Введите адресс" value="{{Auth::user()->adress}}">
        <button type="submit" class="actionButton">Перейти к оплате</button>
        </form>
        @error('error')
        <div class="alert-danger">{{ $message }}</div>
        @enderror
    </div>
</body>
</html>
