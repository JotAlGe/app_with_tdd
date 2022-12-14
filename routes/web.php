<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home')->middleware('auth');

    Route::resources([
        'foods' => FoodController::class,
        'carts' => CartController::class,
    ]);
});
