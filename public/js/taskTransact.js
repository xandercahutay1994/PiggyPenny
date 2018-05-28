// ====================================
// DISABLE CHECKBOX WHEN PAGE IS LOADED
// ====================================

$(window).on('load',function(){
	$("#peso").attr("disabled", true);
	$("#bitcoin").attr("disabled", true);
	$("#e_phone").attr("disabled", true);
	
});

// ====================
//  COPY CLIPBOARD CODE
// ====================
function copyToClipboard(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).text()).select();
	document.execCommand("copy");
	$temp.remove();

}

$(document).ready(function(){
	$('input.check').change(function() {
	    $('input.check').not(this).prop('checked', false);
	});

	if($('input.check').prop('checked',false)){
		$('#peso').click(function(){
			var pricePeso = 0.0851;
			equal =  $('#target_views').val() * pricePeso;
			$('#totalpayment').html('&nbsp'+ parseFloat(equal).toFixed(2) + ' Php').css({'color':'red','font-size':'20px'});	
			$('#hiddenpayment').val(equal);
			$('#currency').val('Peso');
		});

		$('#bitcoin').click(function(){
			var priceBTC = 0.00000020;
			equal =  $('#target_views').val() * priceBTC;
			$('#totalpayment').html('&nbsp'+ equal + ' BTC').css({'color':'red','font-size':'20px'});
			$('#hiddenpayment').val(equal);
			$('#currency').val('Bitcoin');
		});	
	}

	$('#next').click(function(e){
		var count = 0;
		if($('#target_views').val() == ''){
			toastr.error('Target views field is required!');
			count = 1;
		}
		if($('.peso').val() == '' || $('.bitcoin').val() == ''){
			toastr.error('Please choose your payment currency!');
			count = 1;
		}
		if($('#e_phone').val() == ''){
			toastr.error('Email/Phone field is required!');
			count = 1;
		}
		if(count == 0){
        	$('.loader').fadeIn(5000,function(){
				$('.loader').fadeOut();
				$('#create').modal('show');
        	});
		}
	});

	$('#target_views').keyup(function(){
		var tv = $('#target_views').val();
		if(tv >= 60){
			$('#note').hide();
			$('#peso').removeAttr("disabled");
			$('#bitcoin').removeAttr("disabled");
			$('#e_phone').removeAttr("disabled");
			$('#hidden_target').val(tv);
			$('#views').html(tv);		
		}else{
			$('#note').show();
			$("#peso").attr("disabled", true);
			$("#bitcoin").attr("disabled", true);
			$("#e_phone").attr("disabled", true);
		}
	});


	$('#clip1').click(function(){
		$('#copied1').html('Copied').addClass('fa fa-check').fadeIn().css('color','green');
		$('#copied1').fadeOut();
	});

	$('#clip2').click(function(){
		$('#copied2').html('Copied').addClass('fa fa-check').fadeIn().css('color','green');
		$('#copied2').fadeOut();
	});
	
	// ===========
	// API CALL for BTC
	// ===========
	var id = 'd66042d7737e437283ac0c7fbdb67b69';
	$.ajax({
	  url: "https://coins.ph/api/v3/crypto-accounts/" + id,
	  dataType: "json",
	  headers: {
	    	"Authorization" : "Bearer bO9mfTsQYPvMxVN6nGt1Bpjec9tbDr",
	    	"Content-Type" : 'application/json',
	    	"Accept" : 'application/json'
	  	}
	}).done(function(data) {
	 	$.each( data, function(i, item ) {
            $('#btc').html(item.default_address);
        });	
	});

	$('#next').on('click',function(){
        // setTimeout(function(){
        // },3500);
	});
	// ============================
	// POST data to COINS.PH API
	// ============================
	
	// $('#agree').on('click',function(){
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "https://coins.ph/api/v3/payment-requests/",
	// 		dataType: "JSON",
	// 		headers: {
	// 	    	"Authorization" : "Bearer ",
	// 	    	"Content-Type" : 'application/json',
	// 	    	"Accept" : 'application/json'
	// 	  	},
	// 	  	contentType: "application/json",
	// 	  	data: JSON.stringify({
	// 			"payer_contact_info" :  $('#e_phone').val(), 
	// 	  		"receiving_account" : 'd15da1de02704f069e204728d377b842', 
	// 	  		"amount" : $('#hiddenpayment').val(), 
	// 	  		"message" : "Piggypenny sent you a payment request for the task you requested to post" + $('#photoName').val()
	// 		}),
	// 	  	success: function(response){
	// 	  		console.log(response);
	// 	  	},
	// 	  	error: function(){
	// 	  		toastr.error('Something is not working');
	// 	  	}
	// 	});
	// });

});



