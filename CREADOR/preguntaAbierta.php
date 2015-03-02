
<?php
session_start();
include("base/inicioSql.php");
$mensaje = "";
$herramienta = "cuestionario";
require_once("configuracion/clsBD.php");
$objDatos = new clsDatos();
$nombre =$_SESSION['usuario'];
if ($_POST["guardarAbierta"]) {
	$idTipoPregunta = 1;
	$pregunta = array_key_exists('pregunta', $_POST) ? $_POST['pregunta'] : null;
	$respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
	if ("cuestionario" == $herramienta ) {
		crearPreguntaCuestionario($pregunta, $respuesta, $idTipoPregunta, $_SESSION['id_cuestionario']);
	}
}
if ($_POST["guardarCerrada"]) {
	$idTipoPregunta = 2;
	$pregunta = array_key_exists('pregunta', $_POST) ? $_POST['pregunta'] : null;
	$respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
	if ("cuestionario" == $herramienta ) {
		crearPreguntaCuestionario($pregunta, $respuesta, $idTipoPregunta, $_SESSION['id_cuestionario']);
	}


	$sql = "SELECT id_pregunta
	FROM pregunta p
	where p.pregunta='".$pregunta."'";
	$datos_desordenados = $objDatos->hacerConsulta($sql);
	$arreglo_datos = $objDatos->generarArreglo($datos_desordenados);
	$idPregunta = $arreglo_datos[0]['id_pregunta'];

	$sql = "SELECT id_cuestionario
	from cuestionario";
	$datos_desordenados2 = $objDatos->hacerConsulta($sql);
	$arreglo_datos2 = $objDatos->generarArreglo($datos_desordenados2);
	$idCuestionario = $arreglo_datos2[0]['id_cuestionario'];





	foreach ($_POST as $key => $value) {
		if ($key != "pregunta" && $key != "respuesta" && $key != "guardarCerrada" && $key != "") {
			$opcion=$value;
			crearOpcion($opcion, $idPregunta);
		}

	}
}
				#else{
				#	$mensaje = "no hay elementos";
				#}
if ($_POST["guardarVF"]) {
	$idTipoPregunta = 3;
	$pregunta = array_key_exists('pregunta', $_POST) ? $_POST['pregunta'] : null;
	$respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
	if ("cuestionario" == $herramienta ) {
		crearPreguntaCuestionario($pregunta, $respuesta, $idTipoPregunta, $_SESSION['id_cuestionario']);
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>GAIA Tools</title>

	<div class="logo"><a  href="indexC.php"><img src="12.png" width="600" heigth="600"></a></div>


	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/jquery.scrolly.min.js"></script>
	<script src="js/jquery.scrollgress.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<script type="text/javascript" src="js/arrive.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-wide.css" />
		<link rel="stylesheet" href="css/style-noscript.css" />
	</noscript>
</head>
<body class="index">

	<header id="header" class="alt">
		<nav id="nav">
			<ul>
				<li class="current"><a href="index.html">Quienes Somos</a></li>
				<li class="submenu">
					<a href="">HERRAMIENTAS</a>
					<ul>
						<li><a href="left-sidebar.html">PREGUNTADOS</a></li>
						<li><a href="right-sidebar.html">DICCIONARIO</a></li>
						<li><a href="no-sidebar.html">LECTOR Y EDITOR DE TEXTO</a></li>
						<li><a href="contact.html">CUESTIONARIO</a></li>
					</ul>
				</li>
				<li class="current"><a href="logout.php" onClick="return confirmClick();">CERRAR SESIÓN</a></li>
			</ul>
		</nav>
	</header>
	<section id="banner">

		<div id="content" class="inner">

			<b><h1>
				<?php
				echo $nombre;
				?></b>
			</h1>
			<div id="tipopreg">
				<div id="abierta" class="selecPreg">Abierta</div>
				<div id="cerrada" class="selecPreg">Cerrada</div>
			</div>				
			<div id="pregAbierta">
				<header>
					<h2>PREGUNTA ABIERTA</h2>
				</header>
				<form action="preguntaAbierta.php" method="post">
					<p class="pre">
						PREGUNTA:<br><br>   
						<textarea id="textar" class="textarea1" name="pregunta" rows=automatically cols=automatically placeholder="¡Escriba aca su pregunta!"></textarea><br><br>
						RRESPUESTA:<br><br>
						<textarea class="textarea1" name="respuesta" rows=automatically cols=automatically placeholder="RESPUESTA"></textarea><br><br>
						<input type="submit" name="guardarAbierta" value="guardar"> 
					</p>
				</form>
				<br><br>
				<a  href="preguntaAbierta.php"><img src="mas.png" width="70" heigth="70" align="right">  </a>
				<a  href="principalC.html"><img src="15.png" width="70" heigth="70" align="right"> "  " </a>
				<a  href="registroCuestionario.php"><img src="17.png" width="70" heigth="70" align="right"> </a>
			</div>

			<br><br>
			<div id="tipopreg">
				<div id="vf" class="selecPreg">Verdadero o Falso</div>
				<div id="cerradan" class="selecPreg">Cerrada</div>
			</div>
			<div id="pregCerrada">
				<header>

					<h2>PREGUNTA CERRADA</h2>
				</header>
				<form action="preguntaAbierta.php" method="post">
					<p class="preg">

						Pregunta:<br><br>  
						<textarea class="textarea1" name="pregunta" rows=automatically cols=automatically placeholder="¡Escriba aca su pregunta!"></textarea><br><br>

						<div class="ans">
							1° opcion:
							<input  type="text" name="1" id="prueba" onchange="myFunction(this.value)"><br><br>
							2° opcion:   
							<input type="text" name="2" onchange="myFunction(this.value)"><br><br>
							3° opcion:   
							<input type="text" name="3" onchange="myFunction(this.value)"><br><br>
							4° opcion:   
							<input type="text" name="4" onchange="myFunction(this.value)"><br><br>
						</div>
						RESPUESTA: <select id="respuesta" name="respuesta"></select>
					</p>
					<input type="button" id="add" value="ADICIONAR OPCION" ><br><br>
					<input type="submit" name="guardarCerrada" value="GUARDAR"><br><br>
				</form>
				<a  href="preguntaAbierta.php"><img src="mas.png" width="70" heigth="70" align="right">  </a>
				<a  href="principalC.html"><img src="15.png" width="70" heigth="70" align="right"> "  " </a>
				<a  href="registroCuestionario.php"><img src="17.png" width="70" heigth="70" align="right"> </a>
			</div>
			<div id="pregvf">

				<header>
					<h2>VERDADERO O FALSO</h2>
				</header>
				<form action="preguntaAbierta.php" method="post">
					<p class="pre">

						PREGUNTA: <BR><BR>  
						<textarea class="textarea1" name="pregunta" rows=automatically cols=automatically placeholder="¡Escriba aca su pregunta!"></textarea><br><br>

						RESPUESTA: <BR><BR>    
						<select id="respuesta" name="respuesta" >
							<option value="1">true</option>
							<option value="0">false</option>
						</select><br><br>
						<input type="submit" name="guardarVF" value="GUARDAR"><br><br>
						<br>

					</p>
				</form>
				<a  href="preguntaAbierta.php"><img src="mas.png" width="70" heigth="70" align="right">  </a>
				<a  href="principalC.html"><img src="15.png" width="70" heigth="70" align="right"> "  " </a>
				<a  href="registroCuestionario.php"><img src="17.png" width="70" heigth="70" align="right"> </a>
			</div>					
		</div>
	</div>
	<footer id="footer">

		<ul class="icons">
			<li><a href="https://twitter.com/GaiaTools" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
			<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
		</ul>

		<ul class="copyright">
			<li>GAIA (Grupo de Ambientes Inteligentes Adaptativos)</li>
		</ul>

	</footer>
</section>


</body>
</html>
<?php
$objDatos->cerrarConexion();
?>
<script type="text/javascript">
$("#add").click(function(){
	var name = parseInt($(".ans > input").last()[0].name)+1
	$(".ans").append(name+"° opcion: <input type=text name="+name+" onchange=myFunction(this.value)><br><br>")
});

function myFunction(val) {
	$('#respuesta').append('<option value='+val+' selected="selected">'+val+'</option>');
}
</script>
<script type="text/javascript">
	function confirmClick() {
		if(confirm("desea cerrar sesión?")) {
			return true;
		} else {
			return false;
		}
	};
</script>