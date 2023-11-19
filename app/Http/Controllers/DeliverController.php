<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliverController extends BaseController
{

    public function main(){
        $notDoneOrder = Order::where(function ($query) { $query->where('status_oder', 'Приготовлено')
                                                                ->orWhere('status_oder', 'Доставляется');})->count();
        $DoneOrder = Order::where('status_oder', 'Доставлено')
                            ->where('provider_id', Auth::user()->id)->count();
        $allDevilerOrders = Order::where('status_oder', 'Приготовлено')
                                ->orWhere('status_oder', 'Доставляется')
                                ->orWhere('status_oder', 'Доставлено')->get();
        $users = User::all();

        return view('templates.deliveryHeader') .view('deliverFolder.main', compact('notDoneOrder', 'DoneOrder', 'allDevilerOrders', 'users'));
    }

    public function orders(){
        $orders = Order::where(function ($query) {
            $query->where('status_oder', 'Приготовлено')
                  ->orWhere(function ($query) {
                      $query->where('provider_id', Auth::user()->id)
                            ->where('status_oder', 'Доставляется');
                  });
        })->get();

        return view('templates.deliveryHeader') .view('deliverFolder.orders', ['orders' => $orders]);
    }

    public function takeOrder($id){
        $this->service->deliverTakeOrder($id);

        return back();
    }
    public function doneOrder($id){
        $this->service->deliverDoneOrder($id);

        return back();
    }

    public function doneOrders(){
        $orders = Order::where('provider_id', Auth::user()->id)
                        ->where('status_oder', 'Доставлено')->get();

        return view('templates.deliveryHeader') .view('deliverFolder.doneOrders', ['orders' => $orders]);
    }
}
