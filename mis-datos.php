<?php 
  include 'funciones/conexion.php';
  include 'funciones/helpers.php';
  include 'inc/header.php';
?>

<div class="container"  style="margin-bottom: 7.2rem">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<h1 class="my-4 text-center"><small>the ADSIPowers</small> </h1>
            <div class="card">
                <!-- este __ detras de los parentesis imprimen un string que puede ser traducible -->
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form action="#" method="post" id="actualizar-datos">

                    	<div class="form-group row">
		                    <label for="email" class="col-md-4 col-form-label text-md-right">Nombre</label>
		                    <div class="col-md-6">
		                        <input type="text" class="form-control" value="<?php echo $_SESSION['usuario']; ?>"  required="este campo es obligatrio" placeholder="tu nombre" id="nombre">
		                    </div>
		                </div>
                    	
                    	<div class="form-group row">
		                    <label for="email" class="col-md-4 col-form-label text-md-right">Nombre</label>
		                    <div class="col-md-6">
		                        <input type="text" class="form-control" value="<?php echo $_SESSION['apellidos']; ?>"  required="este campo es obligatrio" placeholder="tu apellido" id="apellidos">
		                    </div>
		                </div>
                    	

		                <div class="form-group row">
		                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>
		                    <div class="col-md-6">
		                        <input type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>" required="este campo es obligatrio" placeholder="tu correo" id="email">
		                    </div>
		                </div>

		                <input type="hidden" value="<?php echo $_SESSION['id']; ?>"  id="usuario">
		                
		                <div class="form-group row mb-0">
		                    <div class="col-md-8 offset-md-4">

		                        <input type="submit" class="btn btn-primary" name="submit" value="guardar">
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