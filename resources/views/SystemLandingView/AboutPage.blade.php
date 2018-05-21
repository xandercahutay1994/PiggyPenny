@extends('layouts.app')

@section('content')
	<div class="container">
    <h1 style="font-family: monospace"><?= $title ?></h1>
    <p>Know more about us!</p>
		<hr><br>
    <!--  style="background-image: url('{{asset('img/about-background.jpg')}}') " -->
		<div>
			<b><h3 class="w3-text-blue">Rationale of the Study:</h3></b>
			<br>
			<p class="w3-justify">
			 	&nbsp &nbsp &nbsp Through the use of bitcoin, the proponents generated an idea which is a Philippine-based web and mobile money-making platform named <b style="color:red">PiggyPenny</b> that enables people to earn bitcoins in the easiest way through completing the tasks such as referring friends, watching videos and pictures, completing surveys, and downloading apps.<b style="color:red">PiggyPenny</b> recommends a free bitcoin wallet for them to store their earned bitcoins and cash-out through cash pickup, mobile money, downloading or-to-door delivery, or bank transfer.
			 	<br><br>
			 	&nbsp &nbsp &nbsp This proposed idea helps people maximize their earnings for this method to avoid insufficiency of money, bored and broke,  and empty pockets, and give them the quickest way especially to bitcoin-starters to complete task, mind-effort, and earn a viable sum of cash without even investing a cent. 
			</p>
		</div>
		<br><br>
		<div class="card" style="background-color: #69696d;">
        <h3 class="w3-center w3-text-white">TEAM</h3>
        <hr>
        <div class="row text-center">
            <div class="col-md-3"  style="margin-left: 150px;">
              <img class="img-responsive img-circle" alt="Responsive image" src="{{ asset('img/climen.png') }}">
              <div style="margin-top: 15px;">
                <b>Climen Mobida</b>
                <p class="w3-text-white">Hipster</p>
              </div>
            </div>
            <div class="col-md-3">
              <img class="img-responsive img-circle" alt="Responsive image" src="{{ asset('img/alex.png') }}">
              <div style="margin-top: 15px;">
                <b>Alexander Alan F. Cahutay</b>
                <p class="w3-text-white">Hacker</p>
              </div>
            </div>
            <div class="col-md-3">
              <img class="img-responsive img-circle" alt="Responsive image" src="{{ asset('img/sam.png') }}">
              <div style="margin-top: 15px;">
                <b>Samantha Yap</b>
                <p class="w3-text-white">Hustler</p>
              </div>  
            </div>
        </div>
        <br>
    </div>
  	<br>
	</div>
@endsection