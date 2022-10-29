<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Models\Cart;
use App\Models\Food;
use GuzzleHttp\Psr7\Request;
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

Route::resource('foods', FoodController::class)->names('foods');
Route::resource('carts', CartController::class)->names('carts');
