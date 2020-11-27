<?php

$servidor = "localhost";
$bd= "turnos_laboratorio";
$usu = "root";
$contraseña = "kiara2012";
// Creamos la conexión
$conn = mysqli_connect($servidor, $usu, $contraseña, $bd);
$conn->set_charset("utf8");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}