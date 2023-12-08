jQuery(document).ready(function() {
	jQuery('form#pp_booking_form').submit(function() {
		jQuery('form#pp_booking_form .error').remove();
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
			var contactData = jQuery('#pp_booking_form').serialize();

			jQuery('#booking_submit_btn').fadeOut('normal', function() {
				jQuery(this).parent().append('<img src="https://themes.themegoods.com/altair/demo/wp-content/themes/altair/images/loading.gif" alt="Loading" />');
			});
 			
 			jQuery.ajax({
			    type: 'POST',
			    url: tgAjax.ajaxurl,
			    data: contactData+'&tg_security='+tgAjax.ajax_nonce,
			    success: function(results){
			    	jQuery('#pp_booking_form').hide();
			    	jQuery('#reponse_msg').html(results);
			    	
			    	jQuery('#booking_close_form').click(function() {
						jQuery('#tour_book_wrapper').fadeOut();
					});
			    }
			});
		}
		
		return false;
		
	});
});