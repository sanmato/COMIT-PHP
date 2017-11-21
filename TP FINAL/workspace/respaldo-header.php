<div class="col-md-6"></div> <!--div del row-->
		        <!--class="col-md-2 offset-md-5"--><div id="ocultar"  <?php
		        	if(isset($_SESSION['mail']) && isset($_SESSION['name']) && isset($_SESSION['pass'])){
		        		echo 'style="display:none"';
		        	}
		        ?>>
			        <ul class="navbar-nav">
			            <li class="nav-item dropdown">
			                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
			                    aria-expanded="false">
			                Iniciar Sesión
			                </a>
			                <div class="dropdown-menu dropdown-menu-right">
							  <?php 
							  	include("formulario-login.php");
							   ?>
							  <div class="dropdown-divider"></div>
							  <a class="dropdown-item" href="#">Eres nuevo? Regístrate</a>
							  <a class="dropdown-item" href="#">Olvidaste la contraseña?</a>
							</div>
			            </li>    
			        </ul>
		        </div>
		        
		        <?php
		        	$visible_login = "none";
		        	//if(isset($_SESSION['mail']) && isset($_SESSION['name']) && isset($_SESSION['pass'])){
		        	if($_SESSION['mail']!=''){
		        		$visible_login = "block";
		        	}
		        ?>
		        
				<div id="show-login" style="display: <?php echo $visible_login; ?>">
			        <ul class="navbar-nav">
			            <li class="nav-item dropdown">
			                <a class="nav-link dropdown-toggle bienvenido" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                <div id="msj_bienvenida"><?php echo "Bienvenido, ".$_SESSION['name']; ?></div>
			                
			                </a>
			                <div class="dropdown-menu dropdown-menu-right">
							  <!--<div class="dropdown-divider"></div>-->
							  <a class="dropdown-item" href="#">Mi Perfil</a>
							  <a class="dropdown-item" href="#">Mis Reservas</a>
							  <div class="dropdown-divider"></div>
							  <a class="dropdown-item" id="cerrarSesion">Cerrar Sesión</a>
							</div>
			            </li>    
			        </ul>
		        </div>
		    
		    </div>