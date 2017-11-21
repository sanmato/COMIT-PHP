<?php
  session_start();
  include ("includes/encabezado.php");
  include("includes/conexion.php");
?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <h1 class="text-center">Registro de usuarios</h1>
    <form method="POST" action="" id="formregistro">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre1" class="form-control" id="nombre1" placeholder="Ingrese su nombre">
      </div>
      <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese su apellido">
      </div>
      <div class="form-group">
        <label for="dni">Documento</label>
        <input type="number" min="1000000" max="100000000" name="dni" class="form-control" id="dni" placeholder="Ingrese su DNI">
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese su número de teléfono">
      </div>
      <div class="form-group">
        <label for="apellido">E-mail</label>
        <input type="email" name="email1" class="form-control" id="email1" placeholder="Ingrese su e-mail">
      </div>
      <div class="form-group">
        <label for="contrasenia1">Contraseña</label>
        <input type="password" min=6 max=10 name="contrasenia1" class="form-control" id="contrasenia1" placeholder="Ingrese su contraseña">
      </div>
      <div class="form-group">
        <label for="contrasenia2">Repetir contraseña</label>
        <input type="password" min=6 max=10 name="contrasenia2" class="form-control" id="contrasenia2" placeholder="Ingrese nuevamente su contraseña">
      </div>
      <div id="checkpass" class="text-center" style="display: none"></div>
      <div class="form-group">
        <label for="provincia">Provincia</label>
        <select class="form-control" id="provincia" name="provincia">
          <?php
            header('Content-Type: text/html; charset=UTF-8');
            $consulta = "select id, provincia from provincias;";
            $rs = mysqli_query($db, $consulta);
            if($rs){
              while($reg = mysqli_fetch_array($rs)){
                $id = $reg[0];
                $prov = $reg[1];
                //echo '<option value="'.$id.'">'.$prov.'</option>';
          ?>
              <option value="<?php echo $id;?>"><?php echo utf8_encode($prov);?></option>
          <?php
              }
            }

          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="localidad">Localidad</label>
        <select class="form-control" id="localidad" name="localidad">

        </select>
      </div>
      <div id="msj_incompleto" style="display:none"></div>
      <div class="text-center">
        <button id="nuevouser" name="nuevouser" class="btn btn-elegant">Crear Usuario</button>
      </div>
    </form>
  </div>
  <div class="col-md-2"></div>
</div>

<?php
include ("includes/pie.php");
?>