@extends('layouts.adminLayout')

@section('content')
    <!-- CSS STYLE EXTENSION -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- LOADER -->
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <div class="loader" style="top: 35%;">
        <img src="{{ asset('loader/loader3.gif') }}">
    </div>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
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
        <!-- PROMOTER'S ACCOUNT DETAILS TABLE -->
        &nbsp <button id="sidebar" class="w3-large btn btn-default" onclick="w3_open()"> ☰ </button>
        <br>
        <div class="w3-container offset-md-1 contentTable table-responsive" style="width: 75%;overflow-x: auto;display: none;">
            <h2 class="w3-text-blue">ADMIN | DASHBOARD</h2>
            <div class="offset-md-8 table-bordered w3-khaki text-center" style="position: fixed;height: 17%;width: 15%;margin-top: -38px;">
                <h4 style="padding: 4px;color: green"> TOTAL EARNINGS </h4>
                <p class="w3-text-red">Peso: 5000 </p>
                <p class="w3-text-red"> Btc: 0.005320</p>
            </div>
            <table class="table table1">
                <thead style="background-color: #c6c6d1">
                    <th colspan="6" class="w3-large w3-round-medium" style="font-family: Arial;">Promoter's Account Details 
                        <label><span id="searching" style="margin-left: 240px;"></span></label>
                        <div class="search">
                          <span class="fa fa-search w3-right w3-text-red" id=""></span>
                          <input name="name" id="searchName" placeholder="Search Name..." class="w3-right form-control" style="width: 250px;margin-top: -22px;">
                        </div>
                    </th>
                </thead>
                <tr class="w3-medium w3-text-brown text-center" style="font-family: serif;">
                    <th>ID #</th>
                    <th>Name</th>
                    <th>Task Posted</th>
                    <th>Task Pending</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                </tr>
                <tr id="tr1">
                @if(count($businessList) > 0)
                    @foreach($businessList as $key => $value)
                        <tr id="tr2" style="margin: 10px auto;" class="w3-small text-center">
                            <td id="td1">
                                {{$value->id}}
                            </td>
                            <td id="td2">
                                {{$value->name}}
                            </td>
                            <td>
                                <!-- GET COUNT DATA THEN POST TO POSTED TASK COLUMN -->
                                @foreach($btask_posted as $bPosted)
                                    @if($bPosted->id == $value->id)
                                        {{ $bPosted->count}}        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <!-- GET COUNT DATA THEN POST TO PENDING COLUMN -->
                                @foreach($btask_pending as $bPend)
                                    @if($bPend->id == $value->id)
                                        {{ $bPend->count}}        
                                    @endif
                                @endforeach                        
                            </td>
                            <td>
                                {{ $value->created_at }}
                            </td>
                            <td id="td3">
                                @if($value->status == 0 || $value->status == '')
                                    <button  class="deActModal btn btn-warning btn-sm" role="button" data-id="{{ $value->id }}" data-toggle="modal" data-target="#deactivate{{ $value->id }}">
                                        <i class='fas fa-ban w3-text-red'></i> Deactivate
                                    </button>
                                @else
                                    <button class='actModal btn btn-success btn-sm' style='width: 97px;' data-id="{{ $value->id }}" data-toggle="modal" data-target="#activate{{ $value->id }}">
                                        <i class='fas fa-toggle-on w3-text-yellow'></i> Activate   
                                    </button>
                                @endif
                            </td>
                            <!-- DE-ACTIVATION MODAL -->
                            <div class="modal" id="deactivate{{$value->id}}" role="dialog">
                                <div class="modal-dialog text-center">
                                  <!-- Modal content-->
                                    <div class="modal-content" style="margin-top: 220px;">
                                        <div class="modal-header text-center w3-red">
                                            <b class=" w3-text-yellow">Confirm De-Activation</b>
                                        </div>
                                        <form class="form-horizontal" role="form">
                                            <div class="modal-body">
                                                <br>
                                                <p class="text-center">
                                                    De-activate account ID # {{$value->id}}? 
                                                </p>
                                                <br>
                                                <div class="modal-footer">
                                                    <div class="col-md-6">
                                                        <a style="text-decoration: none"  id="yes" href="{{ url('deAc_BusinessStatus/' . $value->id) }}">
                                                            <button type="button" class="btn btn-success btn-block">Yes</button>
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
                        </tr>
                            <!-- ACTIVATION MODAL -->
                            <div class="modal" id="activate{{$value->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="margin-top: 220px;">
                                        <div class="modal-header text-center w3-blue">
                                            <b class="text-center">Confirm Activation</b>
                                        </div>
                                        <form class="form-horizontal" role="form"></form>
                                            <div class="modal-body">
                                                <br>
                                                <p class="text-center">
                                                    Activate account ID # {{ $value->id }}?
                                                </p>
                                                <br>
                                                <div class="modal-footer">
                                                    <div class="col-md-6">
                                                        <a style="text-decoration: none" href="{{ url('ac_BusinessStatus/' . $value->id) }}">
                                                            <button type="button" class="btn btn-success btn-block" id="yes2">Yes</button>
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
                        <!-- END OF MODALS -->
                    @endforeach
                @else
                    <tr>
                        <th colspan="6" class="text-center">
                            <b> No promoter's found </b>
                        </th>
                    </tr>
                @endif
            </table>

            <!-- PAGINATION -->
            <span class="w3-right btn-sm" style="margin: -25px 740px; "> {{$businessList->links()}} </span>
            <!-- END OF PAGINATION -->
            
            <br><br><br>

            <!-- 
                USER'S ACCOUNT DETAILS TABLE
             -->
            <table class="table table2 ta">
                <thead style="background-color: #c6c6d1">
                    <th colspan="4" class="w3-large w3-round-medium" style="font-family: Arial;">Piggypennyer's Account Details 
                        <div class="search">
                          <span class="fa fa-search w3-right w3-text-red"></span>
                          <input placeholder="Search Name..." class="w3-right form-control" style="width: 250px;margin-top: -22px;">
                        </div>
                    </th>
                </thead>
                <tr class="w3-medium w3-text-brown text-center" style="font-family: serif;">
                    <th>ID #</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">
                        No piggypennyer's registered yet
                    </th>
                </tr>
            </table>
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

    $(document).ready(function(){
        $('.deActModal').on('click',function(){
        $('#deactivate').modal('show');
            $('.form-horizontal').show();
        });

        $('.actModal').on('click',function(){
            $('#activate').modal('show');
            $('.form-horizontal').show();
        });   

        $('#yes').on('click',function(){
            this.form.submit();
            this.innerHTML='<i class="fa fa-spinner fa-spin"></i> Loading…';
        });
    });
    $(document).ready(function(){
        
        
        // $('#searchName').keyup(function(){
        //     var search = $('#searchName').val();
        //     var searching = $('#searching').val();
        //     $('#searching').html("<img src='{{ asset('loader/loader.gif') }}' style='height:25px;width:25px;margin-bottom:2px;'>");
        //     if(search != ""){
        //         $.ajax({
        //             url: 'searchName/' + search,
        //             type: 'GET',
        //             dataType: 'JSON',
        //             success:function(response){
        //                 for(var i = 0; i<response.length;i++){
        //                     if(response[i].status == 0){
        //                         $('.table1 #td1 #td2').html(
        //                             "<td>"+ response[i].id +"</td>" +
        //                             "<td>"+ response[i].name +"</td>" 
        //                             // "<td>"+  response[i].name +"</td>"+
        //                             // "<td>"+ "<button class='deActModal btn btn-warning btn-sm' role='button' data-id=" + response[i].id + "data-toggle='modal' data-target='#deactivate" + response[i].id +"><i class='fas fa-ban" + "w3-text-red'></i> Deactivate</button>"+
        //                             // + "</td>");
        //                         );    
        //                     }
        //                     // }else{

        //                     // }
        //                 }
        //             }
        //         });    
        //     }else{
        //         // $('.table1 #tr1').html('');
        //         // $('.table1 #tr2').show();
                
        //         // $('.table1 #td1').show();
                
        //         $('#searching').html('');
        //     }
        // });
    });
    
</script>

@endsection