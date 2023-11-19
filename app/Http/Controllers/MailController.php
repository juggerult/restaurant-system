<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends BaseController
{
    public function forgot(){
        return view('templates.userHeader') .view('forgotPassword');
    }
    public function checkEmail(Request $request){
        $email = $request->input('email');

        if($this->service->checkEmail($email)){
            $this->sendMail($this->service->temporaryPassword(), $email);

            return redirect()->to(route('user.forgot.password'))->withErrors([
                'error' => 'Временный пароль был отправлен вам на почту. Не забудьте сменить его как можно скорее'
            ]);
        }

        return redirect()->to(route('user.forgot.password'))->withErrors([
            'error' => 'Не найдено аккаунт с такой почтой'
        ]);
    }
    private function sendMail($password, $email){
        # Mail::send(['text' => 'mail'], ['name' => 'Restaurant'], function($message) use ($password, $email) {
        #    $message->to($email)->subject('Reset password')->setBody("Ваш временный пароль: $password");
        #    $message->from('kovaltestLaravel@gmail.com', ' ');
        # });

        $this->service->newPassword($password, $email);
    }

}
