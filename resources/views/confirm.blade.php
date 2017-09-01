@extends('layouts.app')

<style>             

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }  
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="text-center">
             @if( $error == 0)

				<p class="h4 title text-primary center">Your Account is now Activated!!</p> 

			@endif
			@if( $error == 1)

				<p class="h4 title text-info center">Your Account is already Activated!!</p>

			@endif
			@if( $error == 2)

				<p class="h4 title text-danger center">The key you entered is wrong. Please check or contact support!!</p>

			@endif		
 
        </div>
        <div class="links text-center" style="margin-top:100px;">
            @if (Route::has('login'))
                @if (Auth::check())
                    <a href="{{ url('/dashboard') }}">Home</a>
                @else
                    <a href="{{ url('/register') }}">Register</a>
                    <a href="{{ url('/login') }}">Login</a>                            
                @endif
            @endif
            <a href="/showtopics">Topics</a>
            <a href="/showreviews">Review</a>
            <a href="/help">Help</a>
        </div>
    </div>
</div>
@endsection


 
										
																				
										
 
