<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function registration(){
        if(Auth::check()){
            return redirect()->to(route('main'));
        }

        return view('templates.userHeader') .view('userFolder.registration');
    }
    public function login(){
        return view('templates.userHeader') .view('userFolder.login');
    }

    public function loginEnter(Request $request){
        if(Auth::check()){
            return redirect()->to(route('main'));
        }

        $data = $request->only(['email', 'password']);
        if(Auth::attempt($data)){
            if(Auth::user()->isActive){
            switch (Auth::user()->status) {
                case 'user':
                    return redirect()->route('main');
                case 'admin':
                    return redirect()->route('admin.main');
                case 'kitchen':
                    return redirect()->route('kitchen.employee.main');
                case 'deliver':
                    return redirect()->route('deliver.employee.main');
                default:
                    return redirect()->route('user.login')->withErrors([
                        'error' => 'Не удалось авторизоваться'
                    ]);
            }
            }else{
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'error' => 'Ваша учетная запись заблокирована'
                ]);

            }
        }

        return redirect(route('login'))->withErrors([
            'error' => 'Не удалось авторизоваться'
        ]);
    }


    public function logout(){
        Auth::logout();
        return redirect()->to(route('main'));
    }


    public function register(Request $request)
    {
        if(Auth::check()){
            return redirect()->to(route('main'));
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'adress' => 'nullable',
            'password' => 'required',
        ]);

        if(User::where('email', $data['email'])->exists()){
            return redirect()->to(route('registration'))->withErrors([
                'error' => 'Пользователь с такой почтой уже зарегистрирован'
            ]);
        }elseif(User::where('phone_number', $data['phone_number'])->exists()){
            return redirect()->to(route('registration'))->withErrors([
                'error' => 'Пользователь с таким номермо телефона уже зарегистрирован'
        ]);
        }

        // Все поля массово присваиваются при создании пользователя
        $this->service->saveNewAccount($data);

        return back();
    }


}

