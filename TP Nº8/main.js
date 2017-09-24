jQuery(document).ready(function($) {
	
	$("ul > li:eq(0)").on('click', function(event) {
		event.preventDefault();
		$(this).css("background-color", "green");
	});



});