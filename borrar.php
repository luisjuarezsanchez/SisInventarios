<?php
//Conexion a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'cmbd');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" &amp;gt";>
    <meta charset="utf-8">
    <!--Icono de la pagina web-->
    <link rel="icon" href="img/iconos/escudo_armas.png">
    <!--Titulo de la página-->
    <title>Histórico de diferencias</title>

    <link rel="icon" href="img/menu/icono.png">
    <link rel="stylesheet" type="text/css" href="css/estilos_menu.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/estilos_reportes.css">
    <link rel="stylesheet" type="text/css" href="css/fuente.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.php"><img class="logos" src="img/header/escudo_armas.png"></a>
            <a href="index.php"><img class="logos" src="img/header/logo_vertical.png"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li id="producto1"><a href="#">Inventario ALTUM</a></li>
                <li id="producto2"><a href="#">Secretaría de Cultura y Turismo</a></li>
                <li><a href="#"></a></li>
            </ul>
        </nav>
        <a href="https://cultura.edomex.gob.mx/" target="_blank" class="btn"><button>Contacto</button></a>
    </header>
    <br>
    <form class="form-login" action="pdf.php" method="post" enctype="multipart/form-data">
        <div style="text-align:center;">
            <img id="archivo" src="img/iconos/tabla_his.png" height="200" width="200">
            <h3><br></h3>
            <button class="buttons">Generar el reporte en PDF</button>
            <br>
        </div>
    </form>
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


    </div>
</body>
<br>
<br>
<footer class="footer">
    <div class="img_footers">
        <img src="img/footer/escudo_armas.png" alt="">

    </div>
    <br>
</footer>

</html>