<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head profile="http://piggypenny.com/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name','PiggyPenny')}}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>   -->

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClOhujrVKWHinyp3VfIQ4WpR4iAWsqC7M&libraries=places®ion=in"></script> -->
    <!-- https://maps.googleapis.com/maps/api/place/autocomplete/json?input="Cebu Transcentral Highway"&types=geocode&key=AIzaSyClOhujrVKWHinyp3VfIQ4WpR4iAWsqC7M -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClOhujrVKWHinyp3VfIQ4WpR4iAWsqC7M&libraries=places" type="text/javascript"></script>
    
    <!-- LINKS & STYLES-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-raleway.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font-awesome/web-fonts-with-css/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('img/piggypenny.png') }}">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my_css.css') }}">
</head>
<style>
    .footer_wrapper {
        position: relative;
        width:100%;
        background-color:#6a7a96;
        text-align: center;
        line-height: 50px;
    }
    .footer_wrapper.fixed {
        bottom: 0;
        left: 0;
        position: fixed;
    }
</style>
<body>
    <div class="container"> 
        @include('Inc.pagesNavigation')
        <span>
            @include('Inc.messages')
        </span>
        <div>
            @yield('content')
        </div>
    </div>
    <br><br><br>
<div class="Page"> 
    <div class="footer_wrapper" >
        <?php $timestemp = today();
           $year = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestemp)->year;
        ?>
        Copyright <i class="far fa-copyright"></i> <?= $year ?>. All Rights Reserved 
    </div>
</div>  
<script type="text/javascript">
    if ($(".Page").height()<$(window).height()){
        $(".footer_wrapper").addClass("fixed");
    }else{
        $(".footer_wrapper").removeClass("fixed");
    }
</script>
</body>
</html>
