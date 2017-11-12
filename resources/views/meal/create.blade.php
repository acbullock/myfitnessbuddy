@extends('layouts.app')

@section('title')
Editing {{ $user->name }}
@stop

@section('content')
    <div class="container">
  <h2>Add Another Meal</h2>

  <hr>
  <form action="/meal" method="post">

    {{ csrf_field() }}
    
    <div class="form-group row">
      <label class="col-sm-1 form-control-label" for="name" >Name</label>
      <div class="col-sm-10">
      <input type="text"
             name="name"
             class="form-control"
             placeholder="Meal Name"
             required="true">
           </div>
           <div class="col-sm-1">
    <button type="submit" value="submit" class="btn btn-primary">
        Submit
      </button></div>
    </div> 

    

  </form>
  </div>

@stop
