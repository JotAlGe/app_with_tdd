<?php

use App\Models\Food;
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

Route::get('/foods', function () {
    return view('foods.index', [
        'foods' => Food::all()
    ]);
});


Route::get('/foods/{food}', function (Food $food) {
    return view('foods.show', compact('food'));
});
