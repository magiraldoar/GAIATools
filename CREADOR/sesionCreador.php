<!DOCTYPE html>
<html>
<?php
if (isset($POST["nombre"])&&(isset($POST["password"]))) {
	$con=mysql_connect("127.0.0.1","root","");
	$base=mysql_select_db("sesion",$con);
	$consulta=mysql_query("select * from creador where nombre='" .$POST["nombre"]."'and pass='".$POST["password"]."'" );
}
?>
</html>