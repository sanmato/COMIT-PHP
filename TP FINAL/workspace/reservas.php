<?php
  session_start();
  include ("includes/encabezado.php");
  include("includes/conexion.php");
?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1 class="text-center">Realizá tu reserva</h1>
        <h4 class="text-center">En esta sección podrás dejar definidos el menú y la cantidad de comensales para que disfruten una grandiosa cena en nuestro salón.</h4>
        <div id="ocultarbusqueda">
            <form method="POST" action="" id="formregistro">
                <div class="form-group">
                    <label for="comensales">Cantidad de comensales</label>
                    <select class="form-control" id="comensales" name="comensales">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="col-md-5">
                        <label for="fechares">Fecha de reserva</label>
                        <input type="date" name="fechares" min="<?php echo date("d-m-Y");?>" class="form-control" id="fechares" placeholder="Ingrese fecha de reserva">
                    </div>
                    <div class="col-md-2"></div>
                    <!--<div class="col-md-5">-->
                    <!--    <label for="horares">Hora de reserva</label>-->
                    <!--    <input type="time" name="horares" class="form-control" id="horares" placeholder="Ingrese hora de reserva">-->
                    <!--</div>-->
                    <div class="col-md-5">
                        <label for="horares">Hora de reserva</label>
                        <select class="form-control" name="horares" id="horares">
                            <option value="1">Seleccione la hora deseada</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                            <option value="22:00">22:00</option>
                            <option value="22:30">22:30</option>
                            <option value="23:00">23:00</option>
                            <option value="23:30">23:30</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <input type="hidden" name="pasarmail" id="pasarmail" value="<?php echo $_SESSION['mail'];?>"/>
                    <button id="buscarmesa" name="buscarmesa" class="btn btn-elegant">Buscar mesa</button>
                </div>
            </form>
        </div>
        <h4 id="noreserva"></h4>
        <div id="mostrarReserva" style="display:none">
            <div>
                <h4 id="nromesa"></h4>
                <h4 id="mozo"></h4>
            </div>
            <div class="text-center">
                <h3>Tipo de Menú</h3>
                <button id="tradi" name="tradi" class="btn btn-elegant">Tradicional</button>
                <button id="vegan" name="vegan" class="btn btn-elegant">Vegano</button>
            </div>
            <div class="form-group">
                <label for="entrada">Entrada</label>
                <select class="form-control" id="entrada" name="entrada">
            
                </select>
            </div>
            <div class="form-group">
                <label for="plato">Plato principal</label>
                <select class="form-control" id="plato" name="plato">
            
                </select>
            </div>
            <div class="form-group">
                <label for="postre">Postre</label>
                <select class="form-control" id="postre" name="postre">
            
                </select>
            </div>
            <div class="form-group">
                <label for="bebida">Bebida</label>
                <select class="form-control" id="bebida" name="bebida">
            
                </select>
            </div>
            <div class="text-center">
                <input type="hidden" name="pasarmail" id="pasarmail" value="<?php echo $_SESSION['mail'];?>"/>
                <button id="enviarpedido" name="enviarpedido" class="btn btn-elegant">GUARDAR PEDIDO</button>
            </div>
            <h4 id="pedidoconfirmado"></h4>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

<?php
include ("includes/pie.php");
?>