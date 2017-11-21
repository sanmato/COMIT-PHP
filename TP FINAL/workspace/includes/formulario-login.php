<?php
	session_start();
	echo
	'<div class="px-4 py-3" >
	<!--action="pruebin.php" method="post"-->
	    <div class="form-group col-md-10">
	      <label for="email">E-mail</label>
	      <input type="email" class="form-control" value="nahuellavrut88@gmail.com" id="email" name="email" placeholder="email@example.com" required>
	    </div>
	    <div class="form-group col-md-10">
	      <label for="contrasenia">Contraseña</label>
	      <input type="password" class="form-control" value="abc123" id="contrasenia" name="contrasenia" placeholder="Contraseña" required>
	    </div>
	    <div class="form-check">
	      <label class="form-check-label">
	        <input type="checkbox" class="form-check-input">
	        Recordar
	      </label>
	    </div>
	    <div class="text-center">
		    <button class="btn btn-elegant" id="enviar" name="enviar">Iniciar Sesión
		    </button>
		</div>
	  </div>';
 ?>