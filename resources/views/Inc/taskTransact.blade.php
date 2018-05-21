        		<p class="text-center">Please select your desired payment currency:</p>
	            <div class="row" style="margin-left: 500px;">
	            	<div class="span12 pagination-centered">
					    <div class="checkbox">
	            			<label><input type="checkbox" class="check" name="currency" id="peso" value="Peso"><span> in Peso </span></label>
					    </div> 
					    <div class="checkbox">
			            	<label><input type="checkbox" class="check" name="currency"	id="bitcoin" value="Bitcoin"><span> in Bitcoin/Satoshi </span></label>
					    </div>
				    </div>
	            </div>
	          
	            <br>
	            <div class="text-center">
	           		<p> Total Payment: <label id="totalpayment" name="totalpayment">  </label> </p>
	            </div>
	            <hr>
	            <div class="offset-md-3">
	            	<div style="width:630px;">
		           		<p>
		           			For faster transaction, we are using <b style="color:red">Coins.ph</b>. If you already have an account in <b style="color:red">Coins.ph</b>, kindly input your email address/phone # below so that we can send you a payment request.
		           		</p>
		           		<input type="text" name="e_phone" class="form-control" id="e_phone" placeholder="Email Or Phone # Here..."><br><br>
		           		<p>
		           			If you do not have an account yet. Please click the link to create one and come back when you're done.
		           		</p>
		           		<a href="https://app.coins.ph/welcome/signup" class="text-primary" align="middle"><h3>https://app.coins.ph/welcome/signup</h3></a>
		            </div>
		            <br>
		        	<div class="col-md-5">
	  	           		<button type="submit" class="btn btn-primary btn-block save" id="next">Next</button>
	    	           		<!-- {{ Form::submit('Next', ['class' => 'btn btn-primary btn-block']) }} -->
	    	           		<!-- {{ csrf_field() }} -->
			            </div>
	   		   	