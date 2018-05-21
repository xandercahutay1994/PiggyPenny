@extends('layouts.adminLayout')

@section('content')
<!-- CSS STYLE EXTENSION -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

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
        <!-- 
            PENDING TASKS TABLE
        -->
        &nbsp <button id="sidebar" class="w3-large btn btn-default" onclick="w3_open()"> ☰ </button>
        <div class="w3-container" style="overflow-x:auto;">
            <b style="margin: 260px;font-family: sans-serif;" class="w3-xlarge w3-text-green">{{$title}}</b>
            <a href="{{ url('pendingTaskCompleteLists') }}" class="btn btn-primary offset-md-3">
                Back
            </a>
            <br><br>
            <table class="table table1 responsive" style="margin-left: 265px;width: 72%;">
                <thead style="background-color: #c6c6d1">
                    <th colspan="8" class="w3-large w3-round-medium" style="font-family: Arial;">Tasks List 
                        <div class="search">
                          <span class="fa fa-search w3-right w3-text-red"></span>
                          <input placeholder="Search Name..." class="w3-right form-control" style="width: 250px;margin-top: -22px;">
                        </div>
                    </th>
                </thead>
                <tr class="w3-text-brown text-center" style="font-family: serif;font-size: 18px">
                    <th>Transaction #</th>
                    <th>ID #</th>
                    <th>Type</th>
                    <th>Task name</th>
                    <th>Clicks/Target</th>
                    <th>Pennyer's</th>
                </tr>
                @if(count($task_list) > 0)
                    @foreach($task_list as $key => $value)
                        <tr style="margin: 10px auto;" class="w3-small text-center">
                            <td >
                                {{$value->btask_id}}
                            </td>
                            <td>
                                {{$value->id}}
                            </td>
                            <td>
                                {{$value->task_type}}
                            </td>
                            <td>
                                {{$value->taskName}}
                            </td>
                            <td>
                                <div>
                                    <b class="w3-text-blue">@if(empty($value->currentViews)) 0 @else {{$value->currentViews}} @endif / </b><b class="w3-text-green">{{$value->totalViews}}</b>
                                </div>
                            </td>
                            <td>
                                {{$value->totalPrice}}
                            </td>
                    @endforeach
                    
                @else
                    <tr>
                        <th colspan="7" class="text-center">
                            <b class="w3-large w3-text-blue"> No approved tasks list yet! </b>
                        </th>
                    </tr>
                @endif
            </table>

            <!-- PAGINATION style="margin: -25px 740px; "   -->
            <span class="w3-right btn-sm" > {{$task_list->links()}} </span>
            <!-- END OF PAGINATION -->
            <br><br>
        </div>
    </div>
   
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }

    $('.deActModal').on('click',function(){
        $('#deactivate').modal('show');
        $('.form-horizontal').show();
    });

    $('.actModal').on('click',function(){
        $('#activate').modal('show');
        $('.form-horizontal').show();
    });

</script>

@endsection