<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KitchenController extends BaseController
{

    public function main(){
        $notDoneOrder = Order::where(function ($query) { $query->where('status_oder', 'В обработке')
                                                                ->orWhere('status_oder', 'Готовится');})->count();
        $DoneOrder = Order::where('status_oder', 'Приготовлено')
                            ->where('cook_id', Auth::user()->id)->count();
        $allKitchenOrders = Order::where('status_oder', 'В обработке')
                                ->orWhere('status_oder', 'Готовится')
                                ->orWhere('status_oder', 'Приготовлено')->get();
        $users = User::all();

        return view('templates.kitchenHeader') .view('kitchenFolder.main', compact('notDoneOrder', 'DoneOrder', 'allKitchenOrders', 'users'));
    }

    public function menu(){
        $menus = Menu::all();

        return view('templates.kitchenHeader') .view('kitchenFolder.menu', ['menus' => $menus]);
    }

    public function orders(){
        $orders = Order::where(function ($query) {
            $query->where('status_oder', 'В обработке')
                  ->orWhere(function ($query) {
                      $query->where('cook_id', Auth::user()->id)
                            ->where('status_oder', 'Готовится');
                  });
        })->get();


        return view('templates.kitchenHeader') .view('kitchenFolder.orders', ['orders' => $orders]);
    }

    public function takeOrder($id){
        $this->service->kitchenTakeOrder($id);

        return back();
    }
    public function doneOrder($id){
        $this->service->kitchenDoneOrder($id);

        return back();
    }

    public function doneOrders(){
        $orders = Order::where('cook_id', Auth::user()->id)
                        ->where('status_oder', '!=', 'В обработке')
                        ->where('status_oder', '!=', 'Готовится')->get();

        return view('templates.kitchenHeader') .view('kitchenFolder.doneOrders', ['orders' => $orders]);
    }
}
