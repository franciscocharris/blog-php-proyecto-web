<?php 
  include 'funciones/conexion.php';
  include 'funciones/helpers.php';
  include 'inc/header.php';
?>

<div class="container"  style="margin-bottom: 10.6rem">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<h1 class="my-4 text-center"><small>the ADSIPowers</small> </h1>
        	<?php include 'mensaje.php';?>
            <div class="card">
                <!-- este __ detras de los parentesis imprimen un string que puede ser traducible -->
                <div class="card-header">Crear Categoria</div>

                <div class="card-body">
                    <form method="POST" action="funciones/guardar-categoria.php">

                    	<div class="form-group row">
		                    <label for="email" class="col-md-4 col-form-label text-md-right">Nombre</label>
		                    <div class="col-md-6">
		                        <input type="text" class="form-control " name="nombre" required="este campo es obligatrio" placeholder="nombre categoria" id="nombre">
		                    </div>
		                </div>
		                <div class="form-group row mb-0">
		                    <div class="col-md-8 offset-md-4">

		                        <input type="submit" class="btn btn-primary" name="submit" value="Registrar">
		                    </div>
		                </div>
		            </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include 'inc/footer.php';
 ?>