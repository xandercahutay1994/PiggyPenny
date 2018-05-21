@extends('layouts.app')

@section('content')
<style type="text/css">
    input[type="file"] {
    	display: none;
	}
	.image{
		height: 350px;
		width: 550px;
		margin: auto;
	}
</style> 
	<div class="container" style="margin-top: 40px;">
   		<br>
   		<b class="offset-md-5 w3-text-pink"> UPLOAD YOUR PICTURE</b>
   		<br><br>
    	{!! Form::open(['action' => ['Business\BusinessTasksController@store', $task_id] , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		    <div class="form-group row">
	            <div class="col-md-6 offset-md-3">
	            	<label for="file"> 
	            		<img src="{{ asset('img/UploadPhoto.png') }}" id="preview" class="img-thumbnail image"/>
	            		<input type="file" name="picture" id="file">
			    	</label> 
	            </div>
	        </div>
			<input name="task_id" type="hidden" value="{{$task_id}}">
			<div>
				<div class="form-group row">
					<div class="col-md-6 offset-md-3">
					    {{ Form::label('Photo','Photo Name:')}}
						<input type="text" name="photoname" id="photoname" class="form-control" placeholder="Photo Name..." required="required" />
					</div>
				</div>
				<div class="form-group row">
		            <div class="col-md-3 offset-md-3">
						<button type="submit" class="btn btn-primary btn-block" id="next">
	                       {{ __('Next') }}
	                    </button>               
		            </div>
		            <div class="col-md-3">
		            	<a href="/dashboard" class="btn btn-danger btn-block">
							{{ __('Cancel') }}
					    </a>   
		            </div>
		    	</div>	
			</div>
			<br>
		{!! Form::close() !!}
	</div>
<script type="text/javascript">
	// IMAGE PREVIEW FUNCTION
	$(function(){
		$('#file').on('change',function(){
			var file = this.files[0];
			var reader = new FileReader();
			reader.onload = viewer.load;
			reader.readAsDataURL(file);
			viewer.setProperties(file);

		});
		var viewer = {
			load: function(e){
				$('#preview').attr('src', e.target.result);
			},
			setProperties: function(file){
				$('#filename').text(file.name);
				$('#filetype').text(file.type);
				$('#filesize').text(Math.round(file.size/1024));
			}
		}
	});

	// when BUTTON NEXT click modal function call
	$('#next').click(function(){
		var count = 0;
		if($('#photoname').val() == ''){
			
			toastr.error('Photoname field is required');
			count = 1;
		}
		if($('#file').val() == ''){
			toastr.error('Photo field is required');
			count = 1;
		}
			

		if(count == 0){
			// this.form.submit();
   //      	this.disabled=true;
   //      	this.innerHTML='<i class="fa fa-spinner fa-spin"></i> Loading…';
        
			// var form = $('#mediaFile form');
		 //    var formData = new FormData(form);
		    
		 //    $.ajax({
		 //            method: 'post',
		 //            type: 'json',
		 //            url: '/business/image',
		 //            data: formData,
		 //            cache: false,
		 //            processData: false,
		 //        success: function(data) {


		 //            }
        // });

		
		}
	});	
	
</script> 
<script src="{{ asset('js/custom.js') }}"></script>

@endsection