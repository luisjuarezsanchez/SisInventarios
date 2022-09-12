<?php

$mysqli = new mysqli("localhost", "root", "", "cmbd");
if ($mysqli->connect_errno) {
	echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}

require('fpdf/fpdf.php');
class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		global $nom;
		// Logos
		$this->Image('img/reportes/armas_horizontal.png', 4, 1, 70); //esp.izquierda-abajo-tamaño
		$this->Image('img/reportes/edomex_horizontal.png', 230, 6, 60);
		// Estilos de letra
		$this->SetFont('Arial', 'B', 15);
		// Movernos a la derecha
		$this->Cell(80);
		// Título
		$this->Cell(100, 15, utf8_decode('Departamento de Tecnologías de la Información'), 10, 10, 'C'); //derecha abajo Salto de línea
		//Saltos de linea
		$this->Ln(0);
		//$this->Cell(258, 10, utf8_decode('Quincena '.$nom), 10, 10, 'C');
		//Saltos de linea
		$this->Ln(0);
		$this->Cell(255, 12, utf8_decode('Reporte de diferencias ALTUM'), 10, 10, 'C');
		
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 6);
		// Número de página
		$this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}

//Solicitando la conexion con la BD
require 'conexion.php';
//Efectuando la consulta de las vista
$consulta = "SELECT * FROM diferencias ORDER BY falla";
//Almaceando el resultado de la consulta en una variable
$resultado = $mysqli->query($consulta);

// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','A4');//Indicando formato horizontal del reporte
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica', '', 12);

//Encabezados de la tabla
$pdf->SetFont('Helvetica', 'B', 10);//Colocando letras en negritas
$pdf->Cell(25, 10, 'Consecutivo', 1, 0, 'C', 0);
//$pdf->Cell(28, 10, 'Service Tag', 1, 0, 'C', 0);
$pdf->Cell(25, 10, 'Service Tag', 1, 0, 'C', 0);
$pdf->Cell(75, 10, 'Usuario', 1, 0, 'C', 0);
$pdf->Cell(90, 10, 'Puesto', 1, 0, 'C', 0);
//$pdf->Cell(70, 10, 'Diferencia 2', 1, 0, 'C', 0);
$pdf->Cell(60, 10, 'Falla', 1, 1, 'C', 0);
$pdf->SetFont('Helvetica', '', 12);//Devolviendo valores de letra

//Ciclo para recorrer la tabla e insertar registros en la tabla
$a=0;

while ($row = $resultado->fetch_assoc()) {
	$pdf->SetFont('Helvetica', '', 7);//Devolviendo valores de letra
	//Ancho alto,borde,salto de linea justificacion relleno
	$pdf->Cell(25,10, utf8_decode($row['consecutivo']), 1, 0, 'C', 0);
	$pdf->Cell(25,10, utf8_decode($row['servicetag']), 1, 0, 'C', 0);
	//$pdf->multiCell(28,10,utf8_decode($row['servicetag']),1,'B',false);

	
	//$pdf->MultiCell(28,10,utf8_decode($row['servicetag']),0,'C',false,0);
	$pdf->Cell(75,10, utf8_decode($row['usuario']), 1, 0, 'C', 0);
	$pdf->Cell(90,10, utf8_decode($row['puesto']), 1, 0, 'C', 0);
	//$pdf->multiCell(50,10,utf8_decode($row['usuario']), 1, 0);

	//$pdf->Cell(70,10, utf8_decode($row['dif1']), 1, 0, 'C', 0);
	//$pdf->multiCell(65,10,utf8_decode($row['dif1']), 1, 0);
	//$pdf->Cell(70,10, utf8_decode($row['dif2']), 1, 0, 'C', 0);
	//$pdf->multiCell(65,10,utf8_decode($row['dif2']), 1, 0);
	//$pdf->multiCell(65,10,utf8_decode($row['falla']), 1, 1);
	$pdf->Cell(60,10, utf8_decode($row['falla']), 1, 1, 'C', 0);
	//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
	$a=$a+1;
}

$pdf->Cell(43,10, utf8_decode(""), 0, 1, 'C', 0);
$pdf->Cell(25, 10, 'EXISTEN '.$a.' DIFERENCIAS', 0, 0, 0);
//Indicar salida del archivo pdf
$pdf->Output();
?>

