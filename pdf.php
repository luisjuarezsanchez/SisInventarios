<?php ob_start(); //Creando el objeto de inicio de documento
//Efectuando conexión a la BD
$conexion = mysqli_connect('localhost', 'root', '', 'cmbd'); ?>
<div>
    <!--Definiendo encabezados de la hoja-->
    <img src="img/reportes/armas_horizontal.png" width="240" height="130" align="left">
    <br>
    <img src="img/reportes/edomex_horizontal.png" width="220" height="105" align="right">
    <h1>Reporte de diferencias ALTUM</h1>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!--Definiendo la estructura de la tabla-->
<table>
    <thead>
        <tr>
            <th>Consecutivo</th>
            <th>Service Tag</th>
            <th>Usuario</th>
            <th>Diferencia 1</th>
            <th>Diferencia 2</th>
            <th>Falla</th>
        </tr>
    </thead>
    <?php
    //Efectuando la consulta a la BD
    error_reporting(0);
    $sql = "SELECT * FROM diferencias";
    $result = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <!--Imprimiendo valores de la vista-->
            <td><?php echo $mostrar['consecutivo'] ?></td>
            <td><?php echo $mostrar['servicetag'] ?></td>
            <td><?php echo $mostrar['usuario'] ?></td>
            <td><?php echo $mostrar['dif1'] ?></td>
            <td><?php echo $mostrar['dif2'] ?></td>
            <td><?php echo $mostrar['falla'] ?></td>
        </tr>
    <?php
    }
    ?>
</table>
<footer>
    Secretaria de Cultura y Turismo
</footer>

<!--Definiendo los estilos que tendra la tabla-->
<style>
    @page {}

    header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        background-color: #c0c2c5;
        color: white;
        text-align: center;
        line-height: 35px;
    }

    footer {
        position: fixed;
        bottom: -15;
        left: 0px;
        right: 0px;
        height: 40;

        /** Extra personal styles **/
        background-color: #624983;
        color: white;
        text-align: center;
        line-height: 35px;
    }

    table {
        margin: 0 auto;
        width: 40%;
        text-align: center;

        background-color: white;
        text-align: left;
        border-collapse: collapse;
        width: 40%;
        border: 1px solid black;
    }

    th,
    td {
        padding: 3px;
        text-align: center;
        border: 1px solid black;
    }

    thead {
        background-color: #008B84;
        /*Color de fondo del encabezado*/
        border-bottom: solid 5px #494e54;
        /*Color del borde debajo del encabezadp*/
        color: white;
        /*Colores de letra*/
        text-align: center;
        border: 1px solid black;
    }

    tr:nth-child(even) {
        background-color: #494e54;
        /*Color de colorear los pares de la tabla*/
        border: 1px solid black;
    }

    tr:hover td {
        background-color: #A4A5A5;
    }

    h1 {
        text-align: center;
    }
</style>

<?php
//Invicando a la libreria DOMPDF
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

//Creando un objeto dentro de DOMPDF
$dompdf = new DOMPDF();
//Estableciendo las orientacion de la hoja
$dompdf->set_paper("A4", "landscape");
//Cragando el HTML
$dompdf->load_html(ob_get_clean());
$dompdf->render();
//Indicando el guardado del PDF
$pdf = $dompdf->output();
$filename = "ReporteDiferencias.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>