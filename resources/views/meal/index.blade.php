@extends('layouts.app')

@section('title')
Editing {{ $user->name }}
@stop

@section('content')
	<div class="container">
  <h4>All Meals</h4>

  <hr>
  @if(count($meals) == 0)
      <p>You haven't eaten today.. <a href="/meal/create">Add a meal!</a></p>     
   @else
  <ul class="list-group">
  	@foreach ($meals as $meal)
    <li class="list-group-item">
      <a href="/meal/{{$meal->id}}">{{$meal->name}}</a><span class="pull-right"> {{$meal->created_at->format('g:ia \\o\\n l, F jS ')}}</span>
    </li>
    @endforeach
  </ul>
  @endif
  </div>
  
@stop
