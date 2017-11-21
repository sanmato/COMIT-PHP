<?php 
	include("includes/encabezado.php");
	//session_start();
 ?>
 <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center">
        <h1> Bienvenidos</h1>
        <div id="restaurant-carousel" class="carousel slide carousel-fade" data-ride="carousel" height="500">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#restaurant-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#restaurant-carousel" data-slide-to="1"></li>
                <li data-target="#restaurant-carousel" data-slide-to="2"></li>
                <li data-target="#restaurant-carousel" data-slide-to="3"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <!--First slide-->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://img.pystatic.com/header-backgrounds/mobile/vegan-2.jpg" alt="Primer slide" height="540">
                      <div class="carousel-caption d-none d-md-block" style="color:black">
                        <h3>EXQUISITAS HAMBURGUESAS VEGANAS</h3>
                        <p>Podés elegirlas de lentejas o espinaca!</p>
                      </div>
                </div>
        
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://www.ilmessaggeroip.com/wp-content/uploads/2013/09/antipasto-platter-1024x747.jpg" alt="Segundo slide" height="540">
                      <div class="carousel-caption d-none d-md-block" style="color:white">
                        <h3>PROBÁ NUESTRAS PICADAS DE FIAMBRES SELECCIONADOS</h3>
                        <p>Con los mejores fiambres del mercado!</p>
                      </div>
                </div>
        
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://4.bp.blogspot.com/-juZ4ytDZJ_c/VfYUYJr0syI/AAAAAAAAZ20/TP5BUSofDow/s1600/20150825_203145%2B%25282%2529.jpg" alt="Tercer slide" height="540">
                      <div class="carousel-caption d-none d-md-block" style="color:white">
                        <h3>LLEGARON LOS TACOS VEGGIES</h3>
                        <p>Pedilos con salsa guacamole!</p>
                      </div>
                </div>
        
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://www.viajaraitalia.com/wp-content/uploads/2009/09/lasagna.jpg" alt="Cuarto slide" height="540">
                      <div class="carousel-caption d-none d-md-block" style="color:black">
                        <h3>EXQUISITA LASAGNA DE CARNE DE TERNERA</h3>
                        <p>Una de nuestras especialidades!</p>
                      </div>
                </div>
            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#restaurant-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#restaurant-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
        
        <h4>Nosotros somos Raison. El primer restaurant con reserva de menú online. Una idea orientada hacia las personas que desean llegar al restaurant y sentarse a comer.</h4>
    </div>
    <div class="col-md-2"></div>
</div>

 <?php 
	include("includes/pie.php");
 ?>