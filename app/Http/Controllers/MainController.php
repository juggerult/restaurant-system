<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MainController extends BaseController
{

    public function menu(){
        $snacks = Menu::where('type_dishes', 'Закуска')->get();
        $mains = Menu::where('type_dishes', 'Основное')->get();
        $soups = Menu::where('type_dishes', 'Суп')->get();
        $desserts = Menu::where('type_dishes', 'Десерт')->get();

        return view('userFolder.mainMenu', compact('snacks', 'mains', 'soups', 'desserts'));
    }
}
