@extends('layouts.app')

@section('title')
Details for {{ $meal->name }}
@stop

@section('content')
<div class="container">
  
  <div class="meal-info">
    <h2 class="meal-name">{{$meal->name}}&nbsp;</h2>

    <span class="meal-time">
      {{$meal->created_at->format('m/d/y H:i A')}}
    </span>

    <br>

    <span class="meal-data label label-pill label-primary">
      {{$totalKCal}} kCal
    </span>

    <span class="meal-data label label-pill label-default">
      {{$totalProtein}}g Protein
    </span>

    <span class="meal-data label label-pill label-default">
      {{$totalCarbs}}g Carbohydrates
    </span>

    <span class="meal-data label label-pill label-default">
      {{$totalFat}}g Fat
    </span>
  </div>

  <hr>
  <h3>Foods</h3>
  <ul class="list-group">
    @foreach ($foods as $food)
    <li class="list-group-item">
      {{$food->name}}
       <span class="food-pcf pull-right">
P {{$food->protein}}: C {{$food->carbs}}: F {{$food->fat}}
          </span>
      
    </li>
    @endforeach
  </ul>
    <hr>
     

    <form action="/meal/{{$meal->id}}/food" method="post">
    
    {{ csrf_field() }}
    
    <div class="form-group row">
      <label for="name" class="col-sm-2 form-control-label">Food Name</label>
      <div class="col-sm-10">
        <input class="form-control" type="text" name="name" placeholder="Food Name" required="">
      </div>
    </div>

    <div class="form-group row">
      <label for="protein" class="col-sm-2 form-control-label">Protein</label>
      <div class="col-sm-10">
        <input class="form-control" type="number" name="protein" placeholder="Protein/g" required="">
      </div>
    </div>

    <div class="form-group row">
      <label for="carbohydrates" class="col-sm-2 form-control-label">Carbohydrates</label>
      <div class="col-sm-10">
        <input class="form-control" type="number" name="carbs" placeholder="Carbohydrates/g" required="">
      </div>
    </div>

    <div class="form-group row">
      <label for="fat" class="col-sm-2 form-control-label">Fat</label>
      <div class="col-sm-10">
        <input class="form-control" type="number" name="fat" placeholder="Fat/g" required="">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-primary" value="submit" type="submit">Submit</button>
      </div>
    </div>
    
  </form>
  <hr>
</div>
@stop
