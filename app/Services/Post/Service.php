<?php

namespace App\Services\Post;

use App\Models\Image;
use App\Models\Menu;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Question;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Service {

    public function addDishesToMenu($data){
        $menu = Menu::create($data);
        return $menu->id;
    }
    public function addImageDishesToMenu($data, $id){
        foreach ($data['images'] as $image) {
            // Генерация уникального имени файла
            $imageName = uniqid() . '.' . $image->extension();
            // Перемещение изображения в папку public/images
            $image->move(public_path('images'), $imageName);
            // Создание новой записи в таблице Image
            Image::create(['path' => 'images/' . $imageName, 'menu_id' => $id]);
        }
    }
    public function saveEditDishes(array $data, int $id)
    {
        Menu::findOrFail($id)->update($data);
    }



    public function saveNewAccount(array $data)
    {
        User::create($data);
    }
    public function sendQuestion(array $data){
        Question::create($data);
    }


    public function updateEmail($data){
        Auth::user()->email = $data;
        Auth::user()->save();
    }
    public function updatePhone($data){
        Auth::user()->phone_number = $data;
        Auth::user()->save();
    }
    public function updateAdress($data){
        Auth::user()->adress = $data;
        Auth::user()->save();
    }
    public function updatePassword($data){
        Auth::user()->password = bcrypt($data);
        Auth::user()->save();
    }

    public function replenishMoney($data){
        Auth::user()->balance += $data['amount'];
        Auth::user()->save();
    }




    public function saveNewKitchen($data){
        try {
            $user = User::create($data);
            $user->status = 'kitchen';
            $user->password = bcrypt($data['password']);
            $user->save();
        } catch (\Exception $e){
            return;
        }
    }
    public function saveEditKitchen($data, $id){
        $data['password'] = bcrypt($data['password']);
        $user = User::findOrFail($id)->update($data);
    }
    public function deleteKitchen($id){
        User::find($id)->delete();
    }





    public function saveNewProvider($data){
        try {
            $user = User::create($data);
            $user->status = 'deliver';
            $user->password = bcrypt($data['password']);
            $user->save();
        } catch (\Exception $e) {
            return;
        }
    }
    public function saveEditProvider($data, $id){
        $data['password'] = bcrypt($data['password']);
        $user = User::findOrFail($id)->update($data);
    }
    public function deleteProvider($id){
        User::find($id)->delete();
    }

    public function deleteUser($id){
        User::where('id', $id)->update(['isActive' => false]);
    }
    public function restoreUser($id){
        User::where('id', $id)->update(['isActive' => true]);

    }

    public function deleteQuestion($id){
        Question::find($id)->delete();
    }

    public function newOrder($totalAmount, $listOfSelectedDishes, $adress){
        $order = new Order();
        $order->fill([
            'meals' => $listOfSelectedDishes,
            'price' => $totalAmount,
            'adress' => $adress,
            'users_id' => Auth::user()->id,
        ]);
        $order->save();

        $user = Auth::user();
        $user->balance -= $totalAmount;
        $user->save();

        return $order->id;
    }


    public function kitchenTakeOrder($id){
        $order = Order::find($id);

        $order->timeAcceptCook = Carbon::now();
        $order->cook_id = Auth::user()->id;
        $order->status_oder = 'Готовится';
        $order->save();

        $notification = new Notification();
        $notification->notification = 'Ваш заказ уже готовится!';
        $notification->user_id = $order->users_id;
        $notification->save();

    }
    public function kitchenDoneOrder($id){
        $order = Order::find($id);

        $order->timeDoneCook = Carbon::now();
        $order->status_oder = 'Приготовлено';
        $order->save();

        $notification = New Notification();
        $notification->notification = 'Ваш заказ уже приготовлен, готовится к отправке';
        $notification->user_id = $order->users_id;
        $notification->save();
    }

    public function deliverTakeOrder($id){
        $order = Order::find($id);

        $order->timeAcceptDelivery = Carbon::now();
        $order->status_oder = 'Доставляется';
        $order->provider_id = Auth::user()->id;
        $order->save();

        $notification = new Notification();
        $notification->notification = 'Ваш заказ уже в пути!';
        $notification->user_id = $order->users_id;
        $notification->save();
    }
    public function deliverDoneOrder($id){
        $order = Order::find($id);

        $order->timeDoneDeveliry = Carbon::now();
        $order->status_oder = 'Доставлено';
        $order->save();

        $notification = new Notification();
        $notification->notification = 'Ваш заказ успешно доставлен';
        $notification->user_id = $order->users_id;
        $notification->save();

        $user = Auth::user();
        $user->balance += $order->price * 0.25;
        $user->save();
    }


    public function addReview($data){
        $data['user_id'] = Auth::user()->id;
        Review::create($data);
    }
    public function reviewDelete($id){
        Review::find($id)->delete();
    }


    public function checkEmail($email){
        if(User::where('email', $email)->exists()){
            return true;
        }

        return false;
    }
    public function temporaryPassword($length = 12){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';

        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        return $password;
    }
    public function newPassword($password, $email){
        $user = User::where('email', $email)->first();
        $user->password = $password;
        $user->save();
    }

}




