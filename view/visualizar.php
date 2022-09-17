<?php 
  include 'encabezado.php';
  include '../controller/LecturaUsuario.php';

  $resultado = null;
  $estadoFiltro = null;
  $generarPDF_Excel_GET = null;

  /*** Filtros ***/
  if(isset($_GET['filtro'])){

    if($_GET['filtro']==='1'){ /* Si se quiere ver la tabla ordenada por el nombre */
      $resultado = leerUsuarios(1);
      $estadoFiltro = 'Ordenado por nombre';
      $generarPDF_Excel_GET = 1;

    } else if($_GET['filtro']==='2'){ /* Si se quiere ver la tabla ordenada por la fecha de nacimiento */
      $resultado = leerUsuarios(2);
      $estadoFiltro = 'Ordenado por fecha de nacimiento';
      $generarPDF_Excel_GET = 2;
    }

  /** Si no se ha enviado nada por GET, indicando la primera carga de la pagina o restauracion de la tabla */
  } else {
    $resultado = leerUsuarios(0);
    $generarPDF_Excel_GET = 0;
  }
  ?>

<div class="container mt-3">
  <div class="d-flex flex-row">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-primary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Filtro
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li class="m-3"><a href="visualizar.php?filtro=1" class="dropdown-item">Ordenar por nombre</a></li>
          <li class="m-3"><a href="visualizar.php?filtro=2" class="dropdown-item">Ordenar por nacimiento</a></li>
          <li class="m-3"><a href="visualizar.php" class="dropdown-item">Restaurar</a></li>
        </ul>
      </li>
    </ul>
    <a class="btn btn-dark" href="../controller/generarPDF.php?gen=<?php echo $generarPDF_Excel_GET; ?>" target="_blank">Generar PDF</a>
    <a class="btn btn-success ms-2" href="../controller/generaRExcel.php?gen=<?php echo $generarPDF_Excel_GET; ?>">Generar Excel</a>
  </div>

<div class="table-responsive">
<h4 class="text-center m-2">Lista del personal</h4>
<hr class="bg-danger border-2 border-top border-primary">
<span class="text-success"><b><?php echo $estadoFiltro; ?></b></span>
<table class="table table-hover table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre/s</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nacimiento</th>
      <th scope="col">Ciudad/Estado</th>
      <th scope="col">Usuario</th>
      <th scope="col">Correo electrónico</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

  <?php
  for($i = 0; $i < count($resultado); $i++) {
    echo '<tr>';
    echo '<th>'.$resultado[$i][0].'</th>';
    for($j = 1; $j < count($resultado[$i]); $j++) {
        echo '<td>'.$resultado[$i][$j].'</td>';
    } 
    echo '<td><a class="btn btn-success btn-sm" href="editar.php?i='.$resultado[$i][0].'">E</a>';
    echo '<a class="btn btn-dark btn-sm ms-1" href="../controller/Eliminar.php?i='.$resultado[$i][0].'">X</a></td>';
    echo '</tr>';
  }
  ?>

  </tbody>
</table>
  </div>
</div>

  <?php include 'pie_pagina.php'?>

 