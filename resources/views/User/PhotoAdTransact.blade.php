@extends('layouts.app')

@section('content')
<style type="text/css">
.vertical-align {
     align-items: center;
}

#clip1,#clip2{
	text-decoration: none
}
</style>
	<div class="container" id="page"> 
		<div style="margin-top: 70px;">
			<div class="form-group row">
			    <label for="target_views" class="col-sm-4 offset-md-4 col-form-label">&nbsp Set your target views:</label>
			    <div style="margin-left:-140px;">
		      		<input type="number" name="target_views" class="form-control" id="target_views">
		      		<small id="note" class="w3-text-red"> *Target must not be less than 60 </small>
		      		<span id="set"></span>
			    </div>
			</div>
	        @include('Inc.taskTransact')
	        			<div class="col-md-5">
			           	<a href="{{ url('/photoAd/' . $task_id)}}" class="btn btn-danger btn-block">
							Cancel			           		
						</a>
	           	   </div>
	            </div>

        	</div>
	    </div>
	</div>
{!! Form::open(['action' => ['Business\PaymentsController@store',$task_id,$photoName] , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
	<!--  HIDDEN INPUTS  -->
	<input type="hidden" id="hiddenpayment" name="hiddenpayment" value="hiddenpayment">
	<input type="hidden" id="hidden_target" name="hidden_target" value="">
	<input type="hidden" name="picture" value="{{$picture}}">
	<input type="hidden" id="photoName" name="photoName" value="{{$photoName}}">
	<input type="hidden" name="extension" value="{{$extension}}">
	<input type="hidden" id="currency" name="currency" value="currency">
	<input type="hidden" name="task_id" value="{{$task_id}}">
	
	<!-- MODAL -->
	<div class="modal" id="create" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	        <div class="modal-content" style="margin-top: 190px;">
	        	<br>
	        	<form class="form-horizontal" role="form"></form>
			        <div class="modal-body">
			           <p class="text-lg-left">
			           		Your payment for <b class="w3-text-blue"> {{$photoName}} </b> targeting <b id="views" class="w3-text-blue"> </b> views will be sent to <b class="w3-text-red"> PiggyPenny's</b> wallet address.
			           		<br><br>	
			           		Please copy the address below and paste it in your <b class="w3-text-red">Coins.ph</b> receiver address when you send the payment.
			           		<br>
			           		<label>
			           			<div align="middle">
				           			<a href="#" onclick="copyToClipboard('#btc')" class="far fa-copy" id="clip1"> Copy BTC</a> <small id="copied1"></small>
				           			<p class="w3-text-purple form-control" id="btc">  </p>
				           			<a href="#" onclick="copyToClipboard('#php')" class="far fa-copy php" id="clip2"> Copy PHP</a> <small id="copied2"></small>
				           			<p class=" w3-text-green form-control"  id="php"> 3MnZhA8FHNAKGGYwityHReBA5ZABDD3An8 </b>
				           		</div>
			           		</label>
			           </p>
			        <div class="modal-footer">
			        	<div class="col-md-6">
	    	           		<button type="submit" class="btn btn-primary btn-block" id="agree">Agree / Save Transaction</button>
			           </div>
			           <div class="col-md-6">
							<button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
			           </div>
			        </div>
			    </form>
	        </div>
	    </div>
	</div>
{!! Form::close() !!}    

<script type="text/javascript">
	// d15da1de02704f069e204728d377b842
</script>
<script src="{{ asset('js/taskTransact.js') }}"></script>
@endsection