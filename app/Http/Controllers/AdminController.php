<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class AdminController extends BaseController
{


    public function menu()
    {
        $menu = Menu::all()->reverse();

        return view('templates.adminHeader') . view('adminFolder.menu', ['menus' => $menu]);
    }


    public function addDishes(){
        return view('templates.adminHeader') .view('adminFolder.addMenuPosition');
    }

    public function saveDishes(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type_dishes' => 'required'
        ]);

        $imageData = $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $this->service->addImageDishesToMenu($imageData, $this->service->addDishesToMenu($data));

        return redirect()->to(route('admin.menu'));
    }

    public function editDishes($id){
        $dish = Menu::find($id);

        return view('templates.adminHeader') .view('adminFolder.editDishes', ['dish' => $dish]);
    }

    public function saveEditDishes(Request $request ,$id){
        $data = $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type_dishes' => 'required'
        ]);

        $this->service->saveEditDishes($data, $id);

        return redirect()->to(route('admin.menu'));
    }
}
