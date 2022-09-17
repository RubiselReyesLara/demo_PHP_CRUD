<?php
include '../model/Usuario.php';

if(isset($_GET)){
    $usuarioEliminado = new Usuario();
    $usuarioEliminado->eliminarUsuario((int) $_GET['i']);
}
?>