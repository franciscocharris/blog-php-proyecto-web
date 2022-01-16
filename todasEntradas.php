<?php 
  include 'funciones/conexion.php';
  include 'funciones/helpers.php';
  include 'inc/header.php';
?>


<!-- Blog Entries Column -->
<?php include 'imagen-presentacion.php'; ?>
<div class="col-md-8">

  <h1 class="my-4">Todas las Entradas
    <small>ADSI56</small>
  </h1>

  <?php $entradas = entradas();
    if(!empty($entradas)):
      foreach($entradas as $entrada): ?>
        <!-- Blog Post -->
          <div class="card mb-4">
            <a class="entradas" href="post.php?id=<?php echo $entrada['id'];?>">
              <?php include 'image-entrada.php'; ?>

              <div class="card-body">
                <h2 class="card-title"><?php echo $entrada['titulo']; ?></h2>
                <p class="card-text"><?php echo substr($entrada['descripcion'], 0, 400); ?></p>
                <a href="#" class="btn btn-primary">Leer mas &rarr;</a>
              </div>

              <div class="card-footer text-muted">
                Categoria: <?php echo $entrada['categoria'].' | '; ?>
                publicado el: <em> <?php echo $entrada['fecha']; ?></em>
                <a href="#">Start Bootstrap</a>
              </div>
           </a>
          </div>
  <?php endforeach;
    else:
      echo "no hay entradas publicadas ";
    endif;
   ?>
  

</div>

<?php 
include 'inc/sidebar.php';
include 'inc/footer.php';
 ?>
