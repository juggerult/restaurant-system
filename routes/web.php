<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'menu']);

Route::prefix('admin')->group(function () {

    Route::get('/menu', [AdminController::class, 'menu'])->name('admin.menu');

    Route::get('/add/dishes-position', [AdminController::class, 'addDishes'])->name('admin.add.dishes');
    Route::post('/add/save-dishes', [AdminController::class, 'saveDishes'])->name('admin.save.dishes');

    Route::get('/edit-dishes/{id}', [AdminController::class, 'editDishes'])->name('admin.edit.dishes');
    Route::put('/edit-dishes/{id}', [AdminController::class, 'saveEditDishes'])->name('admin.save.edit.dishes');
    Route::post('/delete/dishes/{id}', [AdminController::class, 'deleteDishes'])->name('admin.delete.dishes');
});
