<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Psy\TabCompletion\AutoCompleter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([], function () {

    Route::get('/', [MainController::class, 'menu'])->name('main');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-enter', [AuthController::class, 'loginEnter'])->name('login.post');
    Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
    Route::post('/registration-save', [AuthController::class, 'register'])->name('save.new.account');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/send-question', [MainController::class, 'sendQuestion'])->name('send.question');
});


Route::prefix('admin')->group(function () {

    Route::get('/menu', [AdminController::class, 'menu'])->name('admin.menu');

    Route::get('/add/dishes-position', [AdminController::class, 'addDishes'])->name('admin.add.dishes');
    Route::post('/add/save-dishes', [AdminController::class, 'saveDishes'])->name('admin.save.dishes');

    Route::get('/edit-dishes/{id}', [AdminController::class, 'editDishes'])->name('admin.edit.dishes');
    Route::put('/edit-dishes/{id}', [AdminController::class, 'saveEditDishes'])->name('admin.save.edit.dishes');
    Route::post('/delete/dishes/{id}', [AdminController::class, 'deleteDishes'])->name('admin.delete.dishes');
});

Route::get('/profile', [UserController::class, 'main'])->name('profile');
Route::post('/update-email', [UserController::class, 'updateEmail'])->name('update.email');
Route::post('/update-phone', [UserController::class, 'updatePhone'])->name('update.phone');
Route::post('/update-adress', [UserController::class, 'updateAdress'])->name('update.adress');
Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update.password');
