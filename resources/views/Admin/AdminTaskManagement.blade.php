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
    <!-- LOADER -->
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <div class="loader" style="top: 35%;">
        <img src="{{ asset('loader/loader3.gif') }}">
    </div>
    <!-- Sidebar style="display:none w3-bar-block w3-border-right"-->
    <div class="w3-sidebar " style="display:none" id="mySidebar">
        <button id="sidebar2" onclick="w3_close()" class="btn btn-default w3-black">&times</button>
        <span class="w3-circle">
            <img src="{{ asset('img/admin/Admin.png') }}"/><br><br>
        </span>
        <div class="w3-text-white ">
            <small class="text-center" id="email">{{ strToUpper(Auth::user()->email) }}</small>
            <br><br>
            <p>&nbsp  Task Completed : <span class="badge"> {{ $task_completed->count()}} </span></p>  
            <p>&nbsp Task Pending : <span class="badge"> {{ $task_pending->count()}} </span></p>    
        </div>
        
    </div>
    <!-- Page Content -->
    <div>
        <!-- PENDING TASKS TABLE -->
        &nbsp <button id="sidebar" class="w3-large btn btn-default" onclick="w3_open()"> ☰ </button>
        <br><br>
        <div class="w3-container offset-md-2 contentTable responsive" style="width: 85%;display: none;">
            <b style="font-family: sans-serif;" class="w3-xlarge w3-text-green">{{$title}}</b>
            <a href="{{ url('admin') }}" class="btn btn-default offset-md-6">
                Go To Dashboard
            </a>
            <a href="{{ url('tasksList') }}" class="btn btn-primary">
                View Tasks List
            </a>
            <br><br>
            <table class="table table1 table-responsive">
                <thead style="background-color: #c6c6d1">
                    <th colspan="10" class="w3-large w3-round-medium" style="font-family: Arial">Pending Tasks 
                        <div class="search">
                          <span class="fa fa-search w3-right w3-text-red"></span>
                          <input placeholder="Search Name..." class="w3-right form-control" style="width: 250px;margin-top: -22px;">
                        </div>
                    </th>
                </thead> 
                <tbody>
                    <tr class="w3-medium w3-text-brown text-center" style="font-family: serif;">
                        <th>Transaction #</th>
                        <th>ID #</th>
                        <th style="width: 20%;">Name</th>
                        <th>Type</th>
                        <th style="width: 20%;">Task name</th>
                        <th>Clicks/Downloads</th>
                        <th>Total Payment</th>
                        <th style="width: 20%;">Action</th>
                    </tr>

                    @if(count($task_pending) > 0)
                        @foreach($task_pending as $key => $value)
                            <tr class="w3-small text-center">
                                <td >
                                    {{$value->btask_id}}
                                </td>
                                <td>
                                    {{$value->id}}
                                </td>
                                <td>
                                    {{$value->name}}
                                </td>
                                <td>
                                    {{$value->task_type}}
                                </td>
                                <td>
                                    {{$value->taskName}}
                                </td>
                                <td>
                                    {{$value->totalViews}}
                                </td>
                                <td>
                                    {{$value->totalPrice}}
                                </td>
                                <td>
                                    <button class='btn btn-primary btn-sm' data-toggle="modal" data-target="#info{{ $value->btask_id }}">
                                        <i class='fa fa-view'></i> View 
                                    </button>
                                    <button class='btn btn-warning btn-sm' data-toggle="modal" data-target="#delete{{ $value->btask_id }}">
                                        <i class='fa fa-times w3-text-red'></i> Delete 
                                    </button> 
                                    <button class='approveModal btn btn-success btn-sm' data-toggle="modal" data-target="#approve{{ $value->btask_id }}">
                                        <i class='fa fa-check w3-text-yellow'></i> Approve 
                                    </button>

                                    <!-- APPROVE MODAL -->
                                    <div class="modal" id="approve{{$value->btask_id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-top: 220px;">
                                                <div class="modal-header text-center w3-blue">
                                                    <b class="text-center">Confirm Approval</b>
                                                </div>
                                                <form class="form-horizontal" role="form"></form>
                                                    <div class="modal-body">
                                                        <br>
                                                        <p class="text-center">
                                                            Post task of <b>{{ $value->name}}</b> with ID # of <b>{{ $value->id }} </b> ?
                                                        </p>
                                                        <br>
                                                        <div class="modal-footer">
                                                            <div class="col-md-6">
                                                                <a style="text-decoration: none;" href="{{ url('approved_task/' . $value->btask_id . '/' . $value->totalPrice) }}">
                                                                    <button type="button" class="btn btn-success btn-block" id="yes">Yes</button>
                                                                </a>
                                                            </div>
                                                               <div class="col-md-6">
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
                                                           </div>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                    <!-- DELETE TASK MODAL -->
                                    <div class="modal" id="delete{{$value->btask_id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-top: 220px;">
                                                <div class="modal-header text-center w3-blue">
                                                    <b class="text-center">Confirm Approval</b>
                                                </div>
                                                <form class="form-horizontal" role="form"></form>
                                                    <div class="modal-body">
                                                        <br>
                                                        <p class="text-center">
                                                            Are you sure to delete task of <b>{{ $value->name}}</b> with ID # of <b>{{ $value->id }} </b> ?
                                                        </p>
                                                        <br>
                                                        <!-- MODAL FOOTER -->
                                                        <div class="modal-footer">
                                                            <div class="col-md-6">
                                                                <a style="text-decoration: none;" href="{{ url('delete_task/' . $value->btask_id) }}">
                                                                    <button type="button" class="btn btn-success btn-block" id="yes">Yes</button>
                                                                </a>
                                                            </div>
                                                               <div class="col-md-6">
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
                                                           </div>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <td>
                                    <!-- DETAIL TASK MODAL -->
                                    <div class="modal" id="info{{$value->btask_id}}" role="dialog">
                                        <div class="modal-dialog" style="margin-top: 220px;">
                                            <div class="modal-content" class="modal-body" style="width:600px;">
                                                <br>
                                                <p class="text-center">
                                                    @if($value->task_id == 1)
                                                        <video src="{{ asset('/storage/videos/' . $value->taskMedia) }}" style="width: 500px;height: 350px;" controls></video>
                                                    @elseif($value->task_id == 2)
                                                        <img class="img-rounded" style="width: 500px;height: 350px;" src="{{ asset('/storage/pictures/' . $value->taskMedia) }}" alt="Media"></img>
                                                    @else
                                                        <input type="text" disabled value="{{ $value->taskMedia }}" class="form-control text-center">
                                                    @endif
                                                </p>
                                                <!-- MODAL FOOTER -->
                                                <div class="modal-footer">
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="8" class="text-center"> 
                                <b class="w3-large"> No pending tasks </b>
                            </th>
                        </tr>    
                    @endif
                </tbody>
            </table>

            <!-- PAGINATION style="margin: -25px 740px; "   -->
            <span class="w3-right btn-sm" style="margin: -25px 740px;" > {{$task_pending->links()}} </span>
            <!-- END OF PAGINATION -->
            <br><br><br>

            <!-- COMPLETED TASKS TABLE -->
            <table class="table table2">
                <thead style="background-color: #c6c6d1">
                    <th colspan="7" class="w3-large w3-round-medium" style="font-family: Arial;">Completed Tasks 
                        <div class="search">
                          <span class="fa fa-search w3-right w3-text-red"></span>
                          <input placeholder="Search Name..." class="w3-right form-control" style="width: 250px;margin-top: -22px;">
                        </div>
                    </th>
                </thead>
                <tbody>
                    <tr style="font-family: serif;" class="text-center w3-medium w3-text-brown">
                        <th>Business Name</th>
                        <th>Task #</th>
                        <th>Type</th>
                        <th>Task name</th>
                        <th>Clicks/Downloads</th>
                        <th>User's List</th>
                        <th>Action</th>
                    </tr>
                    @if(count($task_completed) > 0)
                        @foreach($task_completed as $key => $value)
                            <tr style="margin: 10px auto;" class="w3-small text-center">
                                <td >
                                    {{$value->name}}
                                </td>
                                <td>
                                    {{$value->btask_id}}
                                </td>
                                <td>
                                    {{$value->task_type}}
                                </td>
                                <td>
                                    {{$value->taskName}}
                                </td>
                                <td>
                                    {{$value->currentViews}}/{{$value->totalViews}}
                                </td>
                                <td>
                                    N/A
                                </td>
                                <td>
                                    <button class='btn btn-warning btn-sm'>
                                        <i class='fa fa-times w3-text-red'></i> Delete 
                                    </button>
                                </td>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="7" class="text-center">
                               <b class="w3-large"> No tasks completed</b>
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!-- PAGINATION style="margin: -25px 740px; "   -->
            <span class="w3-right btn-sm" style="margin: -25px 740px;" > {{$task_completed->links()}} </span>
            <!-- END OF PAGINATION -->
        </div>
    </div>
   
<script src="{{ asset('js/loader.js') }}"></script>
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }

    $('#yes').on('click',function(){
        this.innerHTML='<i class="fa fa-spinner fa-spin"></i> Loading…';
    });

    $('.approveModal').on('click',function(){
        $('#approve').modal('show');
        $('.form-horizontal').show();
    });
</script>

@endsection