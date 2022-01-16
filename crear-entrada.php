<?php 
  include 'funciones/conexion.php';
  include 'funciones/helpers.php';
  include 'inc/header.php';
?>

<div class="container"  style="margin-bottom: 7.2rem">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<?php if(isset($_GET['id'])): 
        		$entrada_id = $_GET['id'];
        		$entradaActual = conseguirEntrada($entrada_id);
		 		$resultado = mysqli_fetch_assoc($entradaActual);  ?>
        		<h1 class="my-4 text-center"><small>editar Entrada</small> </h1>
        	<?php else: ?>
        		<h1 class="my-4 text-center"><small>Crear Entrada</small> </h1>
        	<?php endif; ?>
    			<?php include 'mensaje.php';?>
            <div class="card">
            	
                <div class="card-header">the ADSI Powers</div>
                <div class="card-body">
                    <form  action="funciones/guardar-entrada.php" method="post"  enctype="multipart/form-data">
                    	<!-- titulo entrada -->
		                <div class="form-group row">
		                    <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo Entrada</label>
		                    <div class="col-md-6">
		                        <input id="titulo" value="<?= (isset($resultado)) ? $resultado['titulo'] : '' ?>" name="titulo" type="text" class="form-control " required="" >
		                    </div>
		                </div>

		                <!-- descripcion -->
		                <div class="form-group row">
		                    <label for="password" class="col-md-4 col-form-label text-md-right">Descripcion</label>
		                    <div class="col-md-6">
		                        <textarea class="form-control" name="descripcion" id="descripcion">
		                        	<?= (isset($resultado)) ? $resultado['descripcion'] : '' ?>
		                        </textarea>
		                    </div>
		                </div>

		                <!-- categoria de la entrada -->
		                <div class="form-group row">
		                    <label for="password" class="col-md-4 col-form-label text-md-right">Categoria</label>
		                    <div class="col-md-6">
		                        <select id="categoria" class="form-control" name="categoria">
									<?php $categorias = conseguirCategorias();
										if($categorias): ?>
											<option>-- seleccione -- </option>
									<?php	foreach($categorias as $categoria): ?>
												<option value="<?=$categoria['id'];?>" <?= (isset($resultado) && $resultado['categoria_id'] == $categoria['id']) ? 'selected' : '' ?> >
													<?=$categoria['nombre'];?>
												</option>
									<?php	endforeach;
										endif;
									 ?>
								</select>
		                    </div>
		                </div>

		                <!-- imagen de la entrada -->

		                 <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Imagen Entrada</label>


                            <div class="col-md-6">
                            	<?php if(isset($resultado)){ ?>
			                    	<input id="image" type="file" class="form-control"  name="image">
			                    <?php }else{ ?>
	                                <input id="image" type="file" class="form-control"  name="image" required="">
	                            <?php } ?>
	                            </div>
                        </div>

                    <?php if(isset($resultado)){ ?>
                    	<input type='hidden' value='<?php echo $resultado['usuario_id']; ?>' name='usuario'>
                    <?php	}  ?>

                        <?php if(isset($_GET['id'])): ?>
                        	<input type="hidden" name="entrada_id" value="<?= $_GET['id'];?>">
                        	<input type="hidden" name="accion" value="actualizar">
                        <?php  else: ?>
                        	<input type="hidden" name="accion" value="guardar">
                        <?php endif; ?>

		                <div class="form-group row mb-0">
		                    <div class="col-md-8 offset-md-4">
		                        <input type="submit" id="guardar" value="guardar" class="btn btn-primary">
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