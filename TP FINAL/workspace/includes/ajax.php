<?php
	include("conexion.php");
	session_start();
	header('Content-Type: text/html; charset=UTF-8');

	if($_REQUEST['action']=="log-in"){
		$email = filter_var($_REQUEST['email'],FILTER_VALIDATE_EMAIL,FILTER_SANITIZE_EMAIL);
		$contrasenia = md5($_REQUEST['contrasenia']);
		//session_start();
		
		//agregué email
		$consulta = "select email, nombre, contrasenia from usuario where email =  '$email';";
		$rs = mysqli_query($db, $consulta);
		if ($rs){
	        $res = mysqli_fetch_array($rs);
	        //agregué validación de mail aca
	        if ($email==$res['email']){
	        	//echo $_SESSION['pass'];
		        if ($contrasenia==$res['contrasenia']){
		        	$_SESSION['mail']=$res['email'];
	        		$_SESSION['pass']=$res['contrasenia'];
	        		$_SESSION['name']=$res['nombre'];
					echo $_SESSION['name'];
		        	//esto no va aca
		        	//session_start();
		        }
		        else{
		        	echo "CI";
		        }
		    }
		    else{
		     	echo "UI";
		    }
		}
	}
	if($_REQUEST['action']=="logout"){
		session_destroy();
		
	}
	
	if($_REQUEST['action']=="show-localidad"){
		$prov = $_REQUEST['id'];
		$consulta = "select id, localidad from localidades where id_privincia = '$prov';";
		//die($consulta);
		$rs = mysqli_query($db, $consulta);
		if($rs){
			while($res = mysqli_fetch_assoc($rs)){
				echo '<option value="'.$res['id'].'">'.utf8_encode($res['localidad']).'</option>';
			}
		}
	}
	
	if($_REQUEST['action']=="register"){
		$nombre1 = filter_var($_REQUEST['nombre1'],FILTER_SANITIZE_STRING);
		$apellido = filter_var($_REQUEST['apellido'],FILTER_SANITIZE_STRING);
		$dni = filter_var($_REQUEST['dni'],FILTER_SANITIZE_STRING);
		$telefono = filter_var($_REQUEST['telefono'],FILTER_SANITIZE_STRING);
		$email1 = filter_var($_REQUEST['email1'],FILTER_VALIDATE_EMAIL,FILTER_SANITIZE_EMAIL);
		$contrasenia = md5($_REQUEST['contrasenia1']);
		$localidad = filter_var($_REQUEST['localidad'],FILTER_SANITIZE_NUMBER_INT);
		
		$consulta1 = "select * from usuario where email1 = '$email1';";
		$rs = mysqli_query($db, $consulta1);
		$rows = mysqli_num_rows($rs);
		if($rows!=0){
			echo "rep"; //repetido
		}
		else{
			$consulta2 = "insert into usuario (nombre, apellido, dni, telefono, email, contrasenia, idciudad) values ('$nombre1', '$apellido', '$dni', '$telefono', '$email1', '$contrasenia', $localidad);";
			$rs1 = mysqli_query($db, $consulta2);
			if ($rs1){
				$_SESSION['mail']=$email1;
        		$_SESSION['pass']=$contrasenia;
        		$_SESSION['name']=$nombre1;
				echo $_SESSION['name'];
			}
		}
	}
	
	if($_REQUEST['action']=="searchmesa"){
		$comensales = $_REQUEST['comensales'];
		$fechares = $_REQUEST['fechares'];
		$horares = $_REQUEST['horares'];
		$pasarmail = $_REQUEST['pasarmail'];
		$consulta = "select id_mesa from mesa where id_mesa not in (select id_mesa from pedido where fecha_pedido = '$fechares' and hora_pedido = '$horares') and tamanio >=$comensales;";
		//die($consulta);
		$rs = mysqli_query($db, $consulta);
		$rows = mysqli_num_rows($rs);
		$consulta1 = "select id_mozo, nombre from mozo order by RAND() limit 1";
		if($rows!=0){
			$row = mysqli_fetch_array($rs);
			$rs1 = mysqli_query($db, $consulta1);
			$mimesa = $row[0];
			while($row1 = mysqli_fetch_assoc($rs1)){
				$mimozo = $row1['nombre'];
				$miid_mozo = $row1['id_mozo'];
			}
			
			//(select idusuario from usuario where email = '$pasarmail')
			 //primer mesa libre y mozo aleatorio
			$consulta2 = "insert into pedido (idusuario, id_mozo, id_mesa, fecha_pedido, hora_pedido) values ((select idusuario from usuario where email = '$pasarmail'), $miid_mozo, $mimesa, '$fechares', '$horares');";
			$rs2 = mysqli_query($db, $consulta2);
			if($rs2){
				echo $mimesa."__".utf8_encode($mimozo);
			}

		}
		else{
			echo "sm"; // sin mesa
		}
	}
	if($_REQUEST['action']=="gettradi"){
		$consulta = "select id_plato, nombre, precio from plato where tipo = 'tradi' and componente = 'entrada';";
		$consulta1 = "select id_plato, nombre, precio from plato where tipo = 'tradi' and componente = 'plato_principal';";
		$consulta2 = "select id_plato, nombre, precio from plato where tipo = 'tradi' and componente = 'postre';";
		$consulta3 = "select id_bebida, nombre, precio from bebida;";

		$rs = mysqli_query($db, $consulta);
		$rs1 = mysqli_query($db, $consulta1);
		$rs2 = mysqli_query($db, $consulta2);
		$rs3 = mysqli_query($db, $consulta3);
		// $option1 = '';
		// $option2 = '';
		// $option3 = '';
		// $option4 = '';
	if($rs && $rs1 && $rs2 && $rs3){
			while($res = mysqli_fetch_assoc($rs)){
				$option1 .= '<option value="'.$res['id_plato'].'">'.utf8_encode($res['nombre']).' - $'.$res['precio'].'</option>';
			}
			while($res1 = mysqli_fetch_assoc($rs1)){
				$option2 .= '<option value="'.$res1['id_plato'].'">'.utf8_encode($res1['nombre']).' - $'.$res1['precio'].'</option>';
			}
			while($res2 = mysqli_fetch_assoc($rs2)){
				$option3 .= '<option value="'.$res2['id_plato'].'">'.utf8_encode($res2['nombre']).' - $'.$res2['precio'].'</option>';
			}
			while($res3 = mysqli_fetch_assoc($rs3)){
				$option4 .= '<option value="'.$res3['id_bebida'].'">'.utf8_encode($res3['nombre']).' - $'.$res3['precio'].'</option>';
			}
			echo $option1.'<option value="0" selected>Nada</option>'.'__'.$option2.'<option value="0" selected>Nada</option>'.'__'.$option3.'<option value="0" selected>Nada</option>'.'__'.$option4.'<option value="0" selected>Nada</option>';
		}
	}
	
	if($_REQUEST['action']=="getvegan"){
		$consulta = "select id_plato, nombre, precio from plato where tipo = 'vegan' and componente = 'entrada';";
		$consulta1 = "select id_plato, nombre, precio from plato where tipo = 'vegan' and componente = 'plato_principal';";
		$consulta2 = "select id_plato, nombre, precio from plato where tipo = 'vegan' and componente = 'postre';";
		$consulta3 = "select id_bebida, nombre, precio from bebida;";

		$rs = mysqli_query($db, $consulta);
		$rs1 = mysqli_query($db, $consulta1);
		$rs2 = mysqli_query($db, $consulta2);
		$rs3 = mysqli_query($db, $consulta3);

		if($rs && $rs1 && $rs2 && $rs3){
			while($res = mysqli_fetch_assoc($rs)){
				$option1 .= '<option value="'.$res['id_plato'].'">'.utf8_encode($res['nombre']).' - $'.$res['precio'].'</option>';
			}
			while($res1 = mysqli_fetch_assoc($rs1)){
				$option2 .= '<option value="'.$res1['id_plato'].'">'.utf8_encode($res1['nombre']).' - $'.$res1['precio'].'</option>';
			}
			while($res2 = mysqli_fetch_assoc($rs2)){
				$option3 .= '<option value="'.$res2['id_plato'].'">'.utf8_encode($res2['nombre']).' - $'.$res2['precio'].'</option>';
			}
			while($res3 = mysqli_fetch_assoc($rs3)){
				$option4 .= '<option value="'.$res3['id_bebida'].'">'.utf8_encode($res3['nombre']).' - $'.$res3['precio'].'</option>';
			}
			echo $option1.'<option value="0" selected>Nada</option>'.'__'.$option2.'<option value="0" selected>Nada</option>'.'__'.$option3.'<option value="0" selected>Nada</option>'.'__'.$option4.'<option value="0" selected>Nada</option>';
		}
	}
	if($_REQUEST['action']=="sendpedido"){
		$entrada = $_REQUEST['entrada'];
		$plato = $_REQUEST['plato'];
		$postre = $_REQUEST['postre'];
		$bebida = $_REQUEST['bebida'];
		$pasarmail = $_REQUEST['pasarmail'];
		$consulta1 ="select idusuario from usuario where email = '$pasarmail'";
		$rs1=mysqli_query($db,$consulta1);
		while($res1 = mysqli_fetch_array($rs1)){
			$iduser =$res1[0];
		}
		
		$consulta = "insert into p_plato_bebida (id_pedido, id_entrada, id_plato, id_postre, id_bebida) values ((select id_pedido from pedido where idusuario = $iduser), $entrada, $plato, $postre, $bebida );";
		//die($consulta);
		$rs = mysqli_query($db, $consulta);
		if($rs){
			echo "Pedido guardado con éxito";
		}
	}
?>