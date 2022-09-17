<?php include 'encabezado.php'?>

<!-- Ingresar informacion -->
<form method="POST" action="../controller/Ingresar.php" class="row align-items-center justify-content-center m-5">
  
  <div class="col-sm-8" style="background-color:#F0F0F0; border-radius:25px; padding:30px; ">
    <h4 class="text-center">Nuevo registro de personal</h4>
    <hr class="bg-danger border-2 border-top border-primary">
    
    <div class="container">

      <div class="row">

        <div class="col-sm p-2">
          <label for="inputNombres" class="form-label">Nombre/s</label>
          <input type="text" class="form-control" id="nombres" name="nombres">
        </div>

        <div class="col-sm p-2">
          <label for="inputApellidos" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos">
        </div>

      </div>

      <div class="row">

        <div class="col-sm p-2">
          <label for="inputNac" class="form-label">Nacimiento</label>
          <input type="date" class="form-control" id="nacimiento" name="nacimiento">
        </div>

        <div class="col-sm p-2">
          <label for="inputCiudadEstado" class="form-label">Ciudad y estado</label>
          <input type="text" class="form-control" id="ciudadEstado" name="ciudad_estado">
        </div>

      </div>

      <div class="row">

        <div class="col-sm p-2">
          <label for="inputUsuario" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="usuario" name="usuario">
        </div>

        <div class="col-sm p-2">
          <label for="inputCorreo" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="Correo" name="correo">
        </div>

        <div class="col-sm p-2">
          <label for="inputContrasena" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena">
        </div>

      </div>

      <button type="submit" class="btn btn-primary">Agregar usuario</button>
      <span class="text-success"><b><?php if(!empty($_GET['msg'])) { echo $_GET['msg']; }?></b></span>

    </div>
  </div>
</form>

<?php include 'pie_pagina.php'?>