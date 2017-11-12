<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meal;
use App\Food;

use App\Http\Requests;

class MealController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        $meals = Meal::where('user_id', '=', $user->id)->get();
        return view('meal.index', compact("user", "meals"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('meal.create', compact("user"));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
        'name' => 'required',       
            ]);

             $user = Auth::user();
        $newId= Meal::insertGetId( [
             'name'=> $request->name,
             'user_id'=>$user->id,
             "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # \Datetime()]);
        ]);
        
        return redirect()->action('MealController@show', [$newId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foods = Food::where('meal_id', '=', $id)->get();
        $meal = Meal::find(['id'=>$id]);
       $meal = $meal[0];
       $totalProtein = 0;
       $totalCarbs  =  0;
       $totalFat = 0;
       foreach ($foods as $food) {
           # code...
        $totalProtein   += $food->protein;
        $totalCarbs   += $food->carbs;
        $totalFat   += $food->fat;
                
       }
       $totalKCal  = 4*($totalCarbs +$totalProtein) + 9*$totalFat;
       return view('meal.show', compact("meal", "foods", "totalProtein", "totalCarbs", "totalFat", "totalKCal"));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
