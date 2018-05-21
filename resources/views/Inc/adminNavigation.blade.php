<!-- css style notification -->
<style type="text/css">
#notification_li
{
    position:relative
}

#notificationContainer 
{
    background-color: #fff;
    border: 1px solid rgba(100, 100, 100, .4);
    -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
    overflow: visible;
    position: absolute;
    top: 50px;
    margin-left: -190px;
    width: 400px;
    /*height: 400px;*/
    z-index: 500;
    display: none;  
}

/*// Popup Arrow*/
#notificationContainer:before {
    content: '';
    display: block;
    position: absolute;
    width: 0;
    height: 0;
    color: transparent;
    border: 10px solid black;
    border-color: transparent transparent white;
    margin-top: -20px;
    margin-left: 211px;
}
#notificationTitle
{
    font-weight: bold;
    padding: 8px;
    font-size: 13px;
    background-color: #ffffff;
    position: fixed;
    z-index: 1000;
    width: 384px;
    border-bottom: 1px solid #dddddd;
}

#notificationsBody
{
    padding: 33px 12px 12px 0px !important;
    min-height:300px;
}

#notificationFooter
{
    background-color: #e9eaed;
    text-align: center;
    font-weight: bold;
    padding: 8px;
    font-size: 12px;
    border-top: 1px solid #dddddd;
}

#notification_count 
{
    padding: 3px 7px 3px 7px;
    background: #cc0000;
    color: #ffffff;
    font-weight: bold;
    margin-left: 77px;
    border-radius: 9px;
    -moz-border-radius: 9px; 
    -webkit-border-radius: 9px;
    position: absolute;
    margin-top: -11px;
    font-size: 11px;
}
</style>

<!-- 
    ADMIN NAVIGATION
 -->
<nav class="navbar navbar-expand-md" style="margin: auto;background-color: #37373a">
    <!-- LOGO  -->
    <img class="img-responsive" alt="Responsive image" width="200" src="{{ asset('img/piggypenny.png') }}">  
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li><a class="nav-link w3-text-white" href="/" id="home">Home</a></li>
                <li><a class="nav-link w3-text-white" href="/about" id="about">About</a></li>
                <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle w3-text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.login') }}">
                            {{ __('Admin') }}
                        </a>
                         <a class="dropdown-item" href="{{ route('login') }}">
                            {{ __('Business') }}
                        </a>
                    </div>
                </li>  
            @else
                <li><a href="#" class="nav-link w3-text-white"><i class="fab fa-bitcoin" style="margin: 0 14px;"></i> </a></li>
                <li><a href="{{ url('/pendingTaskCompleteLists') }}" class="nav-link w3-text-white"><i class="fas fa-tasks" style="margin: 0 -8px;"></i> </a></li>
               <li id="notification_li">
                    <a href="#" class="nav-link w3-text-white" id="notificationLink" style="margin: 0 17px" >
                        <i class="far fa-bell"><span id="notification_count" class="badge badge-light w3-tiny w3-text-blue" style="margin: -5px"> </span></i>
                    </a>
                    <div id="notificationContainer">
                        <div id="notificationTitle">Notifications 
                            <a href="#" id="read">
                                <small class="w3-right w3-text-blue"> Mark All As Read</small>
                            </a>
                        </div>
                        <div id="notificationsBody" class="notifications">
                        </div>
                        <div id="notificationFooter">
                            <a href="#" id="seeAll">See All</a>
                        </div>
                    </div>
                </li>   
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle w3-text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Admin
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<script type="text/javascript">
    $(document).ready(function()
    {
        // =============================
        // AJAX Request for Task Request
        // =============================         
        $.ajax({
            url: 'notifyAdmin_requestPost',
            type: 'GET',
            dataType: 'JSON',
            success: function(data){
                if(data.length > 0){
                    $('#notification_count').html(data.length);
                }else{
                    $('#notification_count').hide();
                }
                $('#notificationLink').one('click',function(){
                    $.each(data, function(i, item) {
                        $('#notificationsBody').append("<a href='#' style='font-size:12px;padding:10px;'>The <b class='w3-text-blue'>" + item.name +  "</b> requested to post <b class='w3-text-blue'>" + item.taskName +"</b> with total target clicks/views of <i class='w3-text-blue'>" + item.totalViews + "</i> and has an ID of "+ item.id +"<br></a>");    
                    });
                });
            },
            error: function(data){
                toastr.error("Can't load data from server"); 
            }
        });    
        
        $("#notificationLink").click(function(){
            $("#notificationContainer").fadeToggle(300);
            // $("#notification_count").fadeOut("slow");
            return false;
        });

        //Document Click hiding the popup 
        $(document).click(function()
        {
            $("#notificationContainer").hide();
        });

        //Popup on click
        $("#notificationContainer").click(function(){
            return false;
        });

        // Redirect to Notification Page when click trigger
        $("#seeAll").click(function(){
            window.location.href= 'http://piggypenny.com/seeAllNotification';
        });

    });
</script>




    



