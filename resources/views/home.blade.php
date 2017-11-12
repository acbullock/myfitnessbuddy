
@extends('layouts.app')

@section('content')
<div class="container">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #DD4814 !important;
            color: white !important;">Welcome, {{$user->name}}!</div>

                <div class="panel-body">
                        @if(count($meals)==0)
                       <p>You haven't eaten today.. <a href="/meal/create">Add a meal!</a></p>     
                        @else





                    <p>Here's what you've eaten today.</p>
                    <p>Daily Protein - {{$dailyProtein}}g</p>
                    <p>Daily Carbs - {{$dailyCarbs}}g</p>
                    <p>Daily Fat - {{$dailyFat}}g</p>
                    @if($dailyKCal > 2200)
                    <h4 class="text-danger">Total kCal: {{$dailyKCal}}</h4>
                    @else
                    <h4 >Total kCal: {{$dailyKCal}}</h4>
                    @endif
                    <br>
                    <ul class="list-group">
                        @foreach ($meals as $meal)
                        <li class="list-group-item">
                          <a href="/meal/{{$meal->id}}">{{$meal->name}}</a><span class="pull-right"> {{$meal->created_at->format('H:i A')}}</span>
                        </li>
                        @endforeach
                      </ul>
                      <br>
                    <p>Why not <a href="/meal/create">keep track of your next meal</a>, too?</p>
                </div>@endif
            </div>
        </div>
    </div>
</div></div>
@endsection
