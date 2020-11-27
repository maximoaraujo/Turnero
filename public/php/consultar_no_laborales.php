<?php
include('conexion.php');

$fecha = $_POST['fecha'];

$sql_cons_fechas = mysqli_query($conn, "SELECT COUNT(*) AS cant FROM no_laborales WHERE fecha = '".$fecha."'");

while ($registro = mysqli_fetch_assoc($sql_cons_fechas)){
    echo $registro['cant'];
}