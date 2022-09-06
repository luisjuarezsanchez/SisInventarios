<?php
//Definiendo los achivos necesarios para la lectura de excel y la conexion a la BD
require 'vendor/autoload.php';
require 'conexion.php';

//Solicitar el archivo desde el lado del cliente
$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

//Efectuando la lectura del archivo de Excel
if (!file_exists('archivos')) {
    mkdir('archivos', 0777, true);
    if (file_exists('archivos')) {
        if (move_uploaded_file($guardado, 'archivos/' . $nombre)) {
            echo "";
        } else {
            echo "Ocurrio un error con la carga del archivo";
        }
    }
} else {
    if (move_uploaded_file($guardado, 'archivos/' . $nombre)) {
    } else {
        echo "Ocurrio un error con la carga del archivo";
    }
}

//Importando la libreria de PHPSpreadSheet
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

//Definiendo el archivo que sera abierto
$archivo = 'archivos/' . $nombre;
$documento = IOFactory::load($archivo);
//Identificando el total de hojas
$totalHojas = $documento->getSheetCount();

for ($indiceHoja = 0; $indiceHoja < $totalHojas; $indiceHoja++) {
    $hojaActual = $documento->getSheet($indiceHoja);
}

//Calcular el numero de filas del archivo
$numeroFilas = $hojaActual->getHighestDataRow();
//Obtener la letra maxima donde esta la informacion (Columnas)
$letra = $hojaActual->getHighestColumn();

$numeroLetra = Coordinate::columnIndexFromString($letra);

//Recorrer todas las filas de la hoja
for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {

    $valor1 = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
    $valor2 = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
    $valor3 = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
    $valor4 = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
    $valor5 = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
    $valor6 = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
    $valor7 = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
    $valor8 = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
    $valor9 = $hojaActual->getCellByColumnAndRow(9, $indiceFila);
    $valor10 = $hojaActual->getCellByColumnAndRow(10, $indiceFila);
    $valor11 = $hojaActual->getCellByColumnAndRow(11, $indiceFila);
    $valor12 = $hojaActual->getCellByColumnAndRow(12, $indiceFila);
    $valor13 = $hojaActual->getCellByColumnAndRow(13, $indiceFila);
    $valor14 = $hojaActual->getCellByColumnAndRow(14, $indiceFila);
    $valor15 = $hojaActual->getCellByColumnAndRow(15, $indiceFila);
    $valor16 = $hojaActual->getCellByColumnAndRow(16, $indiceFila);
    $valor17 = $hojaActual->getCellByColumnAndRow(17, $indiceFila);
    $valor18 = $hojaActual->getCellByColumnAndRow(18, $indiceFila);
    $valor19 = $hojaActual->getCellByColumnAndRow(19, $indiceFila);
    $valor20 = $hojaActual->getCellByColumnAndRow(20, $indiceFila);
    $valor21 = $hojaActual->getCellByColumnAndRow(21, $indiceFila);
    $valor22 = $hojaActual->getCellByColumnAndRow(22, $indiceFila);
    $valor23 = $hojaActual->getCellByColumnAndRow(23, $indiceFila);
    $valor24 = $hojaActual->getCellByColumnAndRow(24, $indiceFila);
    $valor25 = $hojaActual->getCellByColumnAndRow(25, $indiceFila);
    $valor26 = $hojaActual->getCellByColumnAndRow(26, $indiceFila);
    $valor27 = $hojaActual->getCellByColumnAndRow(27, $indiceFila);
    $valor28 = $hojaActual->getCellByColumnAndRow(28, $indiceFila);
    $valor29 = $hojaActual->getCellByColumnAndRow(29, $indiceFila);
    $valor30 = $hojaActual->getCellByColumnAndRow(30, $indiceFila);
    $valor31 = $hojaActual->getCellByColumnAndRow(31, $indiceFila);
    $valor32 = $hojaActual->getCellByColumnAndRow(32, $indiceFila);
    $valor33 = $hojaActual->getCellByColumnAndRow(33, $indiceFila);
    $valor34 = $hojaActual->getCellByColumnAndRow(34, $indiceFila);
    $valor35 = $hojaActual->getCellByColumnAndRow(35, $indiceFila);
    $valor36 = $hojaActual->getCellByColumnAndRow(36, $indiceFila);
    $valor37 = $hojaActual->getCellByColumnAndRow(37, $indiceFila);
    $valor38 = $hojaActual->getCellByColumnAndRow(38, $indiceFila);
    $valor39 = $hojaActual->getCellByColumnAndRow(39, $indiceFila);
    $valor40 = $hojaActual->getCellByColumnAndRow(40, $indiceFila);
    $valor41 = $hojaActual->getCellByColumnAndRow(41, $indiceFila);
    $valor42 = $hojaActual->getCellByColumnAndRow(42, $indiceFila);
    $valor43 = $hojaActual->getCellByColumnAndRow(43, $indiceFila);
    $valor44 = $hojaActual->getCellByColumnAndRow(44, $indiceFila);
    $valor45 = $hojaActual->getCellByColumnAndRow(45, $indiceFila);
    $valor46 = $hojaActual->getCellByColumnAndRow(46, $indiceFila);
    $valor47 = $hojaActual->getCellByColumnAndRow(47, $indiceFila);
    $valor48 = $hojaActual->getCellByColumnAndRow(48, $indiceFila);
    $valor49 = $hojaActual->getCellByColumnAndRow(49, $indiceFila);
    $valor50 = $hojaActual->getCellByColumnAndRow(50, $indiceFila);
    $valor51 = $hojaActual->getCellByColumnAndRow(51, $indiceFila);
    $valor52 = $hojaActual->getCellByColumnAndRow(52, $indiceFila);
    $valor53 = $hojaActual->getCellByColumnAndRow(53, $indiceFila);
    
    $sql = "INSERT INTO inventario2 (consecutivo,servicetag,perfil,usuario,puesto,correo,dependencia,municipio,direccion,edificio,piso,lada,telefono,extension,marca,modelo,equipo,discoduro,procesador,velocidadprocesador,nocores,memoriaram,marmonitor,modmonitor,monitor,marteclado,modteclado,teclado,marmouse,modmouse,mouse,marmaletin,modmaletin,sermaletin,marcandado,modcandado,sercandado,marcargador,modcargador,sercargador,martargra,modtargra,sertargra,martarwifi,modtarwifi,sertarwifi,marcaups,modups,serieups,domino,macaddresset,macaddresswifi,periodo) 
    VALUES ('$valor1','$valor2','$valor3','$valor4','$valor5','$valor6','$valor7','$valor8','$valor9','$valor10','$valor11','$valor12','$valor13','$valor14','$valor15','$valor16','$valor17','$valor18','$valor19','$valor20','$valor21','$valor22','$valor23','$valor24','$valor25','$valor26','$valor27','$valor28','$valor29','$valor30','$valor31','$valor32','$valor33','$valor34','$valor35','$valor36','$valor37','$valor38','$valor39','$valor40','$valor41','$valor42','$valor43','$valor44','$valor45','$valor46','$valor47','$valor48','$valor49','$valor50','$valor51','$valor52','$valor53')";
    $mysqli->query($sql);

    /*$sql="INSERT INTO inventario (consecutivo) values ('$valor1')";
    $mysqli->query($sql);*/
}

echo 'Carga completa';
