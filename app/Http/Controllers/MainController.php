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

        return view('templates.userHeader').view('userFolder.mainMenu', compact('snacks', 'mains', 'soups', 'desserts')) .view('templates.userFooter');
    }

    public function sendQuestion(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'question' => 'required',
        ]);

        $this->service->sendQuestion($data);

        return back();
    }
}
