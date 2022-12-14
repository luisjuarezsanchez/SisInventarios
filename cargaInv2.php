<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--Icono de la pagina web-->
    <link rel="icon" href="img/iconos/escudo_armas.png">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/estilos_reportes.css">
    <link rel="stylesheet" type="text/css" href="css/fuente.css">
    <!--Titulo de la página-->
    <title>Carga de inventario 2</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script language="JavaScript" type="text/javascript" src="js/script.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</head>


<body>
    <header class="header">
        <div class="logo">
            <img src="img/header/escudo_armas.png">
            <img src="img/header/logo_vertical.png">
        </div>
        <nav>
            <ul class="nav-links">
                <li id="producto1"><a href="#">Inventario Altum</a></li>
                <li id="producto2"><a href="#">Secretaria de Cultura y Turismo</a></li>
                <li><a href="#"></a></li>
            </ul>
        </nav>
        <a href="https://cultura.edomex.gob.mx/" target="_blank" class="btn"><button>Contacto</button></a>
    </header>
    <br>
    <form class="form-login" action="lecturaExcel2.PHP" method="post" enctype="multipart/form-data">
        <div style="text-align:center;">
            <br>
            <img id="archivo" src="img/iconos/inv2.png" height="200" width="200">
            <br>
            <br>
            <input type="file" name="archivo" accept=".xlsx" required=""><br><br>
            <button class="buttons">Cargar archivo de Excel</button>
            <br>
        </div>
    </form>
    <div class="loader" id="load"></div>
    <br>
</body>
<footer class="footer">

    <div class="img_footers">
        <img src="img/footer/escudo_armas.png" alt="">
    </div>
    <br>

</footer>

</html>