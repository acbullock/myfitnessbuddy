<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Meal;
use App\Http\Requests;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       $this->validate($request, [
        'name' => 'required',
        'protein' => 'required',
        'carbs' => 'required',
        'fat' => 'required'
            ]);
       Food::insert([
          'name'=>$request->name,
          'meal_id'=>$id,
          'protein' =>$request->protein,
          'carbs'=>$request->carbs,
          'fat'=>$request->fat,
          "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
          "updated_at" => \Carbon\Carbon::now()  # \Datetime()]);
       ]);
       $meal = Meal::find(['id'=>$id]);
       $meal = $meal[0];
       
       $foods = Food::where('meal_id', '=', $id)->get();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
