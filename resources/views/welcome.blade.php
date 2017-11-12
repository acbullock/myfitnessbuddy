@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if($user)
                <div class="panel-heading">Welcome, {{$user->name}}!</div>
                @else
                <div class="panel-heading">Welcome, stranger</div>
                
                @endif
                <div class="panel-body">
                @if($user)
                    Welcome, {{$user->name}}!<a href="/meal/create"> Add a meal </a>to begin.
                @else
                    Welcome, stranger. Login/Register to begin. 
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
