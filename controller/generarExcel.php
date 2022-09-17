<?php
include 'LecturaUsuario.php';

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=REPORTE DE PERSONAL_" .        date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

if(isset($_GET)){
    $tabla = leerUsuarios((int)$_GET['gen']);
}

$salida ='
<table>
<thead>
<tr>
<th>Nombre/s</th>
<th>Apellidos</th>
<th>Nacimiento</th>
<th>Ciudad/Estado</th>
<th>Usuario</th>
<th>Correo electronico</th>
<th>Contrasena</th>
<th>Opciones</th>
</thead>
<tbody>'
;

for($i = 0; $i < count($tabla); $i++) {
    $salida .='<tr>';
    $salida .='<th>'.$tabla[$i][0].'</th>';
    for($j = 1; $j < count($tabla[$i]); $j++) {
        $salida .='<td>'.$tabla[$i][$j].'</td>';
    } 
    $salida .='</tr>';
  }

$salida .= '
</tbody>
</table>';

echo $salida;

//header('Location: http://localhost/demo/view/visualizar.php');
?>