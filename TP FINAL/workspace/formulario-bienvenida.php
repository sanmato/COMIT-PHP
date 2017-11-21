<?php
 echo '<div class="show-login" id="show-login">
			        <ul class="navbar-nav">
			            <li class="nav-item dropdown">
			                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
			                    aria-expanded="false">
			                Bienvenido, '.$_SESSION['name'].'
			                </a>
			                <div class="dropdown-menu dropdown-menu-right">
							  <div class="dropdown-divider"></div>
							  <a class="dropdown-item" href="#">Eres nuevo? Regístrate</a>
							  <a class="dropdown-item" href="#">Olvidaste la contraseña?</a>
							</div>
			            </li>    
			        </ul>
		        </div>'
    
?>