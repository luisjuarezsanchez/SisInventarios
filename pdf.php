<?php ob_start();
$conexion = mysqli_connect('localhost', 'root', '', 'cmbd'); ?>
<div>
    <img src="img/reportes/armas_horizontal.png" width="210" height="130" align="left">
    <img src="img/reportes/edomex_horizontal.png" width="190" height="120" align="right">
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
    error_reporting(0);
    $fechahora = $_POST['fechahora'];
    $sql = "SELECT * FROM diferencias";
    $result = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_array($result)) {
    ?>
        <tr>
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


<style>
    @page {
      
    }

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
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new DOMPDF();

# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$dompdf->set_paper("A4", "landscape");

$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "ReporteDiferencias.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>