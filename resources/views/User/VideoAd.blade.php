@extends('layouts.app')

@section('content')
<style type="text/css">
    input[type="file"] {
    	display: none;
	}
	#preview{
		height: 350px;
		width: 550px;
		margin: auto;
	}
</style> 
	<div class="container" style="margin-top: 40px;">
   		<br>
   		<b class="offset-md-5 w3-text-pink"> UPLOAD YOUR VIDEO</b>
   		<br><br>
		{!! Form::open(['action' => ['Business\BusinessTasksController@videoUpload', $task_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		    <div class="form-group row">
	            <div class="col-md-6 offset-md-3">
	            	<label for="file"> 
					   <video name="video" id="preview" class="img-thumbnail image" src="{{ asset('img/UploadPhoto.png') }}" width="50%" height="10%" accept=".mp4" controls>
       					</video>
       					<i class="fa fa-folder-open w3-text-blue"><input type="file" name="video" id="file"> Click Me To Upload</i></button>
       					<small class="w3-text-red  w3-right"> *Video length must be 15 seconds or less</small>

			    	</label>
	            </div>
	        </div>
			<input name="task_id" type="hidden" value="{{$task_id}}">
			<div>
				<div class="form-group row">
					<div class="col-md-6 offset-md-3">
					    {{ Form::label('Video','Video Name:')}}
						<input type="text" name="videoname" id="videoname" class="form-control" placeholder="Video Name..." required="required" />
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
	    {!! Form::close() !!}
	</div>

	<script type="text/javascript">
		$('#next').click(function(){
	
			var count = 0;
			if($('#file').val() == ''){
				toastr.error('Video field is required');
				count = 1;
			}
			if($('#videoname').val() == ''){
				toastr.error('Videoname field is required');
				count = 1;
			}
		});

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
	</script>

<script src="{{ asset('js/custom.js') }}"></script>
	
@endsection