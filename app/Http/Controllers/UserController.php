<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Notification;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    public function main(){
        $notifications = Notification::where('user_id', Auth::user()->id)->paginate(10)->reverse();
        $orders = Order::where('users_id', Auth::user()->id)->get()->reverse();
        return view('userFolder.private', compact('notifications', 'orders'));
    }


    public function updateEmail(Request $request){
        $data = $request->input('email');
        if(User::where('email', $data)->exists()){
            return redirect()->to(route('profile'))->withErrors([
                'error' => 'Пользователь с такой почтой уже зарегистрирован'
            ]);
        }

        $this->service->updateEmail($data);

        return back()->withErrors([
            'error' => 'Изменения успешно сохранены'
        ]);
    }
    public function updatePhone(Request $request){
        $data = $request->input('phone_number');
        if(User::where('phone_number', $data)->exists()){
            return redirect()->to(route('profile'))->withErrors([
                'error' => 'Пользователь с таким номером телефона уже зарегистрирован'
            ]);
        }

        $this->service->updatePhone($data);

        return back()->withErrors([
            'error' => 'Изменения успешно сохранены'
        ]);
    }
    public function updatePassword(Request $request){
        $data = $request->input('password');

        $this->service->updatePassword($data);

        return back()->withErrors([
            'error' => 'Изменения успешно сохранены'
        ]);
    }
    public function updateAdress(Request $request){
        $data = $request->input('adress');

        $this->service->updateAdress($data);

        return back()->withErrors([
            'error' => 'Изменения успешно сохранены'
        ]);
    }



    public function replenish(){
        return view('templates.userHeader') .view('userFolder.replenishBalance') .view('templates.userFooter');
    }
    public function replenishProcces(Request $request){
        $amoutOfReplenish = $request->all();

        $this->service->replenishMoney($amoutOfReplenish);

        return redirect()->to(route('profile'));
    }


    public function order(){
        $menus = Menu::all();

        return view('templates.userHeader') .view('userFolder.order', ['menus' => $menus]) .view('templates.userFooter');
    }
    public function payOrder(Request $request){
        $adress = $request->input('adress');
        $totalAmount = $request->input('total_amount');
        if(Auth::user()->balance < $totalAmount){
            return redirect()->to(route('order'))->withErrors([
                'error' => 'Нам нехватает денег для оформления заказа. Пополните баланс'
            ]);
        }

        $listOfSelectedDishes = $this->getSelectedServices($request);

        $id = ($this->service->newOrder($totalAmount, $listOfSelectedDishes, $adress));

        return redirect()->to(route('user.chek', ['id' => $id]));
    }
    private function getSelectedServices(Request $request){

        $selectedDishes = json_decode($request->input('selected_dishes'), true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $selectedDishesString = '';

            foreach ($selectedDishes as $dish) {
                $selectedDishesString .= $dish['name'] .' x'.$dish['quantity'] .' ';
            }

            return $selectedDishesString;
        } else {
            return "Отмена";
        }
    }

    public function postOrder($id){
        $order = Order::find($id);
        return view('templates.userHeader') .view('userFolder.afterOrderInfo', ['order' => $order]) .view('templates.userFooter');
    }


}
