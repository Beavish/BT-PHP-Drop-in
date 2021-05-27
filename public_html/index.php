<?php require_once("../includes/braintree_init.php"); ?>

<html>
<?php require_once("../includes/head.php"); ?>
<script src="https://js.braintreegateway.com/web/dropin/1.28.0/js/dropin.min.js"></script>
<body>

    <?php require_once("../includes/header.php"); ?>

   <div id="dropin-container"></div>
			 
			<br/>
			 <input type="hidden" id="nonce" name="payment_method_nonce"  />
			 <input type="hidden" id="cc_number" name="cc_number"  />
			 <input type="hidden" id="cc_type" name="cc_type"  />
			 <input type="hidden" id="expirationMonth" name="expirationMonth"  />
			 <input type="hidden" id="expirationYear" name="expirationYear"  />
			 <input type="hidden" id="details" name="details"  />
       <button id="submit-button">Request payment method</button>
<script type="text/javascript">




  var client_token = "<?php echo($gateway->ClientToken()->generate()); ?>";
	var button = document.querySelector('#submit-button');
	  braintree.dropin.create({
  			authorization: client_token,
  			container: '#dropin-container'
		}).then((dropinInstance) => {
  		button.addEventListener('submit', (event) => {
			event.preventDefault();
			var response = grecaptcha.getResponse();
    		dropinInstance.requestPaymentMethod().then((payload) => {
				if((dataForm.validation('isValid')) && (response.length != '')){

		      		document.getElementById('nonce').value = payload.nonce;
		      		document.getElementById('cc_type').value = payload.details.cardType;
		      		document.getElementById('cc_number').value = payload.details.lastFour;
		      		document.getElementById('expirationYear').value = payload.details.expirationYear;
		      		document.getElementById('expirationMonth').value = payload.details.expirationMonth
		      		document.getElementById('details').value = JSON.stringify(payload.details);
		      		console.log(payload.details);
	    		form.submit();
	    		}
			}).catch((error) => { alert(error);throw error; });
		
  		});
	}).catch((error) => {
		alert(error);
  // handle errors
});
 

	</script>
</script>>
