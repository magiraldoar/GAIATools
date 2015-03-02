<?php
include("base/inicioSql.php");
require_once("configuracion/clsBD.php");
$objDatos = new clsDatos();

$sql = "SELECT count(*)
            FROM usuario
            WHERE usuario = '$_POST[name]'";
    $datos = $objDatos->hacerConsulta($sql);
    $arreglo_datos = $objDatos->generarArreglo($datos);
    $usuario = $arreglo_datos[0];
 if ($usuario['count'] > 0) {
 	echo 1;
 }else{
 	echo 0;
 }
?>
