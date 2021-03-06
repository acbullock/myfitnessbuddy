<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $user=Auth::user();
    return view('welcome', compact("user"));
});

Route::auth();

Route::resource('home', 'HomeController');
Route::resource('meal', 'MealController');
Route::resource('meal.food', 'FoodController');
