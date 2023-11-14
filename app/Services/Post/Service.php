<?php

namespace App\Services\Post;

use App\Models\Image;
use App\Models\Menu;

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
}




