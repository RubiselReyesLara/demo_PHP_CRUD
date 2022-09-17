<?php 
include 'encabezado.php';
include '../controller/LecturaUsuario.php';

if(isset($_GET)) {
  $resultado = leerUsuario_porID((int)$_GET['i']);

  // Darle formato a la fecha de YY/MM/DD a YY-MM-DD
  $resultado[0][3] = str_replace('/','-', $resultado[0][3]);
}
?>

<form method="POST" action="../controller/Actualizar.php?id=<?php echo $_GET['i'];?>" class="row align-items-center justify-content-center m-5">
  <div class="col-sm-8" style="background-color:#F0F0F0; border-radius:25px; padding:30px; ">
  <h4 class="text-center">Editar Usuario</h4>
        <hr class="bg-danger border-2 border-top border-primary">
    <div class="container">
      <div class="row">
        <div class="col-sm p-2">
          <label for="inputNombres" class="form-label">Nombre/s</label>
          <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $resultado[0][1]; ?>">
        </div>
        <div class="col-sm p-2">
          <label for="inputApellidos" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $resultado[0][2]; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-sm p-2">
          <label for="inputNac" class="form-label">Nacimiento</label>
          <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $resultado[0][3]; ?>">
        </div>
        <div class="col-sm p-2">
          <label for="inputCiudadEstado" class="form-label">Ciudad y estado</label>
          <input type="text" class="form-control" id="ciudadEstado" name="ciudad_estado" value="<?php echo $resultado[0][4]; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-sm p-2">
          <label for="inputUsuario" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $resultado[0][5]; ?>">
        </div>
        <div class="col-sm p-2">
          <label for="inputCorreo" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="Correo" name="correo" value="<?php echo $resultado[0][6]; ?>">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar usuario</button>
      <span class="text-success"><b><?php if(!empty($_GET['msg'])) { echo $_GET['msg']; }?></b></span>

    </div>
  </div>
</form>

<?php include 'pie_pagina.php'?>