@extends('layouts.app')

@section('content')
	<div class="container" >
		<h2>General Account Settings</h2>
	  	<a href="{{ url('dashboard/' . Auth::user()->id) }}" class="btn btn-primary btn btn-sm w3-right">
	  		Go to Dashboard
	  	</a>  		
	  	<br><br>
		{!! Form::open(['url' => ['/updateAccount/' . $business->id] , 'method' => 'POST']) !!}
		  @csrf
			 <!-- Modal -->
		    <div class="modal" id="name" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Edit Business Name</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       	<div class="form-group">
					  <label for="business">Name:</label>
					  {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Business Name...'])}}
					</div>
			      </div>
			      <div class="modal-footer">
			        {{ Form::submit('Close', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
		           	{{ Form::hidden('method', 'PUT')}}
			        {{ Form::submit('Save changes', ['class' => 'btn btn-primary']) }}
			      </div>
			    </div>
			  </div>
			</div>
		{!! Form::close() !!}
			<table class="table">
			    <tbody>
			      	<tr>
				        <td>Name</td>
			        	<td class="text-success">{{$business->name}}</td>
			        	<td><a href="" data-toggle="modal" data-target="#name"><i class="far fa-edit"></i> Edit</a></td>
				    </tr>
				    <tr>
			    	    <td>Email</td>
			    	    <td class="text-success">{{$business->email}}</td>
			    	    <td><a href="" id="email"><i class="far fa-edit"></i> Edit</a></td>
				    </tr>
		   	  	    <tr>
				        <td>Address</td>
			        	<td class="text-success">{{$business->address}}</td>
			        	<td><a href="" id="address"><i class="far fa-edit"></i> Edit</a></td>
				    </tr>
			    </tbody>
			 </table>
	</div>		
@endsection