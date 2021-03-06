<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog ADSI-56</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/blog.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">The Powers Adsi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <?php if (!isset($_SESSION['usuario'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="register.php">Registrate</a>
            </li>
          <?php endif; ?>

          <?php if (isset($_SESSION['usuario'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="funciones/cerrar-session.php">Cerrar sesion</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="contactanos.php">Contactanos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">