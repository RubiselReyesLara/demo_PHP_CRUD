<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Demo</title>
</head>
<body>

<!-- Barra de navegacion -->
<nav class="navbar-nav p-4 btn-group droup" style="background-color: #F0F0F0;">
<div class="container-fluid">

<!-- Boton desplegable para ver o agregar Personal, o regresar al index -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle btn-primary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Registros
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="m-3">Personal<a href="visualizar.php"><button class="btn btn-primary m-1">Ver</button></a><a href="registro.php"><button class="btn btn-primary m-1">Nuevo</button></a> </li>
            <li><a class="dropdown-item" href="index.php">Index</a></li>
          </ul>
        </li>
      </ul>
  </div>
</nav>

<!-- ... -->

