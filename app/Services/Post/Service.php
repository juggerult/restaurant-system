<?php

namespace App\Services\Post;

use App\Models\Image;
use App\Models\Menu;
use App\Models\Question;
use App\Models\User;
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
}




