@extends('layouts.app')

@section('content')
<style type="text/css">
    #table a{
        text-decoration: none
    }
</style>

<!-- BUSINESS INDEX -->
<div class="container" id="dashboard">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center" >
                        <img class="img-rounded" width="250" height="170" src="/storage/profile/{{Auth::user()->profile}}"></img>
                        <h3><b>{{ Auth::user()->name}}</b></h3>
                        @if(Auth::user()->token == "")
                            <small class=" text-success"> <i class="fa fa-check"></i> {{ Auth::user()->email}} </small>
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id}}">
                        @else
                            <?= 
                               "<script> swal('Hello!','We send you a verification link in your Gmail account. Please check it to verify your email.'); </script>";
                            ?>
                            <small class="text-danger"> <i class="fa fa-times"></i> Not yet verified</small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid content-row" style="overflow-x:auto;margin-left: 3%;">
                <table class="table-responsive">
                     <tr>
                        @if(count($tasks) > 0)
                           @foreach($tasks as $task)
                            <?php $id = $task->task_id;?>
                                <td>
                                    <div class="row" style="padding: 12px;">
                                        @if($id == 1)             
                                            <div class="card h-100">
                                                <a href="{{ url('/videoAd/' . $id)}}" class="card">   
                                                    <img src="{{ asset('img/admin/Video.png') }}" class="w3-round-medium" />
                                                </a> 
                                            </div>
                                            <!-- <i class="fa fa-video-camera"></i> <b> Upload a <?= $task->task_type ?> for AD </b> -->
                                        @elseif($id == 2)             
                                            <div class="card h-100">
                                                <a href="{{ url('/photoAd/' . $id)}}" class="card">     
                                                    <img src="{{ asset('img/admin/Photo.png') }}" class="w3-round-medium" />
                                                </a> 
                                            </div>
                                        @elseif($id == 3)
                                            <div class="card h-100">
                                                <a href="{{ url('/appAd/' . $id)}}" class="card">  
                                                    <img src="{{ asset('img/admin/App.png') }}" class="w3-round-medium" />
                                                </a> 
                                            </div>
                                        @elseif($id == 4)
                                            <div class="card h-100">
                                                <a href="{{ url('/surveyAd/' . $id)}}" class="card">
                                                    <img src="{{ asset('img/admin/Survey.png') }}" class="w3-round-medium " />
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                           @endforeach
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="row" style="overflow-x:auto;">
        <div class="table-responsive col-md-6 text-center">
            <table id="table1" class="table" style="font-size:13px;">
                <!-- 818191  c6c6d1-->
                <thead style="background-color: #c6c6d1">
                    <th colspan="4" class="w3-xlarge text-center w3-round-medium" style="font-family: monospace;">Task Posted </th>
                </thead>
                <tr class="w3-large w3-text-brown text-center" style="font-family: serif;">
                    <th>Taskname</th>
                    <th>Type</th>
                    <th>Clicks</th>
                    <th>Target</th>
                </tr>    
                <tr>
                    @if(count($task_posted) > 0)
                        @foreach($task_posted as $key => $value)
                            <tr  class="w3-small">
                                <td>
                                    {{ $value->taskName }}
                                </td>
                                <td>
                                    {{ $value->task_type }}
                                </td>
                                <td>
                                    {{ $value->currentViews }}
                                </td>
                                <td>
                                    {{ $value->totalViews }}
                                </td>
                            </tr>
                        @endforeach
                    @else       
                        <tr>
                            <th colspan="4" class="text-center w3-medium w3-text-red">
                                <b> No Task Posted Found </b>
                            </th>
                        </tr>      
                    @endif
                </tr>
            </table>
            <br>
            <!-- PAGINATION -->
            <span style="margin: auto"> {{$task_posted->links()}} </span>
            <!-- END OF PAGINATION -->
        </div>
        <div class="table-responsive col-md-6 text-center">
            <table id="table2" class="table" style="font-size:13px;">
                <thead style="background-color: #c6c6d1">
                    <th colspan="4" class="w3-xlarge text-center w3-round-medium" style="font-family: monospace;">Task Completed </th>
                </thead>
                <tr class="w3-large w3-text-brown text-center" style="font-family: serif;">
                    <th>Taskname</th>
                    <th>Type</th>
                    <th>Clicks</th>
                    <th>Target</th>
                </tr>    
                <tr>
                     @if(count($task_completed) > 0)
                        @foreach($task_completed as $key => $value)
                            <tr class="w3-small">
                                <td>
                                    {{ $value->taskName }}
                                </td>
                                <td>
                                    {{ $value->task_type }}
                                </td>
                                <td>
                                    {{ $value->currentViews }}
                                </td>
                                <td>
                                    {{ $value->totalViews }}
                                </td>
                            </tr>
                        @endforeach
                    @else       
                        <tr>
                            <th colspan="4" class="text-center w3-medium w3-text-red">
                                <b> No Task Completed Yet </b>
                            </th>
                        </tr>      
                    @endif
                </tr>
            </table>
            <br>
            <!-- PAGINATION -->
            <span style="margin: auto"> {{$task_completed->links()}} </span>
            <!-- END OF PAGINATION -->
        </div>
    </div>
</div>
    <script>
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    </script>
@endsection

