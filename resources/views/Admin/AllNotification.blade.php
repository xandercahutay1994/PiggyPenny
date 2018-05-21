@extends('layouts.adminLayout')

@section('content')
<!-- CSS STYLE EXTENSION -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<style type="text/css">
    table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }
</style>
    <!-- Sidebar style="display:none"-->
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button id="sidebar2" onclick="w3_close()" class="btn btn-default w3-black">&times</button>
        <span class="w3-circle">
            <img src="{{ asset('img/admin/Admin.png') }}"/><br><br>
        </span>
        <div class="w3-text-white ">
            <small class="text-center" id="email">{{ strToUpper(Auth::user()->email) }}</small>
            <br><br>
            <p>&nbsp  Task Completed : <span class="badge">  </span></p>  
            <p>&nbsp Task Pending : <span class="badge">  </span></p>    
        </div>
        
    </div>
    <!-- Page Content -->
    <div>
        &nbsp <button id="sidebar" class="w3-large btn btn-default" onclick="w3_open()"> ☰ </button>
        <div class="w3-container" style="overflow-x:auto;margin: auto">
            <b style="margin: 260px;font-family: sans-serif;" class="w3-xlarge"></b>
            <a href="{{ url('admin') }}" class="btn btn-primary offset-md-4">
                Go To Dashboard
            </a>
            <br><br>
            <table class="table text-center  offset-md-2" style="overflow-x:auto;width: 70%">
                <thead class="thead-light">
                    <th> # </th>
                    <th> Notification </th>
                    <th> Date </th>
                </thead>
                <tbody>
                    <!-- ================================= 
                        Check if exist and increment count
                     ====================================== -->
                    @if(count($allNotification) > 0)
                        <?php $count = 1 ?>
                        @foreach($allNotification as $key => $value)
                            <tr>
                                <td> {{ $count++ }} </td>
                                <td> <a href="#" style="font-size:12px;padding:10px;">The <b class="w3-text-blue"> {{ $value->name }} </b> requested to post <b class="w3-text-blue">{{ $value->taskName }}</b> with total target clicks/views of <i class="w3-text-blue"> {{ $value->totalViews }} </i> and has an ID of {{ $value->id }}</a>
                                </td>
                                <td> {{ $value->requested_at }} </td>
                            </tr>
                        @endforeach          
                    @else
                        <tr>
                            <th colspan="4" class="text-center">
                                No notification found
                            </th>
                        </tr>      
                    @endif
                </tbody>           
            </table>
            <br>
            <!-- PAGINATION -->
            <span class="w3-right btn-sm" style="margin: -25px 740px; "> {{ $allNotification->links() }} </span>
            <!-- END OF PAGINATION -->
        </div>
    </div>
   
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }

    $(document).ready(function(){
	    $('#yes').on('click',function(){
	        this.innerHTML='<i class="fa fa-spinner fa-spin"></i> Loading…';
	    });

	    $('.approveModal').on('click',function(){
	        $('#approve').modal('show');
	        $('.form-horizontal').show();
	    });

	    // $.ajax({
	    // 	url: ''
	    // });


	});	
</script>

@endsection