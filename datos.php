<?php ob_start();
$conexion = mysqli_connect('localhost', 'root', '', 'cmbd'); ?>
<table>
<img src="img/reportes/armas_horizontal.png" width="210" height="150" align="left">
    <img src="img/reportes/edomex_horizontal.png" width="190" height="90" align="right">
    <style>
        table {
            margin:  auto;
            width: 40%;
            text-align: center;

            background-color: white;
            text-align: left;
           
            width: 40%;
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
        }

        tr:nth-child(even) {
            background-color: #ddd;
            /*Color de colorear los pares de la tabla*/
        }

        tr:hover td {
            background-color: #a4a5a5;
        }
    </style>
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