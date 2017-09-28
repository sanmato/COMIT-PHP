jQuery(document).ready(function($) {
	
	$('li:lt(3)').each(function(index, el) {
		
		$(el).html('Cambiame a '+$(this).attr('data-to')).addClass($(this).attr('data-from'));
	});

	$('li:eq(3)').html()

	$('li:lt(3)').on('click', function(event) {
		event.preventDefault();
		if ($(this).hasClass($(this).attr('data-from'))) {
			$(this).removeClass($(this).attr('data-from')).addClass($(this).attr('data-to'));
			$(this).html('Cambiame a '+$(this).attr('data-from'));

		}
		else{
			$(this).removeClass($(this).attr('data-to')).addClass($(this).attr('data-from'));
			$(this).html('Cambiame a '+$(this).attr('data-to'));
		}

	$('li:eq(3)').on('click', function(event) {
			event.preventDefault();
		
		 if ('') {}

		});
	});

});