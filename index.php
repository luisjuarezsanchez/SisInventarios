<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" &amp;gt";>
    <meta charset="utf-8">
    <!--Icono de la pagina web-->
    <link rel="icon" href="img/iconos/escudo_armas.png">
    <!--Titulo de la página-->
    <title>Menú principal</title>

    <link rel="icon" href="img/menu/icono.png">
    <link rel="stylesheet" type="text/css" href="css/estilos_menu.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
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

    <table class="imagenes">
        <tr>
    </table>
    </tr>
    <table class="imagenes">
        <td>
        <td>
            <div class="card">
                <div class="card text-bg-light mb-3">
                    <div class="card-body">
                        <a href="cargaInv.php"><img src="img/iconos/bd.png" width="260" height="190"></a>
                        <h5 class="card-title">Cargar inventarios</h5>
                        <p class="card-text">Cargar archivos .xslx a la Base de Datos</p>
                        <br>
                        <a href="cargaInv.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </td>
        </td>
        <br>
        <br>
        <td>
        <td>

            <div class="card">
                <div class="card text-bg-light mb-3">
                    <div class="card-body">
                        <a href="reporteDiff.php"><img src="img/iconos/reporte.png" width="260" height="190"></a>
                        <h5 class="card-title">Imprimir reporte de diferencias</h5>
                        <p class="card-text">Generar el PDF con las diferencias
                            <br> encontradas en los inventarios
                        </p>
                        <a href="reporteDiff.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </td>
        <td>

<div class="card">
    <div class="card text-bg-light mb-3">
        <div class="card-body">
            <a href="pdf.php"><img src="img/iconos/historico.png" width="210" height="190"></a>
            <h5 class="card-title">Imprimir reporte de diferencias a detalle</h5>
            <p class="card-text">Visualizar las diferencias especificando
                <br> el campo que contiene valores distintos
            </p>
            <a href="pdf.php" class="btn btn-primary">Ir</a>
        </div>
    </div>
</div>
</td>
        </td>
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