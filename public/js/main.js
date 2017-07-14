$(function(){
	
	$('.header-right-signup').click(function(){
		window.location.assign($(this).attr('data'));
	})
	
	$('.reg-form-button').click(function(ev){
		ev.preventDefault();
		
		var error = false;
		
		$.each($('.reg-form .-req'), function(i,e){
			if ($(e).find('input').val().length == 0) {
				$(e).addClass('-error');
				error = true;
			} else {
				$(e).removeClass('-error');
			}
		})
		
		if (error) {
			$('html,body').scrollTop(0);
			$('.reg-form-error').show();
		} else {
			$('.reg-form-error').hide();
			$('.reg-form').submit();
		}
	})
	
	var clipboard = new Clipboard('.conference-link', {
		text: function() {
        	return $('#link').val();
    	}
	});
	
	clipboard.on('success', function(e) {
    	alert('Copied!');
	});
	
});