<?php
//Definiendo la conexion a la base de datos
$mysqli= new mysqli('localhost','root','','cmbd');

if ($mysqli->connect_error){
    echo 'Fallo la conexion'.$mysqli->connect_error;
    die();
}
