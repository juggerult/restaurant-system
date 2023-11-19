<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeliverController;
use App\Http\Controllers\KitchenController;
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


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/', [AdminController::class, 'main'])->name('admin.main');
    Route::get('/menu', [AdminController::class, 'menu'])->name('admin.menu');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');

    Route::get('/add/dishes-position', [AdminController::class, 'addDishes'])->name('admin.add.dishes');
    Route::post('/add/save-dishes', [AdminController::class, 'saveDishes'])->name('admin.save.dishes');

    Route::get('/edit-dishes/{id}', [AdminController::class, 'editDishes'])->name('admin.edit.dishes');
    Route::put('/edit-dishes/{id}', [AdminController::class, 'saveEditDishes'])->name('admin.save.edit.dishes');
    Route::post('/delete/dishes/{id}', [AdminController::class, 'deleteDishes'])->name('admin.delete.dishes');

    Route::get('/kitchen-employees', [AdminController::class, 'kitchen'])->name('kitchen.main');
    Route::get('/kitchen-employees/add', [AdminController::class, 'addKitchen'])->name('kitchen.add');
    Route::post('/kitchen-employees/add', [AdminController::class, 'saveAddKitchen'])->name('kitchen.save.add');

    Route::get('/kitchen-employees-edit/{id}', [AdminController::class, 'editKitchen'])->name('kitchen.edit');
    Route::put('/kitchen-employees-edit/{id}', [AdminController::class, 'saveEditKitchen'])->name('kitchen.save.edit');
    Route::post('/kitchen-employees-delete/{id}', [AdminController::class, 'deleteKitchen'])->name('kitchen.delete');

    Route::get('/delivery-employees', [AdminController::class, 'delivery'])->name('delivery.main');
    Route::get('/delivery-employees/add', [AdminController::class, 'addProvider'])->name('delivery.add');
    Route::post('/delivery-employees/add', [AdminController::class, 'saveAddProvider'])->name('delivery.save.add');

    Route::get('/delivery-employees-edit/{id}', [AdminController::class, 'editDelivery'])->name('delivery.edit');
    Route::put('/delivery-employees-edit/{id}', [AdminController::class, 'saveEditDelivery'])->name('delivery.save.edit');
    Route::post('/delivery-employees-delete/{id}', [AdminController::class, 'deleteDelivery'])->name('delivery.delete');

    Route::get('/users', [AdminController::class, 'users'])->name('user.main');
    Route::post('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');
    Route::post('/restore-user/{id}', [AdminController::class, 'restoreUser'])->name('user.restore');

    Route::get('/questions', [AdminController::class, 'question'])->name('question.main');
    Route::post('/delete-question/{id}', [AdminController::class, 'deleteQuestion'])->name('question.delete');

});

Route::prefix('user')->middleware('auth')->group(function () {

    Route::get('/profile', [UserController::class, 'main'])->name('profile');
    Route::post('/update-email', [UserController::class, 'updateEmail'])->name('update.email');
    Route::post('/update-phone', [UserController::class, 'updatePhone'])->name('update.phone');
    Route::post('/update-adress', [UserController::class, 'updateAdress'])->name('update.adress');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update.password');

    Route::get('/replenish-balance', [UserController::class, 'replenish'])->name('replenish.balance');
    Route::post('/replenish-procces', [UserController::class, 'replenishProcces'])->name('process.payment');

    Route::get('/order', [UserController::class, 'order'])->name('order');
    Route::post('/pay-order', [UserController::class, 'payOrder'])->name('pay.order');

    Route::get('/post-order/{id}', [UserController::class, 'postOrder'])->name('user.chek');
});

Route::prefix('kitchen')->middleware(['auth', 'kitchen'])->group(function(){

    Route::get('/', [KitchenController::class, 'main'])->name('kitchen.employee.main');
    Route::get('/menu', [KitchenController::class, 'menu'])->name('kitchen.employee.menu');

    Route::get('/orders', [KitchenController::class, 'orders'])->name('kitchen.employee.orders');
    Route::post('/take-order/{id}', [KitchenController::class, 'takeOrder'])->name('kitchen.employee.order.take');
    Route::post('/done-order/{id}', [KitchenController::class, 'doneOrder'])->name('kitchen.employee.order.done');
    Route::get('/done-orders', [KitchenController::class, 'doneOrders'])->name('kitchen.employee.done.orders');
});

Route::prefix('provider')->middleware(['auth', 'deliver'])->group(function(){

    Route::get('/', [DeliverController::class, 'main'])->name('deliver.employee.main');

    Route::get('/orders', [DeliverController::class, 'orders'])->name('deliver.employee.oders');
    Route::post('/take-order/{id}', [DeliverController::class, 'takeOrder'])->name('deviler.employee.order.take');
    Route::post('/done-order/{id}', [DeliverController::class, 'doneOrder'])->name('deliver.employee.order.done');
    Route::get('/done-orders', [DeliverController::class, 'doneOrders'])->name('delivert.employee.done.orders');
});

