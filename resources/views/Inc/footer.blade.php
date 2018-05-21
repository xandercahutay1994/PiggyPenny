<style>
.footer {
    position: fixed;
    left: 0;
    bottom: -10px;
    height: 7%;
    width: 100%;
    margin: auto;
    background-color: #6a7a96;
    color: white;
    text-align: center;
    vertical-align: middle;
	line-height: 50px; 
}
.footer_wrapper {  width:100%;     background-color:#646464; }
.footer_wrapper.fixed {position:fixed; bottom:0px;}
</style>
<br><br>
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


