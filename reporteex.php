<?php


require 'conexion.php';
require 'vendor/autoload.php';
//Solicitando el objeto a la Biblioteca
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;


$encabezados = [
  'borders' => array(
    'vertical' => array(
      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
      'color' => array('argb' => 'FFFFFF'),
    ),
  ),

  'font' => [
    'color' => [
      'rgb' => 'FFFFFF'
    ],
    'bold' => true,
    'size' => 11
  ],
  'fill' => [
    'fillType' => Fill::FILL_SOLID,
    'startColor' => [
      'rgb' => '538ED5'
    ]
  ]
  
];


$bordesH = [
  'borders' => array(
    'vertical' => array(
      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      'color' => array('argb' => '000000'),
    ),
  ),
];

$bordesV = [
  'borders' => array(
    'outline' => array(
      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
      'color' => array('argb' => '000000'),
    ),
  ),
];


//Efectuando la consulta SWL
$consulta7 = "SELECT * FROM diferencias";
$resultado7 = $mysqli->query($consulta7);

//Creando hoja de Excel
$excel = new Spreadsheet();
//Asignando la hoja activa
$hojaActiva = $excel->getActiveSheet();
//Titulo de la hoja
$hojaActiva->setTitle("Empleados");

//Asignando color a las celdas en un rango
$excel->getActiveSheet()->getStyle('A1:F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
  ->getStartColor()->setARGB('3678C7');

//$excel->getActiveSheet()->getStyle('B:L')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_00);


//Alineacion
//$excel->getActiveSheet() ->getStyle('A:L')->setQuotePrefix(true);
$excel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setWrapText(true)->setVertical(true);

$excel->getActiveSheet()->getStyle('A2:F2')
  ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);

$excel->getActiveSheet()->getStyle('A1:F1')->ApplyFromArray($encabezados);
//$excel->getActiveSheet()->getStyle('A4:L4')->ApplyFromArray($bordes);

$hojaActiva->getColumnDimension('A')->setWidth(25); //Anchura de la celda
$hojaActiva->setCellValue('A1', 'Consecutivo'); //Titulo de la columna
$hojaActiva->getColumnDimension('B')->setWidth(25);
$hojaActiva->setCellValue('B1', 'Service tag');
$hojaActiva->getColumnDimension('C')->setWidth(50);
$hojaActiva->setCellValue('C1', 'Usuario');
$hojaActiva->getColumnDimension('D')->setWidth(50);
$hojaActiva->setCellValue('D1', 'Diferencia 1');
$hojaActiva->getColumnDimension('E')->setWidth(50);
$hojaActiva->setCellValue('E1', 'Diferencia 2');
$hojaActiva->getColumnDimension('F')->setWidth(50);
$hojaActiva->setCellValue('F1', 'Falla');


//Indicar que se comience desde la fila 2 de Excel y no reescribir los encanezados
$fila = 2;
$borde = 1;

//Ciclo para leer el contenido de la consulta
while ($rows = $resultado7->fetch_assoc()) {
  //Extrayendo campos de la BD y especificando la columna donde se mostrara el contenido
  $hojaActiva->setCellValue('A' . $fila, $rows['consecutivo']);
  $hojaActiva->setCellValue('B' . $fila, $rows['servicetag']);
  $hojaActiva->setCellValue('C' . $fila, $rows['usuario']);
  $hojaActiva->setCellValue('D' . $fila, $rows['dif1']);
  $hojaActiva->setCellValue('E' . $fila, $rows['dif2']);
  $hojaActiva->setCellValue('F' . $fila, $rows['falla']);
 
  //Incrementando las filas en 1 para que se inserten apropiadamente
  $fila++;
  //Incrementando las filas en 1 para que el borde se pinte segun el numero de columnas
  $borde++;
  //Indicando las celdas en las que se generara el borde vertical
  $excel->getActiveSheet()->getStyle("A$borde:F$borde")->ApplyFromArray($bordesH);
  $excel->getActiveSheet()->getStyle("A$borde:F$borde")->ApplyFromArray($bordesV);
}

//Creando el archivo de excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Diferencias_ALTUM.Xlsx"');
header('Cache-Control: max-age=0');

//Indicando la salida del documento en xlsx 
$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

