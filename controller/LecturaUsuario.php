<?php
include '../model/Usuario.php';

function leerUsuarios($filtro) {
    $infousuarios;
    $usuario = new Usuario();

    if($filtro === 0) {
        // Leer todos los usuarios
        $infoUsuarios = $usuario->lecturaUsuarios('exec obtenerUsuarios');
    } else if($filtro === 1) {
        // Leer todos los usuarios ordenados por el nombre (A - Z)
        $infoUsuarios = $usuario->lecturaUsuarios('exec obtenerUsuarios_ordenadosNombre');
    } else if($filtro === 2) {
        // Leer todos los usuarios ordenados por nacimiento
        $infoUsuarios = $usuario->lecturaUsuarios('exec obtenerUsuarios_ordenadosNacimiento');
    }

    // Recortar contraseña a 10 letras
   $infoUsuarios = recorteContrasena($infoUsuarios);

    return $infoUsuarios;
}

function leerUsuario_porID($id) {
    $usuario = new Usuario();

    $infoUsuario = $usuario->lecturaUsuarios('exec obtenerUsuario_porID '.$id);
    // Recortar contraseña a 10 letras
    $infoUsuario = recorteContrasena($infoUsuario);

    return $infoUsuario;
}

function recorteContrasena($infoUsuarios){
    for($i = 0; $i < count($infoUsuarios); $i++) {
        $infoUsuarios[$i][7] = substr($infoUsuarios[$i][7], 0, 10).'...';
    }
    return $infoUsuarios;
}

?>