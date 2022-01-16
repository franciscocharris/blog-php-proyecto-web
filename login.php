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
                    <form method="POST" action="funciones/login.php">
		                <div class="form-group row">
		                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>
		                    <div class="col-md-6">
		                        <input id="email" type="text" class="form-control " name="email"  required="" autocomplete="email">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
		                    <div class="col-md-6">
		                        <input id="password" type="password" class="form-control " name="password" required="">
		                    </div>
		                </div>

		                <div class="form-group row mb-0">
		                    <div class="col-md-8 offset-md-4">
		                        <input type="submit" name="entrar" class="btn btn-primary" value="entrar">
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