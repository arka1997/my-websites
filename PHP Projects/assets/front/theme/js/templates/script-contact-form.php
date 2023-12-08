

jQuery(document).ready(function() {
	jQuery('form#contact_form').submit(function() {
		jQuery('form#contact_form .error').remove();
		var hasError = false;
		jQuery('.required_field').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				var labelText = jQuery(this).prev('label').text();
				jQuery('#reponse_msg ul').append('<li class="error">Please enter '+labelText+'</li>');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					var labelText = jQuery(this).prev('label').text();
					jQuery('#reponse_msg ul').append('<li class="error">Please enter valid '+labelText+'</li>');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			var contactData = jQuery('#contact_form').serialize();

			 			jQuery('#contact_submit_btn').fadeOut('normal', function() {
								jQuery(this).parent().append('<img src="https://themes.themegoods.com/altair/demo/wp-content/themes/altair/images/loading_light.gif" alt="Loading" />');
							});
 			
 			jQuery.ajax({
			    type: 'POST',
			    url: tgAjax.ajaxurl,
			    data: contactData+'&tg_security='+tgAjax.ajax_nonce,
			    success: function(results){
			    	jQuery('#contact_form').hide();
			    	jQuery('#reponse_msg').html(results);
			    }
			});
 					}
		
		return false;
		
	});
});