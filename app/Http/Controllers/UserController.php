<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function main(){
        return view('userFolder.Private');
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
        return view('templates.userHeader') .view('userFolder.replenishBalance');
    }
    public function replenishProcces(Request $request){
        $amoutOfReplenish = $request->all();

        $this->service->replenishMoney($amoutOfReplenish);

        return redirect()->to(route('profile'));
    }
}
