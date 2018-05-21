@extends('layouts.app')

@section('content')
<style type="text/css">
    input[type="file"] {
    	display: none;
	}
	.image{
		height: 250px;
		width: 500px;
	}

	label {
	    text-align: right;
	    clear: both;
	    float:left;
	    margin-right:15px;
	}

</style> 
	<div class="container" style="margin-top: 100px;">
   		<br><br>
   		{!! Form::open(['action' => ['Business\BusinessTasksController@surveyUpload', $task_id], 'method' => 'POST']) !!}
			<input name="task_id" type="hidden" value="{{$task_id}}">
			<div class="col-md-14">
	   			<div class="form-group row">
		            <label for="survey" class="col-md-4 col-form-label text-md-right">{{ __('Survey Link Here') }}</label>
		            <div class="col-md-6">
		                <input id="survey" type="text" class="form-control" name="survey" value="{{ old('survey') }}" required placeholder="Link here...">
		            </div>
		        </div>

				<div class="form-group row">
		            <label for="surveyname" class="col-md-4 col-form-label text-md-right">{{ __('Survey Name') }}</label>
		            <div class="col-md-6">
        				<input type="text" name="surveyname" id="surveyname" class="form-control" placeholder="Survey Name..." required="required" />
					</div>
		        </div>
				<br><br>

				<div class="form-group row offset-md-5">
		            <div class="col-md-4">
						<button type="submit" class="btn btn-primary btn-block" id="next">
	                       {{ __('Next') }}
	                    </button>               
		            </div>
		            <div class="col-md-4">
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
		if($('#surveyname').val() == ''){
			
			toastr.error('Survey name field is required');
			count = 1;
		}
		if($('#survey').val() == ''){
			toastr.error('Survey field is required');
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