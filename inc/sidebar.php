      <!-- sidebar -->
       <div class="col-md-4" style="margin-top: 3rem">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Buscar</h5>
          <div class="card-body">
            <form action="buscar.php" method="post">
                <div class="input-group">
                  <input type="text" class="form-control" name="busqueda" placeholder="buscar entrada">
                  <span class="input-group-append">
                    <input class="btn btn-secondary" type="submit" value="Buscar">
                  </span>
                </div>
              </form>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categorias</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <?php $categorias = conseguirCategorias();

                    if($categorias){
                      foreach($categorias as $categoria){ ?>
                        <li>
                          <a href="categorias.php?id=<?php echo $categoria['id']; ?>">
                            <?php echo $categoria['nombre']; ?>   
                          </a>
                        </li>
                  <?php }
                    }else{
                      echo "
                            <li>
                              <p>No hay categorias</p>
                            </li>
                            ";
                    }
                     ?>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>

<?php if(!isset($_SESSION['usuario'])): //en caso que este logueado desaparecer el login y el registro ?>
        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Login</h5>
          <div class="card-body">
            <form method="POST" action="funciones/login.php">
              <?php if(isset($_SESSION['errores-login'])): ?>
                  <div class="alert alert-danger"><?=$_SESSION['errores-login']?></div>
                  <?php quitarSessions(); ?>
              <?php endif;?>
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

  
          
            <div class="card  my-4">
                <!-- este __ detras de los parentesis imprimen un string que puede ser traducible -->
                <div class="card-header">Registrate</div>

                <div class="card-body">
                    <form method="POST" action="funciones/registro.php">

                      <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="nombre" required="este campo es obligatrio" placeholder="tu nombre" id="nombre">
                        </div>
                    </div>
                      
                      <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" name="apellidos" class="form-control " required="este campo es obligatrio" placeholder="tu apellido" id="apellidos">
                        </div>
                    </div>
                      

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

                            <input type="submit" class="btn btn-primary" name="submit" value="Registrar">
                        </div>
                        <?php if(isset($_SESSION['completado']) || isset($_SESSION['errores'])){ quitarSessions(); } ?>
                    </div>
                </form>
                </div>
            </div>
  

<?php endif; ?>

<?php
        if(isset($_SESSION['usuario'])): ?>
          <div class=" card my-4">
            <h5 class="card-header">hola <?=$_SESSION['usuario'];?></h5>
            <div class="acciones-blog card-body">
              <a class="btn btn-primary" href="crear-entrada.php">Crear entrada</a>
              <a class="btn btn-success " href="crear-categoria.php">Crear Categoria</a>
              <a class="btn btn-warning" href="mis-datos.php">Mis datos</a>
              <a class="btn btn-danger" href="funciones/cerrar-session.php">Cerrar sesion</a>
            </div>
          </div>
    <?php endif;?>
</div>