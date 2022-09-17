<?php
include '../model/Usuario.php';

if (trim($_POST['nombres']) !== '' && trim($_POST['apellidos']) !== '' &&
    trim($_POST['nacimiento']) !== '' && trim($_POST['ciudad_estado']) !== '' && 
    trim($_POST['usuario']) !== '' && trim($_POST['correo']) !== '') {

    $actualizarUsuario = new Usuario();
    $actualizarUsuario->actualizarUsuario(
        $_GET['id'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['nacimiento'],
        $_POST['ciudad_estado'],
        $_POST['usuario'],
        $_POST['correo']
    );
    
} else {
    header("Location: http://localhost/demo/view/registro.php?msg=".'Error: Intento enviar algun dato vacio');
}


?>