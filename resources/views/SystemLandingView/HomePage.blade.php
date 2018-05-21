@extends('layouts.app')

@section('content')	
<style type="text/css">
	.carousel-caption {
		top: 50px;
	    /*right: 15%;*/
	    max-width: 100%;
	    padding:5px;
	}
	.carousel-caption p{
		margin-left: 70px;
		padding: 5px;
	}
</style>
	<br>
	<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" style="height: 600px;">
	    	<div class="item active">
		      	<img class="offset-md-2" src="{{ asset('img/admin/carousel2.png') }}" style="height: 400px;margin-top: 100px;">
		      	<div class="carousel-caption offset-md-3">
		          	<h1 class="w3-text-deep-orange">Piggy Penny</h1>
		          	<br>
		          	<p class="w3-text-black">A money making platform where users/piggypennyers can earn Bitcoin or Satoshis by completing different tasks</p>
		        </div>
		    </div>

		    <div class="item">
		     	<img class="offset-md-2 img" src="{{ asset('img/admin/carousel3.png') }}" style="height: 400px;margin-top: 100px;">
   	        	<div class="carousel-caption offset-md-3">
		          	<h1 class="w3-text-deep-orange">Features</h1>
		          	<br>
		          	<div class="w3-text-black offset-md-3">
		          		<h3> 
		          			Low cost platform for businesses/advertisers, affordable & reliable in products/services 
		          		</h3>
		          	</div>
		        </div>
   	        </div>

	    <!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		    <!-- <span class="sr-only">Next</span> -->
		</a>
	</div>
	<br><br>
<script type="text/javascript">
	$('.carousel').carousel({
	  interval: 5000
	});
</script>
@endsection