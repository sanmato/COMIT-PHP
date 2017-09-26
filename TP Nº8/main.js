jQuery(document).ready(function($) {

$('ul > li:eq(0)').on('click', changeone);

function changeone(){

if ( $('ul > li:eq(0)').hasClass('red') ) {
	 $('ul > li:eq(0)').removeClass('red').addClass('green');
	 $('ul > li:eq(0)').text('Cambiar a Rojo');
} else {
	$('ul > li:eq(0)').removeClass('green').addClass('red');
	$('ul > li:eq(0)').text('Cambiar a Verde');
}
/*
if ($('ul > li:eq(0)').css('background-color').value='red') {
	$('ul > li:eq(0)').css('background-color', 'green');
	$('ul > li:eq(0)').text('Cambiar a Rojo');
} else{
	$('ul > li:eq(0)').removeProp('background-color', 'green').css('background-color', 'red');
	$('ul > li:eq(0)').text('Cambiar a Verde');
}
*/
}

$('ul > li:eq(1)').on('click', changetwo);

function changetwo(){

if ( $('ul > li:eq(1)').hasClass('yellow') ) {
	 $('ul > li:eq(1)').removeClass('yellow').addClass('red');
	 $('ul > li:eq(1)').text('Cambiar a Amarillo');
} else {
	$('ul > li:eq(1)').removeClass('red').addClass('yellow');
	$('ul > li:eq(1)').text('Cambiar a Rojo');
}
}

$('ul > li:eq(2)').on('click', changethree);

function changethree(){

if ( $('ul > li:eq(2)').hasClass('green') ) {
	 $('ul > li:eq(2)').removeClass('green').addClass('blue');
	 $('ul > li:eq(2)').text('Cambiar a Verde');
} else {
	$('ul > li:eq(2)').removeClass('blue').addClass('green');
	$('ul > li:eq(2)').text('Cambiar a Azul');
}
}

$('ul > li:eq(3)').on('click', changefour);

function changefour(){

if ( $('ul > li:eq(3)').hasClass('gray') ) {
	 $('ul > li:eq(3)').removeClass('gray').addClass('white');
	 $('.container').css('background-color', 'black');
	 $('ul > li:eq(3)').text('Cambiar Fondo Gris');
} else {
	$('ul > li:eq(3)').removeClass('white').addClass('gray');
	$('.container').css('background-color', 'gray');
	$('ul > li:eq(3)').text('Cambiar Fondo Negro');
}
}


});

