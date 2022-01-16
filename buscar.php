<?php 
  include 'funciones/conexion.php';
  include 'funciones/helpers.php';
  include 'inc/header.php';

  if(isset($_POST['busqueda'])){

?>

<div class="col-md-8">

  <h1 class="my-4">busqueda : 
    <small><?= $_POST['busqueda'];?></small>
  </h1>

  <?php $entradas = buscarEntradas($_POST['busqueda']);
    if(!empty($entradas)):
      foreach($entradas as $entrada): ?>
        <!-- Blog Post -->
          <div class="card mb-4">
            <a class="entradas" href="post.php?id=<?php echo $entrada['id'];?>">
              
              <?php include 'image-entrada.php'; ?>

              <div class="card-body">
                <h2 class="card-title"><?php echo $entrada['titulo']; ?></h2>
                <p class="card-text"><?php echo substr($entrada['descripcion'], 0, 400); ?></p>
                <a href="post.php?id=<?php echo $entrada['id'];?>" class="btn btn-primary">Leer mas &rarr;</a>
              </div>

              <div class="card-footer text-muted">
                Categoria: <a href="categorias.php?id=<?php echo $entrada['id_categoria'];?>">
                 <?php echo $entrada['categoria']; ?>
                  </a>
                  |
                publicado el: <em> <?php echo $entrada['fecha']; ?></em>
                
              </div>
           </a>
          </div>
  <?php endforeach;
    else:
      echo "no hay entradas publicadas ";
    endif;
   ?>
  <a class="todas btn btn-primary" href="todasEntradas.php">ver todas las entradas</a>

  <!-- Pagination -->
  <!-- <ul class="pagination justify-content-center mb-4">
    <li class="page-item">
      <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#">Newer &rarr;</a>
    </li>
  </ul> -->

</div>

<?php 

}else{
  die('Error');
}

?>




<?php 
include 'inc/sidebar.php';
include 'inc/footer.php';
 ?>
