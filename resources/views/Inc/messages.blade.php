@if(count($errors)>0)
	@foreach($errors->all() as $error)
		<script type="text/javascript">
			toastr.error('<?php echo $error;?>', 'Error Alert');
		</script>
	@endforeach
@endif

@if(session('success'))
	<script type="text/javascript">
		toastr.success('<?php echo session('success');?>');
	</script>
@endif

@if(session('adminError'))
	<script type="text/javascript">
		toastr.error('<?php echo session('adminError');?>');
	</script>
@endif

@if(session('userError'))
	<script type="text/javascript">
		toastr.error('<?php echo session('userError');?>');
	</script>
@endif

@if(Session('verified'))
	<script>
  	    swal("Your account is now verified!");
	</script>
@endif

@if(Session('flash'))
	<script>
  	    swal("Well done!", "This may take a while for the approval. We will notify you if your transaction has been successful. Your task will be soon posted!", "success");
	</script>
@endif

@if(session('error'))
	<script type="text/javascript">
		toastr.error('<?php echo session('success');?>');
	</script>
@endif

@if(session('photoPayment'))
	
	<script>
		$('#myModal').show();
	</script>
@endif
