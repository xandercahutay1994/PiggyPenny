@extends('layouts.app')

@section('content')
<div style="margin-top: 25px;">
	<a href="{{ url('dashboard/' .  Auth::user()->id) }}" class="btn btn-primary offset-md-9">
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
            @if(count($read_All) > 0)
                <?php $count = 1 ?>
                @foreach($read_All as $key => $value)
                    <tr>
                        <td> {{ $count++ }} </td>
                        <td> <a href="#" style="font-size:12px;padding:10px;">The task you provide with the name of <b class="w3-text-blue"> {{ $value->taskName }}</b> is now posted<br></a>
                        </td>
                        <td> <small>{{ $value->notified_at }} </small></td>
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
    <span class="w3-right btn-sm" style="margin: -25px 740px; "> {{ $read_All->links() }} </span>
    <!-- END OF PAGINATION -->
</div>
@endsection