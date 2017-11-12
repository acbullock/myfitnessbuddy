<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Meal;
use Illuminate\Support\Facades\Auth;
use App\Food;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = \Carbon\Carbon::today()->toDateString();
        $user = Auth::user();
        $meals = Meal::where('user_id','=', $user->id)->get();
        $dailyProtein = 0;
        $dailyCarbs=0;
        $dailyFat=0;
        $dailyKCal=0;
        foreach ($meals as $meal) {
            // echo "$meal";
            $foods = Food::where('meal_id',"=", $meal->id)->get();
            foreach ($foods as $food) {
               $dailyProtein   += $food->protein;
               $dailyCarbs += $food->carbs;
               $dailyFat    += $food->fat;
            }
        }
        $dailyKCal  = 4*($dailyProtein +$dailyCarbs )+9*$dailyFat;
        return view('home', compact("user","meals", "dailyProtein", "dailyCarbs", "dailyFat", "dailyKCal"));
    }
}
