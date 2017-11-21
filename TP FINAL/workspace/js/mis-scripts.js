$("#cerrarSesion").on('click', function(){
	$.ajax({
		url: 'includes/ajax.php?action=logout',
		success: function(){
			location.replace('/index.php');
		}
	})
});
// Agrega opcion de enviar formulario con Enter
if($("#email").val()!='' && $("#contrasenia").val()!=''){
	$("input").keypress(function(evento){
		if(evento.which == 13){
			$("#enviar").click();
		}
	});
}
function showBienvenida(result){
	$("#ocultar").hide();
	var cadena = "Bienvenido, " + result;
	$("#msj_bienvenida").text(cadena);
	$("#show-login").show();
	$("#inactivo").removeClass("disabled").prop('title','');
	if($(location).attr('pathname','registro.php')){
		$(location).attr('pathname','index.php');
	}
}

$("#enviar").on('click', function() {
	if($("#email").val()=='' || $("#contrasenia").val()==''){
		$("#msj_error").html("Debe completar todos los campos").css({"color":"red","display":"block"}).addClass("text-center");
	}
	else{
		$.ajax({
			url: 'includes/ajax.php?action=log-in',
			data: {email: $("#email").val(),contrasenia: $("#contrasenia").val()}
		})
		.done(function(resultado) {
			if(resultado=="UI"){
				$("#msj_error").html("Usuario Inválido").css({"color":"red","display":"block"}).addClass("text-center");
			}
			else if (resultado=="CI"){
				$("#msj_error").html("Contraseña Inválida").css({"color":"red","display":"block"}).addClass("text-center");
			}
			else{
				showBienvenida(resultado);
			}
	
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	
	
});

$("#provincia").on("change", function(){
	//var id_prov = $("#provincia").val();
	$.ajax({
		url: 'includes/ajax.php?action=show-localidad',
		data: {id: $("#provincia").val()},
		success: function(respuesta){
			$("#localidad").html(respuesta);
		}
	});
});

$(document).ready(function(){
	var pass1 = $("#contrasenia1");
	var pass2 = $("#contrasenia2");
	var msjvacio = "El campo contraseña no puede estar vacío";
	var msjdistinto = "Las contraseñas son distintas";
	var msjlongitud = "El campo contraseña debe contener entre 6 y 10 caracteres";
	var msjcheck = "Las contraseñas coinciden";
	function checkpassword(){
		var val1 = pass1.val();
		var val2 = pass2.val();
		if (val1!=val2){
			$("#checkpass").html(msjdistinto).css('color','red').show();
		}
		if (val1.length ==0 || val1 == ""){
			$("#checkpass").html(msjvacio).css('color','red').show();
		}
		if(val1.length<6 || val1.length>10){
			$("#checkpass").html(msjlongitud).css('color','red').show();
		}
		else if(val1.length!=0 && val1==val2){
			$("#checkpass").html(msjcheck).css('color','green').show();
		}
	}
	pass2.on('keyup', function() {
		checkpassword();
	});
});

$("button#nuevouser").on('click', function(e){
	e.preventDefault();
	if($("form input").val()=='' || $("#localidad > option").length==0){
		$("#msj_incompleto").html("Debe completar todos los campos").css({"color":"red","display":"block"}).addClass("text-center");
	}
	else{
		$.ajax({
			url: 'includes/ajax.php?action=register',
			data: {nombre1: $("#nombre1").val(),apellido: $("#apellido").val(), dni: $("#dni").val(),telefono: $("#telefono").val(), email1: $("#email1").val(), contrasenia1: $("#contrasenia1").val(), localidad: $("#localidad").val()},
			success: function(respuesta){
				if(respuesta!="rep"){
					location.replace('/index.php');
					//$(location).attr('pathname','index.php');
					//showBienvenida(respuesta);
				}
				else{
					$("#msj_incompleto").html("El email ya pertenece a un usuario registrado").css({"color":"red","display":"block"}).addClass("text-center");
				}
			}
		});
	}
});

$("#buscarmesa").on('click', function(e){
	e.preventDefault();
	//alert($("#fechares").val());
	if($("#fechares").val()=="" || $("#horares").val()=='1'){
		$("#noreserva").html("Debe completar la fecha y el horario deseado").addClass("text-center").css('color','red');
	}
	else{
		$.ajax({
			url: 'includes/ajax.php?action=searchmesa',
			data: {comensales: $("#comensales").val(), fechares: $("#fechares").val(), horares: $("#horares").val(), pasarmail: $("#pasarmail").val()}
		})
		.done(function(rpta){
			if(rpta!="sm"){
				var datos = rpta.split("__");
				$("#mostrarReserva").show();
				$("#nromesa").html("Mesa asignada: "+datos[0]).css('color','green');
				$("#mozo").html("Mozo: "+datos[1]).css('color','green');
				$("#ocultarbusqueda").hide();
				$("#noreserva").hide();
				//alert($("#fechares").val());
			}
			else{
				$("#noreserva").html("No hay mesa para el horario seleccionado. Intente otra fecha y horario").addClass("text-center").css('color','red');
			}
		})
	}
});

$("button#tradi").on('click', function(e){
	e.preventDefault();
	$.ajax({
		url: 'includes/ajax.php?action=gettradi',
		success: function(respuesta){
			var options = respuesta.split("__");
			$("#entrada").html(options[0]);
			$("#plato").html(options[1]);
			$("#postre").html(options[2]);
			$("#bebida").html(options[3]);
		}
	});
});

$("button#vegan").on('click', function(e){
	e.preventDefault();
	$.ajax({
		url: 'includes/ajax.php?action=getvegan',
		success: function(respuesta){
			var options = respuesta.split("__");
			$("#entrada").html(options[0]);
			$("#plato").html(options[1]);
			$("#postre").html(options[2]);
			$("#bebida").html(options[3]);
		}
	});
});

$("button#enviarpedido").on('click', function(e){
	e.preventDefault();
	$.ajax({
		url: 'includes/ajax.php?action=sendpedido',
		data: {entrada: $("#entrada").val(), plato: $("#plato").val(), postre: $("#postre").val(), bebida: $("#bebida").val(), pasarmail: $("#pasarmail").val()},
		success: function(respuesta){
			$("#pedidoconfirmado").html(respuesta).css('color','green').addClass("text-center");
		}
	});
});
