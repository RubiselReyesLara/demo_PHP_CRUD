<?php
include '../fpdf/fpdf.php';
include '../controller/LecturaUsuario.php';

class PDF extends FPDF
{
    function cabeceraHorizontal()
    {
        $this->SetXY(10, 20);
        $this->SetFont('Arial','B',9);
        $this->SetFillColor(35,30,55);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
    
        $this->Cell(8,5, 'ID',1, 0 , 'L', true);
        $this->Cell(20,5, 'Nombres',1, 0 , 'L', true);
        $this->Cell(30,5, 'Apellidos',1, 0 , 'L', true);
        $this->Cell(20,5, 'Nacimiento',1, 0 , 'L', true);
        $this->Cell(35,5, 'Ciudad/Estado',1, 0 , 'L', true);
        $this->Cell(22,5, 'Usuario',1, 0 , 'L', true);
        $this->Cell(55,5, 'Correo',1, 0 , 'L', true);
    }
 
    function datosHorizontal($datos)
    {
        $this->SetXY(10,25);
        $this->SetFont('Arial','',7);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            $this->Cell(8,4, utf8_decode($fila[0]),1, 0 , 'L', $bandera );
            $this->Cell(20,4, utf8_decode($fila[1]),1, 0 , 'L', $bandera );
            $this->Cell(30,4, utf8_decode($fila[2]),1, 0 , 'L', $bandera );
            $this->Cell(20,4, utf8_decode($fila[3]),1, 0 , 'L', $bandera );
            $this->Cell(35,4, utf8_decode($fila[4]),1, 0 , 'L', $bandera );
            $this->Cell(22,4, utf8_decode($fila[5]),1, 0 , 'L', $bandera );
            $this->Cell(55,4, utf8_decode($fila[6]),1, 0 , 'L', $bandera );

            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }
    }
 
    function tabla($datosHorizontal)
    {
        $this->cabeceraHorizontal();
        $this->datosHorizontal($datosHorizontal);
    }
}

if(isset($_GET['gen'])) {
    date_default_timezone_set('America/Mexico_City');
    $usuario = new Usuario();

    if($_GET['gen'] === '1'){
        $respuesta = leerUsuarios(1);
    } else if($_GET['gen'] === '2'){
        $respuesta = leerUsuarios(2);
    } else {
        $respuesta = leerUsuarios(0);
    }

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(40,10,'REPORTE DE PERSONAL a '.date('Y-m-d H:i:s'));

    $pdf->tabla($respuesta);
    $pdf->Output('Personal_'.date('Y-m-d H:i:s').'.pdf', 'I'); //Salida al navegador
    
} else {
    header('Location: http://localhost/demo/view/visualizar.php');
}

?>