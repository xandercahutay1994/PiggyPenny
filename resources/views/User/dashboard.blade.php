@extends('layouts.app')

@section('content')
<!-- BUSINESS INDEX -->
<<<<<<< HEAD
<style type="text/css">
    .loader{
        margin: 0;
        position: relative;
        text-align: center;
        margin-bottom: 20%;
        margin-top: 10%;    
    }

    #dashboard{
        display: none
    }

</style>
<div class="loader">
    <img src="{{ asset('loader/loader3.gif') }}">
</div>
=======
>>>>>>> 41471d1b650a1ee710e9ce37dedf4dcb9f69fdaa
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
            <div class="container-fluid content-row offset-sm" style="overflow-x:auto;margin-left: 15px;">
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
    <div class="row">
        <div class="col-md-6 text-center">
            <table id="table1" class="table" style="font-size:13px;">
                <!-- 818191  c6c6d1-->
                <thead style="background-color: #c6c6d1">
<<<<<<< HEAD
                    <th colspan="4" class="w3-large text-center w3-round-medium" style="font-family: monospace;">Tasks Posted </th>
=======
                    <th colspan="4" class="w3-xlarge text-center w3-round-medium" style="font-family: monospace;">Tasks Posted </th>
>>>>>>> 41471d1b650a1ee710e9ce37dedf4dcb9f69fdaa
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
                                    <a href="#" class="w3-text-blue" style="text-decoration: none;" data-toggle="modal" data-target="#view{{ $value->btask_id }}"><p>{{ $value->taskName }}</p></a>
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
                            <!-- VIEW TASK DETAIL -->
                            <div class="modal" id="view{{$value->btask_id}}" role="dialog">
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
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4" class="text-center w3-medium w3-text-red">
                                <b> No Tasks Posted Found </b>
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
        <div class="col-md-6 text-center">
            <table id="table2" class="table" style="font-size:13px;">
                <thead style="background-color: #c6c6d1">
<<<<<<< HEAD
                    <th colspan="4" class="w3-large text-center w3-round-medium" style="font-family: monospace;">Tasks Completed </th>
=======
                    <th colspan="4" class="w3-xlarge text-center w3-round-medium" style="font-family: monospace;">Tasks Completed </th>
>>>>>>> 41471d1b650a1ee710e9ce37dedf4dcb9f69fdaa
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
<<<<<<< HEAD
                                <b> No Task(s) Completed Yet </b>
=======
                                <b> No Tasks Completed Yet </b>
>>>>>>> 41471d1b650a1ee710e9ce37dedf4dcb9f69fdaa
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
            $('.loader').fadeOut(2000,function(){
                $('#dashboard').fadeIn();
            });
        });
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    </script>
@endsection
