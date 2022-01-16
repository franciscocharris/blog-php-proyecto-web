<?php 
  include 'funciones/conexion.php';
  include 'funciones/helpers.php';
  include 'inc/header.php';
  include 'inc/sidebar.php';

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT)){
  $entrada_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
?>

<!-- tienes que conseguir las entradas con el id de la categoria que tienes por get -->

<?php $entradaActual = conseguirEntrada($entrada_id);
  $entrada = mysqli_fetch_assoc($entradaActual); ?>
    <div class="col-lg-8" style="margin-top: 3rem">

        <h1 style="margin-top: 1rem" class="mt-4"><?php echo $entrada['titulo']; ?></h1>
        <p class="lead">
          Categoria:
          <a href="categorias.php?id=<?php echo $entrada['categoria_id']; ?>">
             <?php echo $entrada['nombre'];?>
          </a>
        </p>
        <hr>
        <p>
          Publicado el: <?php echo $entrada['fecha']; ?> 
    <?php  if(isset($_SESSION['usuario']) && $_SESSION['id'] == $entrada['usuario_id'] ){ ?>
          <a class="btn btn-warning"  href="crear-entrada.php?id=<?php echo  $entrada_id; ?>">Editar entrada</a>
          <a class="btn btn-danger " id="eliminarEntrada" data-id="<?php echo  $entrada_id; ?>"  >Eliminar Entrada</a>
    <?php } ?>
        </p>
        <hr>

        <?php include 'image-entrada.php'; ?>
        
        <hr>
        <p class="lead">todavia no se aqui</p>

        <!-- substr funcion de php para limitar el numeor de caracteres que se muestraen en la vista asi sean mas en la base de datos -->
            <p><?php echo $entrada['descripcion']; ?></p>

        <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Deja un comentario:</h5>
          <div class="card-body">
            <form action="funciones/guardar-comentario.php" method="POST">
              <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>">
              <input type="hidden" name="entrada_id" value="<?=$entrada_id ?>">
              <div class="form-group">
                <textarea name="contenido" required="escribe algo :V" class="form-control" rows="3"></textarea>
              </div>
              <?php  if(isset($_SESSION['usuario'])):?>
                <button type="submit" class="btn btn-primary">Guardar</button>
              <?php else: ?>
                <p class="alert alert-danger">inicia sesion para comentar</p>
              <?php endif; ?>
            </form>
          </div>
          <?php include 'mensaje.php';?>
        </div>

        
        <?php $comentarios = conseguirComentarios($entrada_id);

          if($comentarios):
            echo "<h3>Comentarios</h3>";
            foreach($comentarios as $comentario): ?>
              
              <hr>
              <!-- Single Comment -->
                <div class="media mb-4">
                  <div class="media-body">
                    <h6 class="mt-0"><?= $comentario['nombre']; ?> dice: </h6>
                    <?= $comentario['contenido']; ?>
                  </div>
                   <?php  if(isset($_SESSION['usuario']) && $_SESSION['id'] == $entrada['usuario_id'] || isset($_SESSION['usuario']) && $_SESSION['id'] == $comentario['user_id'] ){ ?>
                      <a class="btn btn-danger "  href="funciones/eliminarComentario.php?id=<?php echo  $comentario['comentario_id']; ?>">Eliminar Comentario</a>
                  <?php } ?>
                </div>
                <hr>
            <?php endforeach;

          else: ?>
              <h3>No hay Comentarios</h3>
          
        <?php  endif; ?>

    </div>



<?php  
}else{
  die('Error');
}
?>

<?php 
  include 'inc/footer.php';
?>

   
